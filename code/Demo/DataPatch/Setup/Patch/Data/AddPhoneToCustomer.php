<?php
/**
 * @author      Webjump Core Team <dev@webjump.com.br>
 * @copyright   2022 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 * @link        http://www.webjump.com.br
 */

declare(strict_types=1);

namespace Demo\DataPatch\Setup\Patch\Data;

use Magento\Customer\Model\Customer;
use Magento\Customer\Setup\CustomerSetup;
use Magento\Customer\Setup\CustomerSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class AddPhoneToCustomer implements \Magento\Framework\Setup\Patch\DataPatchInterface
{
    private ModuleDataSetupInterface $moduleDataSetup;
    private CustomerSetupFactory $customerSetupFactory;

    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        CustomerSetupFactory $customerSetupFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->customerSetupFactory = $customerSetupFactory;
    }

    /**
     * @inheritDoc
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function getAliases()
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function apply()
    {
        /** @var CustomerSetup $customerSetup */
        $customerSetup = $this->customerSetupFactory->create(['setup' => $this->moduleDataSetup]);
        $customerEntity = $customerSetup->getEavConfig()->getEntityType('customer');
        $attributeSetId = $customerEntity->getDefaultAttributeSetId();

        $customerSetup->addAttribute(
            Customer::ENTITY,
            'customer_phone',
            [
                'type' => 'varchar',
                'label' => 'Customer Phone',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'source' => '',
                'backend' => '',
                'user_defined' => false,
                'is_user_defined' => false,
                'sort_order' => 1010,
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'visible_on_front' => true,
                'position' => 1000,
                'default' => '',
                'system' => 0,
            ]
        );

        $attribute = $customerSetup
            ->getEavConfig()
            ->getAttribute(Customer::ENTITY, 'customer_phone')
            ->addData([
                'attribute_set_id' => $attributeSetId,
                'attribute_group_id' => 1,
                'used_in_forms' => [
                    'adminhtml_customer',
                    'adminhtml_checkout',
                    'customer_account_create',
                    'customer_account_edit',
                ],
            ]);

        $attribute->save();
    }
}
