<?php
namespace Hikmadh\Freeshipbar\Model\ResourceModel\Shipping;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Hikmadh\Freeshipbar\Model\Freeshipping;
use Hikmadh\Freeshipbar\Model\ResourceModel\Shipping;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'config_id';
    
    protected $_eventPrefix = 'hikmadh_freeshipbar_collection';

    protected function _construct()
    {
        $this->_init(CustomModel::class, CustomModelResource::class);
    }
}
