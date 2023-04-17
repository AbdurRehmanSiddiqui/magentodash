<?php

declare(strict_types=1);

namespace Pointeger\Crud\Plugin;

use Magento\Checkout\Controller\Cart\Add;

/**
 * Class ProductPlugin
 * @package Pointeger\Crud\Plugin
 */
class ProductPlugin
{
    /**
     * @param Add $subject
     * @param $result
     * @return mixed
     */
    public function afterGetSku(Add $subject, $result)
    {
        return $result;
    }
}
