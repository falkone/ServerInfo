<?php
/**
 * Copyright © 2021 All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Falkone\ServerInfo\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

/**
 * Interface for data object model
 *
 * @package    Falkone\ServerInfo
 * @author     Falk Ulbricht <falk.ulbricht@falkone.de>
 * @link       https://www.falkone.dev/
 * @copyright  Copyright (c) 2023 Falk Ulbricht
 */
interface PhpInfoInterface extends ExtensibleDataInterface
{
    public const PHPINFO_ID    = 'phpinfo_id';
    public const CONFIGURATION = 'configuration';
    public const LOCAL         = 'local';
    public const GLOBAL        = 'global';

    /**
     * Get phpinfo_id
     *
     * @return int|null
     */
    public function getPhpinfoId(): ?int;

    /**
     * Set phpinfo_id
     *
     * @param int $phpinfoId
     *
     * @return PhpInfoInterface
     */
    public function setPhpinfoId(int $phpinfoId): PhpInfoInterface;

    /**
     * Get configuration label
     *
     * @return string|null
     */
    public function getConfiguration(): ?string;

    /**
     * Set configuration label
     *
     * @param string $configuration
     *
     * @return PhpInfoInterface
     */
    public function setConfiguration(string $configuration): PhpInfoInterface;

    /**
     * Get global configuration value
     *
     * @return string|null
     */
    public function getGlobal(): ?string;

    /**
     * Set global
     *
     * @param string|null $global
     *
     * @return PhpInfoInterface
     */
    public function setGlobal(?string $global): PhpInfoInterface;

    /**
     * Get local configuration value
     *
     * @return string|null
     */
    public function getLocal(): ?string;

    /**
     * Set local configuration value
     *
     * @param string|null $local
     *
     * @return PhpInfoInterface
     */
    public function setLocal(?string $local): PhpInfoInterface;
}

