<?php

declare(strict_types=1);

namespace Pointeger\Cookie\Setup\Patch\Data;

use Magento\Cms\Model\BlockFactory;
use Magento\Cookie\Block\Html\Notices;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Store\Model\Store;

/**
 * Class CreateCookieCmsBlock
 * @package Pointeger\Cookie\Setup\Patch\Data
 */
class CreateCookieCmsBlock implements DataPatchInterface
{
    const CMS_BLOCK_IDENTIFIER = 'cookie-cms-block';
    /**
     * @var Notices
     */
    protected $block;
    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;
    /**
     * @var BlockFactory
     */
    private $blockFactory;

    /**
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param BlockFactory $blockFactory
     * @param Notices $block
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        BlockFactory $blockFactory,
        Notices $block
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->blockFactory = $blockFactory;
        $this->block = $block;
    }

    /**
     * @inheritDoc
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function apply()
    {
        $this->moduleDataSetup->startSetup();
        $cookieContent = '  <div role="alertdialog"
         tabindex="-1"
         class="message global cookie"
         id="notice-cookie-block">
        <div role="document" class="content" tabindex="0">
            <p>
                <strong>We use cookies to make your experience better.</strong>
                <span>
                    To comply with the new e-Privacy directive, we need to ask for your consent to set the cookies.
                </span>'
            . $this->block->escapeHtml(
                __('<a href="%1">Learn more</a>.', $this->block->getPrivacyPolicyLink()),
                ['a']
            ) .
            '</p>
            <div class="actions">
                <button id="btn-cookie-allow" class="action allow primary">
                    <span>' . $this->block->escapeHtml(__('Allow Cookies')) . '</span>
                </button>
            </div>   
        </div>
    </div>';

        $this->blockFactory->create()
            ->setTitle('Cookie Cms Block')
            ->setIdentifier(self::CMS_BLOCK_IDENTIFIER)
            ->setIsActive(true)
            ->setContent($cookieContent)
            ->setStores([Store::DEFAULT_STORE_ID])
            ->save();
        $this->moduleDataSetup->endSetup();
    }

    /**
     * @inheritDoc
     */
    public function getAliases()
    {
        return [];
    }
}
