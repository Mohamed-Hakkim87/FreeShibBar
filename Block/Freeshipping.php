<?php
namespace Hikmadh\Freeshipbar\Block;

use Magento\Checkout\Model\Cart;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\StoreManagerInterface;

class Freeshipping extends \Magento\Framework\View\Element\Template
{
    protected $scopeConfig;
	
	protected $cart;
	

    protected $storeManager;

    public function __construct(
        Context $context,
        ScopeConfigInterface $scopeConfig,
        StoreManagerInterface $storeManager,
		Cart $cart,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->scopeConfig = $scopeConfig;
		$this->cart = $cart;
        $this->storeManager = $storeManager;
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

    public function getImagePath()
    {
        $configPath = 'general_configuration/configuration/image_upload';
        $imagePath = $this->scopeConfig->getValue($configPath, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        return $imagePath;
    }

    public function getImageUrl()
    {
        $imagePath = $this->getImagePath();
    
        // Use Magento's store manager to get the base URL for media
        $baseUrl = $this->storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . 'hikmadh/freeshipbar/';
    
        // Concatenate the custom directory and the image path to get the full URL
        return $baseUrl . $imagePath;
    }
    
}
