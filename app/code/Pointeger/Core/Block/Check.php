<?php
declare(strict_types=1);

namespace Pointeger\Core\Block;
use Magento\Customer\Model\SessionFactory;
use Magento\Cms\Model\BlockFactory;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Cms\Model\Template\FilterProvider;
use Magento\Framework\View\Element\Context;

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

        array $data = []
    ) {
        $this->sessionFactory = $sessionFactory;
        parent::__construct($context, $filterProvider, $storeManager, $blockFactory, $data);
    }

    /**
     * @return string
     */
    protected function _toHtml()
    {
        $html = '';
        if ($this->check_session()) {
            $html = parent::_toHtml();
        }
        return $html;
    }

    /**
     * @return bool
     */
    public function check_session()
    {
        $session= $this->sessionFactory->create();
        if ($session->isLoggedIn()) {
            return true;
        } else {
            return false;
        }
    }
}
