<?php session_start(); ?>
<?php require_once('include/connection.php'); ?>
<?php require_once('include/functions.php'); ?>

<?php 
	// checking if a user is logged in
	if (!isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
		header('Location: Home.php');
	}

	$errors = array();
  $type='';
	$full_name = '';
	$address = '';
	$email = '';
  $mobile_number = '';
  $company_id_no = '';
  $company_name = '';
  $Salary_Complete_last_month = '';
  $item = '';
  $working_place = '';
  $description = '';

	if (isset($_GET['user_id'])) {
		// getting the user information
		$user_id = mysqli_real_escape_string($connection, $_GET['user_id']);
		$query = "SELECT * FROM user WHERE id = {$user_id} LIMIT 1";

		$result_set = mysqli_query($connection, $query);

		if ($result_set) {
			if (mysqli_num_rows($result_set) == 1) {
				// user found
				$result = mysqli_fetch_assoc($result_set);
        $type = $result['type'];
				$full_name = $result['full_name'];
				$address = $result['address'];
				$email = $result['email'];
        $mobile_number = $result['mobile_number'];
        $company_id_no = $result['company_id_no'];
        $company_name = $result['company_name'];
        $salary_complete_last_month = $result['salary_complete_last_month'];
        $item = $result['item'];
        $working_place = $result['working_place'];
        $description = $result['description'];
			} else {
				// user not found
				header('Location: Admin-DASHBOARD.php?err=user_not_found');	
			}
		} else {
			// query unsuccessful
			header('Location: Admin-DASHBOARD.php?err=query_failed');
		}
	}

	if (isset($_POST['submit'])) {
  
    $user_id = $_POST['user_id'];
    $type = $_POST['type'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $mobile_number = $_POST['mobile_number'];
    $company_id_no = $_POST['company_id_no'];
    $company_name = $_POST['company_name'];
    $salary_complete_last_month = $_POST['salary_complete_last_month'];
    $item = $_POST['item'];
    $working_place = $_POST['working_place'];
    $description = $_POST['description'];
    // $password = $_POST['password'];
  
      // checking required fields
      $req_fields = array('user_id', 'type', 'full_name', 'email','mobile_number','company_id_no','company_name','salary_complete_last_month','item','working_place','description');
  
      // foreach ($req_fields as $field) {
      //   if (empty(trim($_POST[$field]))) {
      //     $errors[] = $field . ' is required';
      //   }
      // }

      $errors = array_merge($errors, check_req_fields($req_fields));
  
      // checking max length
      $max_len_fields = array('user_id' => 10, 'type' =>15, 'full_name'=>50, 'email' => 50, 'mobile_number'=>10, 'company_id_no'=>10, 'company_name'=>50, 'salary_complete_last_month'=>50, 'item'=>50, 'working_place'=>50 , 'description' => 100 );
  
      // foreach ($max_len_fields as $field => $max_len) {
      //   if (strlen(trim($_POST[$field])) > $max_len) {
      //     $errors[] = $field . ' must be less than ' . $max_len . ' characters';
      //   }
      // }

      $errors = array_merge($errors, check_max_len($max_len_fields));
  
      // checking email address
      if (!is_email($_POST['email'])) {
      	$errors[] = 'Email address is invalid.';
      }
  
      // checking if email address already exists
      $email = mysqli_real_escape_string($connection, $_POST['email']);
      $query = "SELECT * FROM user WHERE email = '{$email}' LIMIT 1";
  
            $result_set = mysqli_query($connection, $query);
  
            if ($result_set) {
            	if (mysqli_num_rows($result_set) == 1) {
            		$errors[] = 'Email address already exists';
            	}
            }
  
      if (empty($errors)) {
        // no errors found... adding new record
        $user_id = mysqli_real_escape_string($connection, $_POST['user_id']);
        $type = mysqli_real_escape_string($connection, $_POST['type']);
        $full_name = mysqli_real_escape_string($connection, $_POST['full_name']);
        //$email = mysqli_real_escape_string($connection, $_POST['email']);
        $mobile_number = mysqli_real_escape_string($connection, $_POST['mobile_number']);
        $company_id_no = mysqli_real_escape_string($connection, $_POST['company_id_no']);
        $company_name = mysqli_real_escape_string($connection, $_POST['company_name']);
        $salary_complete_last_month = mysqli_real_escape_string($connection, $_POST['salary_complete_last_month']);
        $item = mysqli_real_escape_string($connection, $_POST['item']);
        $working_place = mysqli_real_escape_string($connection, $_POST['working_place']);
        $description = mysqli_real_escape_string($connection, $_POST['description']);
        // $password = mysqli_real_escape_string($connection, $_POST['password']);
  
  
  
        // email address is already sanitized
        // $hashed_password = sha1($password);
  
        $query = "UPDATE user SET ";
        //$query .= "user_id = '{$user_id}',";
        $query .= "type ='{$type}', ";
        $query .= "full_name ='{$full_name}', ";
        $query .= "email = '{$email}',";
        $query .= "mobile_number = '{$mobile_number}',";
        $query .= "company_id_no = '{$company_id_no}',";
        $query .= "company_name = '{$company_name}',";
        $query .= "salary_complete_last_month = '{$salary_complete_last_month}',";
        $query .= "item = ' '{$item}',";
        $query .= "working_place = '{$working_place}',";
        $query .= "description = '{$description}', ";
        // $query .= "password ='{$hashed_password}',";
        $query .= "WHERE id = {$user_id} LIMIT 1";
       
  
        $result = mysqli_query($connection, $query);
  
        if ($result) {
          // query successful... redirecting to users page
          header('Location: Admin-DASHBOARD.php?user_modified=true');
        } else {
          $errors[] = 'Failed to add the new record.';
        }
      }
  
    }



?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
<style>
		body {
			font-family: Arial, sans-serif;
		}
		form {
			max-width: 1000px;
			margin: 0 auto;
			display: flex;
			flex-direction: column;
			align-items: center;
		}
		input[type=text], input[type=password] {
			padding: 5px;
			margin: 8px 0;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			width: 50%;
		}
		input[type=submit] {
			background-color: #4CAF50;
			color: white;
			padding: 10px 10px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			width: 70%;
		}
		input[type=submit]:hover {
			background-color: #45a049;
		}
	</style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Cleaning Staff Schedule System">
    <meta name="description" content="">
    <title>Admin Edit Users </title>
    <link rel="stylesheet" href="css/Main.css" media="screen">
<link rel="stylesheet" href="css/Admin-Edit-Users-.css" media="screen">
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
    <meta property="og:title" content="Admin Edit Users">
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
    <!-- <section class="u-clearfix u-image u-shading u-section-1" id="sec-e6b3" data-image-width="2000" data-image-height="1380"> -->
      
    <?php 

if (!empty($errors)) {
  display_errors($errors);
}

?>

<form action="Admin-DASHBOARD_edit.php?user_id=<?php echo $user_id ?>" method="post" >
    <br>
				  <label for="" >Emp ID:</label>
				  <input type="text" name="user_id" value=<?php echo  $result['user_id']; ?> required>
          <br>
				  <label for="">Type:</label>
				  <input type="text" name="type" value=<?php echo  $result['type']; ?>  required>
          <br>
				  <label for="">Full Name:</label>
				  <input type="text" name="full_name" value=<?php echo  $result['full_name']; ?>  required>
          <br>
          <label for="">Address:</label>
          <input type="text" name="address" <?php echo 'value="' . $address . '"'; ?> required>
          <br>
          <label for="">Email Address:</label>
          <input type="text" name="email" value=<?php echo  $result['email']; ?>  required>
          <br>
          <label for="">Mobile Number :</label>
          <input type="tel" name="mobile_number" value=<?php echo  $result['mobile_number']; ?>   required>
          <br>
          <label for="">Company ID NO:</label>
          <input type="text" name="company_id_no" value=<?php echo  $result['company_id_no']; ?>    required>
          <br>
          <label for="">Company Name:</label>
          <input type="text" name="company_name" value=<?php echo  $result['company_name']; ?>    required>
          <br>
          <label for="">Salary Complete Last Month :</label>
          <input type="month" id="bdaymonth" name="salary_complete_last_month"  value=<?php echo  $result['salary_complete_last_month']; ?> >
          <br>
          <label for="">items :</label>
          <!--<select id="item" name="item" value=<?php echo  $result['item']; ?>  form="add-user-form" oncharge="show_item()">
                <option value="Broom">Broom</option>
                <option value="Cleaning Liquid ">Cleaning Liquid</option>
                <option value="Mop">Mop</option>
                <option value="Cucket">Cucket</option>
          </select>-->
          <input type="text" id="item" name="item" <?php echo 'value="' . $item . '"'; ?>>
        <!-- <label for="">working Place:</label> -->
        <label for="" name="working_place" value=<?php echo  $result['working_place']; ?>   >Working Place :</label>
                <!-- <div class="u-form-select-wrapper"> -->
                  <select name=working_place onchange="show_place()">
                  <optgroup label="Faculty of Technological studies">
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
                  <br>
                  <label for="">Description :</label>
                  <!-- <textarea  id="description" name="description" value=<?php echo  $result['description']; ?>   rows="4" cols="50"></textarea> -->
                  <input type="textarea"  id="description" name="description" value=<?php echo  $result['description']; ?>   rows="4" cols="50"  >
                      <br>
                  <!-- <label for=""> Password:</label>
                  <input type="password" name="password"  > -->

                  <label for="">Password:</label>
				          <span>******</span> | <a href="change-password.php?user_id=<?php echo $user_id; ?>">Change Password</a>
                  <br>

  
                  <input type="submit" value="Change User Details">
                  <br>
                  <br>

		</form>
    
    
   
    
    
    <footer class="u-align-center u-clearfix u-custom-color-4 u-footer u-footer" id="sec-9213"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-align-center u-small-text u-text u-text-variant u-text-1"> https://vau.ac.lk/</p>
        <p class="u-align-left u-small-text u-text u-text-variant u-text-2">Cleaning Staff Schedule System</p>
      </div></footer>
    
  
</body></html>