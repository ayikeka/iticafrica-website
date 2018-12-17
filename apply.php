<?php
  require "config/config.php";

  //Registration codes
  $error = error_reporting(E_ALL);
  //Personal Info
  $fname = "";
  $lname = "";
  $oname = "";
  $m_status = "";
  $sex = "";
  $country = "";
  $d_o_b = "";
  $email = "";
  $number = "";
  // Course Info
  $name_org = "";
  $e_address = "";
  $e_city = "";
  $phone_work = "";
  $office_email = "";
  // Specification Info
  $course_title = "";
  $course_duration = "";
  $venue_preferred = "";
  $date_course = "";
  $error = array();

  if (isset($_POST['reg_button'])) {
    //First name
    $fname = strip_tags($_POST['f_name']);
    $fname = str_replace(' ', '', $fname);
    $fname = ucfirst(strtolower($fname));

    //Second name
    $lname = strip_tags($_POST['l_name']);
    $lname = str_replace(' ', '', $lname);
    $lname = ucfirst(strtolower($lname));

    //Other name
    $oname = strip_tags($_POST['o_name']);
    $oname = str_replace(' ', '', $oname);
    $oname = ucfirst(strtolower($oname));

    //Married Status
    $m_status = strip_tags($_POST['m_status']);
    $m_status = ucfirst(strtolower($m_status));

    //Sex
    $sex = strip_tags($_POST['sex']);
    $sex = ucfirst(strtolower($sex));

    //email
    $email = strip_tags($_POST['email']);
    $email = str_replace(' ', '', $email);
    $email = ucfirst(strtolower($email));

    //Country
    $country = strip_tags($_POST['country']);
    $country = ucfirst(strtolower($country));

    //Number
    $number = strip_tags($_POST['number']);
    $number = str_replace(' ', '', $number);
    
    // Course
    $course = strip_tags($_POST['course']);
    $course = str_replace(' ', '', $course);
    $course = ucfirst(strtolower($course));

    // Date of Birth
    $d_o_b = strip_tags($_POST['d_o_b']);
    
    // Course Information Section

    //Name of organization
    $name_org = strip_tags($_POST['name_org']);
    $name_org = str_replace(' ', '', $name_org);
    $name_org = ucfirst(strtolower($name_org));

    // Employer Address
    $e_address = strip_tags($_POST['e_address']);
    $e_address = str_replace(' ', '', $e_address);
    $e_address = ucfirst(strtolower($e_address));
    
    // Emplyer City
    $e_city = strip_tags($_POST['e_city']);
    $e_city = str_replace(' ', '', $e_city);
    $e_city = ucfirst(strtolower($e_city));

    //PHone Work
    $phone_work = strip_tags($_POST['phone_work']);
    $phone_work = str_replace(' ', '', $phone_work);

    // Office Email
    $office_email = strip_tags($_POST['office_email']);
    $office_email = str_replace(' ', '', $office_email);
    $office_email = ucfirst(strtolower($office_email));

    // Application Specification
    $course_title = strip_tags($_POST['course_title']);
    $course_title = str_replace(' ', '', $course_title);
    $course_title = ucfirst(strtolower($course_title));

    // Course Duration
    $course_duration = strip_tags($_POST['course_duration']);
    $course_duration = str_replace(' ', '', $course_duration);
    $course_duration = ucfirst(strtolower($course_duration));

    // Venue Preferred
    $venue_preferred = strip_tags($_POST['venue_preferred']);
    $venue_preferred = str_replace(' ', '', $venue_preferred);
    $venue_preferred = ucfirst(strtolower($venue_preferred));

    // Date Course
    $date_course = strip_tags($_POST['date_course']);
    
    // Date
    $date = date('Y-m-d');

    $e_check = mysqli_query($connection, "SELECT email FROM members WHERE email='$email'");
    $num_rows =mysqli_num_rows($e_check);

  if ($num_rows > 0) {

    array_push($error, "<span style='color:rgb(245, 65, 38); text-align: center;'>Email already exists <br></span><br>");

  }else{

      $query = mysqli_query($connection, "INSERT INTO members VALUES('', '$fname', '$lname', '$email', '$country', '$number', '$date', '$course', '$name_org', '$date_course' ) " );

      array_push($error, "<span style='color:rgb(255, 85, 85); text-align: center;'>Thank you for registering!</span><br>");
  }
}
 ?>

                <?php
                  // Including footer  files 
                  include("./templates/header.php"); 
                ?>  

                    <ul>
                      <li><a href="index.php">Home</a></li>
                      <li><a href="services.php">Services</a></li>
                      <li class="dropdown">
                          <a href="javascript:void(0)" >Course details <i class="fa fa-caret-down"></i></a>
                          <div class="dropdown-content">
                            <a  href="course-schedule.php" >Course Schedule</a>
                            <a href="course-packages.php">Course Fees</a>
                            <a href="index.php#mid-sub-section">UpComing Events</a>
                          </div>
                      </li>
                      <li><a href="special-programs.php">Special Programs</a></li>
                      <li><a href="contact-us.php">Contact Us</a></li>
                      <li class="current"><a href="apply.php">Apply</a></li>
                      <li><a href="about.php">About</a></li>
                  </ul>
                  </nav>
          </header>
        </div>
        <div class="slideshow-container-lg">
            <div class="wrapper">
              <div class="outer-wrapper" >
                <div class="inner-wrapper">
                     <?php
                        if(in_array("<span style='color:rgb(255, 85, 85); text-align: center;'>Thank you for registering!</span><br>", $error)){
                             echo "<span style='color:rgb(21, 239, 239); font-size: 20px;'>". $fname .", thank you for registering we'll contact you very shortly. </span><br>" ;
                          }

                          if(in_array("<span style='color:rgb(245, 65, 38); text-align: center;'>Email already exists <br></span><br>", $error)){
                               echo "<span style='color:rgb(245, 65, 38); text-align: center;'>Email already exists, your registration has gone through ! <br></span><br>" ;
                          }
                        ?>
                  <div class="form-wrapper">
                    <form action="apply.php" method="POST">
                      <div class="personal-info" >
                        <div class="info-head"><h3>Personal Information</h3></div>
                        <label><strong>First Name</strong></label>
                        <input type="text" name="f_name" placeholder="First Name" required>
                        <label><strong>Last Name</strong></label>
                        <input type="text" name="l_name" placeholder="Last Name" required>
                        <label><strong>Other Name</strong></label>
                        <input type="text" name="o_name" placeholder="Other Name" required><br>
                        <label><strong>Sex</strong></label>
                        <select name="sex" required>
                          <option disabled selected>-- Sex --</option>
                          <option value="Male" >Male</option>
                          <option value="Female" >Female</option>
                        </select>
                        <label><strong>Marital Status</strong></label>
                        <select name="m_status" required>
                          <option disabled selected>Marital Status</option>
                          <option value="Single" >Single</option>
                          <option value="Married" >Married</option>
                          <option value="Divorced" >Divorced</option>
                        </select>
                        <label><strong>Country</strong></label>
                        <select name="country" required>
                          <option disabled selected>--Choose Country --</option>
                          <option value='Algeria' >Algeria</option>
                          <option value='Angola' >Angola</option>
                          <option value='Benin' >Benin</option>
                          <option value='Bostwana' >Botswana</option>
                          <option value='Burkina Faso' >Burkina Faso</option>
                          <option value="Dubai" >Dubai</option>
                          <option value='Gabon' >Gabon</option>
                          <option value='Gambia' >Gambia</option>
                          <option value='Ghana' >Ghana</option>
                          <option value='Guinea' >Guinea</option>
                          <option value='Guinea-Bissau' >Guinea-Bissau</option>
                          <option value='Kenya' >Kenya</option>
                          <option value="Mauritius" >Mauritius</option>
                          <option value='Namibia' >Namibia</option>
                          <option value='Nigeria' >Nigeria</option>
                          <option value='Rwanda' >Rwanda</option>
                          <option value='South Africa' >South Africa</option>
                          <option value="Sierra Leone" >Sierra Leone</option>
                          <option value='Tanzania' >Tanzania</option>
                          <option value='Togo' >Togo</option>
                          <option value="Uganda" >Uganda</option>
                          <option value='Zambia' >Zambia</option>
                          <option value='Zimbabwe' >Zimbabwe</option>
                        </select><br>
                        <label><strong>Date of Birth</strong></label>
                        <input type="date" name="d_o_b" placeholder="Date of Course" required>
                        <label><strong>Email</strong></label>
                        <input type="email" name="email" placeholder="Email" required>
                        <label><strong>Phone Number</strong></label>
                        <input type="number" name="number" placeholder="Phone Number" required><br>
                      </div>
                      <div class="job-info">
                          <div class="info-head"><h3>Job Information</h3></div>
                          <label><strong>Name of Organization</strong></label>
                          <input type="text" name="name_org" placeholder="Name of Organization" required>
                          <label><strong>Employer Address</strong></label>
                          <input type="text" name="e_address" placeholder="Employer Address" required>
                          <label><strong>City</strong></label>
                          <input type="text" name="e_city" placeholder="City" required><br>
                          <label><strong>Country</strong></label>
                          <select name="e-country" required>
                            <option disabled selected>--Choose Country --</option>
                            <option value='Algeria' >Algeria</option>
                            <option value='Angola' >Angola</option>
                            <option value='Benin' >Benin</option>
                            <option value='Bostwana' >Botswana</option>
                            <option value='Burkina Faso' >Burkina Faso</option>
                            <option value="Dubai" >Dubai</option>
                            <option value='Gabon' >Gabon</option>
                            <option value='Gambia' >Gambia</option>
                            <option value='Ghana' >Ghana</option>
                            <option value='Guinea' >Guinea</option>
                            <option value='Guinea-Bissau' >Guinea-Bissau</option>
                            <option value='Kenya' >Kenya</option>
                            <option value="Mauritius" >Mauritius</option>
                            <option value='Namibia' >Namibia</option>
                            <option value='Nigeria' >Nigeria</option>
                            <option value='Rwanda' >Rwanda</option>
                            <option value='South Africa' >South Africa</option>
                            <option value="Sierra Leone" >Sierra Leone</option>
                            <option value='Tanzania' >Tanzania</option>
                            <option value='Togo' >Togo</option>
                            <option value="Uganda" >Uganda</option>
                            <option value='Zambia' >Zambia</option>
                            <option value='Zimbabwe' >Zimbabwe</option>
                          </select>
                          <label><strong>Office Phone</strong></label>
                          <input type="text" name="phone_work" placeholder="Phone Work" required>
                          <label><strong>Office Email</strong></label>
                          <input type="email" name="office_email" placeholder="Email" required>
                      </div>
                      <div class="application-spec-info">
                        <div class="info-head"><h3>Course Specification</h3></div>
                          <label><strong>Course Title</strong></label>
                          <input type="text" name="course_title" placeholder="Course title" required>
                          <label><strong>Course Duration</strong></label>
                          <select name="course_duration" required>
                            <option disabled selected>Course Duration</option>
                            <option value="Single" >One Week</option>
                            <option value="Married" >Two Weeks</option>
                          </select>
                          <label><strong>Venue Preferred</strong></label>
                          <input type="text" name="venue_preferred" placeholder="Venue Preferred" required><br>
                          <label><strong>Date of Course</strong></label>
                          <input type="date" name="date_course" placeholder="Date of Course" required>
                      </div>
                      
                      <button class="submit-btn" name='reg_button' >Submit Information</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
     <?php
      // Including footer  files 
      include("./templates/footer.php"); 
    ?>  

