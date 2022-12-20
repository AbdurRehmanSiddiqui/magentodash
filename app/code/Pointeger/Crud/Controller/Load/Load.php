<?php

declare(strict_types=1);

namespace Pointeger\Crud\Controller\Load;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Pointeger\Crud\Model\ResourceModel\Form\CollectionFactory;

/**
 * Class Load
 * @package Pointeger\Crud\Controller\Load
 */
class Load extends Action
{
    /**
     * @var PageFactory
     */
    protected $pageFactory;
    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * Load constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory
    ) {
        $this->pageFactory = $pageFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        return $this->pageFactory->create();
    }
}