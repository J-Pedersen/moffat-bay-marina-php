<?php

require 'MarinaRepository.php'; // Include your MarinaRepository class
require 'MarinaService.php'; // Include your MarinaService class
require 'Service.php'; // Include your Service interface

class ReservationLookupServlet extends HttpServlet
{
    private $service;

    public function __construct()
    {
        parent::__construct();
        $this->service = new MarinaService(new MarinaRepository());
    }

    protected function doGet($request, $response)
    {
        $response->getWriter()->append("This action has not been implemented.");
    }

    protected function doPost($request, $response)
    {
        try {
            $email = $request->getParameter("email");
            $reservationId = (int)($request->getParameter("reservation-id"));
            $reservation = $this->service->checkReservation($email, $reservationId);

            if ($reservation == null) {
                // Reservation was not found.
                $response->sendError(404);
            } else {
                $request->getSession()->setAttribute("boatName", $reservation->getBoatName());
                $request->getSession()->setAttribute("startDate", $reservation->getStartDate());
                $request->getSession()->setAttribute("slipNumber", $reservation->getSlipNumber());
                $request->getServletContext()->getRequestDispatcher("/lookup.php")->forward($request, $response);
            }
        } catch (ClassNotFoundException $e) {
            $e->getMessage(); // You can log or handle the exception as needed.
            $response->sendError(500);
        }
    }
}