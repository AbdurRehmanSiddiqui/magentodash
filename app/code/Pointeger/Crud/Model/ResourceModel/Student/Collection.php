<?php declare(strict_types=1);

namespace Pointeger\Crud\Model\ResourceModel\Student;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Pointeger\Crud\Model\ResourceModel\Student as ResourceModelStudent;
use Pointeger\Crud\Model\Student as ModelStudent;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(ModelStudent::class, ResourceModelStudent::class);
    }

}
