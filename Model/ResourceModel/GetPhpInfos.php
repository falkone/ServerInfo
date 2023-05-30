<?php
/**
 * Copyright © 2021 All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Falkone\ServerInfo\Model\ResourceModel;

use Falkone\ServerInfo\Api\Data\PhpInfoInterface;
use Falkone\ServerInfo\Api\Data\PhpInfoInterfaceFactory;
use Magento\Framework\View\Element\UiComponent\DataProvider\Document;
use Magento\Framework\View\Element\UiComponent\DataProvider\DocumentFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\SimpleDataObjectConverter;

/**
 * Gets all PHP Infos as Document Data Objects
 *
 * @package    Falkone\ServerInfo
 * @author     Falk Ulbricht <falk.ulbricht@falkone.de>
 * @link       https://www.falkone.dev/
 * @copyright  Copyright (c) 2023 Falk Ulbricht
 */
class GetPhpInfos
{
    public function __construct(
        private readonly DataObjectHelper          $dataObjectHelper,
        private readonly SimpleDataObjectConverter $simpleDataObjectConverter,
        private readonly PhpInfoInterfaceFactory   $phpInfoInterfaceFactory,
        private readonly DocumentFactory           $documentFactory
    ) {
    }

    private array $items = [];

    /**
     * Get PhpInfo list.
     *
     * @return Document[]
     */
    public function getItems(): array
    {
        if (empty($this->items)) {
            $phpSettings = ini_get_all();
            $pseudoIdCounter   = 0;

            if (!$phpSettings) {
                return $this->items;
            }

            foreach (ini_get_all() as $key => $value) {
                $pseudoIdCounter++;

                $dataItem = $this->phpInfoInterfaceFactory->create();
                $this->dataObjectHelper->populateWithArray(
                    $dataItem,
                    [
                        PhpInfoInterface::PHPINFO_ID    => $pseudoIdCounter,
                        PhpInfoInterface::CONFIGURATION => $key,
                        PhpInfoInterface::GLOBAL        => $value['global_value'],
                        PhpInfoInterface::LOCAL         => $value['local_value'],
                    ],
                    PhpInfoInterface::class
                );

                /** @var Document $item */
                $item = $this->documentFactory->create();
                $item->addData(
                    $this->simpleDataObjectConverter->toFlatArray(
                        $dataItem,
                        PhpInfoInterface::class
                    )
                );

                $this->items[] = $item;
            };
        }
        return $this->items;
    }
}

