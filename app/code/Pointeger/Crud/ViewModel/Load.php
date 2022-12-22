<?php

declare(strict_types=1);

namespace Pointeger\Crud\ViewModel;

use Magento\Customer\Model\SessionFactory;
use Magento\Framework\DataObject;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Pointeger\Crud\Model\ResourceModel\Student\CollectionFactory;

/**
 * Class Load
 * @package Pointeger\Crud\ViewModel
 */
class Load implements ArgumentInterface
{
    protected $load;
    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;
    /**
     * @var SessionFactory
     */
    protected $sessionFactory;

    /**
     * Load constructor.
     * @param CollectionFactory $collectionFactory
     * @param SessionFactory $sessionFactory
     */
    public function __construct(CollectionFactory $collectionFactory, SessionFactory $sessionFactory)
    {
        $this->collectionFactory = $collectionFactory;
        $this->sessionFactory = $sessionFactory;
    }

    /**
     * @return DataObject[]|null
     */
    public function getformdata()
    {
        $collection = $this->collectionFactory->create();
        $session = $this->sessionFactory->create();
        if ($customerid = $session->getCustomerId()) {
            $collection->addFieldToFilter('customer_id', $customerid);
            return $collection->getItems();
        } else {
            return null;
        }
    }
}

