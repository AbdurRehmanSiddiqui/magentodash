<?php declare(strict_types=1);

namespace Pointeger\Crud\etc\Model\ResourceModel\Form;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Pointeger\Crud\etc\Model\ResourceModel\FormData as ResourceModelFormData;
use Pointeger\Crud\etc\Model\FormData as ModelFormData;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(ModelFormData::class,ResourceModelFormData::class);
    }


}


