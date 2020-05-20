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
        <title>Add Transactions | Project 2</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        <link href="animation/animate.css" rel="stylesheet">

        <style>
            .form{
                width: 65%;
                margin-top: 3%;
                margin-left: 18%;
                padding: 15px;
                border-radius: 8px;
                background-color: #f5f5f5;
                font-family: 'Open Sans';
            }

            .label{
                margin-left:3px;
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
                        <a class="nav-link active" href="add_transaction.php">Add Transaction <span class="sr-only">(current)</span></a>
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

        <div class = "container">
            <?php
                $cid = $_COOKIE['customerID'];
                $query = "SELECT SUM(amount) as total FROM CPS3740_2020S.Money_panchanb, CPS3740.Customers c where cid = '$cid' and c.name = (select name from Customers where id = '$cid')";
                $result = @mysqli_query($db, $query);
                $num = mysqli_num_rows($result);
                $row = mysqli_fetch_array($result);
                $total = $row['total'];
                
                if($num > 0 && !$total == ''){
                    echo "<h2 class = 'text-center animated fadeIn' style = 'margin-top: 3%;'><font color = blue> Total Balance: </font> <font color = green> $$total </font></h2>";
                }
                else{
                    echo "<h2 class = 'text-center animated fadeIn' style = 'margin-top: 3%;'><font color = blue> Total Balance: </font> <font color = red> Not available </font></h2>";
                }
            ?>

		
            <form class = "form animated fadeInUp" action="insert_transaction.php" method="post">
                <div class="form-group">
                <div class="login-heading">
                    <h3 class="text-center">Add Transaction</h3>
                    <hr>
                </div>
                    <label for="exampleInputEmail1" class = "label">Transaction code</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter transaction code.." name="tcode" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1" class = "label">Amount</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter amount.." name="amount" required>
                </div>

                <div class="form-check form-check-inline label">
                    <input class="form-check-input" type="radio" name="radio_btn" id="inlineRadio1" value="D">
                    <label class="form-check-label" for="inlineRadio1">Deposit</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="radio_btn" id="inlineRadio2" value="W">
                    <label class="form-check-label" for="inlineRadio2">Withdraw</label>
                </div>

                <div class="form-group">
                <label class="form-check-label label" style="margin-top: 10px; margin-bottom: 8px" for="inlineRadio1">Source</label>
                    <select class="form-control" name="sname">
                        <option>Select a Source..</option>
                        <?php
                            $query = "SELECT * FROM Sources";
                            $result = @mysqli_query($db, $query);

                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                echo '<option>' . $row['name'] . '</option>';
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1" class = "label">Note</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter a note to search later.." name="note" required>
                </div>

                <div class="text-center">
                <button type="submit" class="btn btn-success" style="margin-top: 10px;" name="submit">Submit</button>
                </div>
            </form>
        </div>



        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>