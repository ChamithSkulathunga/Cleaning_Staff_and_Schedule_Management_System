<?php session_start(); ?>
<?php require_once('include/connection.php'); ?>
<?php require_once('include/functions.php'); ?>
<?php 
	// checking if a user is logged in
	if (!isset($_SESSION['user_id'])) {
		header('Location: index.php');
	}

  $user_list = '';

	// getting the list of users
	$query = "SELECT * FROM user WHERE is_deleted=0 ORDER BY user_id";
	$users = mysqli_query($connection, $query);

  verify_query($users);

	
	while ($user = mysqli_fetch_assoc($users)) {
			$user_list .= "<tr>";
      // $user_list .= "<td>{$user['type']}</td>";
      $user_list .= "<td>{$user['user_id']}</td>";
			$user_list .= "<td>{$user['full_name']}</td>";
			$user_list .= "<td>{$user['address']}</td>";
			$user_list .= "<td>{$user['email']}</td>";
      $user_list .= "<td>{$user['mobile_number']}</td>";
      // $user_list .= "<td>{$user['user_id']}</td>";
      $user_list .= "<td>{$user['company_id_no']}</td>";
      $user_list .= "<td>{$user['company_name']}</td>";
      $user_list .= "<td>{$user['salary_complete_last_month']}</td>";
      $user_list .= "<td>{$user['item']}</td>";
      $user_list .= "<td>{$user['working_place']}</td>";
      $user_list .= "<td>{$user['description']}</td>";
      $user_list .= "<td><a href=\"Admin-Edit-Users.php?user_id={$user['id']}\">Edit</a></td>";
			$user_list .= "<td><a href=\"delete-user.php?user_id={$user['id']}\">Delete</a></td>";
	
			$user_list .= "</tr>";
		}
	
 ?>
 
<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
  <style>
      table {
  border-collapse: collapse;
  width: 100%;
}

 td {
  padding: 8px;
  text-align: cente;
  border-bottom: 1px solid #ddd;
}

th{
  border: 1px solid white;
    border-radius: 10px;
}

th{
      padding: 2px;
      width:auto;
    }

  </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Cleaning Staff Schedule System">
    <meta name="description" content="">
    <title>Admin DASHBOARD</title>
    <link rel="stylesheet" href="css/Main.css" media="screen">
<link rel="stylesheet" href="css/Admin-DASHBOARD.css" media="screen">
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
    <meta property="og:title" content="Admin DASHBOARD">
    <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/"></head>
  <body class="u-body u-xl-mode" data-lang="en"><header class="u-clearfix u-custom-color-4 u-header" id="sec-ae73" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction=""><div class="u-clearfix u-sheet u-sheet-1">
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
</li><li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-button-style u-nav-link u-radius-14 u-text-active-grey-5 u-text-hover-custom-color-1 u-text-white" href="Login.php" style="padding: 10px 24px;">DASHBOARD</a><div class="u-nav-popup"><ul class="u-border-1 u-border-grey-30 u-h-spacing-20 u-nav u-unstyled u-v-spacing-10"><li class="u-nav-item"><a class="u-button-style u-grey-5 u-nav-link" href="Admin-DASHBOARD.php">Admin DASHBOARD</a>
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
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="User-DASHBOARD.php">DASHBOARD</a><div class="u-nav-popup"><ul class="u-border-1 u-border-grey-30 u-h-spacing-20 u-nav u-unstyled u-v-spacing-10"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Admin-DASHBOARD.php">Admin DASHBOARD</a>
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
    <section class="u-clearfix u-image u-shading u-section-1" id="sec-0379" data-image-width="2000" data-image-height="1380" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">
      <p class="u-text u-text-default u-text-1">Welcome  ! &nbsp;&nbsp;<span style="text-decoration:  !important;"> <?php  echo "Admin ".$_SESSION['user_id']; ?>&nbsp;</span>
      </p>
      <p class="u-text u-text-default u-text-2">
        <a class="u-border-none u-btn u-btn-round u-button-style u-grey-5 u-hover-custom-color-1 u-radius-23 u-btn-1" href="Add-New-Employee.php"><span class="u-file-icon u-icon"><img src="images/8867438.png" alt=""></span>&nbsp;+ Add New Employee
        </a>
      </p>
      <br><br>

      <main>
      <table class="masterlist" >
			<tr>
        <!-- <th>Type</th> -->
        <th>EMP ID NO</th>
				<th>Full Name</th>
				<th>Address</th>
        <th>Email Address</th>
        <th>Mobile Number</th>
        <th>Company ID NO</th>
        <th>Company Name</th>
        <th>Salary_Complete_last_month</th>
        <th>item</th>
        <th>Working Place</th>
        <th>description</th>
				<th>Edit</th>
				<th>Delete</th>
      
			</tr>
      
      <?php echo $user_list; ?>
      </table>
      
      <br>
      </main>
      
    
    
    <footer class="u-align-center u-clearfix u-custom-color-4 u-footer u-footer" id="sec-9213"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-align-center u-small-text u-text u-text-variant u-text-1"> https://vau.ac.lk/</p>
        <p class="u-align-left u-small-text u-text u-text-variant u-text-2">Cleaning Staff Schedule System</p>
      </div></footer>
    
  
</body></html>