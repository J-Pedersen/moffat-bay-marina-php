<?php

class User
{
    private $id;
    private $email;
    private $password; // You'll need to salt and hash the password in your PHP code
    private $firstName;
    private $lastName;
    private $phone;
    private $boatName;
    private $boatLength;
    private $details;

    public function __construct(
        $id,
        $email,
        $password,
        $firstName,
        $lastName,
        $phone,
        $boatName,
        $boatLength,
        $details
    ) {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->phone = $phone;
        $this->boatName = $boatName;
        $this->boatLength = $boatLength;
        $this->details = $details;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getBoatName()
    {
        return $this->boatName;
    }

    public function setBoatName($boatName)
    {
        $this->boatName = $boatName;
    }

    public function getBoatLength()
    {
        return $this->boatLength;
    }

    public function setBoatLength($boatLength)
    {
        $this->boatLength = $boatLength;
    }

    public function getDetails()
    {
        return $this->details;
    }

    public function setDetails($details)
    {
        $this->details = $details;
    }
}