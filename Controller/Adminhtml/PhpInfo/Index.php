<?php
/**
 * Copyright © 2021 All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Falkone\ServerInfo\Controller\Adminhtml\PhpInfo;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;

/**
 * Controller for admin server info page
 *
 * @package    Falkone\ServerInfo
 * @author     Falk Ulbricht <falk.ulbricht@falkone.de>
 * @link       https://www.falkone.dev/
 * @copyright  Copyright (c) 2023 Falk Ulbricht
 */
class Index extends Action
{
    /**
     * @param Context     $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context               $context,
        protected PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
    }

    /**
     * Index action
     *
     * @return ResultInterface
     */
    public function execute(): ResultInterface
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__("Server PHP Information"));
        return $resultPage;
    }
}
