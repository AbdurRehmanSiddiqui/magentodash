<?php

namespace Pointeger\Checkout\Controller\Adminhtml\Index;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Index
 * @package Pointeger\Checkout\Controller\Adminhtml\Index
 */
class Index extends \Magento\Backend\App\Action
{
    protected $pagefactory;
    /**
     * Index constructor.
     * @param Context $context
     */
    public function __construct(Context $context,PageFactory $page)
    {
        $this->pagefactory=$page;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        return $this->pagefactory->create();
       // die("this is an admin controller");
    }
}
