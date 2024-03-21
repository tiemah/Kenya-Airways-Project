<?php 
    include "includes/dbconn.php";
    //The delete page
    if (isset($_POST['delete_flight'])) {
        $FlightId = $_POST['flight_id'];
        $query = "DELETE FROM Flights WHERE flight_id = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $query)) {
    
            header('Location: manage-flights.php?error=sqlerror');
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, 'i', $FlightId);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            //redirect back to the same page
            header('Location: manage-flights.php?delete=success');
            exit();
        }
    } 


    // Pagination variables
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$itemsPerPage = 5;
$startIndex = ($currentPage - 1) * $itemsPerPage;

// Query to fetch paginated flight data
$query = "SELECT * FROM Flights ORDER BY flight_id DESC LIMIT $startIndex, $itemsPerPage";
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $query);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Query to fetch total count of flights
$totalFlightsQuery = "SELECT COUNT(*) AS total FROM Flights";
$totalFlightsResult = mysqli_query($conn, $totalFlightsQuery);
$totalFlights = mysqli_fetch_assoc($totalFlightsResult)['total'];
$totalPages = ceil($totalFlights / $itemsPerPage);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Flight Management Page</title>
  	<link href="css/bootstrap.min.css" rel="stylesheet" >
	<link href="css/font-awesome.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="css/manageflights.css">
    <link rel="stylesheet" href="css/global.css">
	<link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Goblin+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- link to online CDN bootstrap -->
    
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
        <!-- link to online fonts -->
        <script src="https://kit.fontawesome.com/44f557ccce.js"></script>

   
</head>
<body>
<section id="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand col_1" href="admin.php"><span style="margin-bottom:10px;"><i class="fa fa-plane"></i></span> Kenya airways</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="admin.php">Home <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="add-flight.php">Add Flight</a>
                </li>
    
                <li class="nav-item">
                    <a class="nav-link" href="flight-list.php">List flight</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="manage-flights.php">Manage Flights</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="manage-passenger.php">Manage Passenger</a>
                </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    
                    <li class="nav-item">
                        <a class="nav-link" href="includes/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </section>
    <?php
    if(isset($_GET['error'])) {
        if($_GET['error'] === 'sqlerror') {
            echo "<script>alert('Error while deleting the record.');</script>";
        }
    } else if(isset($_GET['delete'])) {
        if($_GET['delete'] === 'success') {
            echo "<script>alert('The Record was deleted Successfully');</script>";
        }
    }
    ?>

    <section id="center" class="center_o">
        <div class="container">
        <div class="row center_o1 text-center text-captitalize">
        <div class="col-md-12">
            <h1 class="text-white">Flight List Management</h1>
        </div>
        </div>
        </div>
    </section>

    <main>
        <section style=" background-color:#bdc3c7;">
            <table class="table table-bordered table-striped table-hover">
                <thead class="text-dark text-center table-success" style="font-size: 16px; font-weight: 700;">
                    <tr>
                        <th scope="col" rowspan="2">Flight Id</th>
                        <th scope="col" rowspan="2">Flight Name</th>
                        <th scope="col" rowspan="2">From</th>
                        <th scope="col" rowspan="2">To</th>
                        <th scope="col" rowspan="2">Departure</th>
                        <th scope="col" colspan="3">Seats</th>
                        <th scope="col" colspan="3">Charges</th>
                        <th scope="col" rowspan="2">Action</th>
                    </tr>
                    <tr>
                        <th>Class A</th>
                        <th>Class B</th>
                        <th>Class C</th>
                        <th>Class A</th>
                        <th>Class B</th>
                        <th>Class C</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php 
                        $count = 1;
                        $sql = "SELECT * FROM flights ORDER BY flight_id ASC LIMIT $startIndex, $itemsPerPage";
                        $stmt = mysqli_stmt_init($conn);
                        mysqli_stmt_prepare($stmt, $sql);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr class='text-center'>
                            <td scope='row'>
                                <a href='pass_list.php?flight_id=".$row['flight_id']."'>
                                ".$row['flight_id']." </a> </td>
                            </td>
                            <td>".$row['flightname']. "</td>
                            <td>".$row['source']. "</td>
                            <td>".$row['destination']. "</td>
                            <td>".$row['departure']. "</td>
                            <td>".$row['Aseats']. "</td>
                            <td>".$row['Bseats']. "</td>
                            <td>".$row['Cseats']. "</td>
                            <td>".$row['Aprice']. "</td>
                            <td>".$row['Bprice']. "</td>
                            <td>".$row['Cprice']. "</td>
                            <td>
                            <form action='manage-flights.php' method='post'>
                                <input name='flight_id' type='hidden' value=".$row['flight_id'].">
                                <button class='btn' type='submit' name='delete_flight'>
                                <i class='text-danger fa fa-trash'></i>
                                </button>
                            </form>
                            </td>  
                            </tr>";
                            $count ++;
                        }
                    ?>
                </tbody>
            </table>
            <!-- Pagination links -->
            <nav aria-label="Flight pagination">
                        <ul class="pagination justify-content-center" style="margin-left: 50%;">
                            <?php if ($currentPage > 1) { ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?php echo $currentPage - 1; ?>" tabindex="-1" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                                <li class="page-item <?php echo $currentPage == $i ? 'active' : ''; ?>">
                                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php } ?>
                            <?php if ($currentPage < $totalPages) { ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?php echo $currentPage + 1; ?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </nav>
         </section>
    </main>

<!-- Footer -->
<section id="footer_bm">
 <div class="container">
  <div class="footer_2 row">
   <div class="col-md-8">
    <div class="footer_2l">
	  <p class="mb-0 col_3">© 2024 Kenya Airways. All Rights Reserved </p>
	</div>
   </div>
   <div class="col-md-4">
    <div class="footer_2r float-end">
	  <ul class="mb-0">
	  <li class="d-inline-block"><a class="text-light" href="#">Support</a></li>
      <li style="margin-left:10px; margin-right:10px;" class="d-inline-block"><a class="text-light" href="#">Terms Of Services </a></li>
	  <li class="d-inline-block"><a class="text-light" href="#">Privacy Policy</a></li>
	 </ul>
	</div>
   </div>
  </div>
 </div>
</section>
</body>
</html>