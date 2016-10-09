<?php

namespace Foggyline\Helpdesk\Block\Ticket;

class Index extends \Magento\Framework\View\Element\Template
{
	/**
	 * @var \Magento\Framework\Stdlib\DateTime
	 */
	 protected $dateTime;
	 
	 /**
	  * @var \Magento\Framework\Stdlib\Session
	  */
	 protected $customerSession;
	  
	  /**
	   * @var \Fogglyine\Helpdesk\Model\TicketFactory
	   */
	 protected $ticketFactory;
	 
	 /**
	  * @param \Magento\Framework\View\Element\Template\Context $context
	  * @param array $date
	  */
	  
	 public function __construct(
	     \Magento\Framework\View\Element\Template\Context $context,
		 \Magento\Framework\Stdlib\DateTime $dateTime,
		 \Magento\Customer\Model\Session $customerSession,
		 \Foggyline\Helpdesk\Model\TicketFactory $ticketFactory,
		 array $data[]
	 )
	 {
		 $this->dateTime = $dateTime;
		 $this->customerSession = $customerSession;
		 $this->ticketFactory = $ticketFactory;
		 parent::__construct($context, $data);
	 }
	  
	 /**
	  * @return \Foggyline\Helpdesk\Model\ResourceModel\Ticket\Collection
	  */
	  public function getTickets()
	  {
		  return $this->TicketFactory
		       ->create()
			   ->getCollection()
			   ->addFieldToFilter('customer_id', $this->customerSession->getCustomerId());
	  }
	  
	  public function getSeverities()
	  {
		  return \FoggyLine\Helpdesk\Model\Ticket::getSeveritiesOptionArray();
	  }
}