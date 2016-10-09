<?php

namespace Foggyline\Helpdesk\Model\ResourceModel\Ticket;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	/**
	 * Constructor
	 * Configures collection
	 *
	 * @return void
	 */
	 protected function _construct()
	 {
		 $this->__init('Foggyline\Helpdesk\Model\Ticket','Foggyline\Helpdesk\Model\ResourceModel\Ticket');
	 }
}