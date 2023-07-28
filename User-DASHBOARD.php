<?php session_start(); ?>
<?php require_once('include/connection.php'); ?>
<?php 
	// checking if a user is logged in
	if (!isset($_SESSION['user_id'])) {
		header('Location: index.php');
	}

  $query = "SELECT * FROM user WHERE user_id = '".$_SESSION['user_id']."'";
  $users = mysqli_query($connection, $query);
 

 

	// // getting the list of users
	// $query = "SELECT * FROM user WHERE user_id = '".$_SESSION['user_id']."'";
	// $users = mysqli_query($connection, $query);

	// if ($users) {
	// 	while ($user = mysqli_fetch_assoc($users)) {
	// 		$user_list .= "<tr>";
  //     $user_list .= "<td>{$user['type']}</td>";
	// 		$user_list .= "<td>{$user['full_name']}</td>";
	// 		$user_list .= "<td>{$user['address']}</td>";
	// 		$user_list .= "<td>{$user['email']}</td>";
  //     $user_list .= "<td>{$user['mobile_number']}</td>";
  //     $user_list .= "<td>{$user['user_id']}</td>";
  //     $user_list .= "<td>{$user['company_id_no']}</td>";
  //     $user_list .= "<td>{$user['company_name']}</td>";
  //     $user_list .= "<td>{$user['salary_complete_last_month']}</td>";
  //     $user_list .= "<td>{$user['item']}</td>";
  //     $user_list .= "<td>{$user['working_place']}</td>";
  //     $user_list .= "<td>{$user['description']}</td>";
      
	
	// 		$user_list .= "</tr>";
	// 	}
	// } else {
	// 	echo "Database query failed.";
	// }



 ?>



<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
  <style>
     th, td{
    border: 1px solid white;
    border-radius: 10px;

  }
    td{
      padding: 10px;
      width:30%;
    }
   


   
  </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Cleaning Staff Schedule System">
    <meta name="description" content="">
    <title>User Dashboarde</title>
    <link rel="stylesheet" href="css/Main.css" media="screen">
<link rel="stylesheet" href="css/User-Dashboarde.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 5.6.2, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": ""
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="User Dashboarde">
    <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/"></head>
  <body class="u-body u-xl-mode" data-lang="en"><header class="u-clearfix u-custom-color-5 u-header" id="sec-ae73" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction=""><div class="u-clearfix u-sheet u-sheet-1">
        <img class="u-image u-image-contain u-image-round u-preserve-proportions u-radius-10 u-image-1" src="images/University-of-Vavuniya-Logo-1024x1024.png" alt="" data-image-width="1024" data-image-height="1024">
        <nav class="u-menu u-menu-one-level u-offcanvas u-menu-1" data-responsive-from="MD">
          <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px; font-weight: 700; text-transform: uppercase;">
            <a class="u-button-style u-custom-active-border-color u-custom-border u-custom-border-color u-custom-border-radius u-custom-borders u-custom-hover-border-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-decoration u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
              <svg class="u-svg-link" viewBox="0 0 24 24"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
              <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</g></svg>
            </a>
          </div>
          <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-spacing-27 u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-button-style u-nav-link u-radius-14 u-text-active-grey-5 u-text-hover-custom-color-1 u-text-white" href="Home.php" style="padding: 10px 24px;">Home</a>
</li><li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-button-style u-nav-link u-radius-14 u-text-active-grey-5 u-text-hover-custom-color-1 u-text-white" href="User-Dashboarde.php" style="padding: 10px 24px;">Dashboarde</a><div class="u-nav-popup"><ul class="u-border-1 u-border-grey-30 u-h-spacing-20 u-nav u-unstyled u-v-spacing-10"><li class="u-nav-item"><a class="u-button-style u-grey-5 u-nav-link" href="Admin-Dashboarde.php">Admin Dashboarde</a>
</li><li class="u-nav-item"><a class="u-button-style u-grey-5 u-nav-link" href="Technician-Dashboard.php">Technician Dashboard</a>
</li></ul>
</div>
<!-- </li><li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-button-style u-nav-link u-radius-14 u-text-active-grey-5 u-text-hover-custom-color-1 u-text-white" href="Login.php" style="padding: 10px 24px;">Login</a> -->
</li><li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-button-style u-nav-link u-radius-14 u-text-active-grey-5 u-text-hover-custom-color-1 u-text-white" href="About.php" style="padding: 10px 24px;">About</a>
</li><li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-button-style u-nav-link u-radius-14 u-text-active-grey-5 u-text-hover-custom-color-1 u-text-white" href="Home.php" style="padding: 10px 24px;">Log out</a>
</li></ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-3"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Home.php">Home</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="User-Dashboarde.php">Dashboarde</a><div class="u-nav-popup"><ul class="u-border-1 u-border-grey-30 u-h-spacing-20 u-nav u-unstyled u-v-spacing-10"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Admin-Dashboarde.php">Admin Dashboarde</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Technician-Dashboard.php">Technician Dashboard</a>
</li></ul>
</div>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Login.php">Login</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="About.php">About</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Home.php">Log out</a>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
        <h2 class="u-text u-text-default u-text-1">University of Vavuniya</h2>
      </div></header>
    <section class="u-clearfix u-image u-shading u-section-1" id="sec-b5ba" data-image-width="2000" data-image-height="1380">
      <div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-text u-text-default u-text-1">Welcome   !<span style="text-decoration:  !important;"><?php echo "  Emp ID ". $_SESSION['user_id']; ?></span>
        <br>
        </p>
        <img class="u-image u-image-round u-preserve-proportions u-radius-10 u-image-1" src="images/images.png" alt="" data-image-width="225" data-image-height="225">
        <br>
         <div class="u-container-style u-group u-opacity u-opacity-50 u-radius-30 u-shape-round  ">
        <!-- <div class="u-container-style u-group u-opacity u-opacity-50 u-radius-30 u-shape-round u-white u-group-1"> -->
        <div class="u-container-layout u-container-layout-1">



 <?php

    while($fetch=mysqli_fetch_array($users)){


          echo "<table> ";
          echo "<tr><td> <b> Type :  </b>". $fetch['type']." </td>";
          echo "<td> <b> Company ID No :  </b>". $fetch['company_id_no']."</td>";
          echo "<td>  <b> Item :  </b>". $fetch['item']."</td> </tr>"; 
          

         
          echo "<tr><td>  <b> Emp ID No :  </b>". $fetch['user_id']." </td>"; 
          echo "<td>  <b> Company Name :  </b>". $fetch['company_name']."</td>"; 
          echo "<td>  <b> Working Place :   </b>".$fetch['working_place']." </td> </tr>";
         
          
        
          echo "<tr><td><b> Full Name :  </b>". $fetch['full_name']." </td> </tr>"; 
         
          

        
          echo "<tr><td> <b> Address :  </b>". $fetch['address']."</td>";
          echo "<td> <b> Salary Complete <br> Last_Month :  </b>". $fetch['salary_complete_last_month']."</td> </tr>";
          // echo "<td> </td>";
        
        

          echo "<tr> <td> <b> Email Address :  </b>". $fetch['email']."</td>"; 
         
          
          echo "<td> <b> Description :</b>". $fetch['description']."</td> "; 
          echo " </tr>";

          echo "<tr> <td>  <b> Mobile Number :  </b>". $fetch['mobile_number']." </td>"; 
          echo " </tr>";
         


          echo "</table> ";
         
        }
        
        ?>




</div>
















          <!-- <div class="u-container-layout u-container-layout-1">
            <p class="u-text u-text-default u-text-white u-text-2">*******</p>
            <p class="u-text u-text-white u-text-3">Type&nbsp; &nbsp; &nbsp; :</p>
            <p class="u-text u-text-default u-text-white u-text-4">Full Name&nbsp; &nbsp; :</p>
            <p class="u-text u-text-default u-text-white u-text-5">*******</p>
            <p class="u-text u-text-default u-text-white u-text-6">Address&nbsp; &nbsp; &nbsp; &nbsp;:</p>
            <p class="u-text u-text-default u-text-white u-text-7">*******</p>
            <p class="u-text u-text-default u-text-white u-text-8">Email Address&nbsp; &nbsp; &nbsp;:</p>
            <p class="u-text u-text-default u-text-white u-text-9">*******</p>
            <p class="u-text u-text-default u-text-white u-text-10">*******</p>
            <p class="u-text u-text-default u-text-white u-text-11">Mobile Number&nbsp; :</p>
          </div> 
        </div>-->
        <!-- <div class="u-container-style u-group u-opacity u-opacity-50 u-radius-30 u-shape-round u-white u-group-2">
          <div class="u-container-layout u-container-layout-2">
            <p class="u-text u-text-default u-text-white u-text-12">*******</p>
            <p class="u-text u-text-white u-text-13">Emp ID No&nbsp; &nbsp; :</p>
            <p class="u-text u-text-default u-text-white u-text-14">*******</p>
            <p class="u-text u-text-default u-text-white u-text-15">Company ID No&nbsp; &nbsp; :</p>
            <p class="u-text u-text-default u-text-white u-text-16">Company Name&nbsp; &nbsp; :</p>
            <p class="u-text u-text-default u-text-white u-text-17">*******</p>
          </div>
        </div>
        <div class="u-container-style u-group u-opacity u-opacity-50 u-radius-30 u-shape-round u-white u-group-3"> -->
          <!-- <div class="u-container-layout u-container-layout-3">
            <p class="u-text u-text-white u-text-18">Items&nbsp; &nbsp; &nbsp; &nbsp; :</p>
            <div class="u-container-style u-group u-opacity u-opacity-85 u-radius-30 u-shape-round u-white u-group-4">
               <div class="u-container-layout u-valign-top u-container-layout-4"> 
                <p class="u-text u-text-default u-text-19">*******</p>
              </div> 
            </div>
             <div class="u-container-style u-group u-opacity u-opacity-85 u-radius-30 u-shape-round u-white u-group-5">
              <div class="u-container-layout u-valign-top u-container-layout-5">
                <p class="u-text u-text-default u-text-20">*******</p>
              </div> -->
            <!-- </div>
            <p class="u-text u-text-default u-text-white u-text-21">Working Place&nbsp; &nbsp; :</p>
            <p class="u-text u-text-default u-text-white u-text-22">*******</p>
            <p class="u-text u-text-default u-text-white u-text-23">Description&nbsp; &nbsp; :</p>
            <p class="u-text u-text-white u-text-24">***************************************************************************************</p>
          </div> 
        </div>

        <div class="u-container-style u-group u-opacity u-opacity-50 u-radius-30 u-shape-round u-white u-group-6">
           <div class="u-container-layout u-container-layout-6">
            <p class="u-text u-text-default u-text-white u-text-25">Salary complete Last Month&nbsp; &nbsp; :</p>
            <p class="u-text u-text-default u-text-white u-text-26">*******</p>
          </div>-->



         </div>
      </div>
    </section> 
    
    
    <footer class="u-align-center u-clearfix u-custom-color-5 u-footer u-footer" id="sec-9213"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-align-center u-small-text u-text u-text-variant u-text-1"> https://vau.ac.lk/</p>
        <p class="u-align-left u-small-text u-text u-text-variant u-text-2">Cleaning Staff Schedule System</p>
      </div></footer>
    
  
</body></html>