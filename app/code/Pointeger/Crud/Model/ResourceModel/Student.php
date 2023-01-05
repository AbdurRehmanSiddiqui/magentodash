<?php
declare(strict_types=1);

namespace Pointeger\Crud\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Student extends AbstractDb
{
    protected function _construct()
    {
        $this->_init("pointeger_student", "entity_id");
    }
}
