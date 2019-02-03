<?php

namespace M2Dev\FaqFrontendUi\Controller\View;

class Index extends \Magento\Framework\App\Action\Action
{

    // URL: http://m23cevmw.local/faq/view/index
    // LAYOUT FILE: {routerId}_{controllerName}_{actionClass}.xml
    // LAYOUT FILE: faq_view_index.xml
    public function execute()
    {
        $resultType = \Magento\Framework\Controller\ResultFactory::TYPE_PAGE;

        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->resultFactory->create($resultType);
        $resultPage->getConfig()->getTitle()->set(__('FAQ'));

        return $resultPage;
    }
}