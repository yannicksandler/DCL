<?php
    class IDS_File_Utils
    {
        const DEFAULT_SPLIT_LENGTH          = 2;
        const DEFAULT_SPLIT_COUNT           = 3;
        const DEFAULT_DIRECTORY_PERMISSION  = 0755;
        
        public static function CleanFilename( $fileName )
        {
            return preg_replace("/[^a-zA-Z0-9\_\.\-]/","",$fileName);
        }
        
        public static function Exists( $file )
        {
            return file_exists( $file );
        }
        
        public static function IsUploaded( $file )
        {
            return is_uploaded_file($file);
        }
        
        public static function Move( $source, $dest )
        {
            
            $destDir    = dirname( $dest );
            $destFile   = basename( $dest );
            
            $sourceDir  = dirname( $source );
            $sourceFile = basename( $dest );
            
            $definitiveName = $destFile ? $destFile : $sourceFile;
            
            return self::Rename( $source, $destDir . DIRECTORY_SEPARATOR . $definitiveName );
        }
        
        public static function MoveAndRename( $source, $dest, $splitDirs = false, $options = array() )
        {
            
            $destinationDir = dirname($dest);
            $fileName       = self::CleanFilename(basename($dest));
            $dotPosition    = strrpos($fileName,".");
            
            if( strlen($fileName) == 0 || $dotPosition === 0 )
            {
                $fileName   = uniqid("generated-").'.'.substr($fileName, $dotPosition + 1);
            }
            
            if( !self::Readable( $source ) )
                throw new IDS_File_Exception( $source.' is not readable' );
                
            if( !self::Writable( $destinationDir ) )
                throw new IDS_File_Exception( $dest.' is not writable' );
                
            if( $splitDirs )
            {
                $definitiveDir  = self::SplitSubdirs( $fileName, $destinationDir, $options );
            }
            else
            {
                $definitiveDir  = $dest;
            }
            
            if( !isset($options['overwrite']) )
            {
                    
                if( $dotPosition === false )
                {
                    $renamedFile    = $fileName.'_'.uniqid();
                    $renamedExt     = '';
                }
                else
                {
                    $renamedFile    = substr($fileName, 0, $dotPosition);
                    $renamedExt     = substr($fileName, $dotPosition + 1);
                }
                
                while( file_exists( $definitiveDir.DIRECTORY_SEPARATOR.$fileName ) )
                {
                    
                    $fileName       = uniqid($renamedFile.'-').'.'.$renamedExt;
                }
            }
            
            if(self::Move( $source, $definitiveDir.DIRECTORY_SEPARATOR.$fileName ))
                return $definitiveDir.DIRECTORY_SEPARATOR.$fileName;
            else
                return false;
        }
        
        public static function MoveAndRenameUploaded( $source, $dest, $splitDirs = false, $options = array() )
        {
            if( !self::IsUploaded( $source ) )
                throw new IDS_File_Exception( $source.' was not uploaded' );

            return self::MoveAndRename( $source, $dest, $splitDirs, $options );
        }
        
        public static function NameGenerator( $original )
        {
            $nameParts  = explode('.', $original);
            $newName    = uniqid( $nameParts[0], true );
            
            if( count($nameParts) > 1 )
                $newName += '.'.$nameParts[1];
                
            return $newName;
        }
        
        public static function Readable( $file )
        {                
            return is_readable( $file );
        }
        
        public static function Rename( $original, $new )
        {
            if( !self::Readable($original) )
                throw new IDS_File_Exception( $original.' is not readable' );
                
            $writablePath   = self::Exists( $new ) ? $new : dirname( $new );
            
            if( !self::Writable( $writablePath ) )
                throw new IDS_File_Exception( $writablePath.' is not writable' );
                
            return rename( $original, $new );
        }
        
        public static function SplitSubdirs( $filePath ,  $basePath = null,  $options = array()  )
        {
            $file           = basename( $filePath );
            $dir            = $basePath ? $basePath : dirname( $filePath );
            $extMarkPos     = strrpos( $file, '.');
            
            if( $extMarkPos == 0 || $extMarkPos == strlen($file) )
            {
                $fileName       = $file;
                $fileExtension  = '';
            }
            else
            {
                $fileName       = substr($file,0,$extMarkPos);
                $fileExtension  = substr($file,$extMarkPos + 1);
            }

            if( !$fileName )
                throw new IDS_File_Exception('Cannot find filename in '.$filePath);
                
            $splitLength    =   isset($options['splitLength']) ?
                                $options['splitLength'] :
                                self::DEFAULT_SPLIT_LENGTH;
                                
            $splitCount     =   isset($options['splitCount']) ?
                                $options['splitCount'] :
                                self::DEFAULT_SPLIT_COUNT;
                                
            $permissions    =   isset( $options['directoryPermission'] ) ?
                                $options['directoryPermission'] :
                                self::DEFAULT_DIRECTORY_PERMISSION;
                                
            $fileNameLength =   strlen( $fileName );
            
            if( $fileNameLength < $splitLength )
                $splitLength    = $fileNameLength;
                
            if( $fileNameLength < $splitLength * $splitCount )
                $splitCount     = round($fileNameLength / $splitLength);
                
            for( $i = 0 ; $i < $splitCount ; $i++ )
            {
                $subDir = substr( $fileName, $i * $splitLength, $splitLength );
                
                if(!$subDir)
                    break;
                
                $newDir = $dir.DIRECTORY_SEPARATOR.$subDir;
                
                if( !self::Exists( $newDir ) )
                {
                    mkdir($newDir, $permissions);
                    $dir    = $newDir;
                }
                else if(  is_dir( $newDir ) )
                {
                    $dir    = $newDir;
                }
                else
                {
                    break;
                }
            }
            
            return $dir;   
        }
        
        public static function Writable( $file )
        {                
            return is_writable($file);
        }
        
    }
?>