<?php

namespace Pointeger\Catalog\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\ObjectManager;

class Hello1 extends Action
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
//    public function __construct(Context $context, PageFactory $pageFactory) {
//        parent::__construct($context);
//        $this->pageFactory = $pageFactory;
//    }


//parent::__construct($context);
    public function execute()
    {
        $om=ObjectManager::getInstance(); //returns object of that is obtained by get instance method.
        $pf=$om->get(PageFactory::class);//returns object of page factory class.

        return $pf->create();
    }
}