<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace rs\linkshare\Core;

/**
 * Description of Language
 *
 * @author thomas
 */
class Language extends Language_parent 
{
    
    public function getMultiLangTables()
    {
        $aTables = parent::getMultiLangTables();
        $aTables[]='rs_linkshare';

        return $aTables;
    }
}
