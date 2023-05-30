<?php
/**
 * Copyright © Falkone 2021 All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Falkone\ServerInfo\Block\Adminhtml\PhpInfo;

use Magento\Backend\Block\Template;

/**
 * @package    Falkone\ServerInfo
 * @author     Falk Ulbricht <falk.ulbricht@falkone.de>
 * @link       https://www.falkone.dev/
 * @copyright  Copyright (c) 2021 Falk Ulbricht
 */
class Index extends Template
{
    /**
     * @return string
     */
    public function getPhpServerInfo(): string
    {
        return php_uname();
    }

    /**
     * @return string
     */
    public function getPhpVersion(): string
    {
        return phpversion();
    }
}
