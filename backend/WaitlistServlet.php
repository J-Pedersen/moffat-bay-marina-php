<?php

require 'MarinaRepository.php'; // Include your MarinaRepository class
require 'MarinaService.php'; // Include your MarinaService class
require 'Service.php'; // Include your Service interface
require 'Waitlist.php'; // Include your Waitlist class

class WaitlistServlet extends HttpServlet
{
    private $service;

    public function __construct()
    {
        parent::__construct();
        $this->service = new MarinaService(new MarinaRepository());
    }

    protected function doGet($request, $response)
    {
        // Retrieve the waitlist as a multi-dimensional array list.
        $sortedWaitlist = $this->service->getWaitlist();
        $customerId = 0;

        // Retrieve the customer ID for the supplied email.
        $email = $request->getParameter("email");
        try {
            $customerId = $this->service->getCustomerId($email);
        } catch (ClassNotFoundException $e) {
            // Handle the exception appropriately
            $e->getMessage(); // You can log or handle the exception as needed.
        }

        // Begin waitlist analysis.
        // Iterate through the parent list.
        for ($outerCounter = 0; $outerCounter < count($sortedWaitlist); ++$outerCounter) {
            // Create a StringBuilder for the current child list in the parent list.
            $builder = new StringBuilder();
            $waitlistCounter = 0;

            // Iterate through each child list in the parent list.
            for ($innerCounter = 0; $innerCounter < count($sortedWaitlist[$outerCounter]); ++$innerCounter) {
                // Increment the running total for the number of entries in the current child list.
                ++$waitlistCounter;

                // Check if the user's customer ID is present in the child list.
                if ($sortedWaitlist[$outerCounter][$innerCounter]->getCustomerId() == $customerId) {
                    // Set a session attribute to define the querying customer's position in the list.
                    // Attribute names and values are determined by the position of the element in the array list.
                    // For example, when the customer is in the first position (element 0) in the first child list (element 0), the values are "waitlist-1" and "position-1".
                    $position = $innerCounter + 1;
                    $builder->append("There is/are " . ($position - 1) . " request(s) ahead of you in this waitlist.\r\n");
                    $request->getSession()->setAttribute("waitlist" . ($outerCounter + 1), $builder);
                }
            }
            $builder->append("There is/are " . $waitlistCounter . " request(s) in this waitlist.\r\n");
            $request->getSession()->setAttribute("waitlist" . ($outerCounter + 1), $builder);
        }

        $request->getServletContext()->getRequestDispatcher("/waitlist.jsp")->forward($request, $response);
    }

    protected function doPost($request, $response)
    {
        // Determine the required slip size to waitlist for.
        $boatLength = (int)($request->getSession()->getAttribute("boatlength"));
        $slipSize = 0;

        // Constants for the Marina's three slip sizes.
        const SLIP_SIZE_ONE = 26;
        const SLIP_SIZE_TWO = 40;
        const SLIP_SIZE_THREE = 50;

        if ($boatLength <= SLIP_SIZE_ONE) {
            $slipSize = SLIP_SIZE_ONE;
        } else if ($boatLength <= SLIP_SIZE_TWO) {
            $slipSize = SLIP_SIZE_TWO;
        } else if ($boatLength <= SLIP_SIZE_THREE) {
            $slipSize = SLIP_SIZE_THREE;
        } else {
            // Boat length was an invalid value.
            $response->sendError(400);
        }

        // Add the user to the waitlist.
        $customerId = (int)($request->getSession()->getAttribute("customerId"));
        $waitlist = new Waitlist(0, $slipSize, $customerId, new DateTime());
        $this->service->addToWaitlist($waitlist);
        $response->setStatus(200);
        $response->sendRedirect("waitlist.jsp");
    }
}