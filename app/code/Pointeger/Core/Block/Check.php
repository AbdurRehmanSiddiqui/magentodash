<?php

declare(strict_types=1);

namespace Pointeger\Core\Block;

use Magento\Cms\Model\BlockFactory;
use Magento\Cms\Model\Template\FilterProvider;
use Magento\Customer\Model\SessionFactory;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Context;
use Magento\Store\Model\StoreManagerInterface;

/**
 * Class Check
 * @package Pointeger\Core\Block
 */
class Check extends \Magento\Cms\Block\Block
{
    /**
     * @var SessionFactory
     */
    protected $sessionFactory;
    protected $scopeConfig;

    /**
     * Constructor
     *
     * @param Context $context
     * @param array $data
     * @param FilterProvider $filterProvider
     * @param BlockFactory $blockFactory
     * @param StoreManagerInterface $storeManager
     * @param SessionFactory $sessionfactory
     */
    public function __construct(
        Context $context,
        FilterProvider $filterProvider,
        StoreManagerInterface $storeManager,
        BlockFactory $blockFactory,
        SessionFactory $sessionFactory,
        ScopeConfigInterface $scopeinterface,


        array $data = []
    ) {
        $this->sessionFactory = $sessionFactory;
        $this->scopeConfig = $scopeinterface;
        parent::__construct($context, $filterProvider, $storeManager, $blockFactory, $data);
    }

    /**
     * @return bool
     */
    public function check_session()
    {
        $session = $this->sessionFactory->create();
        if ($session->isLoggedIn()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return string
     */
    protected function _toHtml()
    {
        $html = '';
//        if ($this->checkConfig()) {
            $html = parent::_toHtml();
//        }
        return $html;
    }

    public function checkConfig(): bool
    {
        $val = $this->scopeConfig->getValue(
            'blocksettings/general/enable',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
        if ($val) {
            return true;
        }
        return false;
    }
}
