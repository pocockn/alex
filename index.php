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
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <script src="js/datapicker.js"></script>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
   <!-- Include and require the PHP scripts used -->
    <?php include('php/connect.php'); ?>
    <?php require('php/issue-creation.php'); ?>
    <?php require('php/analyst-issues.php'); ?>
</head>
    
<?php
// query the database and get the count of issues logged,
$result = mysql_query("SELECT id FROM escalations");
$num_rows = mysql_num_rows($result);
?>

<body>

    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand pull-right" href="#" style="margin-bottom:15px;">
                <img src="ibm.png" alt="images/ibm logo" class="img-responsive" style="max-width:100px;" />
                </a>
                </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Add New Issue</h2>
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
            <!-- end of col-md-6 -->
            <div class="col-md-12 header">
                <h2>Total Issues Logged</h2>
                <h3 class="num-row"><?php echo $num_rows; ?></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
               <h2>PMR Escalations to L2</h2> 
               <?php issueCreation(); ?>
            </div>
              <div class ="col-md-4">
                <h2>Issues Per Analyst</h2>
                <?php issues_per_analyst(); ?>
            </div>
            
        </div>
    </div>
    <!-- end of container div -->
    
</body>

</html>
