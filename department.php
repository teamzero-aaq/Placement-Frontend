<?php 
include('dashboard/db.php');
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Placement Assistant | Department </title>
 
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
            <a class="nav-link js-scroll-trigger" href="index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#">Aptitute</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#">Practice</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active js-scroll-trigger" href="department.php">Online Test</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Interview</a>
             <div class="dropdown-menu" aria-labelledby="navbarDropdown">
               <a class="dropdown-item dd js-scroll-trigger" href="hrlist.html">HR Interview</a>
               <a class="dropdown-item dd js-scroll-trigger" href="gdlist.html">Group Discussion</a>
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

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="login.php">Login</a>
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
          <h1 class="text-uppercase text-white font-weight-bold">Department</h1>
        </div>
        <div class="col-lg-8 align-self-baseline">
          <p class="text-white-75 font-weight-light mb-5">In the history of modern astronomy, there is probably no one greater leap forward than the building and launch of the space telescope.</p>
         
        </div>
      </div>
    </div>
  </header>



 <div class="container pb-8 pt-5">
    
    

   <!-- Card stats --> 
        
          <div class="row align-item-center">


            <?php 
                
                $query = "SELECT * FROM department";
                $query_run = mysqli_query($connection,$query);
                 if (mysqli_num_rows($query_run) > 0) {
                    while($row = mysqli_fetch_assoc($query_run)) 
                    {
                     ?>
                      <div class="col-xl-4 col-lg-6">
                        <div class="dept_card">
                         <div class="dept_img" > 
                          <?php echo '<img src="dashboard/assets/img/departments/'.$row['bg_link'].'" class="img-responsive dept_img">'?>
                         </div><!-- end dept_img -->
                         <div class="details">
                          <h2><?php echo $row['department'];?></h2>                       

                            <div class="row">
                            <div class="col text-center"> 
                             <form action="subjects.php" method="POST">
                             <input type="hidden" name="tempdept" value="<?php echo $row['dept_id'];?>">
                            <button type="submit" class="btn btn-info btn-sm align-item-center" name="subject_btn">
                              <i class="ni ni-fat-add">&nbsp;</i>Subject
                             </button>
                             </form></div>



                            </div>



                          
                         </div><!--details-->
                        </div><!-- end dept card -->
                      </div><!-- end column-->

            <?php
                       
                    }

                    }
                    else
                    {
                      echo '<h4 class="bg-success"> No Record Found</h4>' ;
                    }

                   ?>

            </div><!-- end row-->

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