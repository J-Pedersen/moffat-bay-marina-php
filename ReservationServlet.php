<?php

require 'MarinaRepository.php'; // Include your MarinaRepository class
require 'MarinaService.php'; // Include your MarinaService class
require 'Service.php'; // Include your Service interface
require 'Slip.php'; // Include your Slip class

class ReservationServlet extends HttpServlet
{
    private $service;

    public function __construct()
    {
        parent::__construct();
        $this->service = new MarinaService(new MarinaRepository());
    }

    protected function doGet($request, $response)
    {
        $result = $this->service->findSlip((int)($request->getParameter("boatlength")));

        if ($result == null) {
            // No slip is available for the given boat length.
            $request->getSession()->setAttribute("isSlipAvailable", false);
            $request->getSession()->setAttribute("boatlength", $request->getParameter("boatlength"));
            $response->sendRedirect("waitlist-add.jsp");
        } else {
            // Slip is available for the given boat length.
            $request->getSession()->setAttribute("isSlipAvailable", true);
            $request->getSession()->setAttribute("slipNumber", $result->getSlipNumber());
            $request->getSession()->setAttribute("slipLength", $result->getSlipLength());
            $request->getSession()->setAttribute("boatLength", $request->getParameter("boatlength"));
            $request->getSession()->setAttribute("boatName", $request->getParameter("boatname"));
            $request->getSession()->setAttribute("startDate", $request->getParameter("startdate"));
            $response->sendRedirect("summary.jsp");
        }
    }

    protected function doPost($request, $response)
    {
        $slipNumber = $request->getSession()->getAttribute("slipNumber");
        $slipLength = (int)($request->getSession()->getAttribute("slipLength"));
        $boatName = $request->getSession()->getAttribute("boatName");
        $customerId = (int)($request->getSession()->getAttribute("customerId"));
        $startDate = $request->getSession()->getAttribute("startDate");
        $dateParser = new DateTime($startDate);

        $targetSlip = new Slip($slipNumber, $slipLength, true);

        try {
            $this->service->reserveSlip($targetSlip, $boatName, $customerId, new DateTime($dateParser->format('Y-m-d')));
            $request->getSession()->removeAttribute("isSlipAvailable");
            $request->getSession()->removeAttribute("slipNumber");
            $request->getSession()->removeAttribute("slipLength");
            $request->getSession()->removeAttribute("boatLength");
            $request->getSession()->removeAttribute("boatName");
            $request->getSession()->removeAttribute("startDate");
            $request->getServletContext()->getRequestDispatcher("/reservation.jsp")->forward($request, $response);
        } catch (Exception $e) {
            // Handle the exception appropriately
            $e->getMessage(); // You can log or handle the exception as needed.
        }
    }
}