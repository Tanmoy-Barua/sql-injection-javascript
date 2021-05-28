<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Bar</title>
</head>
<body>
    <form action="" method="post">
    <label for="">Search</label>
    <input type="text" name="search">
    <input type="submit" name="submit">
    </form>
</body>
</html>

<?php
	$conn = new PDO("mysql:host=localhost;dbname=sqlinjec","root","");

	if(isset($_POST["submit"])){
        $str = $_POST["search"];
        $sth = $conn->prepare("SELECT * FROM `users` WHERE id='$str'");

        $sth->setFetchMode(PDO:: FETCH_OBJ);
        $sth-> execute();

        if($row = $sth->fetch()){
            ?>
            <br><br>
            <table>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th> 
                </tr>
                <tr>
                    <td><?php echo $row->firstName; ?></td>
                    <td><?php echo $row->lastName; ?></td>
                </tr>
            </table>
      <?php
        }
        else{
            echo "Name Does not exist";
        }


    }

?>