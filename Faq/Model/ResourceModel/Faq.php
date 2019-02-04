<?php
/**
 * Created by PhpStorm.
 * User: Adriano
 * Date: 2/4/2019
 * Time: 1:37 AM
 */

namespace M2Dev\Faq\Model\ResourceModel;


class Faq extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        //Informacion de la tabla + llave primaria
        $this->_init('faq', 'faq_id');
    }
}