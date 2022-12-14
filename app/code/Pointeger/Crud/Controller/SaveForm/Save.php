<?php

namespace Pointeger\Crud\Controller\SaveForm;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Message\ManagerInterface;


class Save extends Action
{
    protected $messageManager;
    protected $redirectFactory;

    /**
     * Save constructor.
     * @param Context $context
     * @param ManagerInterface $messageManager
     * @param RedirectFactory $redirect
     */
    public function __construct(Context $context, ManagerInterface $messageManager, RedirectFactory $redirectfactory)
    {
        $this->messageManager = $messageManager;
        $this->redirectFactory = $redirectfactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Redirect|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $name = $_POST['product-name'];
        $sku = $_POST['product-sku'];
        $description = $_POST['product-description'];
        $this->messageManager->addSuccessMessage("Redirection Successfull");
        $redirect = $this->redirectFactory->create();
        return $redirect->setPath("pointeger_crud/post/form");
    }
}