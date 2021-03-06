<!DOCTYPE html>
<html lang="en">
<head>
    <title>REPORTS</title>
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
                <li><a href="bills.php">BILLS</a></li>
                <li><a href="addCustomer.php">ADD CUSTOMER</a></li>
                <li class="active"><a href="#reports">REPORTS</a></li>
                <li><a href="exportCustomers.php">CSV</a></li>
            </ul>
        </div>
    </nav>

    <?php
        echo "<br>";
        echo "<br>";
        include('lib.php');
        echo "<br>";

        // Invoke populateCustomers method to display information in HTML Table
        echo populateCustomers();
    ?>

</body>
</html>