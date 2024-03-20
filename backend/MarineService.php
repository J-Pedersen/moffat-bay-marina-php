<?php

require 'vendor/autoload.php'; // Include the BCrypt library

use \Repository; // Make sure to use the appropriate namespace for your Repository class

class MarinaService implements Service
{
    private $repo;

    public function __construct(Repository $repo)
    {
        $this->repo = $repo;
    }

    public function getUser($email)
    {
        return $this->repo->getOneUser($email);
    }

    public function userIsAuthenticated($user, $givenPassword)
    {
        if (password_verify($givenPassword, $user->getPassword())) {
            return true;
        }
        return false;
    }

    public function emailAlreadyExists($email)
    {
        $emails = $this->repo->getEmails();
        return in_array($email, $emails);
    }

    public function registerUser($user)
    {
        $hash = password_hash($user->getPassword(), PASSWORD_BCRYPT, ['cost' => 12]);
        $user->setPassword($hash);
        $this->repo->addUser($user);
    }

    public function findSlip($boatLength)
    {
        $slips = $this->repo->getSlips();
        $availableSlip = null;

        foreach ($slips as $slip) {
            if ($slip->getSlipLength() >= $boatLength && !$slip->isSlipOccupied()) {
                $availableSlip = new Slip(
                    $slip->getSlipNumber(),
                    $slip->getSlipLength(),
                    $slip->isSlipOccupied()
                );
                break;
            }
        }

        return $availableSlip;
    }

    public function reserveSlip($targetSlip, $boatName, $customerId, $startDate)
    {
        $reservation = new Reservation(0, $boatName, $customerId, $startDate, $targetSlip->getSlipNumber());
        $this->repo->addReservation($reservation);
    }

    public function checkReservation($email, $reservationId)
    {
        return $this->repo->getReservation($email, $reservationId);
    }

    public function addToWaitlist($waitlist)
    {
        $this->repo->addWaitlist($waitlist);
    }

    public function getWaitlist()
    {
        $waitlistCollection = $this->repo->getWaitlist();

        $size26 = [];
        $size40 = [];
        $size50 = [];

        foreach ($waitlistCollection as $waitlist) {
            if ($waitlist->getSlipLength() == 26) {
                $size26[] = $waitlist;
            }
            if ($waitlist->getSlipLength() == 40) {
                $size40[] = $waitlist;
            }
            if ($waitlist->getSlipLength() == 50) {
                $size50[] = $waitlist;
            }
        }

        usort($size26, function ($a, $b) {
            return strtotime($a->getDate()) - strtotime($b->getDate());
        });

        usort($size40, function ($a, $b) {
            return strtotime($a->getDate()) - strtotime($b->getDate());
        });

        usort($size50, function ($a, $b) {
            return strtotime($a->getDate()) - strtotime($b->getDate());
        });

        $sortedCollection = [$size26, $size40, $size50];
        return $sortedCollection;
    }

    public function getCustomerId($email)
    {
        $user = $this->repo->getOneUser($email);
        return $user->getId();
    }

    public function checkReservation($email)
    {
        return null; // TODO: Implement this method
    }
}