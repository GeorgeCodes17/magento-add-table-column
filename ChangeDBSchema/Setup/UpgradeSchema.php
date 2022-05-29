<?php
    namespace George\ChangeDBSchema\Setup;
    
    use Magento\Framework\Setup\UpgradeSchemaInterface;
    use Magento\Framework\Setup\ModuleContextInterface;
    use Magento\Framework\Setup\SchemaSetupInterface;
    
    /**
     * @codeCoverageIgnore
     */
    class UpgradeSchema implements UpgradeSchemaInterface
    {
        /**
         * {@inheritdoc}
         */
        public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
        {        
            $installer = $setup;
            $installer->startSetup();
            if (version_compare($context->getVersion(), '1.0.1') < 0) {
                $installer->getConnection()->addColumn(
                    $installer->getTable('admin_user'),
                    'test',
                    [
                        'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        'nullable' => true,
                        'length' => '11',                    
                        'default' => '0',
                        'comment' => 'Jute Is Allow Status'
                    ]
                );
            }
            $installer->endSetup();
        }
    }