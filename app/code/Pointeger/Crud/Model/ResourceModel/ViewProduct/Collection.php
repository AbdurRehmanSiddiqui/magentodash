<?php

declare(strict_types=1);

namespace Pointeger\Crud\Model\ResourceModel\ViewProduct;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Pointeger\Crud\Model\ResourceModel\ViewProduct;
use Pointeger\Crud\Model\ViewProduct as ProductModel;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(ProductModel::class, ViewProduct::class);
    }

}
