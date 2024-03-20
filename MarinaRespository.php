<?php
    class MarinaRepository implements Repository {
        private $jdbcUrl = "jdbc:mysql://localhost:3306/moffat_bay";
        private $user = "root";
        private $password = "root";
        private $conn;

        public function __construct() {
            $this->conn = $this->getConnection();
        }

        private function getConnection() {
            $connection = new mysqli($this->jdbcUrl, $this->user, $this->password);
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }
            return $connection;
        }

        public function getOneUser($email) {
            $user = null;
            $query = "SELECT customers.customer_id, customers.password_hash, customers.first_name, customers.last_name, customers.phone_number, boats.boat_name, boats.boat_length, boats.boat_extra_details " .
                "FROM customers " .
                "LEFT JOIN boats ON customers.customer_id = boats.customer_id " .
                "WHERE customers.email_address = ?";

            $statement = $this->conn->prepare($query);
            $statement->bind_param("s", $email);
            $statement->execute();
            $result = $statement->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $id = $row["customer_id"];
                $password = $row["password_hash"];
                $firstName = $row["first_name"];
                $lastName = $row["last_name"];
                $phone = $row["phone_number"];
                $boatName = $row["boat_name"];
                $boatLength = $row["boat_length"];
                $boatDetails = $row["boat_extra_details"];

                $user = new User($id, $email, $password, $firstName, $lastName, $phone, $boatName, $boatLength, $boatDetails);
            }

            return $user;
        }

        public function getEmails() {
            $emails = array();
            $query = "SELECT email_address FROM customers";

            $result = $this->conn->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $emails[] = $row["email_address"];
                }
            }

            return $emails;
        }

        public function addUser($user) {
            $insertCustomerQuery = "INSERT INTO customers (email_address, password_hash, first_name, last_name, phone_number) VALUES (?, ?, ?, ?, ?)";
            $insertBoatQuery = "INSERT INTO boats (customer_id, boat_name, boat_length, boat_extra_details) VALUES (?, ?, ?, ?)";

            $insertCustomerStatement = $this->conn->prepare($insertCustomerQuery);
            $insertCustomerStatement->bind_param("sssss", $user->getEmail(), $user->getPassword(), $user->getFirstName(), $user->getLastName(), $user->getPhone());

            $insertBoatStatement = $this->conn->prepare($insertBoatQuery);

            $this->conn->begin_transaction();

            $rowsInserted = $insertCustomerStatement->execute();
            if ($rowsInserted) {
                $customerId = $this->conn->insert_id;
                $insertBoatStatement->bind_param("issd", $customerId, $user->getBoatName(), $user->getBoatLength(), $user->getDetails());
                $boatsInserted = $insertBoatStatement->execute();
                if ($boatsInserted) {
                    $this->conn->commit();
                    echo "User and boat information added successfully!";
                } else {
                    $this->conn->rollback();
                    echo "Failed to insert boat information.";
                }
            } else {
                $this->conn->rollback();
                echo "Failed to insert customer information.";
            }
        }

        public function getSlips() {
            $slips = array();
            $query = "SELECT * FROM slips";

            $result = $this->conn->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $slipNumber = $row["slip_number"];
                    $slipLength = $row["slip_length_in_feet"];
                    $slipOccupied = $row["slip_occupied"];
                    $slip = new Slip($slipNumber, $slipLength, $slipOccupied);
                    $slips[] = $slip;
                }
            }

            return $slips;
        }

        public function addReservation($reservation) {
            $insertReservationQuery = "INSERT INTO reservations (boat_name, customer_id, start_date, slip_number) VALUES (?, ?, ?, ?)";
            $updateSlipStatusQuery = "UPDATE slips SET slip_occupied = true WHERE slip_number = ?";

            $this->conn->begin_transaction();

            $insertReservationStatement = $this->conn->prepare($insertReservationQuery);
            $insertReservationStatement->bind_param("siss", $reservation->getBoatName(), $reservation->getCustomerId(), $reservation->getStartDate(), $reservation->getSlipNumber());

            $rowsInserted = $insertReservationStatement->execute();

            if ($rowsInserted) {
                $updateSlipStatusStatement = $this->conn->prepare($updateSlipStatusQuery);
                $updateSlipStatusStatement->bind_param("s", $reservation->getSlipNumber());
                $slipUpdated = $updateSlipStatusStatement->execute();

                if ($slipUpdated) {
                    $this->conn->commit();
                    echo "Reservation added successfully, and slip status updated!";
                } else {
                    $this->conn->rollback();
                    echo "Failed to update slip status.";
                }
            } else {
                $this->conn->rollback();
                echo "Failed to add reservation.";
            }
        }

        public function getReservation($email, $reservationId) {
            $reservation = null;
            $query = "SELECT * FROM reservations WHERE customer_id IN (SELECT customer_id FROM customers WHERE email_address = ?) AND reservation_id = ?";

            $statement = $this->conn->prepare($query);
            $statement->bind_param("si", $email, $reservationId);
            $statement->execute();
            $result = $statement->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $boatName = $row["boat_name"];
                $customerId = $row["customer_id"];
                $startDate = $row["start_date"];
                $slipNumber = $row["slip_number"];

                $reservation = new Reservation($reservationId, $boatName, $customerId, $startDate, $slipNumber);
            }

            return $reservation;
        }

        public function addWaitlist($waitlist) {
            $insertWaitlistQuery = "INSERT INTO slip_waitlist (slip_length_in_feet, customer_id) VALUES (?, ?)";

            $insertWaitlistStatement = $this->conn->prepare($insertWaitlistQuery);
            $insertWaitlistStatement->bind_param("ii", $waitlist->getSlipLength(), $waitlist->getCustomerId());

            $rowsInserted = $insertWaitlistStatement->execute();

            if ($rowsInserted) {
                echo "Customer added to waitlist successfully!";
            } else {
                echo "Failed to add customer to waitlist.";
            }
        }

        public function getWaitlist() {
            $waitlist = array();
            $query = "SELECT * FROM slip_waitlist";

            $result = $this->conn->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $waitlistId = $row["slip_waitlist_id"];
                    $slipLengthInFeet = $row["slip_length_in_feet"];
                    $customerId = $row["customer_id"];
                    $dateOfWaitlistEntry = $row["date_of_waitlist_entry"];

                    $entry = new Waitlist($waitlistId, $slipLengthInFeet, $customerId, $dateOfWaitlistEntry);
                    $waitlist[] = $entry;
                }
            }

            return $waitlist;
        }
    }
?>
