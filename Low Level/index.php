<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- Fontawesome CDN-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Low level</title>
  </head>
  <body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-8 m-auto">
      <form action="" method="post">
        <label for="search" class="form-label">Search</label>
        <input type="text" name="search" class="form-control">
        <button type="submit" class="btn btn-warning my-2 text-white" name="Submit"><i class="fas fa-search"></i> Search</button>
        </form>
      </div>
    </div>
  </div>

<div class="container">
  <div class="row">
    <div class="col-md-8 m-auto bg-secondary text-white rounded">
    <?php  
    if( isset( $_REQUEST[ 'Submit' ] ) ) {
      // Get input
      $id = $_REQUEST[ 'search' ];
  
      
      $conn = new mysqli("localhost","root","","sqlinjec");//datbase connection
      $query  = "SELECT firstName, lastName FROM users WHERE id = '$id';";
      // var_dump($query);
      $result = mysqli_query($conn,$query);
      // var_dump($result);
  
  
      // Get results
      while( $row = mysqli_fetch_assoc( $result ) ) {
          // Get values
          $first = $row["firstName"];
          $last  = $row["lastName"];
          $level = "low level";
  
          // Feedback for end user
      echo "<pre>ID: {$id}<br />First name: {$first}<br />Last Name: {$last}</pre>"; 
        
    }

    mysqli_close($conn);
    }
    ?>
    </div>
  </div>
    <div class="col-md-4 m-auto">
    <?php if(isset($level)){?>
      <h3>You are using <span class="text-danger"><?php echo $level;?> security.</span> </h3>
      <?php }?>
    </div>
</div>
  
  
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>


