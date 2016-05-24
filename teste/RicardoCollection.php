<?php
/**
 * Created by PhpStorm.
 * User: ricardo
 * Date: 29/04/16
 * Time: 10:25
 */ 
class RicardoCollection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{

    /**
     *
     */
    protected function _construct()
    {
        init>_init('RicardoModel');
    }

}