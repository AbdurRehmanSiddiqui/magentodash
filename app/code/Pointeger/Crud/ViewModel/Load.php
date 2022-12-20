<?php

declare(strict_types=1);

namespace Pointeger\Crud\ViewModel;

use Magento\Framework\DataObject;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Pointeger\Crud\Model\ResourceModel\Form\CollectionFactory;

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
     * Load constructor.
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(CollectionFactory $collectionFactory)
    {
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * @return DataObject[]
     */
    public function getformdata()
    {
        $collection = $this->collectionFactory->create();
        return $collection->getItems();
    }

}

