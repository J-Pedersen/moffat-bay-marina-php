<?php

class Reservation
{
    private $reservationId;
    private $boatName;
    private $customerId;
    private $startDate;
    private $slipNumber;

    public function __construct($reservationId, $boatName, $customerId, $startDate, $slipNumber)
    {
        $this->reservationId = $reservationId;
        $this->boatName = $boatName;
        $this->customerId = $customerId;
        $this->startDate = $startDate;
        $this->slipNumber = $slipNumber;
    }

    public function getReservationId()
    {
        return $this->reservationId;
    }

    public function getBoatName()
    {
        return $this->boatName;
    }

    public function setBoatName($boatName)
    {
        $this->boatName = $boatName;
    }

    public function getCustomerId()
    {
        return $this->customerId;
    }

    public function getStartDate()
    {
        return $this->startDate;
    }

    public function getSlipNumber()
    {
        return $this->slipNumber;
    }
}