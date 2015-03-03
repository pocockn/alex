<?php
function issues_per_analyst() {
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

                echo "</tr>";
            }
       echo "</table>";
}
?>