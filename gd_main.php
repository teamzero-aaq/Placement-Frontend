<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Placement Assistant | GD </title>

  <!-- Font Awesome Icons -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>



  <!-- Theme CSS - Includes Bootstrap -->
  <link href="css/creative.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#">Placement Assistant</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#">Aptitute</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#">Practice</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#">Online Test</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Interview</a>
             <div class="dropdown-menu" aria-labelledby="navbarDropdown">
               <a class="dropdown-item dd js-scroll-trigger" href="#">HR Interview</a>
               <a class="dropdown-item dd js-scroll-trigger" href="#">Group Discussion</a>
             </div>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#">Company</a>
          </li>
           <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#">Contact</a>
          </li>
         
        </ul>
      </div>
    </div>
  </nav>



  <!-- Masthead -->
  <header class="mastheader">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10 align-self-end">
          <h1 class="text-uppercase text-white font-weight-bold">Group Discussion</h1>
        </div>
        <div class="col-lg-8 align-self-baseline">
          <p class="text-white-75 font-weight-light mb-5">In the history of modern astronomy, there is probably no one greater leap forward than the building and launch of the space telescope.</p>
         
        </div>
      </div>
    </div>
  </header>



  <div class="container testsection">
    <div class="row">
     <div class="col-md-8 col-sm-10 left-side">
      <h5>Trending Topics</h5>
      <div class="list-group-flush">
        <form action="forum.php" method="post" id="view_gd_forum">
        <ul class="list-group gdlist">
          <?php 
          $mysqli = new mysqli("localhost", "root", "root", "placement");
    
$result = $mysqli->query('select * from gd_hr where type="gd"');


while($rows=mysqli_fetch_array($result))
 { ?>
        <li class="list-group-item list-group-item-action"><i class="far fa-folder-open mx-2"></i><?php echo $rows['question'];?><p style="margin-left: 10px; margin-top: 10px;"><button class="btn btn-outline-info btn-sm" form="view_gd_forum" name="view_gd" value="<?php echo $rows['id']; ?>">VIEW IN FORUM</button></p></li>
         <?php
       }
       ?>
      </ul>
    </form>
       
        
      </div>

                 



      </div>


     
      
    

    

     <div class="col-md-4 col-sm-10 sidebar">

      <div class="sidebar-item">
      <div class="make-me-sticky">
          
        
        <h3 class="style-title">Points to remember before you participate in this discussion:</h3>
    <p class="p-style">1. On the day of GD, dress in comfortable clothes that are simply you.</p>
    <p class="p-style">2. Be confident but avoid being over confident.</p>
    <p class="p-style">3. Talk sense. Avoid superficial talk.</p>
    <p class="p-style">4. Listen carefully and speak only at the appropriate time.</p>
    <p class="p-style">5. Be very sure of what you are speaking.</p>
    <p class="p-style">6. Use easy-to-understand English.</p>
    <p class="p-style">7. Speak loudly and clearly.</p>
    <p class="p-style">8. Do not be deterred by other members aggressive or submissive behaviour.</p>
    <p class="p-style">9. Accommodate diverse view points.</p>
    <p class="p-style">10. Put forth your points without being aggressive.</p>
    <p class="p-style">11. Give due importance to other persons views. However, stick to the point you have made.Try to support it with more view points..</p>
    <p class="p-style">12. Do not allow yourself to be diverted by other peoples points.</p>
    <p class="p-style">13. Do not be distracted. Your concentration should be solely on the discussion.</p>
    <p class="p-style">14. If you do not know something, do not speak.</p>
    <p class="p-style">15. Do not get excited or aggressive during the discussion. Try to maintain a balanced tone through out.</p>
    <p class="p-style">16. Try to contribute throughout the discussion.</p>
    <p class="p-style">17. Read as much as possible. Have good and sound knowledge on numerous topics. Watching documentaries on various topics will help here.</p>
    <p class="p-style">18. Improve your vocabulary. This does not mean that you use heavy and big words, but it
means that you will be able to understand the topic better and contribute effectively.</p>
        
      
       </div>
    </div>

     </div><!--end right coolum-->

  </div><!--end row-->

  </div><!--end container-->




  <!-- Footer -->
  <footer class="bg-light py-5">
    <div class="container">
      <div class="small text-center text-muted">Copyright &copy; 2019 - Placement Assistant</div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>


  <!-- Custom scripts for this template -->
  <script src="js/creative.js"></script>

  


</body>

</html>