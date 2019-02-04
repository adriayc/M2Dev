<?php

namespace M2Dev\ModelCollection\Controller\Test;

use Magento\Framework\App\Action\Context;

class Model extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Cms\Model\BlockFactory
     */
    private $blockFactory;
    /**
     * @var \Magento\Cms\Model\ResourceModel\Block
     */
    private $blockResource;

    public function __construct(
        Context $context,
        \Magento\Cms\Model\BlockFactory $blockFactory,
        \Magento\Cms\Model\ResourceModel\Block $blockResource
    )
    {
        parent::__construct($context);
        $this->blockFactory = $blockFactory;
        $this->blockResource = $blockResource;
    }


    // URL: http://m23cevmmw.local/model/test/model
    public function execute()
    {
        /**CRUD**/
        //READ
        /** @var \Magento\Cms\Model\Block $blockModel */
        $blockModel = $this->blockFactory->create();
        $this->blockResource->load($blockModel, 5);
//        var_dump($blockModel->debug());  //debug() - Convierte un objeto en array
        $id = $blockModel->getId();
        $title = $blockModel->getTitle();
        $creationTime = $blockModel->getCreationTime();
        var_dump($id);
        var_dump($title);
        var_dump($creationTime);

        //CREATE
        /** @var \Magento\Cms\Model\Block $customBlock */
        $customBlock = $this->blockFactory->create();
        $customBlock->setTitle('Custom TWO')
            ->setIdentifier('custom_two')
            ->setContent("<h2>CUSTOM TWO</h2>")
            ->setIsActive(1);
//        $this->blockResource->save($customBlock);

        //UPDATE
        /** @var \Magento\Cms\Model\Block $updateCustomBlock */
        $updateCustomBlock = $this->blockFactory->create();
        $this->blockResource->load($updateCustomBlock, 'custom_two', 'identifier');
        $updateCustomBlock->setTitle("Update Custom TWO");
//        $this->blockResource->save($updateCustomBlock);

        //DELETE
        /** @var \Magento\Cms\Model\Block $deleteCustomBlock */
        $deleteCustomBlock = $this->blockFactory->create();
        $this->blockResource->load($deleteCustomBlock, 'custom_two', 'identifier');
//        $this->blockResource->delete($deleteCustomBlock);
    }
}