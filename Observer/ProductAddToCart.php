<?php

namespace Hikmadh\Freeshipbar\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\App\Response\RedirectInterface;
use Magento\Framework\UrlInterface;

class ProductAddToCart implements ObserverInterface
{
    protected $redirect;
    protected $url;

    public function __construct(
        RedirectInterface $redirect,
        UrlInterface $url
    ) {
        $this->redirect = $redirect;
        $this->url = $url;
    }

    public function execute(Observer $observer)
    {
        $this->redirect->redirect($observer->getRequest(), $this->url->getUrl('*/*/*'));
        return $this;
    }
}
