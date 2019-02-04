<?php

namespace M2Dev\Repo\Controller\Test;

use Magento\Framework\App\Action\Context;

class BlockApiList extends \Magento\Framework\App\Action\Action
{

    /**
     * @var \Magento\Cms\Api\BlockRepositoryInterface
     */
    private $blockRepository;
    /**
     * @var \Magento\Framework\Api\SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;
    /**
     * @var \Magento\Framework\Api\FilterBuilder
     */
    private $filterBuilder;
    /**
     * @var \Magento\Framework\Api\SortOrderBuilder
     */
    private $sortOrderBuilder;

    public function __construct(
        Context $context,
        \Magento\Cms\Api\BlockRepositoryInterface $blockRepository,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        \Magento\Framework\Api\FilterBuilder $filterBuilder,
        \Magento\Framework\Api\SortOrderBuilder $sortOrderBuilder
    )
    {
        parent::__construct($context);
        $this->blockRepository = $blockRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->filterBuilder = $filterBuilder;
        $this->sortOrderBuilder = $sortOrderBuilder;
    }

    // http://m23cevmw.local/repo/test/bockapilist
    public function execute()
    {
        $filterId = $this->filterBuilder
            ->setField('identifier')
            ->setValue('%menu%')
            ->setConditionType('like')
            ->create();

        $orderId = $this->sortOrderBuilder
            ->setField('block_id')
            ->setDescendingDirection()
            ->create();

        $searchCriteria = $this->searchCriteriaBuilder
            ->addFilter('identifier', '%menu%', 'like')
            ->addFilters([$filterId])
            ->addSortOrder($orderId)
            ->setPageSize(5)
            ->setCurrentPage(1)
            ->create();

        $blockList = $this->blockRepository->getList($searchCriteria);

        var_dump($blockList->getTotalCount());

        foreach ($blockList->getItems() as $block) {
            $id = $block->getId();
            $identifier = $block->getIdentifier();
            var_dump("{$id} - {$identifier}");
        }
    }
}