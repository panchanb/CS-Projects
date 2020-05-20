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
		<title>DONE!! Update Transaction | Project 2</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
	</head>
	<body>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>

<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $b=0;
        
        for($i=0;$i<count($_POST["mid"]);$i++)  {

            // mid, notes, delete_check_button from display_update_transaction.php
            $note[$i] = $_POST["note"][$i];
            $delete_check[$i] = $_POST["delete_check"][$i];
            $mid[$i] = $_POST["mid"][$i];

            // This query gets the notes from the database table to compare with the updated notes..
            $cid = $_COOKIE['customerID'];
            $query = "select note from CPS3740_2020S.Money_panchanb, Customers c, Sources s  where sid = s.id and cid = '$cid' and c.name = (select name from Customers where id = '$cid') and mid='$mid[$i]'";
            $result = @mysqli_query($db, $query);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            // This query updates the notes..
            $query2 = "UPDATE CPS3740_2020S.Money_panchanb SET note = '$note[$i]' WHERE mid='$mid[$i]';";
            $result2 = @mysqli_query($db, $query2);         

            // This code prints out the notes when the original note is not equal to the updated note
            if($row[note] != $note[$i]){
                echo" <div class='container text-center'><h2>Successfully updated transaction code: </h2> <h3><font color = green>''$row[note]'' </font> has been updated to <font color = green>''$note[$i]'' </font></h3>";
                echo" <p>SQL Query: UPDATE CPS3740_2020S.Money_panchanb SET note = '$note[$i]' WHERE mid='$mid[$i]'</p></div> <hr> ";
                $b++;
            }

            // This code deletes the row where the delete_check_box is selected
            if(isset($delete_check[$i])){
                $query3 = "DELETE FROM CPS3740_2020S.Money_panchanb WHERE mid = '$mid[$i]'";
                $result3 = @mysqli_query($db, $query3);

                if($result3){
                    echo "<div class='container text-center'> <h2>Successfully deleted transaction code: </h2> <h3>Row with <font color=red>ID = $mid[$i]</font> has been deleted</h3>";
                    echo "<p>SQL Query: DELETE FROM CPS3740_2020S.Money_panchanb WHERE mid = '$mid[$i]' </p></div> <hr>";
                }
                else{
                    echo "<h3>NO rows deleted</h3>";
                }
            }  
        }
        // This code prints out the number of rows that are updated..
        echo "<div class='container text-center' style = 'margin-top: 4%'> <h3> <font color=red>$b rows</font> updated from database table</h3>";

        // This code counts the number for rows that are deleted..
        for($j=0; $j<count($_POST["delete_check"]); $j++){
        }
        echo "<div class='container text-center'> <h3> <font color=red>$j rows</font> deleted from database table</h3>";
    }
?>