<?php
/**
 * Copyright © 2021 All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Falkone\ServerInfo\Model\Data;

use Falkone\ServerInfo\Api\Data\PhpInfoInterface;
use Magento\Framework\DataObject;

/**
 * DataObject for PhpInfo
 *
 * @package    Falkone\ServerInfo
 * @author     Falk Ulbricht <falk.ulbricht@falkone.de>
 * @link       https://www.falkone.dev/
 * @copyright  Copyright (c) 2023 Falk Ulbricht
 */
class PhpInfo extends DataObject implements PhpInfoInterface
{
    /**
     * @inheritDoc
     */
    public function getPhpinfoId(): ?int
    {
        return $this->getData(self::PHPINFO_ID);
    }

    /**
     * @inheritDoc
     */
    public function setPhpinfoId(int $phpinfoId): PhpInfoInterface
    {
        return $this->setData(self::PHPINFO_ID, $phpinfoId);
    }

    /**
     * @inheritDoc
     */
    public function getConfiguration(): ?string
    {
        return $this->getData(self::CONFIGURATION);
    }

    /**
     * @inheritDoc
     */
    public function setConfiguration(string $configuration): PhpInfoInterface
    {
        return $this->setData(self::CONFIGURATION, $configuration);
    }

    /**
     * @inheritDoc
     */
    public function getGlobal(): ?string
    {
        return $this->getData(self::GLOBAL);
    }

    /**
     * @inheritDoc
     */
    public function setGlobal(?string $global): PhpInfoInterface
    {
        return $this->setData(self::GLOBAL, $global);
    }

    /**
     * @inheritDoc
     */
    public function getLocal(): ?string
    {
        return $this->getData(self::LOCAL);
    }

    /**
     * @inheritDoc
     */
    public function setLocal(?string $local): PhpInfoInterface
    {
        return $this->setData(self::LOCAL, $local);
    }
}

