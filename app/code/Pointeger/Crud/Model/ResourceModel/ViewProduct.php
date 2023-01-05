<?php

declare(strict_types=1);

namespace Pointeger\Crud\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class ViewProduct extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('customer_viewlist', 'entity_id');
    }

}
