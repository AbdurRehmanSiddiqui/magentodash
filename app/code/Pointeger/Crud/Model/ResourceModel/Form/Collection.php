<?php declare(strict_types=1);

namespace Pointeger\Crud\Model\ResourceModel\Form;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Pointeger\Crud\Model\ResourceModel\FormData as ResourceModelFormData;
use Pointeger\Crud\Model\FormData as ModelFormData;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(ModelFormData::class,ResourceModelFormData::class);
    }

}




