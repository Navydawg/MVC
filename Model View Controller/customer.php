<?php

$host = "";
$username = "";
$password = "";
$database = "";

$con =  new mysqli($host, $username, $password, $database);// Establishing Connection with database Server
        if (mysqli_connect_errno()) {
            echo "Failed to connect to PHPmyAdmin: " . mysqli_connect_error();
        }
        else{
            echo "Database Connected:";
        }


class Customer {
    private $id = "";
    private $plan = "";
    private $total_minutes = 0;
    private $total_data = 0;

        function __construct($id, $plan, $totalMins, $totalD) {
            $this->id = $id;
            $this->plan = $plan;
            $this->total_minutes = $totalMins;
            $this->total_data = $totalD;
        } 

        function getcustomerID() {
            return $this->id;
        }
        function setcustomerID($id) {
            $this->id;
        }


        function getcustomerPlan(){
            return $this->plan;
        }
        function setcustomerPlan($plan){
            $this->plan = $plan;
        }
    

        function getTotalMinutes(){
            return $this->total_minutes;
        }
        function setTotalMinutes($totalMins){
            $this->total_minutes = $totalMins;
        }
    
    
        function getTotalData(){
            return $this->total_data;
        }
        function setTotalData($totalD){
            $this->total_data = $totalD;
        }
    
    }

?>