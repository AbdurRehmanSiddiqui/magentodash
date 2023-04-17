<?php

declare(strict_types=1);

namespace Pointeger\Crud\Model;

use Magento\Framework\Model\AbstractModel;

class ViewProduct extends AbstractModel
{
    public function setCustomerId($customerId)
    {
        return $this->setData('customer_id', $customerId);
    }

    public function setSku($sku)
    {
        return $this->setData('sku', $sku);
    }

    protected function _construct()
    {
        $this->_init(ResourceModel\ViewProduct::class);
    }
}
