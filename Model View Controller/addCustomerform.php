<?php
    $host = "localhost";
    $username = "tele_user";
    $password = "l0Wp345";
    $database = "telecom";


    $con =  new mysqli($host, $username, $password, $database);// Establishing Connection with database Server
        if (mysqli_connect_errno()) {
            echo "Failed to connect to PHPmyAdmin: " . mysqli_connect_error();
        }
        else{
            echo "Database Connected:";
        }

        function addCustomers($dbConnection, $name) {
            $query = "INSERT INTO customers(name) VALUES ('$name')";
            $dbConnection->query($query);
                
        }

         if($_POST) {
		    $name = $_POST['name'];
            $date = $_POST['date'];
            $plan = $_POST['plan'];
            $minutes = $_POST['minutes'];
            $data = $_POST['data'];
		    addCustomers($con, $name);
			addBills($con,$date,$plan,$minutes,$data);
            
	    }

        function addBills($dbConnection, $date, $plan, $minutes, $data) {
            $query = "INSERT INTO bills(customerID, date, plan, minutes, data) VALUES (LAST_INSERT_ID(), '$date', '$plan', '$minutes', '$data')";
            $dbConnection->query($query);
        }
?>   



