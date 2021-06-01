<?php

if( isset( $_REQUEST[ 'Submit' ] ) ) {
    // Get input
    $id = $_REQUEST[ 'search' ];

    // Check database
    // $conn = new PDO("mysql:host=localhost;dbname=sqlinjec","root","");
    // if($conn==true){
    //     echo "Connected";
    // }
    $conn = new mysqli("localhost","root","","sqlinjec");
    $query  = "SELECT firstName, lastName FROM users WHERE id = '$id';";
    // var_dump($query);
    $result = mysqli_query($conn,$query);
    // var_dump($result);


    // Get results
    while( $row = mysqli_fetch_assoc( $result ) ) {
        // Get values
        $first = $row["firstName"];
        $last  = $row["lastName"];

        // Feedback for end user
        echo "<pre>ID: {$id}<br />First name: {$first}<br />Last Name: {$last}</pre>";
    }

    mysqli_close($conn);
}
?>