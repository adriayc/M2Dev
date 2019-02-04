<?php

namespace M2Dev\Faq\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{

    /**
     * Installs DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();   //Inicializamos la instalacion

        $faqTableName = $installer->getConnection()->getTableName('faq');
//        $faqTableName = $installer->getTable('faq');  //Otra opcion para obtener el nombre de la tabla

        $faqTable = $installer->getConnection()
            ->newTable($faqTableName)
            ->addColumn(
                'faq_id',
                Table::TYPE_INTEGER,    // Importar Magento\Framework\DB\Ddl\Table
                null,
                [
                    'primary' => true,
                    'identity' => true, //Auto-incrementable
                    'unsigned' => true, //Solo positivos
                    'nullable' => false
                ],
                'Faq Id'
            )->addColumn(
                'question',
                Table::TYPE_TEXT,
                null,
                ['nullable' => false],
                'Question'
            )->addColumn(
                'answer',
                Table::TYPE_TEXT,
                null,
                ['nullable' => false],
                'Answer'
            )->addColumn(
                'tag',
                Table::TYPE_TEXT,
                '64',
                ['nullable' => false],
                'Tag'
            )->addColumn(
                'created_at',
                Table::TYPE_TIMESTAMP,
                null,
                ['default' => Table::TIMESTAMP_INIT],
                'Created At'
            )->addColumn(
                'update_at',
                Table::TYPE_TIMESTAMP,
                null,
                ['default' => Table::TIMESTAMP_INIT_UPDATE],
                'Update At'
            )->setComment('Faq Table');

        $installer->getConnection()->createTable($faqTable);

        $installer->endSetup();  //Finalizamod la instalacion
    }
}