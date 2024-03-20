<?php

require 'MarinaRepository.php'; // Include your MarinaRepository class
require 'MarinaService.php'; // Include your MarinaService class
require 'Service.php'; // Include your Service interface
require 'User.php'; // Include your User class

class RegistrationServlet extends HttpServlet
{
    private $service;

    public function __construct()
    {
        parent::__construct();
        $this->service = new MarinaService(new MarinaRepository());
    }

    protected function doGet($request, $response)
    {
        // No implementation needed.
    }

    protected function doPost($request, $response)
    {
        if ($this->service->emailAlreadyExists($request->getParameter("email"))) {
            $response->sendError(409, "Resource already exists.");
        } else {
            $user = new User(
                0,
                $request->getParameter("email"),
                $request->getParameter("new-password"),
                $request->getParameter("first-name"),
                $request->getParameter("last-name"),
                $request->getParameter("phone-number"),
                $request->getParameter("boat-name"),
                (float)($request->getParameter("boat-length")),
                $request->getParameter("other-details")
            );

            $this->service->registerUser($user);
            $response->sendRedirect("login.php");
        }
    }
}