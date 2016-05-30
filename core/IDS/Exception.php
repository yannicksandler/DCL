<?php
/**
 * @author Gaston
 * @version 1.0
 * @created 16-mar-2010 06:00:03 p.m.
 */
class IDS_Exception extends Exception
{
    public static function FormatMessage( Exception $e )
    {
        return  '<br>Code:'.$e->getCode().'<br/>'.
                'Message:'.$e->getMessage().'<br/>'.
                'File:'.$e->getFile().'<br/>'.
                'Line:'.$e->getLine().'<br/>'.
                'Trace:'.$e->getTraceAsString();
    }
}
?>