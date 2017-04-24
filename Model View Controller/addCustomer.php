<!DOCTYPE html>
<html lang="en">
<head>
    <title>ADD CUSTOMERr</title>
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
            <li class="active"><a href="#addCustomer">ADD CUSTOMER</a></li>
            <li><a href="reports.php">REPORTS</a></li>
            <li><a href="exportCustomers.php">CSV</a></li>
    </ul>
  </div>
</nav>
 <h1>ADD CUSTOMER</h1>
    <br>
        <form action="addCustomerForm.php" method="POST" onSubmit="validateForm()">
            <div class="form-group">
                <label><strong>Name</strong></label>
                    <input type="text" name="name"/>
            </div>
            <br>
            <br>
            <div class="form-group">
                <label><strong>Date</strong></label>
                    <input type="date" value="date" name="date"/>
            </div>
            <br>
            <br>
            <div class="form-group">
                <label><strong>Plan</strong></label>
                    <input type="text" name="plan"/>
            </div>
            <br>
            <br>
            <div class="form-group">
                <label><strong>Minutes</strong></label>
                    <input type= "number" value="number" name="minutes"/>
            </div>
            <br>
            <br>
            <div class="form-group">
                <label><strong>Data</strong></label>
                    <input type="number" value="number" name="data"/>
            </div>
            <br>
            <br>
            <div class="form-group">
                <input type="submit" id="sub" value="Submit" name="Submit"/>
            </div>
        </form>

        <script type="text/javascript">
		    // javascript to check that values entered for both fields
		    function validateForm() {
                var name = document.forms[0]["name"].value;
                var date = document.forms[0]["date"].value;
                var plan = document.forms[0]["plan"].value;
                var minutes = document.forms[0]["minutes"].value;
                var data = document.forms[0]["data"].value;
		        if (name == "" || date == "" || plan == "" || minutes == "" || data == "") {
		            alert("All fields must be filled out");
                    
		            return false;
		        }
			    return true;
		}
	    </script>
    </body>
</html>
