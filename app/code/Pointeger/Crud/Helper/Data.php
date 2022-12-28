<?php

declare(strict_types=1);

namespace Pointeger\Crud\Helper;

use Magento\Customer\Model\ResourceModel\Group\Collection as CustomerGroup;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;

/**
 * Class Data
 * @package Pointeger\Crud\Helper
 */
class Data extends AbstractHelper
{
    /**
     * @var CustomerGroup
     */
    protected $customerGroup;

    /**
     * Data constructor.
     * @param Context $context
     * @param CustomerGroup $customerGroup
     */
    public function __construct(
        Context $context,
        CustomerGroup $customerGroup
    ) {
        $this->customerGroup = $customerGroup;
        parent::__construct($context);
    }

    /**
     * @return array
     */
    public function getCustomerGroups()
    {
        $customerGroups = $this->customerGroup->toOptionArray();
        foreach ($customerGroups as $key => $value) {
            $customerGroups[$key]['value'] = $customerGroups[$key]['label'];
        }
        return $customerGroups;
    }
}
