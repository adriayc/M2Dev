<?php
/**
 * Created by PhpStorm.
 * User: Adriano
 * Date: 2/3/2019
 * Time: 6:07 PM
 */

namespace M2Dev\FaqFrontendUi\Block;


class FaqList extends \Magento\Framework\View\Element\Template
{

    public function getFaqSampleList()
    {
        return [
            ['Magento 1', 'Magento 2'],
            ['Certified Solution Specialist', 'Magento Front End Developer Certification '],
            ['Magento Developer certification', 'Plus certification'],
        ];
    }
}