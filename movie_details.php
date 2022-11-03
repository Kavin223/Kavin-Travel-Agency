  <?php
session_start();

        include_once 'Database.php';
        $id = $_GET['pass'];
        $result = mysqli_query($conn,"SELECT * FROM add_movie WHERE id = '".$id."'");
        $row = mysqli_fetch_array($result);
        ?>

<!DOCTYPE html>
<html>
<head>

	    <!-- Css Styles -->
          <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $row['movie_name'];?> Movie Deatis</title>



    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="  text/css">
    <link rel="stylesheet" href="css/fonts-googleapis.css" type="  text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">   
    
</head>
<body>
<?php
include("header.php");
?>

<section id="aboutUs">
  <div class="container">
<?php
        include_once 'Database.php';
        $id = $_GET['pass'];
        $result = mysqli_query($conn,"SELECT * FROM add_movie WHERE id = '".$id."'");
        
        
        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
        ?>
    <div class="row feature design">
        <div class="col-lg-5"> <img src="admin/image/<?php echo $row['image']; ?>" class="resize-detail" alt="" width="100%"> </div>
      <div class="col-lg-7">
        
        <table class="content-table">
          <thead><tr>
            <th colspan="2">BUS Deatils</th>
          </tr>
        </thead>
       
          <tbody>
          <tr>
            <td>Name</td><td><?php echo $row['movie_name'];?></td>
          </tr>
          <tr>
            <td>Travelling Date</td><td><?php echo $row['release_date'];?></td>
          </tr>
          <tr>
            <td>Travels Name</td><td><?php echo $row['directer'];?></td>
          </tr>
          <tr>
            <td>City</td><td><?php echo $row['categroy'];?></td>
          </tr>
          <tr>
            <td>type</td><td><?php echo $row['language'];?></td>
          </tr>  
         </tbody>
            
          
        </table>
        <?php  if($row['action']== "running"){?>
        <div class="tiem-link">
          <h4>Bus Timing:</h4><br>
          <?php 
            $time = $row['show'];

            $movie = $row['movie_name'];
            $set_time = explode(",", $time);
            $res = mysqli_query($conn,"SELECT * FROM theater_show");

        if (mysqli_num_rows($res) > 0) {
          while($row = mysqli_fetch_array($res)) {

            if(in_array($row['show'],$set_time)){

              ?><a href="seatbooking.php?movie=<?php echo $movie; ?>&time=<?php echo $row['show'];?>"><?php echo $row['show'];?></a><?php
             
             }
           }
         }
          ?>
        
       
      </div>
      <?php
}
      ?>
      </div>
      
    </div>
    <div class="description">
      <h4>Description</h4>
      <p>
      Urban accessibility has been traditionally associated to the bigger and smaller amount of transportation, from the urban mobility perspective this is seen as a reductionist conception of the concept.

This happens because mobility means more than travelling from the point A to the point B, it also includes the different experiences and consequences lived by the commuters and not commuters.

So, the urban accessibility does not only imply to reach the transportation but also to reach the localization and the distribution of some key activities.      </p>
    </div>
    <?php
        }
      }
         ?>
    </div>
  
</section>

<?php
include("footer.php");
?>


    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>     