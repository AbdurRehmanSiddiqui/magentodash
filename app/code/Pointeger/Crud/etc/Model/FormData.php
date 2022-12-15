<?php declare(strict_types=1);

namespace Pointeger\Crud\etc\Model;

use Magento\Framework\Model\AbstractModel;


class FormData extends AbstractModel
{
    protected function _construct()
    {
       $this->_init(ResourceModel\FormData::class);
    }

}