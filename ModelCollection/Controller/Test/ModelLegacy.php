<?php

namespace M2Dev\ModelCollection\Controller\Test;

use Magento\Framework\App\Action\Context;

class ModelLegacy extends \Magento\Framework\App\Action\Action
{

    /**
     * @var \Magento\Cms\Model\BlockFactory
     */
    private $blockFactory;

    public function __construct(
        Context $context,
        \Magento\Cms\Model\BlockFactory $blockFactory
    )
    {
        parent::__construct($context);
        $this->blockFactory = $blockFactory;
    }


    // URL: http://m23cevmw.local/model/test/modellegacy
    public function execute()
    {
//        var_dump(__METHOD__); die;  //Verificamos que este leyendo el mettodo

        /*
         * Ejemplo de manejo de modelos antes de la varsion 2.2
         * donde el responsable de CRUD era el model en si.
         */
        /** @var \Magento\Cms\Model\Block $blockModel */
        $blockModel = $this->blockFactory->create();    //"->create()" es "new \Magento\Cms\Model\Block()"

        /**CRUD**/
        //READ
        $blockModel->load(2);
//        var_dump($blockModel->debug());   //debug() - convierte un objeto en arreglo
//        die;
        $id = $blockModel->getId(); //Obtener el id
        $title = $blockModel->getTitle();   //Obtener el titulo
        $creationTime = $blockModel->getCreationTime(); //Si el nombre tiene un guion bajo se elimina y se coloca el nombre en mayuscula
        var_dump($id);
        var_dump($title);
        var_dump($creationTime);

        //CREAR
        /** @var \Magento\Cms\Model\Block $customBlock */   //Copiar la referencia de la DI (eliminando el Factory)
        $customBlock = $this->blockFactory->create();
        $customBlock->setTitle("Custom Block")
            ->setIdentifier("custom_block")
            ->setContent("<h1>Hola</h1>")
            ->setIsActive(1);
//        $customBlock->save();   //Desactivado para el update

        //UPDATE
        /** @var \Magento\Cms\Model\Block $customBlock */
        $updateCustomBlock = $this->blockFactory->create();
        $updateCustomBlock->load('custom_block', 'identifier');   //Cargar el block por el valor y campo de la tabla de DB
        $updateCustomBlock->setTitle('Update Custom Block');
//        $updateCustomBlock->save();

        //DELETE
        /** @var \Magento\Cms\Model\Block $deleteCustomBlock */
        $deleteCustomBlock = $this->blockFactory->create();
        $deleteCustomBlock->load('custom_block', 'identifier');
//        $deleteCustomBlock->delete();
    }
}