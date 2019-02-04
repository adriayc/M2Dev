<?php
/**
 * Created by PhpStorm.
 * User: Adriano
 * Date: 2/3/2019
 * Time: 6:07 PM
 */

namespace M2Dev\FaqFrontendUi\Block;


use Magento\Framework\View\Element\Template;

class FaqList extends \Magento\Framework\View\Element\Template
{

    /**
     * @var \M2Dev\Faq\Model\ResourceModel\Faq\CollectionFactory
     */
    private $faqCollectionFactory;

    public function __construct(
        Template\Context $context,
        array $data = [],
        //Inyectamos la clase Collection.php del Modulo Faq
        \M2Dev\Faq\Model\ResourceModel\Faq\CollectionFactory $faqCollectionFactory
    )
    {
        parent::__construct($context, $data);
        $this->faqCollectionFactory = $faqCollectionFactory;
    }

    public function getFaqSampleList()
    {
//        return [
//            ['Magento 1', 'Magento 2'],
//            ['Certified Solution Specialist', 'Magento Front End Developer Certification '],
//            ['Magento Developer certification', 'Plus certification'],
//        ];

        return $this->faqCollectionFactory->create();   //Retornamos los datos del objeto
    }
}