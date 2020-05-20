<!DOCTYPE html>
<html>
    <head>
        <title>Insert Transaction | Project 2 </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    </head>
    <body>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <body>
</html>

<?php

    require('MySQL_Connection.php');
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $tcode = $_POST['tcode'];
        $amount = $_POST['amount'];
        $type = $_POST['radio_btn'];
        $sname = $_POST['sname'];
        $note = $_POST['note'];

        $query = "SELECT id FROM Sources WHERE name = '$sname'";
        $result = @mysqli_query($db, $query);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        
        $sid = $row['id'];
        $cid = $_COOKIE['customerID'];

        $query2 = "SELECT SUM(amount) as total FROM CPS3740_2020S.Money_panchanb, CPS3740.Customers c where cid = '$cid' and c.name = (select name from Customers where id = '$cid')";
        $result2 = @mysqli_query($db, $query2);
        $num = mysqli_num_rows($result2);
        $row2 = mysqli_fetch_array($result2);
        $total = $row2['total'];

        if($amount <= 0){
            echo "<script>
            window.alert('$amount is not valid, Please try again..');
            window.location='add_transaction.php'; 
            </script>";
        }
        elseif(empty($sid)){
            echo "<script>
            window.alert('Please select a source and try again..');
            window.location='add_transaction.php'; 
            </script>";
        }
        elseif(empty($type)){
            echo "<script>
            window.alert('Please select Deposit or Withdraw and try again..');
            window.location='add_transaction.php'; 
            </script>";
        }
        elseif($amount > $total){
            if($type == W){
                echo "<script>
                window.alert('Your total balance is $total and you are trying to withdraw $amount');
                window.location='add_transaction.php'; 
                </script>";
            }
            elseif($type == D){
                $query4 = "INSERT INTO CPS3740_2020S.Money_panchanb (code, type, amount, mydatetime, note, cid, sid) VALUES ('$tcode', '$type', '$amount', NOW(), '$note', '$cid', '$sid');";
                $result4 = @mysqli_query($db, $query4);

                if($result4){
                    echo "<script>
                    window.alert('Transaction inserted successfully!');
                    window.location='add_transaction.php'; 
                    </script>";
                }
                else{
                    echo "<script>
                    window.alert('Something went wrong.. Please try again!!');
                    window.location='add_transaction.php'; 
                    </script>";
                }
            }
        }
        elseif($amount < total){
            if($type == W){
                $amount = -1 * $amount;

                $query = "INSERT INTO CPS3740_2020S.Money_panchanb (code, type, amount, mydatetime, note, cid, sid) VALUES ('$tcode', '$type', '$amount', NOW(), '$note', '$cid', '$sid');";
                $result = @mysqli_query($db, $query);

                if($result){
                    echo "<script>
                    window.alert('Transaction inserted successfully!');
                    window.location='add_transaction.php'; 
                    </script>";
                }
                else{
                    echo "<script>
                    window.alert('Something went wrong.. Please try again!!');
                    window.location='add_transaction.php'; 
                    </script>";
                }
            }
            elseif($type == D){
                $query4 = "INSERT INTO CPS3740_2020S.Money_panchanb (code, type, amount, mydatetime, note, cid, sid) VALUES ('$tcode', '$type', '$amount', NOW(), '$note', '$cid', '$sid');";
                $result4 = @mysqli_query($db, $query4);

                if($result4){
                    echo "<script>
                    window.alert('Transaction inserted successfully!');
                    window.location='add_transaction.php'; 
                    </script>";
                }
                else{
                    echo "<script>
                    window.alert('Something went wrong.. Please try again!!');
                    window.location='add_transaction.php'; 
                    </script>";
                }
            }
        }

        // if(empty($sid) || empty($type)){
        //     echo "<script>
        //     window.alert('Please fill out all the fields and try again..');
        //     window.location='add_transaction.php'; 
        //     </script>";
        // }
        // else{
        //     if($amount > 0){
        //         if($amount < $total){
        //             if($type == W){
        //                 $amount = -1 * $amount;
        //                 $query = "INSERT INTO CPS3740_2020S.Money_panchanb (code, type, amount, mydatetime, note, cid, sid) VALUES ('$tcode', '$type', '$amount', NOW(), '$note', '$cid', '$sid');";
        //                 $result = @mysqli_query($db, $query);

        //                 if($result){
        //                     echo "<script>
        //                     window.alert('Transaction inserted successfully!');
        //                     window.location='add_transaction.php'; 
        //                     </script>";
        //                 }
        //                 else{
        //                     echo "<script>
        //                     window.alert('Something went wrong.. Please try again!!');
        //                     window.location='add_transaction.php'; 
        //                     </script>";
        //                 }
        //             }
        //             else{
        //                 $query = "INSERT INTO CPS3740_2020S.Money_panchanb (code, type, amount, mydatetime, note, cid, sid) VALUES ('$tcode', '$type', '$amount', NOW(), '$note', '$cid', '$sid');";
        //                 $result = @mysqli_query($db, $query);

        //                 if($result){
        //                     echo "<script>
        //                     window.alert('Transaction inserted successfully!');
        //                     window.location='add_transaction.php'; 
        //                     </script>";
        //                 }
        //                 else{
        //                     echo "<script>
        //                     window.alert('Something went wrong.. Please try again!!');
        //                     window.location='add_transaction.php'; 
        //                     </script>";
        //                 }
        //             }
        //         }
        //         echo "<script>
        //         window.alert('Your total balance is $total and you are trying to withdraw $amount');
        //         window.location='add_transaction.php'; 
        //         </script>";
        //     }
        //     echo "<script>
        //     window.alert('$amount is not valid, Please try again..');
        //     window.location='add_transaction.php'; 
        //     </script>";
        // }

        // echo "$tcode, $amount, $note, $type, $sid, $cid";

    }
?>