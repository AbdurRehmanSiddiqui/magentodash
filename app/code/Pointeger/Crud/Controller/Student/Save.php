<?php

declare(strict_types=1);

namespace Pointeger\Crud\Controller\Student;

use Magento\Customer\Model\SessionFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Message\ManagerInterface;
use Pointeger\Crud\Model\StudentFactory;


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
     * @var StudentFactory
     */
    protected $studentFactory;
    /**
     * @var SessionFactory
     */
    protected $sessionFactory;

    /**
     * Save constructor.
     * @param Context $context
     * @param ManagerInterface $messageManager
     * @param RedirectFactory $redirectfactory
     * @param StudentFactory $studentFactory
     * @param SessionFactory $sessionFactory
     */
    public function __construct(
        Context $context,
        ManagerInterface $messageManager,
        RedirectFactory $redirectfactory,
        StudentFactory $studentFactory,
        SessionFactory $sessionFactory

    ) {
        $this->messageManager = $messageManager;
        $this->redirectFactory = $redirectfactory;
        $this->studentFactory = $studentFactory;
        $this->sessionFactory = $sessionFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Redirect|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $session = $this->sessionFactory->create();
        $redirect = $this->redirectFactory->create();
        if ($session->isLoggedIn()) {
            $name = $this->_request->getParam('student-name');
            $rollno = $this->_request->getParam('student-rollno');
            $studentmodel = $this->studentFactory->create();

            try {
                $studentmodel->setStudentName($name);
                $studentmodel->setRollNumber($rollno);
                $studentmodel->setCustomerId($session->getCustomerId());
                $studentmodel->save();
                $this->messageManager->addSuccessMessage("Data stored Successfully");
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            }
            return $redirect->setPath("pointeger_crud/post/form");
        } else {
            $this->messageManager->addErrorMessage("Please Sign in");

            return $redirect->setPath("pointeger_crud/post/form");
        }
    }
}

