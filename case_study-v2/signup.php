<?php 
    //Site key 6LcT3tUaAAAAAEmfoTwwAkZdJ5eWZTCOKPsJs7IG
    //Server/secret key 6LcT3tUaAAAAAELJ9s7fbxkED1ncR7FUJtSQPgxK
    include("database.php");
    //recaptcha function
    function reCaptcha($recaptcha){
      $secret = "6LcT3tUaAAAAAELJ9s7fbxkED1ncR7FUJtSQPgxK";
      $ip = $_SERVER['REMOTE_ADDR'];

      $postvars = array("secret"=>$secret, "response"=>$recaptcha, "remoteip"=>$ip);
      $url = "https://www.google.com/recaptcha/api/siteverify";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_TIMEOUT, 10);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
      $data = curl_exec($ch);
      curl_close($ch);

      return json_decode($data, true);
    }
 ?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Almon Waterpark</title>
    <style>
      :root {
        --primary-color: rgb(11, 78, 179);
      }

      *,
      *::before,
      *::after {
        box-sizing: border-box;
      }

      body {
        font-family: Montserrat, "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        display: grid;
        place-items: center;
        min-height: 100vh;
      }
      /* Global Stylings */
      label {
        display: block;
        margin-bottom: 0.5rem;
      }

      input {
        display: block;
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ccc;
        border-radius: 0.25rem;
      }

      .width-50 {
        width: 50%;
      }

      .ml-auto {
        margin-left: auto;
      }

      .text-center {
        text-align: center;
      }

      /* Progressbar */
      .progressbar {
        position: relative;
        display: flex;
        justify-content: space-between;
        counter-reset: step;
        margin: 2rem 0 4rem;
      }

      .progressbar::before,
      .progress {
        content: "";
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        height: 4px;
        width: 100%;
        background-color: #dcdcdc;
        z-index: -1;
      }
      body {
        font-family: Montserrat, "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        display: grid;
        place-items: center;
        min-height: 100vh;
      }

      .progress {
        background-color: var(--primary-color);
        width: 0%;
        transition: 0.3s;
      }

      .progress-step {
        width: 2.1875rem;
        height: 2.1875rem;
        background-color: #dcdcdc;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .progress-step::before {
        counter-increment: step;
        content: counter(step);
      }

      .progress-step::after {
        content: attr(data-title);
        position: absolute;
        top: calc(100% + 0.5rem);
        font-size: 0.85rem;
        color: #666;
      }

      .progress-step-active {
        background-color: var(--primary-color);
        color: #f3f3f3;
      }

      /* Form */
      .form {
        width: clamp(320px, 30%, 430px);
        margin: 0 auto;
        border: 1px solid #ccc;
        border-radius: 0.35rem;
        padding: 1.5rem;
      }

      .form-step {
        display: none;
        transform-origin: top;
        animation: animate 0.5s;
      }

      .form-step-active {
        display: block;
      }

      .input-group {
        margin: 2rem 0;
      }

      @keyframes animate {
        from {
          transform: scale(1, 0);
          opacity: 0;
        }
        to {
          transform: scale(1, 1);
          opacity: 1;
        }
      }

      /* Button */
      .btns-group {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
      }

      .btn:hover {
        box-shadow: 0 0 0 2px #fff, 0 0 0 3px var(--primary-color);
      }
    </style>
</head>
<body>

    <nav class="navbar fixed-top navbar-expand-sm navbar-light bg-light">
    <div class="container">
        <a href="index.php" class="navbar-brand mb-0 h1"><img class="d-inline-block align-top" src="pics/logo1.png" width="230" height="35"></a>
        <button type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler">
            <span class="navbar-toggler-icon"></span>   
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link active" href="index.php#home">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="index.php#pricing">Pricing</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="index.php#amenities">Amenities</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="index.php#about">About</a>
                </li>
            </ul>
        </div>
        <form class="d-flex">
            <a href="login.php"><button type="button" class="btn btn-outline-secondary">Sign in</button></a>
            <span class="material-icons md-36">account_circle</span>
        </form>
    </div>
    </nav> <br><br><br><br>

    <form action="#" class="form" method="POST" enctype="multipart/form-data">
    <center>
      <h1 class="text-center">Create an Account</h1>
      <!-- Progress bar -->
      <div class="progressbar">
        <div class="progress" id="progress"></div>
        
        <div
          class="progress-step progress-step-active"
          data-title=""
        ></div>
        <div class="progress-step" data-title=""></div>
        <div class="progress-step" data-title=""></div>
        <div class="progress-step" data-title=""></div>
      </div>

      <!-- Steps -->
      <div class="form-step form-step-active">
        <div class="input-group">
          <label>Username</label>
          <input type="text" name="user_id" required="" maxlength="10" />
        </div>
        <div class="input-group">
          <label>Password</label>
          <input type="password" name="user_password" required="" maxlength="10" />
        </div>
        <div class="">
          <a href="#" class="btn btn-next width-50 ml-auto">Next</a>
        </div>
      </div>
      <div class="form-step">
        <div class="input-group">
          <label>Email</label>
          <input type="email" name="user_email" required="" maxlength="255" />
        </div>
        <div class="input-group">
          <label>First name</label>
          <input type="text" name="user_fname" required="" maxlength="20" />
        </div>
        <div class="input-group">
          <label>Last name</label>
          <input type="text" name="user_lname" required="" maxlength="20" />
        </div>
        <div class="btns-group">
          <a href="#" class="btn btn-prev">Previous</a>
          <a href="#" class="btn btn-next">Next</a>
        </div>
      </div>
      <div class="form-step">
        <div class="input-group">
          <label>Age</label>
          <input type="text" name="user_age" required="" maxlength="2" />
        </div>
        <div class="input-group">
          <label>Gender</label>
            <select name="user_gender" required="">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div class="btns-group">
          <a href="#" class="btn btn-prev">Previous</a>
          <a href="#" class="btn btn-next">Next</a>
        </div>
      </div>
      <div class="form-step">
        <div class="input-group">
          <label>Phone Number</label>
          <input type="text" name="user_number" required="" maxlength="11" />
        </div>
        <div class="input-group">
          <label>I.D Picture</label>
          <input type="file" name="image" id="image"/>
          <h6 class="disclaimer">*Reservation will not be approved when ID is not valid.*</h6>
        </div>
        <div class="input-group">
          <label></label>
          <div class="g-recaptcha brochure__form__captcha" data-sitekey="6LcT3tUaAAAAAEmfoTwwAkZdJ5eWZTCOKPsJs7IG"></div>
        </div>
        <div class="btns-group">
          <a href="#" class="btn btn-prev">Previous</a>
          <input type="submit" name="submit" value="Create an Account" class="btn" />
        </div>
        <div><a class="signz" href="login.php">Already have an Account? Login here</a></div>
      </div>
  </center>
    </form>

        
    <?php 
            include ("logfunc.php");
            if ($_SERVER['REQUEST_METHOD'] === "POST") {

            if (isset($_POST['submit'])) {
                $user_fname = $_POST['user_fname'];
                $user_lname = $_POST['user_lname'];
                $user_age = $_POST['user_age'];
                $user_email = $_POST['user_email'];
                $user_number = $_POST['user_number'];
                $user_gender = $_POST['user_gender'];
                $user_id = $_POST['user_id'];
                $user_password = $_POST['user_password'];

                $recaptcha = $_POST['g-recaptcha-response'];
                $res = reCaptcha($recaptcha);
                if(!$res['success']){
                  $captcha_validation = "invalid";
                }
                else{
                    $captcha_validation = "valid";
                }
                //REGEX
                //Sanitizing user input and use of RegEx
                $names_pattern = "/^\s+|[0-9]+$/";
                if (preg_match($names_pattern, $user_fname) == 1) {  
                    $log1 = "User entered invalid first name";
                    $fname_validation = "invalid";
                }
                elseif(strlen($user_fname) > 20 || strlen($user_fname) < 2){
                    $log1 = "User entered invalid first name";
                    $fname_validation = "invalid";
                }
                else{
                    $log1 = "User entered valid first name";
                    $fname_validation = "valid";
                }
                if (preg_match($names_pattern, $user_lname) == 1) {  
                    $log2 = "User entered invalid last name";
                    $lname_validation = "invalid";
                }
                elseif(strlen($user_lname) > 20 || strlen($user_lname) < 2){
                    $log2 = "User entered invalid last name";
                    $lname_validation = "invalid";
                }
                else{
                    $log2 = "User entered valid last name";
                    $lname_validation = "valid";
                }

                $age_pattern = "/^[a-zA-Z]|\s+$/";
                if (preg_match($age_pattern, $user_age) == 1) {
                    $log3 = "User entered invalid age";
                    $age_validation = "invalid";
                }
                elseif(strlen($user_age) > 2 || strlen($user_age) < 1){
                    $log3 = "User entered invalid age";
                    $age_validation = "invalid";
                }
                else{
                    $log3 = "User entered valid age";
                    $age_validation = "valid";
                }

                $num_pattern = "/^09[0-9]+]$/";
                if (preg_match($num_pattern, $user_number) == 1) {
                    $log4 = "User entered invalid number";
                    $number_validation = "invalid" ;
                }
                elseif ($user_number != 11) {
                    $log4 = "User entered invalid number";
                    $number_validation = "invalid" ;
                }
                else{
                    $log4 = "User entered valid number";
                    $number_validation = "valid" ;
                } 

                if ($user_gender == "male" || $user_gender == "female" || $user_gender == "other") {
                    $log5 = "Sign up: User entered valid gender";
                    $gender_validation = "valid";
                }
                else{
                    $log5 = "User entered invalid gender";
                    $gender_validation = "invalid";
                }

                $email_pattern = "/^[a-zA-Z0-9\-\_\.]+@[a-zA-Z\d]+\.[a-zA-Z\.]+$/";
                if (preg_match($email_pattern, $user_email)) {
                    $log6 = "User entered valid email";
                    $email_validation = "valid";
                }
                else{
                    $log6 = "User entered invalid email";
                    $email_validation = "invalid";
                }

                $username_pattern = "/^.{5,10}$/";
                if (preg_match($username_pattern, $user_id) == 0) {
                    $log7 = "User entered invalid username";
                    $username_validation = "invalid";
                }
                else{
                    $log7 = "User entered valid username";
                    $username_validation = "valid";
                }
                
                $password_pattern = "/^.{5,10}$/";
                if (preg_match($password_pattern, $user_password) == 0) {
                    $log8 = "User entered invalid password";
                    $password_validation = "invalid";
                }
                else{
                    $log8 = "User entered valid password";
                    $password_validation = "valid";
                }

               $user_image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

                   


                

                $log = "Sign up: " . $log1 . " and " . $log2 . " and " . $log3 . " and " . $log4 . " and " . $log5 . " and " . $log6 . " and " . $log7 . " and " . $log8;
                logger($log);

                //Inserting data onto databasee :)
                if ($fname_validation == "valid" && $lname_validation == "valid" && $age_validation == "valid" && $gender_validation == "valid" && $email_validation == "valid" && $username_validation == "valid" && $password_validation == "valid" && $captcha_validation =="valid") {

                    $hashed_password = md5($user_password); //hashing method md5 and same in login page
    
                    $insert_into_db = mysqli_query($con, "INSERT INTO tbl_users (user_id, user_password, user_email, user_fname, user_lname, user_age, user_gender, user_number, user_image) VALUES ('$user_id', '$hashed_password', '$user_email', '$user_fname', '$user_lname', '$user_age', '$user_gender', '$user_number', '$user_image')");
                    //$insert_into_db = mysqli_query($con, "INSERT INTO tbl_users (user_fname, user_lname, user_age, user_gender, user_email, user_id, user_password, user_number) VALUES ('$user_fname', '$user_lname', '$user_age', '$user_gender', '$user_email', '$user_id', '$hashed_password', '$user_number')");
                    //parameters of mysqli_query();
                    //connection - $con
                    //database query - ......
                    if (!$insert_into_db) {
                        die("unable to save!");
                    }
                    else{
                        echo "<div class='alert alert-success alert-dismissible fade show fixed-top'>
                                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                <center>
                                <strong>Successfully created an account.</strong>
                                <div class='spinner-border'></div>
                                </center>
                              </div>";

                    }
                }
                else{
                    echo "<div class='alert alert-danger alert-dismissible fade show fixed-top'>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                            <center>
                            <strong>There's something wrong with your input.</strong>
                            <div class='spinner-border'></div>
                            </center>
                          </div>";
                }

            }
            } 
         ?>
































    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

 
</body>
</html>

<script type="text/javascript">
  const prevBtns = document.querySelectorAll(".btn-prev");
const nextBtns = document.querySelectorAll(".btn-next");
const progress = document.getElementById("progress");
const formSteps = document.querySelectorAll(".form-step");
const progressSteps = document.querySelectorAll(".progress-step");

let formStepsNum = 0;

nextBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    formStepsNum++;
    updateFormSteps();
    updateProgressbar();
  });
});

prevBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    formStepsNum--;
    updateFormSteps();
    updateProgressbar();
  });
});

function updateFormSteps() {
  formSteps.forEach((formStep) => {
    formStep.classList.contains("form-step-active") &&
      formStep.classList.remove("form-step-active");
  });

  formSteps[formStepsNum].classList.add("form-step-active");
}

function updateProgressbar() {
  progressSteps.forEach((progressStep, idx) => {
    if (idx < formStepsNum + 1) {
      progressStep.classList.add("progress-step-active");
    } else {
      progressStep.classList.remove("progress-step-active");
    }
  });

  const progressActive = document.querySelectorAll(".progress-step-active");

  progress.style.width =
    ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
}
</script>