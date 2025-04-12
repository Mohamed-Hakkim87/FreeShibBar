<?php
namespace Hikmadh\Freeshipbar\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class Custom implements ArrayInterface
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => 'option_1', 'label' => __('Yes')],
            ['value' => 'option_2', 'label' => __('No')],
            // Add more options as needed
        ];
    }
}
