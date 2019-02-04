<?php
/**
 * Created by PhpStorm.
 * User: Adriano
 * Date: 2/3/2019
 * Time: 10:51 PM
 */

namespace M2Dev\ModelCollection\Controller\Test;


use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;

class Collection extends \Magento\Framework\App\Action\Action
{

    /**
     * @var \Magento\Sales\Model\ResourceModel\Order\CollectionFactory
     */
    private $orderCollectionFactory;
    /**
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
     */
    private $productCollectionFactory;

    public function __construct(
        Context $context,
        \Magento\Sales\Model\ResourceModel\Order\CollectionFactory $orderCollectionFactory,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory
    )
    {
        parent::__construct($context);
        $this->orderCollectionFactory = $orderCollectionFactory;
        $this->productCollectionFactory = $productCollectionFactory;
    }

    // URL: http://m23cevmw.local/model/test/collection
    public function execute()
    {
//        $this->getSimpleCollection();
        $this->getEavCollection();
    }

    protected function getSimpleCollection()
    {
        /** @var \Magento\Sales\Model\ResourceModel\Order\Collection $orderCollection */    //Capiar la referencia (eliminado el Factory)
        $orderCollection = $this->orderCollectionFactory->create();
//        $orderCollection->addFieldToSelect('*')   //Seleccionar todos los campos
//        $orderCollection->addFieldToSelect('state')   //Seleccionar por el campo state
        $orderCollection->addFieldToSelect(['state', 'increment_id'])
//            ->addFieldToFilter('state', 'closed')
            ->addFieldToFilter('entity_id', ['gt'=>0])
            ->setOrder('entity_id', 'DESC')
            ->setPageSize(10)
//            ->setCurPage(2)
        ;

        //Muestra la consulta SQL
//        echo $orderCollection->getSelect()->__toString();
        echo (string)$orderCollection->getSelect();

        var_dump($orderCollection->getData());  //Muestra los datos de la coleccion de ordenes
    }

    protected function getEavCollection()
    {
        /** @var \Magento\Catalog\Model\ResourceModel\Product\Collection $productCollection */  //Copiar la referencia (eliminando el Factory)
        $productCollection = $this->productCollectionFactory->create();
        $productCollection->addAttributeToSelect('*')
            ->addAttributeToFilter('price', ['gt' => 35])
            ->addOrder('price', 'DESC')
            ->setPageSize(10);

        var_dump($productCollection->count());  //Mostrar la cantidad de la coleccion de productos
//        die;
//        var_dump($productCollection->getData());  //Muestra la coleccion de productos (con poca informacion)

        foreach ($productCollection as $product) {
            var_dump($product->getData());  //Muestra la coleccion de productos (con informacion completa)
        }
    }
}