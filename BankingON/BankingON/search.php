<?php
require('MySQL_Connection.php');

if(empty($_COOKIE['customerID'])){
    echo "<script>
    window.alert('You are not logged in ...');
    window.location='p2.html'; 
    </script>";
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Search | Project 2 </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        <link href="animation/animate.css" rel="stylesheet">

        <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;	
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }
        </style>
    </head>
    <body>

        <div>
            <!-- <a class="btn btn-danger logout-btn" href="logout.php">Logout</a> -->

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="add_transaction.php">Add Transaction <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="display_update_transcation.php">Update Transaction</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="logout.php">Logout</a>
                    </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0" action = "search.php" method = "GET">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search transactions.." aria-label="Search" name="keyword" required>
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <body>
</html>

<?php

    $keyword = $_GET['keyword'];
    $cid = $_COOKIE['customerID'];

    $query = "select mid, code, type, amount, mydatetime, note, s.name as source, c.name as name from CPS3740_2020S.Money_panchanb, Customers c, Sources s  where sid = s.id and cid = '$cid' and c.name = (select name from Customers where id = '$cid') and note like '%$keyword%'";
    $result = @mysqli_query($db, $query);
    $num = mysqli_num_rows($result);

    $result4 = @mysqli_query($db, $query);
    $rowname = mysqli_fetch_array($result4);
    $name = $rowname['name'];

    if($num > 0){
        echo '<div class = "container">';
        echo "<h3 class = 'text-center text-primary animated fadeIn' style = 'margin-top: 3%; margin-bottom: 3%;'>The transactions for <font color = green> $name </font> with records matching with keywords <font color = green> $keyword </font> are: </h3>";
        echo "<center><Table border =1></center>";
        echo '<table class="table table-hover animated fadeIn2" width = "90%">
        <thead class = "table-success">
        <tr>
            <th align = "left">mid</th>
            <th align = "left">code</th>
            <th align = "left">type</th>
            <th align = "left">amount</th>
            <th align = "left">mydatetime</th>
            <th align = "left">note</th>
            <th align = "left">source</th>
        </tr>
        </thead>
        <tbody> ';

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

            echo '<tr>
            <td align="center">' . $row['mid'] . ' </td>
            <td align="center">' . $row['code'] . ' </td>
            <td align="center">' . $row['type'] . ' </td>';
            // This checks the amount that is retrieved from the database
            // and if the amount is less then zero (negative) it will be shown in red color
            // other will be green color
            if($row['amount'] < 0){
                echo'<td align="center"><font color = red>' . $row['amount'] . ' </td></font>';
            }
            else{
                echo'<td align="center"><font color = green>' . $row['amount'] . ' </td></font>';
            }
            echo'
            <td align="center">' . $row['mydatetime'] . ' </td> 
            <td align="center">' . $row['note'] . ' </td>
            <td align="center">' . $row['source'] . ' </td>
            </tr>
            ';
        }

        echo '</tbody></table></div>';

        mysqli_free_result ($result);
    }

    elseif($keyword == '*'){
        
        $query2 = "select mid, code, type, amount, mydatetime, note, s.name as source, c.name as name from CPS3740_2020S.Money_panchanb, Customers c, Sources s  where sid = s.id and cid = '$cid' and c.name = (select name from Customers where id = '$cid')";
        $result2 = @mysqli_query($db, $query2);
        $num2 = mysqli_num_rows($result2);

        $result5 = @mysqli_query($db, $query2);
        $rowname2 = mysqli_fetch_array($result5);
        $name2 = $rowname2['name'];

        if($num2 > 0){
            echo '<div class = "container">';
            echo "<h3 class = 'text-center text-primary' style = 'margin-top: 3%; margin-bottom: 3%;'>The transactions for <font color = green> $name2 </font> with records matching with keywords <font color = green> $keyword </font> are: </h3>";
            echo "<center><Table border =1></center>";
            echo '<table class="table table-hover" width = "90%">
            <thead class = "table-success">
            <tr>
                <th align = "left">mid</th>
                <th align = "left">code</th>
                <th align = "left">type</th>
                <th align = "left">amount</th>
                <th align = "left">mydatetime</th>
                <th align = "left">note</th>
                <th align = "left">source</th>
            </tr>
            </thead>
            <tbody> ';
    
            while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
    
                echo '<tr>
                <td align="center">' . $row2['mid'] . ' </td>
                <td align="center">' . $row2['code'] . ' </td>
                <td align="center">' . $row2['type'] . ' </td>';
                // This checks the amount that is retrieved from the database
                // and if the amount is less then zero (negative) it will be shown in red color
                // other will be green color
                if($row2['amount'] < 0){
                    echo'<td align="center"><font color = red>' . $row2['amount'] . ' </td></font>';
                }
                else{
                    echo'<td align="center"><font color = green>' . $row2['amount'] . ' </td></font>';
                }
                echo'
                <td align="center">' . $row2['mydatetime'] . ' </td> 
                <td align="center">' . $row2['note'] . ' </td>
                <td align="center">' . $row2['source'] . ' </td>
                </tr>
                ';
            }
    
            echo '</tbody></table></div>';
    
            mysqli_free_result ($result2);
        }
        else { 
            $query6 = "Select c.name as name from Customers c, Sources s, CPS3740_2020S.Money_panchanb where cid = '$cid' and c.name = (select name from Customers where id = '$cid')";
            $result6 = @mysqli_query($db, $query6);
            $rowname = mysqli_fetch_array($result6);
    
            $name = $rowname['name'];
            // echo "<center><h1 class = 'text-center'><font color = red>No match for $keyword</font></h1></center>";
            echo "<h2 class = 'text-center text-primary' style = 'margin-top: 10%; margin-bottom: 3%;'><font color = red>No transactions found for <font color = green> $name </font> with records matching with keywords <font color = green> $keyword </font></font></h2>";
        }
    }

    else { 
        $query3 = "Select c.name as name from Customers c, Sources s, CPS3740_2020S.Money_panchanb where cid = '$cid' and c.name = (select name from Customers where id = '$cid')";
        $result3 = @mysqli_query($db, $query3);
        $rowname = mysqli_fetch_array($result3);

        $name = $rowname['name'];
        // echo "<center><h1 class = 'text-center'><font color = red>No match for $keyword</font></h1></center>";
        echo "<h2 class = 'text-center text-primary' style = 'margin-top: 10%; margin-bottom: 3%;'><font color = red>No transactions found for <font color = green> $name </font> with records matching with keywords <font color = green> $keyword </font></font></h2>";
    }



?>