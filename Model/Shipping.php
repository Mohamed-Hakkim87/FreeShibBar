<?php
namespace Hikmadh\Freeshipbar\Model;

use Magento\Framework\Model\AbstractModel;

class Shipping extends AbstractModel
{
    protected $_idFieldName = 'config_id';

    protected function _construct()
    {
        $this->_init('Hikmadh\Freeshipbar\Model\ResourceModel\Shipping');
    }
}
