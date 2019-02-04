<?php
/**
 * Created by PhpStorm.
 * User: Adriano
 * Date: 2/4/2019
 * Time: 1:36 AM
 */

namespace M2Dev\Faq\Model;


class Faq extends \Magento\Framework\Model\AbstractModel
{

    protected function _construct()
    {
        //Referencia del ResourceModel
        $this->_init(\M2Dev\Faq\Model\ResourceModel\Faq::class);
    }
}