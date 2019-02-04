<?php
/**
 * Created by PhpStorm.
 * User: Adriano
 * Date: 2/4/2019
 * Time: 1:38 AM
 */

namespace M2Dev\Faq\Model\ResourceModel\Faq;


class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    protected function _construct()
    {
        //Referencia del Model + ResourceModel
        $this->_init(\M2Dev\Faq\Model\Faq::class, \M2Dev\Faq\Model\ResourceModel\Faq::class);
    }
}