<?php
namespace Hikmadh\Freeshipbar\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Shipping extends AbstractDb
{
    protected $_idFieldName = 'config_id';

    protected function _construct()
    {
        $this->_init('core_config_data', 'config_id');
    }
}
