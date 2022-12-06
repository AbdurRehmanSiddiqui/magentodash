<?php
namespace Pointeger\Core\Block\Customer;

use Magento\Framework\View\Element\Html\Link\Current;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\App\DefaultPathInterface;
use Magento\Customer\Model\Session;

class DynamicLink extends Current
{
    protected $customerSession;

    public function __construct(
        Context $context,
        DefaultPathInterface $defaultPath,
        Session $customerSession,
        array $data = []
    ) {
        $this->customerSession = $customerSession;
        parent::__construct($context, $defaultPath, $data);
    }

    protected function _toHtml()
    {
        $responseHtml = null;
        if($this->customerSession->isLoggedIn()) {
            // here you can put your custom conditions
            $responseHtml = parent::_toHtml();
        }
        return $responseHtml;
    }
}