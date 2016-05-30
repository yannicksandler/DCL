<?php
/**
 */
class MenuOptionTable extends Doctrine_Table
{
    public function GetSelected( $url )
    {
        $qry    =   $this->createQuery();
            
        if( !is_null($url) and $url != '' )
            $qry->addWhere("Url LIKE ?", '%'.$url.'%');
            
        if( $qry->count() )
            return $qry->Limit(1)->FetchOne()->Menu;
            
        return false;    
    }
}