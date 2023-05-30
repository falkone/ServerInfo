<?php
/**
 * Copyright © Falk Ulbricht 2023 All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Falkone\ServerInfo\Model\ResourceModel\PhpInfo\Grid;

use Falkone\ServerInfo\Model\ResourceModel\GetPhpInfos;
use Magento\Framework\Api\Search\SearchResultInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\App\ResourceConnection;
use Magento\Framework\Data\Collection as MageDataCollection;
use Magento\Framework\Data\Collection\EntityFactoryInterface;
use Magento\Framework\DB\Select;
use Magento\Framework\DB\SelectFactory;

/**
 * Custom Collection because PHP Settings is no Database Table
 *
 * @package    Falkone\ServerInfo
 * @author     Falk Ulbricht <falk.ulbricht@falkone.de>
 * @link       https://www.falkone.dev/
 * @copyright  Copyright (c) 2023 Falk Ulbricht
 */
class Collection extends MageDataCollection implements SearchResultInterface
{
    private int $totalCount = 0;

    private ?array $items = [];

    public function __construct(
        EntityFactoryInterface              $entityFactory,
        private readonly SelectFactory      $selectFactory,
        private readonly ResourceConnection $resourceConnection,
        private readonly GetPhpInfos $phpInfos
    ) {
        parent::__construct($entityFactory);
        $this->initCollection();
    }

    private function initCollection(): void
    {
        $items = $this->phpInfos->getItems();
        $this->setItems($items);
        $this->setTotalCount(count($items));
    }

    public function getTotalCount(): int
    {
        return $this->totalCount;
    }

    public function setTotalCount($totalCount): Collection|static
    {
        $this->totalCount = $totalCount;
        return $this;
    }

    /**
     * Fake getSelect to get a empty dummy query for UI Components
     *
     * @return Select
     */
    public function getSelect(): Select
    {
        // setup dummy connection
        return $this->selectFactory->create($this->resourceConnection->getConnection());
    }

    public function getItems(): array
    {
        return $this->items ?? [];
    }

    public function setItems(array $items = null): Collection|array|null
    {
        return $this->items = $items;
    }

    public function getAggregations(): array
    {
        return [];
    }

    public function setAggregations($aggregations): Collection|static
    {
        return $this;
    }

    public function getSearchCriteria()
    {
        return null;
    }

    public function setSearchCriteria(SearchCriteriaInterface $searchCriteria): Collection|static
    {
        return $this;
    }
}