<?php
declare(strict_types=1);

namespace Pointeger\Crud\Model\Config\Source;

use Pointeger\Crud\Helper\Data;

/**
 * Class Yesno
 * @package Pointeger\Crud\Model\Config\Source
 */
class Yesno implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @var Data
     */
    protected $dataHelper;

    /**
     * Yesno constructor.
     * @param Data $dataHelper
     */
    public function __construct(Data $dataHelper)
    {
        $this->datahelper=$dataHelper;
    }

    /**
     * @return array
     */
    public function toOptionArray()
    {
       return $this->dataHelper->getCustomerGroups();
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return [0 => __('No'), 1 => __('Yes')];
    }
}
