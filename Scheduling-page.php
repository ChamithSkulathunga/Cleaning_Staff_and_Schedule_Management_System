<?php session_start(); ?>
<?php require_once('include/connection.php'); ?>


<?php 
	// checking if a user is logged in
	if (!isset($_SESSION['user_id'])) {
		header('Location: index.php');
	}

  $errors = array();
  $employee_id='';
  $working_place = '';
  $date='';
  $time_from='';
  $time_to='';

  if (isset($_POST['submit'])) {
    $employee_id = $_POST['employee_id'];
    $working_place = $_POST['working_place'];
    $date = $_POST['date'];
    $time_from = $_POST['time_from'];
    $time_to = $_POST['time_to'];

    $req_fields = array('employee_id', 'working_place', 'date', 'time_from','time_to');

    // foreach ($req_fields as $field) {
		// 	if (empty(trim($_POST[$field]))) {
		// 		$errors[] = $field . ' is required';
		// 	}
		// }

    $max_len_fields = array('employee_id' => 10, 'working_place'=>50 , 'date','time_from','time_to');

    // $errors = array_merge($errors, check_max_len($max_len_fields));

    if (empty($errors)) {
			// no errors found... adding new record
			$employee_id = mysqli_real_escape_string($connection, $_POST['employee_id']);
			$working_place = mysqli_real_escape_string($connection, $_POST['working_place']);
			$date = mysqli_real_escape_string($connection, $_POST['date']);
      $time_from = mysqli_real_escape_string($connection, $_POST['time_from']);
      $time_to = mysqli_real_escape_string($connection, $_POST['time_to']);
			

			// $query = "INSERT INTO user ( ";
			// $query .= "user_id, working_place, date, time_from, time_to";
			// $query .= ") VALUES (";
			// $query .= "'{$user_id}', '{$working_place}', '{$date}', '{$time_from}',  '{$time_to}'";
			// $query .= ")";
     

      $query = "UPDATE user SET ";
			$query .= "employee_id = '{$employee_id}', ";
			$query .= "working_place = '{$working_place}', ";
			$query .= "time_from = '{$time_from}' ";
      $query .= "time_to = '{$time_to}' ";
			$query .= "WHERE employee_id = {$employee_id} LIMIT 1";

			$result = mysqli_query($connection, $query);

			if ($result) {
				// query successful... redirecting to users page
				header('Location: Technician-DASHBOARD.php?user_added=true');
			} else {
				$errors[] = 'Failed to add the new record.';
			}


		}



  }
?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Cleaning Staff Schedule System">
    <meta name="description" content="">
    <title>Scheduling-page</title>
    <link rel="stylesheet" href="css/Main.css" media="screen">
<link rel="stylesheet" href="css/Scheduling-page.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="Main.js" defer=""></script>
    <meta name="generator" content="Main 5.6.2, Main.com">
    <meta name="referrer" content="origin">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": ""
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="About">
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
</li><li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-button-style u-nav-link u-radius-14 u-text-active-grey-5 u-text-hover-custom-color-1 u-text-white" href="Home.php" style="padding: 10px 24px;">Dashboarde</a><div class="u-nav-popup"><ul class="u-border-1 u-border-grey-30 u-h-spacing-20 u-nav u-unstyled u-v-spacing-10"><li class="u-nav-item"><a class="u-button-style u-grey-5 u-nav-link" href="Admin-Dashboarde.php">Admin Dashboarde</a>
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
    <section class="u-clearfix u-custom-color-3 u-section-1" id="sec-e944">
      <div class="u-clearfix u-sheet u-sheet-1">
        <!-- <h3 class="u-text u-text-default u-text-1">Giving time and places for work to Employees</h3> -->
        <div class="u-form u-form-1">
          <!-- <h3>Giving time and places for work to Employees</h3> -->
          <form action="Scheduling-page_con.php" method="post" class="u-clearfix u-form-spacing-12 u-form-vertical u-inner-form" source="email" name="form" style="padding: 42px;">
            <div class="u-form-group u-form-name">
              <label for="name-4b13" class="u-label">Employee ID NO :</label>
              <input type="text" placeholder="Enter Emp ID No" id="" name="employee_id" class="u-border-2 u-input u-input-rectangle u-radius-11" <?php echo 'value="' . $employee_id . '"'; ?> required="">
            </div>
            <div class="u-form-group u-form-select u-form-group-2">
              <label for="select-a98b" class="u-label" name="working_place" <?php echo 'value="' . $working_place . '"'; ?> >Working Place :</label>
              <div class="u-form-select-wrapper">
                <select id="select-a98b" name="working_place" class="u-border-2 u-input u-input-rectangle u-radius-11" onchange="show_place()">
                  <optgroup label="Faculty of Technological studies" >
                    <option value="FOTS Lecture hall">FOTS Lecture hall</option>
                    <option value="FOTS Laboratory">FOTS Laboratory</option>
                    <option value="FOTS Staff Room">FOTS Staff Room</option>
                    <option value="FOTS Wash Room">FOTS Wash Room</option>
                    <option value="FOTS Out side">FOTS Out side</option>
                  </optgroup>
                  <optgroup label="Faculty of Business studies ">
                    <option value="FOBS Lecture hall">FOBS Lecture hall</option>
                    <option value="FOBS Laboratory">FOBS Laboratory</option>
                    <option value="FOBS Staff Room">FOBS Staff Room</option>
                    <option value="FOBS Wash Room">FOBS Wash Room</option>
                    <option value="FOBS Out side">FOBS Out side</option>
                  </optgroup>
                  <optgroup label="Faculty of Applied science ">
                    <option value="FOAS Lecture hall">FOAS Lecture hall</option>
                    <option value="FOAS Laboratory">FOAS Laboratory</option>
                    <option value="FOAS Staff Room">FOAS Staff Room</option>
                    <option value="FOAS Wash Room">FOAS Wash Room</option>
                    <option value="FOAS Out side">FOAS Out side</option>
                  </optgroup>
                  <optgroup label="IT Center ">
                    <option value="IT Center Ground Floor">IT Center Ground Floor</option>
                    <option value="IT Center First Floor">IT Center First Floor</option>
                    <option value="IT Center Second Floor">IT Center Second Floor</option>
                    <option value="IT Center Wash Room">IT Center Wash Room</option>
                    <option value="IT Center Out side">IT Center Out side</option>
                  </optgroup>
                  <optgroup label="Electronic Laboratory ">
                    <option value="Electronic Laboratory  Inside">Electronic Laboratory  Inside</option>
                    <option value="Electronic Laboratory  Wash Room">Electronic Laboratory  Wash Room</option>
                    <option value="Electronic Laboratory  Out side">Electronic Laboratory  Out side</option>
                  </optgroup>
                  <optgroup label="Welfare Center ">
                    <option value="Welfare Center  Inside">Welfare Center  Inside</option>
                    <option value="Welfare Center  Wash Room">Welfare Center  Wash Room</option>
                    <option value="Welfare Center  Out side">Welfare Center  Out side</option>
                  </optgroup>
                  <optgroup label="Library ">
                    <option value="Library  Inside">Library  Inside</option>
                    <option value="Library  Wash Room">Library  Wash Room</option>
                    <option value="Library  Out side">Library  Out side</option>
                  </optgroup>
                  <optgroup label="BS Canteen ">
                    <option value="BS Canteen  Inside">BS Canteen  Inside</option>
                    <option value="BS Canteen  Out side">BS Canteen  Out side</option>
                  </optgroup>
                  <optgroup label="Applied Canteen ">
                    <option value="Applied Canteen  Inside">Applied Canteen  Inside</option>
                    <option value="Applied Canteen  Out side">Applied Canteen  Out side</option>
                  </optgroup>
                </select>

                <svg class="u-caret u-caret-svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 16 16" style="fill:currentColor;" xml:space="preserve"><polygon class="st0" points="8,12 2,4 14,4 "></polygon></svg>
              </div>
            </div>
            <div class="u-form-date u-form-group u-form-group-3">
              <label for="date-5898" class="u-label">Date</label>
              <input type="date"  placeholder="MM/DD" id="date-5898" name="date" class="u-border-2 u-input u-input-rectangle u-radius-11" <?php echo 'value="' . $date . '"'; ?> required="" data-date-format="mm/dd/yyyy">
              <!-- <input type="date" id="birthday" name="birthday"> -->
            </div>
            <div class="u-form-group u-form-time u-form-group-4">
              <label for="time-9e39" class="u-label">From</label>
              <input type="time" id="time-9e39" name="time_from" class="u-border-2 u-input u-input-rectangle u-radius-11" <?php echo 'value="' . $time_from . '"'; ?>>
            </div>
            <div class="u-form-group u-form-time u-form-group-5">
              <label for="time-2e95" class="u-label">To</label>
              <input type="time" id="time-2e95" name="time_to" class="u-border-2 u-input u-input-rectangle u-radius-11" <?php echo 'value="' . $time_to . '"'; ?> data-time-value="00:00">
            </div>
            <div class="u-align-left u-form-group u-form-submit">
              <!-- <a href="#" class="u-btn u-btn-submit u-button-style">Submit</a> -->
              <!-- <input type="submit" value="submit" class="u-form-control-hidden"> -->
              <label for="">&nbsp;</label>
				      <button type="submit" name="submit">submit</button>
            </div>
            <div class="u-form-send-message u-form-send-success"> Thank you! Your message has been sent. </div>
            <div class="u-form-send-error u-form-send-message"> Unable to send your message. Please fix errors then try again. </div>
            <input type="hidden" value="" name="recaptchaResponse">
            <input type="hidden" name="formServices" value="2c9affc79f86afa152e6677a3f62f462">
          </form>
        </div>
      </div>
    </section>
    
    
    <footer class="u-align-center u-clearfix u-custom-color-5 u-footer u-footer" id="sec-9213"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-align-center u-small-text u-text u-text-variant u-text-1"> https://vau.ac.lk/</p>
        <p class="u-align-left u-small-text u-text u-text-variant u-text-2">Cleaning Staff Schedule System</p>
      </div></footer>
    
  
</body></html>