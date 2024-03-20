<?php

// Interface for repository methods to query a database.
interface Repository {
    // Query for one user with a matching email.
    public function getOneUser($email);

    // Query for all emails for users.
    // This is used during registration to prevent a duplicate email.
    public function getEmails();

    public function addUser($user);

    public function getSlips();

    public function addReservation($reservation);

    public function getReservation($email, $reservationId);

    // Add a new record to the waitlist table.
    public function addWaitlist($waitlist);

    // Return all waitlist entries.
    public function getWaitlist();
}