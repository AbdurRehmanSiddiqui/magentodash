<?php

declare(strict_types=1);

namespace Pointeger\Crud\Observer;

use Magento\Customer\Model\SessionFactory;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Registry;
use Pointeger\Crud\Model\ViewProductFactory;

/**
 * Class ProductView
 * @package Pointeger\Crud\Observer
 */
class ProductView implements ObserverInterface
{
    /**
     * @var Registry
     */
    protected $register;
    /**
     * @var SessionFactory
     */
    protected $sessionFactory;
    /**
     * @var ViewProductFactory
     */
    protected $viewProductfacctory;

    /**
     * ProductView constructor.
     * @param Registry $register
     * @param SessionFactory $sessionFactory
     * @param ViewProductFactory $viewProductfacctory
     */
    public function __construct(
        Registry $register,
        SessionFactory $sessionFactory,
        ViewProductFactory $viewProductfacctory
    ) {
        $this->register = $register;
        $this->sessionFactory = $sessionFactory;
        $this->viewProductfacctory = $viewProductfacctory;
    }

    /**
     * @param Observer $observer
     * @throws \Exception
     */
    public function execute(Observer $observer)
    {
        $session = $this->sessionFactory->create();
        $viewProduct = $this->viewProductfacctory->create();
        if ($session->isLoggedIn()) {
            $viewProduct->setCustomerId($session->getCustomerId());
            $viewProduct->setSku($this->register->registry('current_product')->getData('sku'));
            $viewProduct->save();
        } else {
            return null;
        }
    }
}


