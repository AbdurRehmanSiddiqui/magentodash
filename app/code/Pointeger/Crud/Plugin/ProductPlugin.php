<?php

declare(strict_types=1);

namespace Pointeger\Crud\Plugin;

use Magento\Catalog\Model\Product;

class ProductPlugin
{
    public function afterGetSku(Product $subject, $result)
    {
        $result = 'Pointeger-' . $result;
        return $result;
    }
}
