<?php

class Waitlist implements Comparable
{
    private $waitlistId;
    private $slipLength;
    private $customerId;
    private $entryDate;

    public function __construct($waitlistId, $slipLength, $customerId, $entryDate)
    {
        $this->waitlistId = $waitlistId;
        $this->slipLength = $slipLength;
        $this->customerId = $customerId;
        $this->entryDate = $entryDate;
    }

    public function getWaitlistId()
    {
        return $this->waitlistId;
    }

    public function getSlipLength()
    {
        return $this->slipLength;
    }

    public function setSlipLength($slipLength)
    {
        $this->slipLength = $slipLength;
    }

    public function getCustomerId()
    {
        return $this->customerId;
    }

    public function getEntryDate()
    {
        return $this->entryDate;
    }

    public function setEntryDate($entryDate)
    {
        $this->entryDate = $entryDate;
    }

    public function compareTo($waitlist)
    {
        return $this->getEntryDate()->format('U') - $waitlist->getEntryDate()->format('U');
    }
}