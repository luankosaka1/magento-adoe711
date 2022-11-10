<?php

namespace Demo\CustomAcl\Controller\Adminhtml\Delete;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action;

/**
 * Class Index
 * @package Demo\CustomAcl\Controller\Adminhtml\Delete\Index
 */
class Index extends Action
{
    const ADMIN_RESOURCE = 'Demo_CustomAcl::delete';

    /**
     * Index resultPageFactory
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * Index constructor.
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(Context $context, PageFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
        return parent::__construct($context);
    }

    /**
     * Function execute
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        return $this->resultPageFactory->create();
    }
}
