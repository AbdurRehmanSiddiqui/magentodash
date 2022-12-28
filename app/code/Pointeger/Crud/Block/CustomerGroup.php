<?php

declare(strict_types=1);

namespace Pointeger\Crud\Block;


use Magento\Catalog\Api\CategoryRepositoryInterface;
use Magento\Catalog\Block\Product\Context;
use Magento\Catalog\Block\Product\ListProduct;
use Magento\Catalog\Helper\Output as OutputHelper;
use Magento\Catalog\Model\Layer\Resolver;
use Magento\Customer\Model\ResourceModel\Group\CollectionFactory as CustomerGroupFactory;
use Magento\Customer\Model\SessionFactory;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Data\Helper\PostHelper;
use Magento\Framework\Url\Helper\Data;

/**
 * Class CustomerGroup
 * @package Pointeger\Crud\Block
 */
class CustomerGroup extends ListProduct
{

    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;
    /**
     * @var SessionFactory
     */
    protected $sessionFactory;
    /**
     * @var CustomerGroupFactory
     */
    protected $customerGroupFactory;

    /**
     * CustomerGroup constructor.
     * @param Context $context
     * @param PostHelper $postDataHelper
     * @param Resolver $layerResolver
     * @param SessionFactory $sessionFactory
     * @param ScopeConfigInterface $scopeConfig
     * @param CustomerGroupFactory $customerGroupFactory
     * @param CategoryRepositoryInterface $categoryRepository
     * @param Data $urlHelper
     * @param array $data
     * @param OutputHelper|null $outputHelper
     */
    public function __construct(
        Context $context,
        PostHelper $postDataHelper,
        Resolver $layerResolver,
        SessionFactory $sessionFactory,
        ScopeConfigInterface $scopeConfig,
        CustomerGroupFactory $customerGroupFactory,
        CategoryRepositoryInterface $categoryRepository,
        Data $urlHelper,
        array $data = [],
        OutputHelper $outputHelper = null
    ) {
        $this->sessionFactory = $sessionFactory;
        $this->scopeConfig = $scopeConfig;
        $this->customerGroupFactory = $customerGroupFactory;
        parent::__construct(
            $context,
            $postDataHelper,
            $layerResolver,
            $categoryRepository,
            $urlHelper,
            $data,
            $outputHelper
        );
    }

    /**
     * @return string|null
     * @throws \Magento\Framework\Exception\LocalizedException
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    protected function _toHtml()
    {
        $customer = $this->customerGroupFactory->create();
        $session = $this->sessionFactory->create();
        $customerGroup = $this->scopeConfig->getValue('show_product/general/show_products');
        $customerGroupId = $session->getCustomerGroupId();
        $customer->addFieldToFilter('customer_group_id', $customerGroupId);
        $customerGroupCode = $customer->getFirstItem()->getData('customer_group_code');

        if ($customerGroup == $customerGroupCode) {
            return parent::_toHtml();
        } else {
            return null;
        }
    }
}
