<?php

namespace Pointeger\Catalog\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Hello extends Action
{
    /**
     * @var PageFactory
     */
    protected $pageFactory;
    /**
     * Hello constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(Context $context, PageFactory $pageFactory) {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
    }
    public function execute()
    {
        return $this->pageFactory->create();
    }
}