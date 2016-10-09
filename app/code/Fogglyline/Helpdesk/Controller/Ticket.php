<?php

namespace Foggyline\Helpdesk\Controller;

abstract class Ticket extends \Magento\Framework\App\Action\Action\
{
	protected $customerSession;
	
	public function __construct(
	    \Magento\Framework\App\Action\Context $context,
		\Magento\Customer\Model\Session $customerSession
	)
	{
		$this->customerSession = $customerSession;
		parent::__construct($context);
	}
	
	public function dispatch(\Magento\Framework\App\RequestInterface $request)
	{
		if ( !$this->customerSession->authenticate()) {
			$this->_actioFlag->set('', 'no-dispatch', true);
			if(!$this->customerSession)->getBeforeUrl()) {
				$this->customerSession->setBeforeUrl($this->_redirect->getRefererUrl());
			}
		}
		return parent::dispatch($request);
	}
}