<?php declare(strict_types=1);

namespace Pointeger\Crud\etc\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class FormData extends AbstractDb
{
    protected function _construct()
    {
        $this->_init("Pointeger_Crud_form","id");
    }
}