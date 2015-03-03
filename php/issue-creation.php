<?php
// function that selects everything in the table 'escalations' and prints it out into a table

    function issueCreation() {
        $query = mysql_query("SELECT * from escalations");

            echo "<table class='table'>
              <tr>
                <th>PMR Number</th>
                <th>Customer Number</th>
                <th>Analyst Name</th>
                <th>Date</th>
              </tr>";

            while($row = mysql_fetch_array($query))
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
             
        				
            echo "</tr>";
             }

            echo "</table>";
        
  }
?>