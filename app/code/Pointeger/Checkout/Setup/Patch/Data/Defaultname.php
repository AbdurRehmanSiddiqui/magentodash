<?php

namespace Pointeger\Checkout\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\App\Config\Storage\WriterInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
/**
 * Class Defaultname
 * @package Pointeger\Checkout\Setup\Patch\Data
 */
class Defaultname implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;
    private $configwriter;

    /**
     * Defaultname constructor.
     * @param ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(ModuleDataSetupInterface $moduleDataSetup,WriterInterface $configwriter)
    {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->configwriter=$configwriter;
    }

    /**
     * @return array|string[]
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * @return Defaultname|void
     */
    public function apply()
    {
        $this->moduleDataSetup->getConnection()->startSetup();


       // $this->moduleDataSetup->updateTableRow("core_config_data", "config_id", "36", "value", "abdurrehman");
         $this->configwriter->save("namesection/namegroup/namefeild","majid",ScopeConfigInterface::SCOPE_TYPE_DEFAULT);

        $this->moduleDataSetup->getConnection()->endSetup();
    }

    /**
     * @return array|string[]
     */
    public function getAliases()
    {
        return [];
    }

}