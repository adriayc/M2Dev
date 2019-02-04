<?php

namespace M2Dev\Faq\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class UpgradeData implements \Magento\Framework\Setup\UpgradeDataInterface
{

    /**
     * Upgrades data for a module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();   //Inicializamos la instalacion

        if (version_compare($context->getVersion(), '1.0.1', '<')) {
            $binds = [
                [
                    'question' => 'Product Question #1',
                    'answer' => 'Product Answer #1',
                    'tag' => 'product'
                ],
                [
                    'question' => 'Product Question #2',
                    'answer' => 'Product Answer #2',
                    'tag' => 'product'
                ],
                [
                    'question' => 'Customer Question #1',
                    'answer' => 'Customer Answer #1',
                    'tag' => 'customer'
                ],
                [
                    'question' => 'Order Question #1',
                    'answer' => 'Order Answer #1',
                    'tag' => 'order'
                ]
            ];

            $faqTableName = $installer->getTable('faq');

            //Option#1 - Insertamos todos los valores
            $installer->getConnection()->insertMultiple($faqTableName, $binds);

            //Option#2 - Insertamos los datos uno por uno
//            foreach ($binds as $bind) {
//                $installer->getConnection()->insertForce($faqTableName, $bind);
//            }
        }

        $installer->endSetup();  //Finalizamos la instalacion
    }
}