<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Starter Template</title>
     <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/jquery-ui.css"
    <?php include('connect.php'); ?>
    
    <style>
        body {
            padding-top: 50px;
        }
        .starter-template {
            padding: 40px 15px;
            text-align: center;
        }
    </style>
    
    	<script>
            $(function(){
            $( "#datepicker" ).datepicker();
            //Pass the user selected date format
            $( "#format" ).change(function() {
            $( "#datepicker" ).datepicker( "option", "dateFormat", $(this).val() );
            });
            });
        </script>

</head>
    
<?php
// query the database and get the count of issues logged,
$result = mysql_query("SELECT id FROM escalations");
$num_rows = mysql_num_rows($result);

// echo out how many results there are in the db
echo $num_rows;
?>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand pull-right" href="#" style="margin-bottom:15px;">
                <img src="ibm.png" alt="ibm logo" class="img-responsive" style="max-width:10%;" />
                </a>
                </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-8 header">
                <h1>PMR Escalations to L2</h1>
            </div>
            <!-- end of col-md-6 -->
            <div class="col-md-4 header">
                <h1>Issues Logged</h1>
                <h4 class="num-row"><?php echo $num_rows; ?></h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form class="form-inline" action="insert.php" method="post">
                    <div class="form-group input">
                        <input type="number" name="number" class="form-control" id="inputNumber" placeholder="PMR Number">
                    </div>
                    <div class="form-group input">
                        <input type="text" name="cust_name" class="form-control" id="inputCustName" placeholder="Customer Name">
                    </div>
                     <div class="form-group input">
                        <input type="text" name="anal_name" class="form-control" id="inputAnalName" placeholder="Analyst Name">
                    </div>
                     <div class="form-group input">
                        <input type="text" name="date" class="form-control" id="datepicker" placeholder="Date">
                    </div>
                    <button type="submit" class="btn btn-primary">submit</button>
                </form>

            </div>
            <!-- end of col md 12 -->
        </div>
        <!-- end of row div -->
        <div class="row">
            <div class="col-md-8">
            <?php
$query = mysql_query("SELECT * from escalations");
 
   echo "<table class='table'>
  <tr>
    <th>PMR Number</th>
    <th>Customer Number</th>
    <th>Analyst Name</th>
    <th>Date</th>
  </tr>";
  
  while($row =mysql_fetch_array($query))
  {
    $pmr = $row['pmr_number'];
    $cust = $row['customer_name'];
    $anal = $row['analyst_name'];
    $date = $row['date'];
      
  echo "<tr bgcolor='#CCCCCC'>";
  echo "<td>" . $pmr .'<br>' . "</td>";
  echo "<td>" . $cust .'<br>' . "</td>";
  echo "<td>" . $anal .'<br>' . "</td>";
  echo "<td>" . $date .'<br>' . "</td>";
  ?>
  <?php				
  echo "</tr>";
  }
 
echo "</table>";
?>

</table>
            
        </div>
        
            <div class ="col-md-4">
                <?php
                $query = mysql_query("SELECT analyst_name, COUNT(analyst_name) as issue_total FROM escalations GROUP BY analyst_name");
                        echo "<table class='table'>
                        <tr>
                            <th>Analyst</th>
                            <th>Issues Logged</th>
                        </tr>";
                while($row = mysql_fetch_array($query))
                     
                {
                    $analyst = $row['analyst_name'];
                    $issue = $row['issue_total'];
                    
                    echo "<td>" . $analyst . "</td>";
                    echo "<td>" . $issue . "</td>";
                    ?>
                <?php 
                echo "</tr>";
                }
                echo "</table>";
                
                ?>
            </div>
            
        </div>
    </div>
    <!-- end of container div -->
    
</body>

</html>
