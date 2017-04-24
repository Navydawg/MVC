<?php
    $host = "";
    $username = "";
    $password = "";
    $database = "";

 function databaseConnect(){
    try{ 
        $con = new mysqli("localhost","tele_user","l0Wp345","telecom");
        if ($con->connect_errno > 0)
        	return null;
        return $con;
        echo "Database Connected";

    }catch(Exception $e){ } 
    return null;
}

    

include('customer.php');



function populateCustomers(){
    function find($arr, $val){
        for($j = 0; $j < count($arr); $j++){
            $id = $arr[$j]->getcustomerID();
            if($val == $id)
                return $j;
        }
        return -1;
    }

    $html = "";
    $customers = [];
    $i = 0;
    $planMins; 
    $planData;
    $mysqli = databaseConnect();
    $query = "SELECT * FROM `bills`";
    if($mysqli != null){
        $res = $mysqli->query($query);
        while ($res != null && $row = $res->fetch_array(MYSQLI_ASSOC)) {
            $pos = find($customers, $row["customerID"]);   
            if($pos == -1){
                $customer = new Customer($row["customerID"], $row["plan"], $row["minutes"], $row["data"]);
                $customers[] = $customer;
                $customerPlan = $customers[$i]->getcustomerPlan();
                $customerMins = $customers[$i]->getTotalMinutes();
                $customerData = $customers[$i]->getTotalData();
                
                if($customerPlan == "Standard Plan"){
                    $planMins = $customerMins * 1.30;
                    $planData = $customerData * 0.80;
                }
                elseif ($customerPlan == "Anytime Plan") {
                    $planMins = $customerMins * 1.00;
                    $planData = $customerData * 0.80;
                }
                
                else {
                    $planMins = $customerMins * 0.90;
                    $planData = $customerData * 0.50;
                }

                $customers[$i]->setTotalMinutes($planMins);
                $customers[$i]->setTotalData($planData);
                $i++;
            }
            else{
                $customerPlan = $row["plan"];
                $customerMins = $row["minutes"];
                $customerData = $row["data"];
                
                if($customerPlan == "Standard_Plan"){
                    $planMins = $customers[$pos]->getTotalMinutes() + ($customerMins * 1.30);
                    $planData = $customers[$pos]->getTotalData() + ($customerData * 0.80);
                }
                elseif ($customerPlan == "Anytime_Plan") {
                    $planMins = $customers[$pos]->getTotalMinutes() + ($customerMins * 1.00);
                    $planData = $customers[$pos]->getTotalData() + ($customerData * 0.80);
                }
                else {
                    $planMins = $customers[$pos]->getTotalMinutes() + ($customerMins * 0.90);
                    $planData = $customers[$pos]->getTotalData() + ($customerData * 0.50);
                }
                $customers[$pos]->setPlan($customerPlan);
                $customers[$pos]->setTotalMinutes($planMins);
                $customers[$pos]->setTotalData($planData);
            }
            
        }
    }

        $res->close();
        $mysqli->close();

       

           $html = "<table border = 2><h1><strong>Bills Information</strong></h1><thead><tr><th>CustomerID</th><th>Plan</th><th>Total Minutes</th><th>Total Data</th></tr></thead><tbody>";
          for($i = 0; $i < count($customers); $i++){
              $html .= "<tr>
                          <td>" . $customers[$i]->getcustomerID() . "</td>
                          <td>" . $customers[$i]->getcustomerPlan() . "</td>
                          <td>" . $customers[$i]->getTotalMinutes() . "</td>
                          <td>" . $customers[$i]->getTotalData() . "</td>
                      </tr>";

                     
          }
          $html .= "</tbody></table>";
     
      return $html;   
}

?> 