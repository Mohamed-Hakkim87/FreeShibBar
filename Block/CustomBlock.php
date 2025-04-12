<?php
namespace Hikmadh\Freeshipbar\Block;

use Magento\Checkout\Model\Cart;
use Magento\Framework\View\Element\Template;

class CustomBlock extends Template
{

    /**
    * @var \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    */
    private $scopeConfig;

    protected $cart;

    /**
    * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        Cart $cart,
        array $data = []
    )    {
        parent::__construct($context, $data);
        $this->cart = $cart;
        $this->scopeConfig = $scopeConfig;
    }

   /**
    * @return float
    */
    public function getFreeShippingSubtotal()
    {
        return $this->scopeConfig->getValue('carriers/freeshipping/free_shipping_subtotal', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    /**
    * @return float
    */
    public function getOrderSubtotal()
    {
        $subTotal = $this->cart->getQuote()->getSubtotal();
        return $subTotal;
    }

    /**
     * @return bool
     */
    public function isFreeShippingEnabled()
    {
        return $this->scopeConfig->isSetFlag('carriers/freeshipping/active', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
}