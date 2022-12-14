<?php declare(strict_types=1);

namespace Pointeger\Crud\Controller\SaveForm;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Message\ManagerInterface;

/**
 * Class Save
 * @package Pointeger\Crud\Controller\SaveForm
 */
class Save extends Action
{
    /**
     * @var ManagerInterface
     */
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
        $name = $this->getRequest()->getParam('product-name');
        $sku = $this->getRequest()->getParam('product-sku');
        $description = $this->getRequest()->getParam('product-description');
        $this->messageManager->addSuccessMessage("Redirection Successfull");
        $redirect = $this->redirectFactory->create();
        return $redirect->setPath("pointeger_crud/post/form");
    }
}

