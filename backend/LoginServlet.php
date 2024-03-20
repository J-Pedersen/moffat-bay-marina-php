<?php

require 'MarinaRepository.php'; // Include your MarinaRepository class
require 'MarinaService.php'; // Include your MarinaService class
require 'Service.php'; // Include your Service interface
require 'User.php'; // Include your User class

class LoginServlet extends HttpServlet
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
        // Authenticate user.
        try {
            $user = $this->service->getUser($request->getParameter("email"));
            if ($user != null && $this->service->userIsAuthenticated($user, $request->getParameter("password"))) {
                // Add the user object to the current session and redirect to the reservation page.
                $session = $request->getSession();
                $session->setAttribute("user", $user);
                $session->setAttribute("customerId", $user->getId());
                $request->getSession()->setAttribute("isSlipAvailable", true);
                $request->getSession()->setAttribute("waitlist1", "N/A");
                $request->getSession()->setAttribute("waitlist2", "N/A");
                $request->getSession()->setAttribute("waitlist3", "N/A");
                $response->sendRedirect("reserve.php");
            } else {
                $response->sendError(404, "User not found.");
            }
        } catch (ClassNotFoundException $e) {
            $e->getMessage(); // You can log or handle the exception as needed.
            $response->sendError(500);
        }
    }
}