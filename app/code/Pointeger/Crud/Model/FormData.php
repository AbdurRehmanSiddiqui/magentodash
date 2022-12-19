<?php
declare(strict_types=1);

namespace Pointeger\Crud\Model;

use Magento\Framework\Model\AbstractModel;


class FormData extends AbstractModel
{
    public function setProductName($product_name)
    {
        return $this->setData('product_name', $product_name);
    }

    public function setProductSku($product_sku)
    {
        return $this->setData('product_sku', $product_sku);
    }

    public function setProductDescription($product_description)
    {
        return $this->setData('product_description', $product_description);
    }

    protected function _construct()
    {
        $this->_init(ResourceModel\FormData::class);
    }
}


