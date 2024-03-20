<?php

class Slip
{
    private $slipNumber;
    private $slipLength;
    private $isSlipOccupied;

    public function __construct($slipNumber, $slipLength, $isSlipOccupied)
    {
        $this->slipNumber = $slipNumber;
        $this->slipLength = $slipLength;
        $this->isSlipOccupied = $isSlipOccupied;
    }

    public function getSlipNumber()
    {
        return $this->slipNumber;
    }

    public function setSlipNumber($slipNumber)
    {
        $this->slipNumber = $slipNumber;
    }

    public function getSlipLength()
    {
        return $this->slipLength;
    }

    public function setSlipLength($slipLength)
    {
        $this->slipLength = $slipLength;
    }

    public function isSlipOccupied()
    {
        return $this->isSlipOccupied;
    }

    public function setSlipStatus($isSlipOccupied)
    {
        $this->isSlipOccupied = $isSlipOccupied;
    }
}