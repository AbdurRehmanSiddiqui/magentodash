<?php
namespace Pointeger\Catalog\Controller\Index;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\ForwardFactory;

class ForwardAction extends Action
{

    protected $forwadfactory;
    public function __construct(Context $context,ForwardFactory $forwardfactory)
    {
        parent::__construct($context);
        $this->forwadfactory=$forwardfactory;

    }

    public function execute()
    {
        $temp = $this->forwadfactory->create();
        $temp->setController('index')->forward('hello');
        //echo "hello world";
    }


}