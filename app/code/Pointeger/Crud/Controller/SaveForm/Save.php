<?php

declare(strict_types=1);

namespace Pointeger\Crud\Controller\SaveForm;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Message\ManagerInterface;
use Pointeger\Crud\Model\FormDataFactory;
use Pointeger\Crud\Model\ResourceModel\FormData as ResourceModelForm;


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
    /**
     * @var RedirectFactory
     */
    protected $redirectFactory;
    /**
     * @var FormDataFactory
     */
    protected $formModelFactory;
    /**
     * @var ResourceModelForm
     */
    protected $formresoourcemodel;

    /**
     * Save constructor.
     * @param Context $context
     * @param ManagerInterface $messageManager
     * @param RedirectFactory $redirectfactory
     * @param FormDataFactory $formmodelFactory
     * @param ResourceModelForm $formresoourcemodel
     */
    public function __construct(
        Context $context,
        ManagerInterface $messageManager,
        RedirectFactory $redirectfactory,
        FormDataFactory $formmodelFactory,
        ResourceModelForm $formresoourcemodel
    ) {
        $this->messageManager = $messageManager;
        $this->redirectFactory = $redirectfactory;
        $this->formModelFactory = $formmodelFactory;
        $this->formresoourcemodel = $formresoourcemodel;

        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Redirect|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $name = $this->_request->getParam('product-name');
        $sku = $this->_request->getParam('product-sku');
        $description = $this->_request->getParam('product-description');
        $formModel = $this->formModelFactory->create();
        try {
            $formModel->setProductName($name);
            $formModel->setProductSku($sku);
            $formModel->setProductDescription($description);
            $formModel->save();
            $this->messageManager->addSuccessMessage("Data stored Successfully");
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }
        $redirect = $this->redirectFactory->create();
        return $redirect->setPath("pointeger_crud/post/form");
    }
}

