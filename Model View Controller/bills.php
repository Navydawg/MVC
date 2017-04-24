<!DOCTYPE html>
<html lang="en">
<head>
    <title>BILLS</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="bills.css">
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
            <li><a href="index.php">HOME</a></li>      
            <li class="active"><a href="#bills">BILLS</a></li>
            <li><a href="addCustomer.php">ADD CUSTOMER</a></li>
            <li><a href="reports.php">REPORTS</a></li>
            <li><a href="exportCustomers.php">CSV</a></li>
    </ul>
  </div>
</nav>
<h1> BILLS </h1>
        <table class="table", border="2">
            <thead>
                <tr>
                    <th>Customer Name</th><th>Date</th><th>Plan</th><th>Minutes</th><th>Data</th>
                </tr>
            </thead>
        <tbody>

        <?php 

            $con = new mysqli("localhost", "tele_user", "l0Wp345", "telecom");
                echo "PHPmyAdmin Database : ";

                if (mysqli_connect_errno()) {
                    echo "Failed to connect to PHPmyAdmin: " . mysqli_connect_error();
                }
                else{
                    echo "Connected";
                    echo "<br><br>";
                }
                //$res= $conn-> query("SELECT * FROM bills ");
                $res= $con-> query("SELECT customers.name,bills.date,bills.plan,bills.minutes,bills.data FROM bills INNER JOIN customers WHERE bills.customerID=customers.id");
                //$res= $conn-> query("SELECT * FROM customers where name='$name'");

                //echo(print_r($res->fetch_assoc()));
                //$res = $conn->query($sql);
                if($res->num_rows > 0){
                    while ($row =$res->fetch_array(MYSQLI_ASSOC)) {
                        echo "<tr>";
                        echo "<td>". $row['name'] ."</td>";
                        echo "<td>". $row['date'] ."</td>";
                        echo "<td>". $row['plan'] ."</td>";
                        echo "<td>". $row['minutes'] ."</td>";
                        echo "<td>". $row['data'] ."</td>";
                        echo "</tr>";
                    }
                }
                else{
                    echo "No results";
                }     
            $con->close();
        ?>

        </tbody>
    </table>
</body>
</html>





