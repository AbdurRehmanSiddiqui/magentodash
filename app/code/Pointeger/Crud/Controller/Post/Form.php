<?php declare(strict_types=1);

namespace Pointeger\Crud\Controller\Post;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Form
 * @package Pointeger\Crud\Controller\Post
 */
class Form extends Action
{
    /**
     * @var PageFactory
     */
    protected $pagefactory;

    /**
     * Form constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory
    ) {
        $this->pagefactory = $pageFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        return $this->pagefactory->create();
    }
}

