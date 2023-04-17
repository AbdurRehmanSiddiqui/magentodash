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
    protected $viewProductfactory;

    /**
     * ProductView constructor.
     * @param Registry $register
     * @param SessionFactory $sessionFactory
     * @param ViewProductFactory $viewProductfactory
     */
    public function __construct(
        Registry $register,
        SessionFactory $sessionFactory,
        ViewProductFactory $viewProductfactory
    ) {
        $this->register = $register;
        $this->sessionFactory = $sessionFactory;
        $this->viewProductfactory = $viewProductfactory;
    }

    /**
     * @param Observer $observer
     * @throws \Exception
     */
    public function execute(Observer $observer)
    {
        $session = $this->sessionFactory->create();
        if ($session->isLoggedIn()) {
            $viewProduct = $this->viewProductfactory->create();
            $viewProduct->setCustomerId($session->getCustomerId());
            $viewProduct->setSku($this->register->registry('current_product')->getData('sku'));
            $viewProduct->save();
        }
    }
}


