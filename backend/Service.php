<?php

// Interface for service classes to perform business logic.
interface Service
{
    // Get one user from the repository.
    public function getUser($email);

    // Authenticate a user. 
    // Must return true when the user successfully authenticates.
    public function userIsAuthenticated($user, $givenPassword);

    public function emailAlreadyExists($email);

    public function registerUser($user);

    // Searches for an available slip based on slip size.
    public function findSlip($boatLength);

    // Reserves a slip previously determined to be available.
    public function reserveSlip($targetSlip, $boatName, $customerId, $startDate);

    // Used to obtain the reservation ID for a newly added reservation.
    public function checkReservation($email);

    public function checkReservationById($email, $reservationId);

    public function addToWaitlist($waitlist);

    // Returns a multi-dimensional array list
    public function getWaitlist();

    // Return the customerId based on the provided email.
    public function getCustomerId($email);
}