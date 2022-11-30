<?php

namespace Pointeger\Core\Controller\Post;

use Magento\Framework\Controller\Result\RedirectFactory;

class Redirectaction extends \Magento\Framework\App\Action\Action
{
    protected $redirect;

    public function __construct(\Magento\Framework\App\Action\Context $context, RedirectFactory $redirect)
    {
        parent::__construct($context);
        $this->redirect = $redirect;
    }

    public function execute()
    {
       // echo "hello";
       $rd = $this->redirect->create();
        return $rd->setPath('https://www.google.com/');
    }
}