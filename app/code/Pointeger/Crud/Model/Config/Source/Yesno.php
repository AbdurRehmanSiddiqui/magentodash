<?php
declare(strict_types=1);

namespace Pointeger\Crud\Model\Config\Source;
use Magento\Customer\Api\GroupRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Pointeger\Crud\Helper\Data;

/**
 * @api
 * @since 100.0.2
 */
class Yesno implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * Options getter
     *
     * @return array
     */
    protected $group;
    protected $datahelper;
    public function __construct(GroupRepositoryInterface $group,Data $datahelper)
    {
        $this->group=$group;
        $this->datahelper=$datahelper;
    }

    public function toOptionArray()
    {

       return $this->datahelper->getCustomerGroups();
       // return [['value' => 'Wholesale', 'label' => __('Wholesale')], ['value' => 'Retailer', 'label' => __('Retailer')]];

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
