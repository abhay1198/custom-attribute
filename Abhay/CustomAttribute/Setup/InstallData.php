<?php

namespace Abhay\CustomAttribute\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface as ScopedAttribute;

class InstallData implements InstallDataInterface
{
    private $eavSetupFactory;

    public function __construct(
        EavSetupFactory $eavSetupFactory
    ) {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY,
            'is_popular_category',
            [
                'type' => 'int',
                'group' => 'General Information',
                'input' => 'select',
                'label' => __('Is Popular Category'),
                'note'  => __('Is Popular Category'),
                'source' => \Magento\Eav\Model\Entity\Attribute\Source\Boolean::class,
                'global' => ScopedAttribute::SCOPE_GLOBAL,
                'visible' => true,
                'user_defined' => false,
                'default' => 0,
                'required' => false,
                "searchable" => false,
                "filterable" => true,
                "comparable" => false,
                'visible_on_front' => false,
                'unique' => false
            ]
        );
    }
}