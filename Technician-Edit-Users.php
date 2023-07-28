<?php session_start(); ?>
<?php require_once('include/connection.php'); ?>
<?php require_once('include/functions.php'); ?>

<?php 
	// checking if a user is logged in
	if (!isset($_SESSION['user_id'])) {
		header('Location: index.php');
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
				header('Location: Technician-DASHBOARD.php?err=user_not_found');	
			}
		} else {
			// query unsuccessful
			header('Location: Technician-DASHBOARD.php?err=query_failed');
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
          header('Location: Technician-DASHBOARD.php?user_modified=true');
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
</li><li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-button-style u-nav-link u-radius-14 u-text-active-grey-5 u-text-hover-custom-color-1 u-text-white" href="Login.php" style="padding: 10px 24px;">DASHBOARD</a><div class="u-nav-popup"><ul class="u-border-1 u-border-grey-30 u-h-spacing-20 u-nav u-unstyled u-v-spacing-10"><li class="u-nav-item"><a class="u-button-style u-grey-5 u-nav-link" href="Technician-DASHBOARD.php">Admin DASHBOARD</a>
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
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="User-DASHBOARD.php">DASHBOARD</a><div class="u-nav-popup"><ul class="u-border-1 u-border-grey-30 u-h-spacing-20 u-nav u-unstyled u-v-spacing-10"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Technician-DASHBOARD.php">Admin DASHBOARD</a>
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

<form action="Technician-Edit-Users.php" method="post" class="userform">
		<table>
      
    <tr>  
      <td>
        <p>
				  <label for="">Emp ID:</label>
				  <input type="text" name="user_id" <?php echo 'value="' . $user_id . '"'; ?> >
			  </p>
      </td>
      <td>
        <p>
				  <label for="">Type:</label>
				  <input type="text" name="type" <?php echo 'value="' . $type . '"'; ?> required>
			  </p>
      </td>

      <td>
			  <p>
				  <label for="">Full Name:</label>
				  <input type="text" name="full_name" <?php echo 'value="' . $full_name . '"'; ?> required>
			  </p>
      </td>

    </tr>
    <tr>
    
    <td>
			<p>
				<label for="">Email Address:</label>
				<input type="text" name="email" <?php echo 'value="' . $email . '"'; ?> required>
			</p>
    </td>
      
    <td>
			<p>
				<label for="">Mobile Number :</label>
				<input type="tel" name="mobile_number" <?php echo 'value="' . $mobile_number . '"'; ?> required>
			</p>
    </td>

    </tr>

    <tr>
    <td>
			<p>
				<label for="">Company ID NO:</label>
				<input type="text" name="company_id_no" <?php echo 'value="' . $company_id_no . '"'; ?> required>
			</p>
    </td>
      
    <td>
      <p>
				<label for="">Company Name:</label>
				<input type="text" name="company_name" <?php echo 'value="' . $company_name . '"'; ?> required>
			</p>
      </td>
    </tr>

    <tr>
      <td>
      <p>
        <label for="">Salary Complete Last Month :</label>
        <input type="text"  name="salary_complete_last_month" <?php echo 'value="' . $salary_complete_last_month . '"'; ?>>
      </p>
      </td>
    </tr>

    <tr>
      <td>
      <p>
				<label for="">items :</label>
				<select id="item" name="item" <?php echo 'value="' . $item . '"'; ?> form="add-user-form">
        <option value="Broom">Broom</option>
              <option value="Cleaning Liquid ">Cleaning Liquid</option>
              <option value="Mop">Mop</option>
              <option value="Cucket">Cucket</option>
        </select>
        <input type="number" id="item" name="item" <?php echo 'value="' . $item . '"'; ?> min="1" max="10">
			</p>
    </td>
    </tr>

    <tr>
      <td>
      <p>
      <label for="">working Place:</label>
				<!-- <select id="working_place" name="working_place"  form="add-user-form">
              <option value="WP1">WP1</option>
              <option value="WP2">WP2</option>
              <option value="WP3">WP3</option>
              <option value="WP4">WP4</option>
              <option value="WP5">WP5</option>
        </select> -->
        <input type="text" name='working_place' <?php echo 'value="' . $working_place . '"'; ?> >
      </p>
    </td>
    </tr>

    <tr>
      <td>
      <p>
				<label for="">Description :</label>
        <textarea  id="description" name="description" <?php echo 'value="' . $description . '"'; ?> rows="4" cols="50"></textarea>
			</p>
    </td>
    <td>
      <p>
      <label for="">Password :</label>
      <span>******</span> | <a href="change-password.php?user_id=<?php echo $user_id; ?>">Change Password</a></p>
    </td>
    
    <td>
			<!-- <p>
				<label for="">&nbsp;</label>
				<button class="u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-50 u-btn-1" type="submit" name="submit">Save</button>
        <br>
        <button class="u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-50 u-btn-1" type="reset" value="Reset">Clear</button>
        <a href="https://nicepage.studio" class="u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-50 u-btn-1">Save</a> -->
			</p>
      <p>
				<label for="">&nbsp;</label>
				<button type="submit" name="submit">Save</button>
			</p>
      <td>
      </tr>

      </table>

      

		</form>
    
    
    <!-- <div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-text u-text-1">
          <a class="u-border-none u-btn u-btn-round u-button-style u-custom-font u-font-arial u-hover-custom-color-1 u-radius-12 u-white u-btn-1" href="Admin-Edit-Users-.php">save</a>
        </p>
        <p class="u-text u-text-default u-text-2">Welcome <span style="text-decoration: underline !important;">Admin</span>
        </p>
        <div class="u-align-left u-container-style u-grey-5 u-group u-opacity u-opacity-75 u-radius-7 u-shape-round u-group-1">
          <div class="u-container-layout u-container-layout-1">
            <p class="u-align-left u-text u-text-default u-text-3">****************</p>
          </div>
        </div>
        <div class="u-container-style u-grey-5 u-group u-opacity u-opacity-75 u-radius-7 u-shape-round u-group-2">
          <div class="u-container-layout u-container-layout-2">
            <p class="u-align-left u-text u-text-default u-text-4">****************</p>
          </div>
        </div>
        <p class="u-text u-text-default u-text-5">Company ID No&nbsp; &nbsp; :</p>
        <p class="u-align-left u-text u-text-default u-text-6">Emp ID No&nbsp; &nbsp; :</p>
        <div class="u-container-style u-grey-5 u-group u-opacity u-opacity-75 u-radius-7 u-shape-round u-group-3">
          <div class="u-container-layout u-container-layout-3">
            <p class="u-align-left u-text u-text-default u-text-7">*************</p>
          </div>
        </div>
        <p class="u-align-left u-text u-text-default u-text-8">Full Name&nbsp; &nbsp; :</p>
        <div class="u-container-style u-grey-5 u-group u-opacity u-opacity-75 u-radius-7 u-shape-round u-group-4">
          <div class="u-container-layout u-valign-middle u-container-layout-4">
            <p class="u-text u-text-default u-text-9">****************</p>
          </div>
        </div>
        <p class="u-text u-text-default u-text-10">Place ID&nbsp; &nbsp; :</p>
        <div class="u-container-style u-grey-5 u-group u-opacity u-opacity-75 u-radius-7 u-shape-round u-group-5">
          <div class="u-container-layout u-container-layout-5">
            <p class="u-align-left u-text u-text-default u-text-11">**************</p>
          </div>
        </div>
        <p class="u-align-left u-text u-text-default u-text-12">Address&nbsp; &nbsp; :</p>
        <div class="u-container-style u-grey-5 u-group u-opacity u-opacity-75 u-radius-7 u-shape-round u-group-6">
          <div class="u-container-layout u-valign-bottom u-container-layout-6">
            <p class="u-text u-text-default u-text-13">**drop down list**</p>
          </div>
        </div>
        <p class="u-text u-text-default u-text-14">Last Month of&nbsp; Salary&nbsp; :</p>
        <img class="u-image u-image-round u-preserve-proportions u-radius-10 u-image-1" src="images/images.png" alt="" data-image-width="225" data-image-height="225">
        <p class="u-align-left u-text u-text-default u-text-15">Email Address&nbsp; &nbsp; :</p>
        <div class="u-align-left u-container-style u-grey-5 u-group u-opacity u-opacity-75 u-radius-7 u-shape-round u-group-7">
          <div class="u-container-layout u-container-layout-7">
            <p class="u-align-left u-text u-text-default u-text-16">***********</p>
          </div>
        </div>
        <div class="u-container-style u-grey-5 u-group u-opacity u-opacity-75 u-radius-7 u-shape-round u-group-8">
          <div class="u-container-layout u-valign-bottom u-container-layout-8">
            <p class="u-text u-text-default u-text-17">****************</p>
          </div>
        </div>
        <p class="u-text u-text-default u-text-18">Mobile Number&nbsp; &nbsp; :</p>
        <p class="u-text u-text-default u-text-19">Maximum upload file size is 100 MB</p>
        <a href="https://nicepage.com/ru/c/galereya-php-shablony" class="u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-50 u-btn-2">Save</a>
        <a href="https://nicepage.com/ru/c/galereya-php-shablony" class="u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-50 u-btn-3">Clear</a>
      </div>
    </section> -->
    
    
    <footer class="u-align-center u-clearfix u-custom-color-4 u-footer u-footer" id="sec-9213"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-align-center u-small-text u-text u-text-variant u-text-1"> https://vau.ac.lk/</p>
        <p class="u-align-left u-small-text u-text u-text-variant u-text-2">Cleaning Staff Schedule System</p>
      </div></footer>
    
  
</body></html>