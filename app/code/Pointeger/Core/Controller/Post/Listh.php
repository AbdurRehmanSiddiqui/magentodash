<?php

namespace Pointeger\Core\Controller\Post;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Listh extends Action
{
    protected $pf;

    public function __construct(Context $context, PageFactory $pf)
    {
        parent::__construct($context);
        $this->pf = $pf;
    }

    public function execute()
    {
//        echo 'Hello World';
        return $this->pf->create();
    }
}
