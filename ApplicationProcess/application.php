<?php
session_start();
include 'database_inc.php';
$_SESSION['check'] = "checkcompltedli1I";
$email = $_SESSION['applicantEmail'];
$id = $_SESSION['applicantid'];
#UNCOMMENT THE CODE BELOW!!!
    if ($_SESSION['readytogo'] != True) {
      header('location:loginorsignup.php');
    };
    $_SESSION['readytogo'] = False;
    $result = mysqli_query($connect,
    "SELECT * FROM applicants WHERE id = '$id';");
    if (mysqli_num_rows($result) == 0) {
    $_SESSION['incorrectlogin'] = True;
    header('location:login.php');
}   while ($row = mysqli_fetch_array($result)) {
    if ($row['status'] != "completed") {
        $test = "";
    } else {
        header('location:applicationCompleted.php');
    }
    $citizenship = $row['citizenship'];
    $contact_number = $row['contact_number'];
    $date_of_birth = $row['date_of_birth'];
    $gender = $row['gender'];
    $marrital_status = $row['marrital_status'];
    $country = $row['country'];
    $city = $row['city'];
    $type_of_diploma = $row['type_of_diploma'];
    $diploma_date = $row['diploma_date'];
    $final_Grade = $row['final_Grade'];
    $desired_major = $row['desired_major'];
    $first_time_applicant = $row['first_time_applicant'];
    $learning_disability = $row['learning_disability'];
    $career_aspirations = $row['career_aspirations'];
    $guardian_one_name = $row['guardian_one_name'];
    $guardian_one_life = $row['guardian_one_life'];
    $guardian_one_relationship = $row['guardian_one_relationship'];
    $guardian_one_phone_number = $row['guardian_one_phone_number'];
    $guardian_one_email = $row['guardian_one_email'];
    $guardian_one_education = $row['guardian_one_education'];
    $guardian_one_employer = $row['guardian_one_employer'];
    $guardian_one_job_title = $row['guardian_one_job_title'];
    $guardian_two_name = $row['guardian_two_name'];
    $guardian_two_life = $row['guardian_two_life'];
    $guardian_two_relationship = $row['guardian_two_relationship'];
    $guardian_two_phone_number = $row['guardian_two_phone_number'];
    $guardian_two_email = $row['guardian_two_email'];
    $guardian_two_education = $row['guardian_two_education'];
    $guardian_two_employer = $row['guardian_two_employer'];
    $guardian_two_job_title = $row['guardian_two_job_title'];
    $scholarship = $row['scholarship'];
    $family_at_adu = $row['family_at_adu'];
    $essay_answer = $row['essay_answer'];
    $other_applications = $row['other_applications'];
    $source = $row['source'];
}
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Apply to A.D.U.</title>
    <link rel="icon" href="https://i.imgur.com/M3Tvgrs.png">
    <?php
    include 'navbarApplication.php';
    ?>
    <style type="text/css">
    body, html {
  height: 100%;
}

body {  background-image: url(https://i.imgur.com/TeCMWmk.jpg?1);
        height: 100%; 
        /*width: 100%;*/
        /*background-attachment:fixed;*/
        background-position: top;
        background-repeat: no-repeat;
        background-size: cover; 
      }
.btn-brown {
    background-color: #98141e;
    color: white;
}
.btn-brown:hover {
    background-color: #a85d58;
    color: white;
}
}
</style>
<script>         
        var alertDeletedBool = false;
        var alertWrongFileBool = false;
        var alertSavedBool = false;
        var alertNormalBool = false;
        var alertFileToBigBool = false;
        var removeFileFieldOneBool = false;
        var removeFileFieldTwoBool = false;
        var removeFileFieldThreeBool = false;
        var removeFileFieldFourBool = false;
        var removeFileFieldFiveBool = false;
        var removeFileFieldSixBool = false;
</script>
  </head>
  <body onload="changeLanguageOnLoad()">
    <div style="font-family: Verdana">
    <br>
    <div class="bg-image">
      <div id="intro" class="row">
          <!-- <div class="col-md-6"> -->
            <div class="col-md-8 offset-md-2">
              <div class="card">
                <div class="card-body">
                    <?php
                    if($_SESSION['applicationSave']==True) {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert" id="alertSaved">
                      Your application was saved successfully, you can come back and finish it later!
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <script type="text/javascript">alertSavedBool = true;</script>
                    <?php
                    $_SESSION['applicationSave'] = False;
                    } else if($_SESSION['fileremoved']==True) {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <div id="alertDeleted">Your file was successfully deleted!</div>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <script type="text/javascript">alertDeletedBool = true;</script>
                    <?php
                    $_SESSION['fileremoved'] = False;
                    }else if($_SESSION['wrongfiletype']==True) {
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <div id="alertWrongFile">Sorry, please choose a file that is either a .pdf, .jpg, or .png</div>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <script type="text/javascript">alertWrongFileBool = true;</script>
                    <?php
                    $_SESSION['wrongfiletype'] = False;
                    }else if($_SESSION['filetobig']==True) {
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <div id="alertFileToBig">Sorry, file size is to big, cannot exceed 5MB</div>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <script type="text/javascript">alertFileToBigBool = true;</script>
                    <?php
                    $_SESSION['filetobig'] = False;
                    } else {
                        ?> 
                    <div class="alert alert-success alert-dismissible fade show" role="alert" id="alertNormal">
                      Remember you can always save your application and come back to it later!
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <script type="text/javascript">alertNormalBool = true;</script>
                    <?php
                    }
                    ?>
                            <form action="applicationProcess.php" method="POST" id="applicationForm" enctype="multipart/form-data">
                              <h4 class="card-title" id="headerOne">Personal Information</h4>
                          <div class="form-group">
                            <label for="citizenship" id="citizenshipField">Citizenship*</label>
                            <select id="citizenship" name="citizenship" class="custom-select" required>
                                 <option value="" id="citizenshipOption">Country of Citizenship</option>
                                 <option value="Afganistan">Afghanistan</option>
                                 <option value="Albania">Albania</option>
                                 <option value="Algeria">Algeria</option>
                                 <option value="American Samoa">American Samoa</option>
                                 <option value="Andorra">Andorra</option>
                                 <option value="Angola">Angola</option>
                                 <option value="Anguilla">Anguilla</option>
                                 <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                 <option value="Argentina">Argentina</option>
                                 <option value="Armenia">Armenia</option>
                                 <option value="Aruba">Aruba</option>
                                 <option value="Australia">Australia</option>
                                 <option value="Austria">Austria</option>
                                 <option value="Azerbaijan">Azerbaijan</option>
                                 <option value="Bahamas">Bahamas</option>
                                 <option value="Bahrain">Bahrain</option>
                                 <option value="Bangladesh">Bangladesh</option>
                                 <option value="Barbados">Barbados</option>
                                 <option value="Belarus">Belarus</option>
                                 <option value="Belgium">Belgium</option>
                                 <option value="Belize">Belize</option>
                                 <option value="Benin">Benin</option>
                                 <option value="Bermuda">Bermuda</option>
                                 <option value="Bhutan">Bhutan</option>
                                 <option value="Bolivia">Bolivia</option>
                                 <option value="Bonaire">Bonaire</option>
                                 <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                 <option value="Botswana">Botswana</option>
                                 <option value="Brazil">Brazil</option>
                                 <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                 <option value="Brunei">Brunei</option>
                                 <option value="Bulgaria">Bulgaria</option>
                                 <option value="Burkina Faso">Burkina Faso</option>
                                 <option value="Burundi">Burundi</option>
                                 <option value="Cambodia">Cambodia</option>
                                 <option value="Cameroon">Cameroon</option>
                                 <option value="Canada">Canada</option>
                                 <option value="Canary Islands">Canary Islands</option>
                                 <option value="Cape Verde">Cape Verde</option>
                                 <option value="Cayman Islands">Cayman Islands</option>
                                 <option value="Central African Republic">Central African Republic</option>
                                 <option value="Chad">Chad</option>
                                 <option value="Channel Islands">Channel Islands</option>
                                 <option value="Chile">Chile</option>
                                 <option value="China">China</option>
                                 <option value="Christmas Island">Christmas Island</option>
                                 <option value="Cocos Island">Cocos Island</option>
                                 <option value="Colombia">Colombia</option>
                                 <option value="Comoros">Comoros</option>
                                 <option value="Congo">Congo</option>
                                 <option value="Cook Islands">Cook Islands</option>
                                 <option value="Costa Rica">Costa Rica</option>
                                 <option value="Cote DIvoire">Cote DIvoire</option>
                                 <option value="Croatia">Croatia</option>
                                 <option value="Cuba">Cuba</option>
                                 <option value="Curaco">Curacao</option>
                                 <option value="Cyprus">Cyprus</option>
                                 <option value="Czech Republic">Czech Republic</option>
                                 <option value="Denmark">Denmark</option>
                                 <option value="Djibouti">Djibouti</option>
                                 <option value="Dominica">Dominica</option>
                                 <option value="Dominican Republic">Dominican Republic</option>
                                 <option value="East Timor">East Timor</option>
                                 <option value="Ecuador">Ecuador</option>
                                 <option value="Egypt">Egypt</option>
                                 <option value="El Salvador">El Salvador</option>
                                 <option value="Equatorial Guinea">Equatorial Guinea</option>
                                 <option value="Eritrea">Eritrea</option>
                                 <option value="Estonia">Estonia</option>
                                 <option value="Ethiopia">Ethiopia</option>
                                 <option value="Falkland Islands">Falkland Islands</option>
                                 <option value="Faroe Islands">Faroe Islands</option>
                                 <option value="Fiji">Fiji</option>
                                 <option value="Finland">Finland</option>
                                 <option value="France">France</option>
                                 <option value="French Guiana">French Guiana</option>
                                 <option value="French Polynesia">French Polynesia</option>
                                 <option value="French Southern Ter">French Southern Ter</option>
                                 <option value="Gabon">Gabon</option>
                                 <option value="Gambia">Gambia</option>
                                 <option value="Georgia">Georgia</option>
                                 <option value="Germany">Germany</option>
                                 <option value="Ghana">Ghana</option>
                                 <option value="Gibraltar">Gibraltar</option>
                                 <option value="Great Britain">Great Britain</option>
                                 <option value="Greece">Greece</option>
                                 <option value="Greenland">Greenland</option>
                                 <option value="Grenada">Grenada</option>
                                 <option value="Guadeloupe">Guadeloupe</option>
                                 <option value="Guam">Guam</option>
                                 <option value="Guatemala">Guatemala</option>
                                 <option value="Guinea">Guinea</option>
                                 <option value="Guyana">Guyana</option>
                                 <option value="Haiti">Haiti</option>
                                 <option value="Hawaii">Hawaii</option>
                                 <option value="Honduras">Honduras</option>
                                 <option value="Hong Kong">Hong Kong</option>
                                 <option value="Hungary">Hungary</option>
                                 <option value="Iceland">Iceland</option>
                                 <option value="Indonesia">Indonesia</option>
                                 <option value="India">India</option>
                                 <option value="Iran">Iran</option>
                                 <option value="Iraq">Iraq</option>
                                 <option value="Ireland">Ireland</option>
                                 <option value="Isle of Man">Isle of Man</option>
                                 <option value="Israel">Israel</option>
                                 <option value="Italy">Italy</option>
                                 <option value="Jamaica">Jamaica</option>
                                 <option value="Japan">Japan</option>
                                 <option value="Jordan">Jordan</option>
                                 <option value="Kazakhstan">Kazakhstan</option>
                                 <option value="Kenya">Kenya</option>
                                 <option value="Kiribati">Kiribati</option>
                                 <option value="Korea North">Korea North</option>
                                 <option value="Korea Sout">Korea South</option>
                                 <option value="Kuwait">Kuwait</option>
                                 <option value="Kyrgyzstan">Kyrgyzstan</option>
                                 <option value="Laos">Laos</option>
                                 <option value="Latvia">Latvia</option>
                                 <option value="Lebanon">Lebanon</option>
                                 <option value="Lesotho">Lesotho</option>
                                 <option value="Liberia">Liberia</option>
                                 <option value="Libya">Libya</option>
                                 <option value="Liechtenstein">Liechtenstein</option>
                                 <option value="Lithuania">Lithuania</option>
                                 <option value="Luxembourg">Luxembourg</option>
                                 <option value="Macau">Macau</option>
                                 <option value="Macedonia">Macedonia</option>
                                 <option value="Madagascar">Madagascar</option>
                                 <option value="Malaysia">Malaysia</option>
                                 <option value="Malawi">Malawi</option>
                                 <option value="Maldives">Maldives</option>
                                 <option value="Mali">Mali</option>
                                 <option value="Malta">Malta</option>
                                 <option value="Marshall Islands">Marshall Islands</option>
                                 <option value="Martinique">Martinique</option>
                                 <option value="Mauritania">Mauritania</option>
                                 <option value="Mauritius">Mauritius</option>
                                 <option value="Mayotte">Mayotte</option>
                                 <option value="Mexico">Mexico</option>
                                 <option value="Midway Islands">Midway Islands</option>
                                 <option value="Moldova">Moldova</option>
                                 <option value="Monaco">Monaco</option>
                                 <option value="Mongolia">Mongolia</option>
                                 <option value="Montserrat">Montserrat</option>
                                 <option value="Morocco">Morocco</option>
                                 <option value="Mozambique">Mozambique</option>
                                 <option value="Myanmar">Myanmar</option>
                                 <option value="Nambia">Nambia</option>
                                 <option value="Nauru">Nauru</option>
                                 <option value="Nepal">Nepal</option>
                                 <option value="Netherland Antilles">Netherland Antilles</option>
                                 <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                 <option value="Nevis">Nevis</option>
                                 <option value="New Caledonia">New Caledonia</option>
                                 <option value="New Zealand">New Zealand</option>
                                 <option value="Nicaragua">Nicaragua</option>
                                 <option value="Niger">Niger</option>
                                 <option value="Nigeria">Nigeria</option>
                                 <option value="Niue">Niue</option>
                                 <option value="Norfolk Island">Norfolk Island</option>
                                 <option value="Norway">Norway</option>
                                 <option value="Oman">Oman</option>
                                 <option value="Pakistan">Pakistan</option>
                                 <option value="Palau Island">Palau Island</option>
                                 <option value="Palestine">Palestine</option>
                                 <option value="Panama">Panama</option>
                                 <option value="Papua New Guinea">Papua New Guinea</option>
                                 <option value="Paraguay">Paraguay</option>
                                 <option value="Peru">Peru</option>
                                 <option value="Phillipines">Philippines</option>
                                 <option value="Pitcairn Island">Pitcairn Island</option>
                                 <option value="Poland">Poland</option>
                                 <option value="Portugal">Portugal</option>
                                 <option value="Puerto Rico">Puerto Rico</option>
                                 <option value="Qatar">Qatar</option>
                                 <option value="Republic of Montenegro">Republic of Montenegro</option>
                                 <option value="Republic of Serbia">Republic of Serbia</option>
                                 <option value="Reunion">Reunion</option>
                                 <option value="Romania">Romania</option>
                                 <option value="Russia">Russia</option>
                                 <option value="Rwanda">Rwanda</option>
                                 <option value="St Barthelemy">St Barthelemy</option>
                                 <option value="St Eustatius">St Eustatius</option>
                                 <option value="St Helena">St Helena</option>
                                 <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                 <option value="St Lucia">St Lucia</option>
                                 <option value="St Maarten">St Maarten</option>
                                 <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                 <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                 <option value="Saipan">Saipan</option>
                                 <option value="Samoa">Samoa</option>
                                 <option value="Samoa American">Samoa American</option>
                                 <option value="San Marino">San Marino</option>
                                 <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                 <option value="Saudi Arabia">Saudi Arabia</option>
                                 <option value="Senegal">Senegal</option>
                                 <option value="Seychelles">Seychelles</option>
                                 <option value="Sierra Leone">Sierra Leone</option>
                                 <option value="Singapore">Singapore</option>
                                 <option value="Slovakia">Slovakia</option>
                                 <option value="Slovenia">Slovenia</option>
                                 <option value="Solomon Islands">Solomon Islands</option>
                                 <option value="Somalia">Somalia</option>
                                 <option value="South Africa">South Africa</option>
                                 <option value="Spain">Spain</option>
                                 <option value="Sri Lanka">Sri Lanka</option>
                                 <option value="Sudan">Sudan</option>
                                 <option value="Suriname">Suriname</option>
                                 <option value="Swaziland">Swaziland</option>
                                 <option value="Sweden">Sweden</option>
                                 <option value="Switzerland">Switzerland</option>
                                 <option value="Syria">Syria</option>
                                 <option value="Tahiti">Tahiti</option>
                                 <option value="Taiwan">Taiwan</option>
                                 <option value="Tajikistan">Tajikistan</option>
                                 <option value="Tanzania">Tanzania</option>
                                 <option value="Thailand">Thailand</option>
                                 <option value="Togo">Togo</option>
                                 <option value="Tokelau">Tokelau</option>
                                 <option value="Tonga">Tonga</option>
                                 <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                 <option value="Tunisia">Tunisia</option>
                                 <option value="Turkey">Turkey</option>
                                 <option value="Turkmenistan">Turkmenistan</option>
                                 <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                 <option value="Tuvalu">Tuvalu</option>
                                 <option value="Uganda">Uganda</option>
                                 <option value="United Kingdom">United Kingdom</option>
                                 <option value="Ukraine">Ukraine</option>
                                 <option value="United Arab Erimates">United Arab Emirates</option>
                                 <option value="United States of America">United States of America</option>
                                 <option value="Uraguay">Uruguay</option>
                                 <option value="Uzbekistan">Uzbekistan</option>
                                 <option value="Vanuatu">Vanuatu</option>
                                 <option value="Vatican City State">Vatican City State</option>
                                 <option value="Venezuela">Venezuela</option>
                                 <option value="Vietnam">Vietnam</option>
                                 <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                 <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                 <option value="Wake Island">Wake Island</option>
                                 <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                 <option value="Yemen">Yemen</option>
                                 <option value="Zaire">Zaire</option>
                                 <option value="Zambia">Zambia</option>
                                 <option value="Zimbabwe">Zimbabwe</option>
                              </select>
                          </div>
                          <div class="form-group">
                            <label for="contact_number" id="contactNumberField">Contact Number, Phone or Whatsapp(include country code)*</label>
                            <input type="text" name="contact_number" class="form-control" id="contact_number" value="<?php echo $contact_number; ?>" placeholder="Enter a number to contact you (Phone or Whatsapp)" required="">
                          </div>
                          <div class="form-group">
                            <label for="date_of_birth" id="DateOfBirthField">Date of Birth*</label>
                            <input type="text" name="date_of_birth" class="form-control" id="date_of_birth" value="<?php echo $date_of_birth; ?>" placeholder="DD/MM/YY (eg. 04/11/1996)" required="">
                          </div>
                          <div class="form-group">
                            <label for="citizenship" id="genderField">Gender*</label>
                              <select class="custom-select" name="gender" id="gender" required>
                                <option value="" selected id="genderOption">Select your Gender</option>
                                <option value="Female" id="femaleOption">Female</option>
                                <option value="Male" id="maleOption">Male</option>
                                <option value="Other" id="otherOption">Other</option>
                              </select>
                            </label>
                          </div>
                          <div class="form-group">
                            <label for="marrital_status" id="marritalStatusField">Marrital Status</label>
                              <select class="custom-select" name="marrital_status" id="marrital_status">
                                <option value="" selected id="marritalStatusOption">Are you single, married or divorced?</option>
                                <option value="Married" id="marriedOption">Married</option>
                                <option value="Single" id="singleOption">Single</option>
                                <option value="divorced" id="divorcedOption">Divorced</option>
                              </select>
                            </label>
                          </div>
                          <div class="form-group">
                            <label for="country" id="countryOfResidenceField">Country of Residence*</label>
                            <select id="country" name="country" class="custom-select" required>
                                 <option value="" id="countryOfResidenceOption">Country of Residence</option>
                                 <option value="Afganistan">Afghanistan</option>
                                 <option value="Albania">Albania</option>
                                 <option value="Algeria">Algeria</option>
                                 <option value="American Samoa">American Samoa</option>
                                 <option value="Andorra">Andorra</option>
                                 <option value="Angola">Angola</option>
                                 <option value="Anguilla">Anguilla</option>
                                 <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                 <option value="Argentina">Argentina</option>
                                 <option value="Armenia">Armenia</option>
                                 <option value="Aruba">Aruba</option>
                                 <option value="Australia">Australia</option>
                                 <option value="Austria">Austria</option>
                                 <option value="Azerbaijan">Azerbaijan</option>
                                 <option value="Bahamas">Bahamas</option>
                                 <option value="Bahrain">Bahrain</option>
                                 <option value="Bangladesh">Bangladesh</option>
                                 <option value="Barbados">Barbados</option>
                                 <option value="Belarus">Belarus</option>
                                 <option value="Belgium">Belgium</option>
                                 <option value="Belize">Belize</option>
                                 <option value="Benin">Benin</option>
                                 <option value="Bermuda">Bermuda</option>
                                 <option value="Bhutan">Bhutan</option>
                                 <option value="Bolivia">Bolivia</option>
                                 <option value="Bonaire">Bonaire</option>
                                 <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                 <option value="Botswana">Botswana</option>
                                 <option value="Brazil">Brazil</option>
                                 <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                 <option value="Brunei">Brunei</option>
                                 <option value="Bulgaria">Bulgaria</option>
                                 <option value="Burkina Faso">Burkina Faso</option>
                                 <option value="Burundi">Burundi</option>
                                 <option value="Cambodia">Cambodia</option>
                                 <option value="Cameroon">Cameroon</option>
                                 <option value="Canada">Canada</option>
                                 <option value="Canary Islands">Canary Islands</option>
                                 <option value="Cape Verde">Cape Verde</option>
                                 <option value="Cayman Islands">Cayman Islands</option>
                                 <option value="Central African Republic">Central African Republic</option>
                                 <option value="Chad">Chad</option>
                                 <option value="Channel Islands">Channel Islands</option>
                                 <option value="Chile">Chile</option>
                                 <option value="China">China</option>
                                 <option value="Christmas Island">Christmas Island</option>
                                 <option value="Cocos Island">Cocos Island</option>
                                 <option value="Colombia">Colombia</option>
                                 <option value="Comoros">Comoros</option>
                                 <option value="Congo">Congo</option>
                                 <option value="Cook Islands">Cook Islands</option>
                                 <option value="Costa Rica">Costa Rica</option>
                                 <option value="Cote DIvoire">Cote DIvoire</option>
                                 <option value="Croatia">Croatia</option>
                                 <option value="Cuba">Cuba</option>
                                 <option value="Curaco">Curacao</option>
                                 <option value="Cyprus">Cyprus</option>
                                 <option value="Czech Republic">Czech Republic</option>
                                 <option value="Denmark">Denmark</option>
                                 <option value="Djibouti">Djibouti</option>
                                 <option value="Dominica">Dominica</option>
                                 <option value="Dominican Republic">Dominican Republic</option>
                                 <option value="East Timor">East Timor</option>
                                 <option value="Ecuador">Ecuador</option>
                                 <option value="Egypt">Egypt</option>
                                 <option value="El Salvador">El Salvador</option>
                                 <option value="Equatorial Guinea">Equatorial Guinea</option>
                                 <option value="Eritrea">Eritrea</option>
                                 <option value="Estonia">Estonia</option>
                                 <option value="Ethiopia">Ethiopia</option>
                                 <option value="Falkland Islands">Falkland Islands</option>
                                 <option value="Faroe Islands">Faroe Islands</option>
                                 <option value="Fiji">Fiji</option>
                                 <option value="Finland">Finland</option>
                                 <option value="France">France</option>
                                 <option value="French Guiana">French Guiana</option>
                                 <option value="French Polynesia">French Polynesia</option>
                                 <option value="French Southern Ter">French Southern Ter</option>
                                 <option value="Gabon">Gabon</option>
                                 <option value="Gambia">Gambia</option>
                                 <option value="Georgia">Georgia</option>
                                 <option value="Germany">Germany</option>
                                 <option value="Ghana">Ghana</option>
                                 <option value="Gibraltar">Gibraltar</option>
                                 <option value="Great Britain">Great Britain</option>
                                 <option value="Greece">Greece</option>
                                 <option value="Greenland">Greenland</option>
                                 <option value="Grenada">Grenada</option>
                                 <option value="Guadeloupe">Guadeloupe</option>
                                 <option value="Guam">Guam</option>
                                 <option value="Guatemala">Guatemala</option>
                                 <option value="Guinea">Guinea</option>
                                 <option value="Guyana">Guyana</option>
                                 <option value="Haiti">Haiti</option>
                                 <option value="Hawaii">Hawaii</option>
                                 <option value="Honduras">Honduras</option>
                                 <option value="Hong Kong">Hong Kong</option>
                                 <option value="Hungary">Hungary</option>
                                 <option value="Iceland">Iceland</option>
                                 <option value="Indonesia">Indonesia</option>
                                 <option value="India">India</option>
                                 <option value="Iran">Iran</option>
                                 <option value="Iraq">Iraq</option>
                                 <option value="Ireland">Ireland</option>
                                 <option value="Isle of Man">Isle of Man</option>
                                 <option value="Israel">Israel</option>
                                 <option value="Italy">Italy</option>
                                 <option value="Jamaica">Jamaica</option>
                                 <option value="Japan">Japan</option>
                                 <option value="Jordan">Jordan</option>
                                 <option value="Kazakhstan">Kazakhstan</option>
                                 <option value="Kenya">Kenya</option>
                                 <option value="Kiribati">Kiribati</option>
                                 <option value="Korea North">Korea North</option>
                                 <option value="Korea Sout">Korea South</option>
                                 <option value="Kuwait">Kuwait</option>
                                 <option value="Kyrgyzstan">Kyrgyzstan</option>
                                 <option value="Laos">Laos</option>
                                 <option value="Latvia">Latvia</option>
                                 <option value="Lebanon">Lebanon</option>
                                 <option value="Lesotho">Lesotho</option>
                                 <option value="Liberia">Liberia</option>
                                 <option value="Libya">Libya</option>
                                 <option value="Liechtenstein">Liechtenstein</option>
                                 <option value="Lithuania">Lithuania</option>
                                 <option value="Luxembourg">Luxembourg</option>
                                 <option value="Macau">Macau</option>
                                 <option value="Macedonia">Macedonia</option>
                                 <option value="Madagascar">Madagascar</option>
                                 <option value="Malaysia">Malaysia</option>
                                 <option value="Malawi">Malawi</option>
                                 <option value="Maldives">Maldives</option>
                                 <option value="Mali">Mali</option>
                                 <option value="Malta">Malta</option>
                                 <option value="Marshall Islands">Marshall Islands</option>
                                 <option value="Martinique">Martinique</option>
                                 <option value="Mauritania">Mauritania</option>
                                 <option value="Mauritius">Mauritius</option>
                                 <option value="Mayotte">Mayotte</option>
                                 <option value="Mexico">Mexico</option>
                                 <option value="Midway Islands">Midway Islands</option>
                                 <option value="Moldova">Moldova</option>
                                 <option value="Monaco">Monaco</option>
                                 <option value="Mongolia">Mongolia</option>
                                 <option value="Montserrat">Montserrat</option>
                                 <option value="Morocco">Morocco</option>
                                 <option value="Mozambique">Mozambique</option>
                                 <option value="Myanmar">Myanmar</option>
                                 <option value="Nambia">Nambia</option>
                                 <option value="Nauru">Nauru</option>
                                 <option value="Nepal">Nepal</option>
                                 <option value="Netherland Antilles">Netherland Antilles</option>
                                 <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                 <option value="Nevis">Nevis</option>
                                 <option value="New Caledonia">New Caledonia</option>
                                 <option value="New Zealand">New Zealand</option>
                                 <option value="Nicaragua">Nicaragua</option>
                                 <option value="Niger">Niger</option>
                                 <option value="Nigeria">Nigeria</option>
                                 <option value="Niue">Niue</option>
                                 <option value="Norfolk Island">Norfolk Island</option>
                                 <option value="Norway">Norway</option>
                                 <option value="Oman">Oman</option>
                                 <option value="Pakistan">Pakistan</option>
                                 <option value="Palau Island">Palau Island</option>
                                 <option value="Palestine">Palestine</option>
                                 <option value="Panama">Panama</option>
                                 <option value="Papua New Guinea">Papua New Guinea</option>
                                 <option value="Paraguay">Paraguay</option>
                                 <option value="Peru">Peru</option>
                                 <option value="Phillipines">Philippines</option>
                                 <option value="Pitcairn Island">Pitcairn Island</option>
                                 <option value="Poland">Poland</option>
                                 <option value="Portugal">Portugal</option>
                                 <option value="Puerto Rico">Puerto Rico</option>
                                 <option value="Qatar">Qatar</option>
                                 <option value="Republic of Montenegro">Republic of Montenegro</option>
                                 <option value="Republic of Serbia">Republic of Serbia</option>
                                 <option value="Reunion">Reunion</option>
                                 <option value="Romania">Romania</option>
                                 <option value="Russia">Russia</option>
                                 <option value="Rwanda">Rwanda</option>
                                 <option value="St Barthelemy">St Barthelemy</option>
                                 <option value="St Eustatius">St Eustatius</option>
                                 <option value="St Helena">St Helena</option>
                                 <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                 <option value="St Lucia">St Lucia</option>
                                 <option value="St Maarten">St Maarten</option>
                                 <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                 <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                 <option value="Saipan">Saipan</option>
                                 <option value="Samoa">Samoa</option>
                                 <option value="Samoa American">Samoa American</option>
                                 <option value="San Marino">San Marino</option>
                                 <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                 <option value="Saudi Arabia">Saudi Arabia</option>
                                 <option value="Senegal">Senegal</option>
                                 <option value="Seychelles">Seychelles</option>
                                 <option value="Sierra Leone">Sierra Leone</option>
                                 <option value="Singapore">Singapore</option>
                                 <option value="Slovakia">Slovakia</option>
                                 <option value="Slovenia">Slovenia</option>
                                 <option value="Solomon Islands">Solomon Islands</option>
                                 <option value="Somalia">Somalia</option>
                                 <option value="South Africa">South Africa</option>
                                 <option value="Spain">Spain</option>
                                 <option value="Sri Lanka">Sri Lanka</option>
                                 <option value="Sudan">Sudan</option>
                                 <option value="Suriname">Suriname</option>
                                 <option value="Swaziland">Swaziland</option>
                                 <option value="Sweden">Sweden</option>
                                 <option value="Switzerland">Switzerland</option>
                                 <option value="Syria">Syria</option>
                                 <option value="Tahiti">Tahiti</option>
                                 <option value="Taiwan">Taiwan</option>
                                 <option value="Tajikistan">Tajikistan</option>
                                 <option value="Tanzania">Tanzania</option>
                                 <option value="Thailand">Thailand</option>
                                 <option value="Togo">Togo</option>
                                 <option value="Tokelau">Tokelau</option>
                                 <option value="Tonga">Tonga</option>
                                 <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                 <option value="Tunisia">Tunisia</option>
                                 <option value="Turkey">Turkey</option>
                                 <option value="Turkmenistan">Turkmenistan</option>
                                 <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                 <option value="Tuvalu">Tuvalu</option>
                                 <option value="Uganda">Uganda</option>
                                 <option value="United Kingdom">United Kingdom</option>
                                 <option value="Ukraine">Ukraine</option>
                                 <option value="United Arab Erimates">United Arab Emirates</option>
                                 <option value="United States of America">United States of America</option>
                                 <option value="Uraguay">Uruguay</option>
                                 <option value="Uzbekistan">Uzbekistan</option>
                                 <option value="Vanuatu">Vanuatu</option>
                                 <option value="Vatican City State">Vatican City State</option>
                                 <option value="Venezuela">Venezuela</option>
                                 <option value="Vietnam">Vietnam</option>
                                 <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                 <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                 <option value="Wake Island">Wake Island</option>
                                 <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                 <option value="Yemen">Yemen</option>
                                 <option value="Zaire">Zaire</option>
                                 <option value="Zambia">Zambia</option>
                                 <option value="Zimbabwe">Zimbabwe</option>
                              </select>
                          </div>
                          <div class="form-group">
                            <label for="city" id="cityOfResidenceField">City of Residence*</label>
                            <input type="text" name="city" class="form-control" id="city" value="<?php echo $city; ?>" placeholder="Enter the city where you live" required="">
                          </div>
                        
                          <br>
                          <h4 class="card-title" id="academicBackgroundField">Academic Background</h4>
                          <div class="form-group">
                            <label for="type_of_diploma" id=typeOfDiplomaField>Type of Diploma (or equivalent)*</label>
                              <select class="custom-select" name="type_of_diploma" id="type_of_diploma" required>
                                <option value="" selected id="typeOfDiplomaOption">Select Type of Diploma you Completed</option>
                                <option value="Serie A">Série A</option>
                                <option value="Serie B">Série B</option>
                                <option value="Serie C">Série C</option>
                                <option value="Other">Other</option>
                              </select>
                            </label>
                          </div>
                          <div class="form-group">
                            <label for="diploma_date" id="diplomaDateField">Year diploma was Obtained*</label>
                            <input type="text" name="diploma_date" class="form-control" id="diploma_date" value="<?php echo $diploma_date; ?>" placeholder="Year diploma was obtained (eg. 2019)" required="">
                          </div>
                          <div class="form-group">
                            <label for="final_Grade" id="finalRemarkField">Final Remark</label>
                              <select class="custom-select" name="final_Grade" id="final_Grade">
                                <option value="" selected id="finalRemarkOption">Select the final remark you recieved</option>
                                <option value="Tres Bien">Tres Bien</option>
                                <option value="Bien">Bien</option>
                                <option value="Assez Bien">Assez bien</option>
                                <option value="Passable">Passable</option>
                              </select>
                            </label>
                          </div>
                          <div class="form-group">
                            <label for="desired_major" id="desiredMajorField">Desired Major*</label>
                              <select class="custom-select" name="desired_major" id="desired_major" required>
                                <option value="" selected id="desiredMajorOption">What major would you like to complete at A.D.U.?</option>
                                <option id="lawOption" value="Law">Law</option>
                                <option id="infotechOption" value="Information Technology">Information Technology</option>
                                <option id="accountingOption" value="Accounting and Finance">Accounting and Finance</option>
                                <option id="hrOption" value="Human Resource Management">Human Resource Management</option>
                                <option id="managementOption" value="Project Management">Project Management</option>
                                <option id="marketingOption" value="Marketing">Marketing</option>
                              </select>
                            </label>
                          </div>
                          <div class="form-group">
                            <label for="first_time_applicant" id="firstTimeApplicantField">Have you applied to A.D.U. before?*</label>
                            <select class="custom-select" name="first_time_applicant" id="first_time_applicant" required>
                                <option value="" selected id="firstTimeApplicantOption">Is this your first time applying or have you applied before?</option>
                                <option value="Yes" id="notfirsttimeOption">Yes</option>
                                <option value="No" id="firsttimeOption">No</option>
                              </select>
                          </div>
                          <div class="form-group">
                            <label for="learning_disability" id="learningDisabilityField">Do you have a disability or learning difficulty that may affect your learning while at A.D.U.?</label>
                            <input type="text" name="learning_disability" class="form-control" value="<?php echo $learning_disability; ?>"id="learning_disability" placeholder="If yes please specify, if no leave blank">
                          </div>
                          <div class="form-group">
                            <label for="career_aspirations" id="careerAspirationsField">What career do you hope to pursue?*</label>
                            <input type="text" name="career_aspirations" class="form-control" value="<?php echo $career_aspirations; ?>"id="career_aspirations" placeholder="Who do you want to become?" required="">
                          </div>
                          <br>
                          <h4 class="card-title" id="familyInformationHeader">Family Information</h4>
                          <div class="row form-group">
                              <div class="col">
                                <input type="text" readonly class="form-control-plaintext" id="guardianOneField" value="Guardian One">
                              </div>
                              <div class="col">
                                <input type="text" readonly class="form-control-plaintext" id="guardianTwoField" value="Guardian Two">
                              </div>
                            </div>
                            <div class="row form-group">
                              <div class="col">
                                <input type="text" class="form-control" name="guardian_one_name" id="guardian_one_name"  value="<?php echo $guardian_one_name; ?>"placeholder="Full name*" required>
                              </div>
                              <div class="col">
                                <input type="text" class="form-control" name="guardian_two_name" id="guardian_two_name" value="<?php echo $guardian_two_name; ?>"placeholder="Full name">
                              </div>
                            </div>
                            <div class="row form-group">
                              <div class="col">
                                <input type="text" class="form-control" name="guardian_one_life" id="guardian_one_life" value="<?php echo $guardian_one_life; ?>"placeholder="Is he/she/ alive?*" required>
                              </div>
                              <div class="col">
                                <input type="text" class="form-control" name="guardian_two_life" id="guardian_two_life" value="<?php echo $guardian_two_life; ?>"placeholder="Is he/she/ alive?">
                              </div>
                            </div>
                            <div class="row form-group">
                              <div class="col">
                                <input type="text" class="form-control" name="guardian_one_relationship" id="guardian_one_relationship" value="<?php echo $guardian_one_relationship; ?>"placeholder="Relationship to you*" required>
                              </div>
                              <div class="col">
                                <input type="text" class="form-control" name="guardian_two_relationship" id="guardian_two_relationship" value="<?php echo $guardian_two_relationship; ?>"placeholder="Relationship to you">
                              </div>
                            </div>
                            <div class="row form-group">
                              <div class="col">
                                <input type="text" class="form-control" name="guardian_one_phone_number" id="guardian_one_phone_number" value="<?php echo $guardian_one_phone_number; ?>"placeholder="Phone Number*" required>
                              </div>
                              <div class="col">
                                <input type="text" class="form-control" name="guardian_two_phone_number" id="guardian_two_phone_number" value="<?php echo $guardian_two_phone_number; ?>"placeholder="Phone Number">
                              </div>
                            </div>
                            <div class="row form-group">
                              <div class="col">
                                <input type="text" class="form-control" name="guardian_one_email" id="guardian_one_email" value="<?php echo $guardian_one_email; ?>"placeholder="Email">
                              </div>
                              <div class="col">
                                <input type="text" class="form-control" name="guardian_two_email" id="guardian_two_email" value="<?php echo $guardian_two_email; ?>"placeholder="Email">
                              </div>
                            </div>
                            <div class="row form-group">
                              <div class="col">
                                <input type="text" class="form-control" name="guardian_one_education" id="guardian_one_education" value="<?php echo $guardian_one_education; ?>"placeholder="Education*" required>
                              </div>
                              <div class="col">
                                <input type="text" class="form-control" name="guardian_two_education" id="guardian_two_education" value="<?php echo $guardian_two_education; ?>"placeholder="Education">
                              </div>
                            </div>
                            <div class="row form-group">
                              <div class="col">
                                <input type="text" class="form-control" name="guardian_one_employer" id="guardian_one_employer" value="<?php echo $guardian_one_employer; ?>"placeholder="Employer">
                              </div>
                              <div class="col">
                                <input type="text" class="form-control" name="guardian_two_employer" id="guardian_two_employer" value="<?php echo $guardian_two_employer; ?>"placeholder="Employer">
                              </div>
                            </div>
                            <div class="row form-group">
                              <div class="col">
                                <input type="text" class="form-control" name="guardian_one_job_title" id="guardian_one_job_title" value="<?php echo $guardian_one_job_title; ?>"placeholder="Job Title">
                              </div>
                              <div class="col">
                                <input type="text" class="form-control" name="guardian_two_job_title" id="guardian_two_job_title" value="<?php echo $guardian_two_job_title; ?>"placeholder="Job Title">
                              </div>
                            </div>
                            <div class="form-group">
                            <label for="scholarship" id="scholarshipField">Do you intend to apply for financial assistance from A.D.U.?*</label>
                               <select class="custom-select" name="scholarship" id="scholarship" required>
                                <option value="" selected id="scholarshipOption">Are you applying for a scholarship?</option>
                                <option value="Yes" id="scholarshipYes">Yes</option>
                                <option value="No" id="scholarshipNo">No</option>
                              </select>
                          </div>
                           <div class="form-group">
                            <label for="family_at_adu" id="familyAtADUField">Are any of your family members enrolled at A.D.U. at the moment, or have been in the past?</label>
                            <input type="text" name="family_at_adu" class="form-control" id="family_at_adu" value="<?php echo $family_at_adu; ?>"placeholder="If yes please specify, if no leave blank">
                          </div>
                          <br>
                          <h4 class="card-title" id="essayHeader">Essay</h4>
                            <div class="form-group">
                              <label for="essay_answer" id="essayQuestionField">Paul Kagame said that<i> "Real solutions cannot come from anywhere else but from within".</i> <br>At A.D.U we aspire to develop problem solvers. We ask our students to use their boldest imagination to create innovative, practical solutions for Africa and the world. Please answer the below essay question to tell us about a time when you demonstrated your leadership potential.<br>In 300 to 500 words, describe a time when you identified a need in your community (such as your family, school, village, or city) and took action. <br>What need did you identify?<br>How did you address this need?<br>What was the outcome?<br>What did you learn?<br><br>We suggest you write the essay in a word processor such as Microsoft Word, and then paste your final essay into the application. To check the word count, we suggest you use <a href="https://wordcounter.io/">wordcounter.io</a>
                              </label>
                              <textarea class="form-control" id="essay_answer" name="essay_answer" rows="6" placeholder="Paste you answer here*" word-limit="true" max-words='501' min-words='299' required><?php echo $essay_answer; ?></textarea>
                            </div>
                            <div class="form-group">
                            <label for="other_applications" id="otherUniversityField">Have you applied or are you planning to apply to any other universities (list all)?</label>
                            <input type="text" name="other_applications" value="<?php echo $other_applications; ?>" class="form-control" id="other_applications" placeholder="If yes please specify, if no leave blank">
                          </div>
                            <div class="form-group">
                            <label for="source" id="sourceField">How did you hear about us?*</label>
                              <select class="custom-select" name="source" id="source" required>
                                <option value="" selected id="sourceOption">Where did you here about A.D.U.?</option>
                                <option id="newspaper" value="Newspaper">Newspaper</option>
                                <option id="television" value="Television">Television</option>
                                <option id="radio" value="Radio">Radio</option>
                                <option id="facebook" value="Facebook">Facebook</option>
                                <option id="twitter" value="Twitter">Twitter</option>
                                <option id="instagram" value="Instagram">Instagram</option>
                                <option id="linkedin" value="LinkedIn">LinkedIn</option>
                                <option id="billboards" value="Billboards">Billboards</option>
                                <option id="wesbite" value="A.D.U. Website">A.D.U. Website</option>
                                <option id="wordofmouth" value="Word of Mouth">Word of Mouth</option>
                                <option id="referral" value="Referral">Referral</option>
                                <option id="adustudent" value="A.D.U. Student">A.D.U. Student</option>
                                <option id="adustaff" value="A.D.U. Staff/Faculty">A.D.U. Staff/Faculty</option>
                                <option id="aduambassador" value="A.D.U. Ambassador">A.D.U. Ambassador</option>
                                <option id="aduopenhouse" value="A.D.U. Open House Day">A.D.U. Open House Day</option>
                                <option id="aducampustour" value="A.D.U. Campus Tour">A.D.U. Campus Tour</option>
                                <option id="google" value="Google">Google</option>
                                <option id="schoolteacher" value="School Teacher">School Teacher</option>
                                <option id="schoolvisit" value="School Visit">School Visit</option>
                                <option id="careerfair" value="Career Fair">Career Fair</option>
                              </select>
                            </label>
                          </div>
                                <?php
                                $result2 = mysqli_query($connect,
                                    "SELECT * FROM applicants WHERE email = '$email';");
                                    while ($row = mysqli_fetch_array($result2)) {?>
                          <h4 class="card-title" id="uploadHeader">Upload Files (pdf / jpg / png)</h4>
                          <hr>
                          <i>
                          <h6 id="uploadSubText"><b>Double check that your files have been uploaded correctly by viewing them and making sure that a mistake has not been made. You can always remove a file and reupload it. If a problem arises try switching browsers, or uploading a different file type. If your PDF file is not uploading properly upload it as a JPG or PNG.</b></h6>
                      
                          </i>
                          <hr>
                                <label for="source" id="docOneField">Upload your Copy of your High School National Exit Exam*</label>
                                <div class="form-group">
                        <?php  if ($row['national_exam_file'] == "") {?>
                              <input id="inputGroupFile01" type="file" class="custom-file-inputm" name="nationalExamUpload" id="nationalExamUpload" accept="image/jpeg,image/png,application/pdf,image" required>
                        <?php } else { ?>
                              <label class="custom-file-labelm" for="inputGroupFile01" id="removeFileFieldOne">File already uploaded, click <a href="remove.php?file_name=<?php echo $row['national_exam_file']?>&filetype=national_exam_file"> here </a> to remove file, and click <a href="https://ilimi.org/applications/uploads/<?php echo $row['national_exam_file']; ?>" target="_blank"> here </a> to view it.</label>
                              <script type="text/javascript">removeFileFieldOneBool = true;</script>
                        <?php } ?>
                                </div>
                                <label for="source" id="docTwoField">Upload your Copy of your High School Final Exam Grades*</label>
                                <div class="form-group">
                        <?php  if ($row['final_grades_file'] == "") {?>
                              <input id="inputGroupFile01" type="file" class="custom-file-inputm" name="finalGradesUpload" id="finalGradesUpload" accept="image/jpeg,image/png,application/pdf,image" required>
                        <?php } else { ?>
                              <label class="custom-file-labelm" for="inputGroupFile01" id="removeFileFieldTwo">File already uploaded, click <a href="remove.php?file_name=<?php echo $row['final_grades_file']?>&filetype=final_grades_file"> here </a> to remove file, and click <a href="https://ilimi.org/applications/uploads/<?php echo $row['final_grades_file']; ?>" target="_blank"> here </a> to view it.</label>
                              <script type="text/javascript">removeFileFieldTwoBool = true;</script>
                        <?php } ?>
                                </div>
                                <label for="source" id="docThreeField">Upload your Copy of your Transcripts from your last year of High School*</label>
                                <div class="form-group">
                        <?php  if ($row['transcripts_file'] == "") {?>
                              <input id="inputGroupFile01" type="file" class="custom-file-inputm" name="transcriptsUpload" id="transcriptsUpload" accept="image/jpeg,image/png,application/pdf,image" required>
                        <?php } else { ?>
                              <label class="custom-file-labelm" for="inputGroupFile01" id="removeFileFieldThree">File already uploaded, click <a href="remove.php?file_name=<?php echo $row['transcripts_file']?>&filetype=transcripts_file"> here </a> to remove file, and click <a href="https://ilimi.org/applications/uploads/<?php echo $row['transcripts_file']; ?>" target="_blank"> here </a> to view it.</label>
                              <script type="text/javascript">removeFileFieldThreeBool = true;</script>
                        <?php } ?>
                                </div>
                                <label for="source" id="docFourField">Upload your Scan of your birth certificate or identity document*</label>
                                <div class="form-group">
                        <?php  if ($row['identity_file'] == "") {?>
                              <input id="inputGroupFile01" type="file" class="custom-file-inputm" name="idUpload" id="idUpload" accept="image/jpeg,image/png,application/pdf,image" required>
                        <?php } else { ?>
                              <label class="custom-file-labelm" for="inputGroupFile01" id="removeFileFieldFour">File already uploaded, click <a href="remove.php?file_name=<?php echo $row['identity_file']?>&filetype=identity_file"> here </a> to remove file, and click <a href="https://ilimi.org/applications/uploads/<?php echo $row['identity_file']; ?>" target="_blank"> here </a> to view it.</label>
                              <script type="text/javascript">removeFileFieldFourBool = true;</script>
                        <?php } ?>
                                </div>
                                <label for="source" id="docFiveField">Upload your Letter of Recommandation (optional)</label>
                                <div class="form-group">
                        <?php  if ($row['letter_file'] == "") {?>
                              <input id="inputGroupFile01" type="file" class="custom-file-inputm" name="letterUpload" id="letterUpload" accept="image/jpeg,image/png,application/pdf,image">
                        <?php } else { ?>
                              <label class="custom-file-labelm" for="inputGroupFile01" id="removeFileFieldFive">File already uploaded, click <a href="remove.php?file_name=<?php echo $row['letter_file']?>&filetype=letter_file"> here </a> to remove file, and click <a href="https://ilimi.org/applications/uploads/<?php echo $row['letter_file']; ?>" target="_blank"> here </a> to view it.</label>
                              <script type="text/javascript">removeFileFieldFiveBool = true;</script>
                        <?php } ?>
                                </div>
                                <label for="source" id="docSixField">Upload the filled out Scholarship Form, in <a target="_blank" href="https://drive.google.com/file/d/1Bby3uDuSBmimuYBRnruSj45d-ZqZEy9m/view?usp=sharing">English</a> or <a target="_blank" href="https://drive.google.com/file/d/1k8TD5Uoi9UYOIMGuqqHJfdt-zmW-X25f/view?usp=sharing">French</a> (required for people applying for a scholarship)</label>
                                <div class="form-group">
                        <?php  if ($row['scholarship_file'] == "") {?>
                              <input id="inputGroupFile01" type="file" class="custom-file-inputm" name="scholarshipUpload" id="scholarshipUpload" accept="image/jpeg,image/png,application/pdf,image">
                        <?php } else { ?>
                              <label class="custom-file-labelm" for="inputGroupFile01" id="removeFileFieldSix">File already uploaded, click <a href="remove.php?file_name=<?php echo $row['scholarship_file']?>&filetype=scholarship_file"> here </a> to remove file, and click <a href="https://ilimi.org/applications/uploads/<?php echo $row['scholarship_file']; ?>" target="_blank"> here </a> to view it.</label>
                              <script type="text/javascript"> removeFileFieldSixBool= true;</script>
                        <?php } ?>
                                </div>

                            <?php } ?>
                          <div class="btn-group">
                          <button type="submit" class="btn btn-success btn-large" style="width:450px; height:50px;" type="submit" id="saveButtonText" formaction="save.php" formnovalidate>Save</button>
                          <button type="button" class="btn btn-brown btn-large" style="width:450px; height:50px;"data-toggle="modal" data-target="#submitModal" id="submitButtonText"> Submit Application</button>
                          </div>
          <!-- Modal -->
<div class="modal fade" id="submitModal" tabindex="-1" role="dialog" aria-labelledby="submitModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="submitModalHeader">Submit Application</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modalText">
        I certify that all the information provided on this form and all supplementary forms is true, correct, and complete. I hereby authorize the A.D.U Admissions committee or its representatives to obtain such additional information concerning my educational program and other records as might be needed to complete the processing of this application. If granted admission, I understand that providing false information could result in the withdrawal of my admission award as well as may result in my dismissal from A.D.U.         
        <br><br>      
            <label for="finalCheck">
                <b>I have made sure that all my files have been uploaded successfully and all the data has been entered correctly.</b>
            </label>   
            <input type="radio" id="finalCheck" name="finalCheck" value="yes" onclick="enableButton()"> Yes</input>
            <br>   
            <input type="radio" id="finalCheck" name="finalCheck" value="no" onclick="disableButton()" checked> No</input>
        </b>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" style="width: 50%;" data-dismiss="modal" id="modalClose">Close</button>
        <button class="btn btn-secondary btn-large" style="width: 50%; background-color: #98141e" id="modalSubmit" type="submit" disabled="">Submit</button>
      </div>
    </div>
  </div>
</div>
                        </form>
                    </div>
                  </div>
                <!-- </div> -->
              </div>
            </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="./coverage/bs-custom-file-input.js"></script>
    <script type="text/javascript">
              function enableButton() {
    document.getElementById("modalSubmit").disabled = false;
        }
        function disableButton() {
document.getElementById("modalSubmit").disabled = true;
        }
        document.getElementById("citizenship").value = "<?php echo $citizenship; ?>";
        document.getElementById("gender").value = "<?php echo $gender; ?>";
        document.getElementById("marrital_status").value = "<?php echo $marrital_status; ?>";
        document.getElementById("country").value = "<?php echo $country; ?>";
        document.getElementById("citizenship").value = "<?php echo $citizenship; ?>";
        document.getElementById("type_of_diploma").value = "<?php echo $type_of_diploma; ?>";
        document.getElementById("final_Grade").value = "<?php echo $final_Grade; ?>";
        document.getElementById("desired_major").value = "<?php echo $desired_major; ?>";
        document.getElementById("first_time_applicant").value = "<?php echo $first_time_applicant; ?>";
        document.getElementById("scholarship").value = "<?php echo $scholarship; ?>";
        document.getElementById("other_applications").value = "<?php echo $other_applications; ?>";
        document.getElementById("source").value = "<?php echo $source; ?>";
        function save() {
            location.href = "save.php";
        }
         function translateInnerHTML(id, english, french) {
        
        if (languageButton.innerHTML=="French") {
          id.innerHTML = english;
        } else if (languageButton.innerHTML=="English") {
          id.innerHTML = french;
        }
      }
      function translateClassName(id, english, french) {
        if (languageButton.innerHTML=="French") {
          id.className = english;
        } else if (languageButton.innerHTML=="English") {
          id.className = french;
        }
      }
      function translatePlaceholder(id, english, french) {
        if (languageButton.innerHTML=="French") {
          id.placeholder = english;
        } else if (languageButton.innerHTML=="English") {
          id.placeholder = french;
        }
      }
      function translateValue(id, english, french) {
        if (languageButton.innerHTML=="French") {
          id.value = english;
        } else if (languageButton.innerHTML=="English") {
          id.value = french;
        }
      }
      function languageChange() {
        var helpbuttontext = document.getElementById("helpbuttontext");
        var infoButton = document.getElementById("infoButton");
        var infoButtonHeader = document.getElementById("infoButtonHeader");
        
        translateInnerHTML(languageButton, "English", "French");
        translateClassName(languageButton, "btn btn-outline-danger my-2 my-sm-0", "btn btn-outline-primary my-2 my-sm-0");
        translateInnerHTML(navbarHeader, "Application Form", "Formulaire d'Inscription");
        translateInnerHTML(helpbuttontext, "<br>         In order for you to complete your application, you need to sign up with your email and password, and then log in. Once logged in you need to fill in all the required fields and upload all the necessary files, then press submit. If you have any questions or problems please email 21rytel_j@aswarsaw.org.         <br>         <br>         *Note: This website is optimized for Google Chrome, so if you are experiencing an issues please try and switch your browser.", "<br> Pour pouvoir compléter votre candidature, vous devez vous inscrire avec votre email et votre mot de passe, puis vous connecter. Une fois connecté, vous devez remplir tous les champs obligatoires, télécharger tous les fichiers nécessaires, puis cliquer sur Envoyer. . Si vous avez des questions ou des problèmes, veuillez envoyer un courrier électronique à 21rytel_j@aswarsaw.org. <br> <br> * Remarque: ce site est optimisé pour Google Chrome. Si vous rencontrez un problème, essayez de changer de navigateur.")
        translateInnerHTML(infoButton, "Info/Help", "Info/Aider")
        translateInnerHTML(infoButtonHeader, "Info/Help", "Info/Aider")

        translateInnerHTML(headerOne, "Personal Information", "Informations personnelles");
        translateInnerHTML(citizenshipField, "Citizenship*", "Nationalité*");
        translateInnerHTML(citizenshipOption, "Country of Citizenship*", "Nationalité");
        translateInnerHTML(contactNumberField, "Contact Number, Phone or Whatsapp(include country code)*", "Numéro de contact, Contact ou Whatsapp (inclure le code du pays)*");
        translatePlaceholder(contact_number, "Enter a number to contact you (Phone or Whatsapp)", "Entrez votre contact (Numero de telephone ou Whatsapp)");
        translateInnerHTML(DateOfBirthField, "Date of Birth*", "Date de naissance*");
        translatePlaceholder(date_of_birth, "DD/MM/YY (eg.04/11/1996)", "JJ/MM/AA (ex.04/11/1996)");
        translateInnerHTML(genderField, "Gender*", "Sexe*");
        translateInnerHTML(genderOption, "Select your Gender", "Sexe");
        translateInnerHTML(femaleOption, "Female", "Femme");
        translateInnerHTML(maleOption, "Male", "Homme");
        translateInnerHTML(otherOption, "Other","Autre");
        translateInnerHTML(marritalStatusField, "Marrital Status", "Situation Matrimoniale");
        translateInnerHTML(marritalStatusOption, "Are you single, marrried, or divorced?", "Êtes vous marié(e), celibataire, ou divorcée?");
        translateInnerHTML(marriedOption, "Married", "Marié(e)");
        translateInnerHTML(singleOption, "Single", "Celibataire");
        translateInnerHTML(divorcedOption, "Divorced", "Divorcée");
        translateInnerHTML(countryOfResidenceField, "Country of Residence*", "Pays de Résidence*");
        translateInnerHTML(countryOfResidenceOption, "Country of Residence", "Pays de Résidence");
        translateInnerHTML(cityOfResidenceField, "City of Residence*", "Ville de Résidence*");
        translatePlaceholder(city, "Enter the city where you live", "Entrez la ville où vous habitez");
        translateInnerHTML(academicBackgroundField, "Academic Background", "Cursus Scolaire");
        translateInnerHTML(typeOfDiplomaField, "Type of Diploma (or equivalent)*", "Série du bac obtenu (ou équivalent)*");
        translateInnerHTML(typeOfDiplomaOption, "Select Type of Diploma you Completed", "Série");
        translateInnerHTML(diplomaDateField, "Year Diploma was obtained*", "Année d'obtention du bac*");
        translatePlaceholder(diploma_date, "Year diploma was obtained (eg. 2018)", "ex. 2018");
        translateInnerHTML(finalRemarkField, "Final Remark", "Mention Obtenue");
        translateInnerHTML(finalRemarkOption, "Select the final remark you recieved", "Selectionnez la mention Obtenue");
        translateInnerHTML(desiredMajorField, "Desired Major*", "Specialité*");
        translateInnerHTML(desiredMajorOption, "What major would you like to complete at A.D.U.?", "Quel est votre choix de filière?");
        translateInnerHTML(lawOption, "Law", "Droit");
        translateInnerHTML(infotechOption, "Information Technology", "Informatique de gestion");
        translateInnerHTML(accountingOption, "Accounting and Finance", "Comptabilité et Finance");
        translateInnerHTML(hrOption, "Human Resource Management", "Ressources Humaines");
        translateInnerHTML(managementOption, "Project Management", "Gestion des Projets");
        translateInnerHTML(marketingOption, "Marketing", "Marketing");
        translateInnerHTML(firstTimeApplicantField, "Have you applied to A.D.U. before?*", "Avez vous déjà postulé à A.D.U. avant?*");
        translateInnerHTML(firstTimeApplicantOption, "Is this your first time applying or have you applied before?", "Est-ce la première fois que vous postulez?");
        translateInnerHTML(notfirsttimeOption, "Yes", "Oui");
        translateInnerHTML(firsttimeOption, "No", "Non");
        translateInnerHTML(learningDisabilityField, "Do you have a disability or learning difficulty that may affect your learning while at A.D.U.?", "Avez-vous un handicap ou une difficulté d'apprentissage qui peut affecter votre apprentissage pendant que vous êtes à A.D.U.?");
        translatePlaceholder(learning_disability, "If yes please specify, if no leave blank", "Si oui, veuillez préciser, si non, laissez en blanc");
        translateInnerHTML(careerAspirationsField, "What career do you hope to pursue?*", "Quelle carrière espérez-vous poursuivre?*");
        translatePlaceholder(career_aspirations, "Who do you want to become?", "Que voulez-vous devenir dans le futur?");
        translateInnerHTML(familyInformationHeader, "Family Information", "Information sur la famille");
        translateValue(guardianOneField, "Guardian One", "Tuteur Un");
        translateValue(guardianTwoField, "Guardian Two", "Tuteur Deux");
        translatePlaceholder(guardian_one_name, "Full Name*", "Nom complet*");
        translatePlaceholder(guardian_one_life, "Is he/she alive?*", "Est-il / elle en vie?*");
        translatePlaceholder(guardian_one_relationship, "Relationship to you*", "Lien avec vous*");
        translatePlaceholder(guardian_one_phone_number, "Phone Number*", "Numéro de téléphone*");
        translatePlaceholder(guardian_one_email, "Email", "Email");
        translatePlaceholder(guardian_one_education, "Education*", "Éducation*");
        translatePlaceholder(guardian_one_employer, "Employer", "Employeur");
        translatePlaceholder(guardian_one_job_title, "Job Title", "Profession");
        translatePlaceholder(guardian_two_name, "Full Name", "Nom complet");
        translatePlaceholder(guardian_two_life, "Is he/she alive?", "Est-il / elle en vie?");
        translatePlaceholder(guardian_two_relationship, "Relationship to you", "Lien avec vous");
        translatePlaceholder(guardian_two_phone_number, "Phone Number", "Numéro de téléphone");
        translatePlaceholder(guardian_two_email, "Email", "Email");
        translatePlaceholder(guardian_two_education, "Education", "Éducation");
        translatePlaceholder(guardian_two_employer, "Employer", "Employeur");
        translatePlaceholder(guardian_two_job_title, "Job Title", "Profession");
        translateInnerHTML(scholarshipField, "Do you intend to apply for financial assistance from A.D.U.?*", "Avez-vous l'intention de demander une aide financière à A.D.U.?*");
        translateInnerHTML(scholarshipOption, "Are you applying for a scholarship?", "Vous postulez pour une bourse?");
        translateInnerHTML(familyAtADUField, "Are any of your family members enrolled at A.D.U. at the moment, or have been in the past?","Est-ce que des membres de votre famille sont inscrits à A.D.U. en ce moment ou l'ont été par le passé?");
        translatePlaceholder(family_at_adu, "If yes please specify, if no leave blank","Si oui, veuillez préciser, si non, laissez en blanc");
        translateInnerHTML(scholarshipNo, "No", "Non");
        translateInnerHTML(scholarshipYes, "Yes", "Oui");
        translateInnerHTML(essayHeader, "Essay", "Essai");
        translateInnerHTML(essayQuestionField, 'Paul Kagame said that<i> "Real solutions cannot come from anywhere else but from within".</i> <br>At A.D.U we aspire to develop problem solvers. We ask our students to use their boldest imagination to create innovative, practical solutions for Africa and the world. Please answer the below essay question to tell us about a time when you demonstrated your leadership potential.<br>In 300 to 500 words, describe a time when you identified a need in your community (such as your family, school, village, or city) and took action. <br>What need did you identify?<br>How did you address this need?<br>What was the outcome?<br>What did you learn?<br><br>We suggest you write the essay in a word processor such as Microsoft Word, and then paste your final essay into the application. To check the word count, we suggest you use <a href="https://wordcounter.io/">wordcounter.io</a>', "Paul Kagame a déclaré que <i> \"Les vraies solutions ne peuvent venir de nulle part ailleurs que de l'intérieur\". </i> <br>A A.D.U, nous aspirons à développer des solutions aux problèmes. Nous demandons à nos étudiants de faire preuve de la plus grande imagination pour créer des solutions innovantes et pratiques pour l’Afrique et le monde. S'il vous plaît répondez à la question ci-dessous pour nous parler d'un moment où vous avez démontré votre potentiel de leadership. <br> Décrivez en 300 à 500 mots un moment où vous avez identifié un besoin dans votre communauté (votre famille, votre école, votre village, ville, etc.) et avez pris des mesures. <br> Quel besoin avez-vous identifié? <br> Comment avez-vous répondu à ce besoin? <br> Quel a été le résultat? <br> Qu'avez vous appris? <br><br> Nous vous suggérons d'écrire l'essai dans un traitement de texte tel que Microsoft Word, puis collez votre essai final dans l'application. Pour vérifier le nombre de mots, nous vous suggérons d’utiliser <a href=\"https://wordcounter.io/\"> wordcounter.io </a>");
        translatePlaceholder(essay_answer, "Paste your answer here*", "Entrez votre réponse ici*");
        translateInnerHTML(otherUniversityField, "Have you applied or are you planning to apply to any other universities (list all)?", "Avez-vous postulé ou avez-vous l'intention de postuler dans une autre université (liste complète)?");
        translatePlaceholder(other_applications, "If yes please specify, if no leave blank", "Si oui, veuillez préciser, si non, laissez en blanc");
        translateInnerHTML(sourceField, "How did you hear about us?*", "Comment avez-vous entendu parler de nous?*");
        translateInnerHTML(sourceOption, "Where did you hear about A.D.U.?*", "Comment avez-vous entendu parler de A.D.U.?*");

        translateInnerHTML(newspaper, "Newspaper", "Journal")
        translateInnerHTML(television, "Television", "Télévision")
        translateInnerHTML(radio, "Radio", "Radio")
        translateInnerHTML(facebook, "Facebook", "Facebook")
        translateInnerHTML(twitter, "Twitter", "Twitter")
        translateInnerHTML(instagram, "Instagram", "Instagram")
        translateInnerHTML(linkedin, "LinkedIn", "LinkedIn")
        translateInnerHTML(billboards, "Billboards", "Panneaux daffichage")
        translateInnerHTML(wesbite, "A.D.U. Website", "Site de A.D.U.")
        translateInnerHTML(wordofmouth, "Word of Mouth", "Bouche à oreille")
        translateInnerHTML(referral, "Referral", "Référence")
        translateInnerHTML(adustudent, "A.D.U. Student", "Étudiant de A.D.U.")
        translateInnerHTML(adustaff, "A.D.U. Staff/Faculty", "Personnel/faculté de A.D.U.")
        translateInnerHTML(aduambassador, "A.D.U. Ambassador", "Ambassadeur de A.D.U.")
        translateInnerHTML(aduopenhouse, "A.D.U. Open House Day", "Journée portes ouvertes de A.D.U.")
        translateInnerHTML(aducampustour, "A.D.U. Campus Tour", "Orientation")
        translateInnerHTML(google, "Google", "Google")
        translateInnerHTML(schoolteacher, "School Teacher", "Enseignant")
        translateInnerHTML(schoolvisit, "School Visit", "Visite de lécole")
        translateInnerHTML(careerfair, "Career Fair", "Salon des carrières")

        translateInnerHTML(submitButtonText, "Submit Application", "Envoyer");
        translateInnerHTML(modalSubmit, "Submit", "Envoyer");
        translateInnerHTML(modalClose, "Close", "Fermer");
        translateInnerHTML(saveButtonText, "Save", "Sauvegerder");
        translateInnerHTML(modalText, "I certify that all the information provided on this form and all supplementary forms is true, correct, and complete. I hereby authorize the A.D.U Admissions committee or its representatives to obtain such additional information concerning my educational program and other records as might be needed to complete the processing of this application. If granted admission, I understand that providing false information could result in the withdrawal of my admission award as well as may result in my dismissal from A.D.U.         <br>             <br>      <label for=\"finalCheck\"><b>I have made sure that all my files have been uploaded successfully and all the data has been entered correctly. </b></label>   <input type=\"radio\" id=\"finalCheck\" name=\"finalCheck\" value=\"yes\" onclick=\"enableButton()\"> Yes</input> <br>   <input type=\"radio\" id=\"finalCheck\" name=\"finalCheck\" value=\"no\" onclick=\"disableButton()\" checked> No</input>         </b>", "Je certifie que toutes les informations fournies dans le présent formulaire et dans tous les formulaires complémentaires sont véridiques, correctes et complètes. J&#39;autorise par la présente le comité d&#39;admission de A.D.U ou ses représentants à réclamer des informations supplémentaires concernant mon programme d&#39;études et autres dossiers qui pourraient être nécessaires dans le traitement de cette demande. Si ma demande d&#39;admission est acceptée, je comprends que le fait de fournir des fausses informations pourrait entraîner l’annulation de mon admission ainsi que mon renvoi de A.D.U.         <br>             <br>      <label for=\"finalCheck\"><b>Je me suis assuré que tous mes fichiers ont été téléchargés avec succès et que toutes les données ont été saisies correctement. </b></label>   <input type=\"radio\" id=\"finalCheck\" name=\"finalCheck\" value=\"yes\" onclick=\"enableButton()\"> Oui</input> <br>   <input type=\"radio\" id=\"finalCheck\" name=\"finalCheck\" value=\"no\" onclick=\"disableButton()\" checked> Non</input>         </b>");
        translateInnerHTML(submitModalHeader, "Submit Application", "Présenter une demande");
        translateInnerHTML(uploadHeader, "Upload Files (pdf / jpg / png)", "Télécharger des fichiers (pdf / jpg / png)");
        translateInnerHTML(uploadSubText, "<b>Double check that your files have been uploaded correctly by viewing them and making sure that a mistake has not been made. You can always remove a file and reupload it. If a problem arises try switching browsers, or uploading a different file type. If your PDF file is not uploading properly upload it as a JPG or PNG.</b>", "<b>Vérifiez que vos fichiers ont été correctement téléchargés en les affichant et en vous assurant qu’une erreur n’a pas été commise. Vous pouvez toujours supprimer un fichier et le re-télécharger. Si un problème survient, essayez de changer de navigateur ou de télécharger un type de fichier différent. Si votre fichier PDF n'est pas téléchargé correctement, téléchargez-le au format JPG ou PNG.</b>")
        translateInnerHTML(docSixField, "Upload the filled out Scholarship Form, in <a target=\"_blank\" href=\"https://drive.google.com/file/d/1Bby3uDuSBmimuYBRnruSj45d-ZqZEy9m/view?usp=sharing\">English</a> or <a target=\"_blank\" href=\"https://drive.google.com/file/d/1k8TD5Uoi9UYOIMGuqqHJfdt-zmW-X25f/view?usp=sharing\">French</a> (required for people applying for a scholarship)", "Téléchargez le formulaire de bourse rempli, dans <a target = \"_ blank \" href = \"https://drive.google.com/file/d/1Bby3uDuSBmimuYBRnruSj45d-ZqZEy9m/view?usp=sharing \"> Anglais </a> ou <a target=\"_blank\" href=\"https://drive.google.com/file/d/1k8TD5Uoi9UYOIMGuqqHJfdt-zmW-X25f/view?usp=sharing\"> Français </a> (obligatoire pour les personnes demandant une bourse)");
        translateInnerHTML(docFourField, "Upload your Scan of your birth certificate or identity document*", "Téléchargez le Scan de votre acte de naissance ou pièce d'identité *");
        translateInnerHTML(docThreeField, "Upload your Copy of your Transcripts from your last year of High School*", "Téléchargez la copie de vos relevés de notes de votre dernière année d'études secondaires *");
        translateInnerHTML(docTwoField, "Upload your Copy of your High School Final Exam Grades*", "Téléchargez la copie des notes de votre examen final au secondaire *");
        translateInnerHTML(docOneField, "Upload your Copy of your High School National Exit Exam*", "Téléchargez la copie de votre examen national de fin d'études secondaires *");

    <?php
    $result3 = mysqli_query($connect,
        "SELECT * FROM applicants WHERE email = '$email';");
        while ($row = mysqli_fetch_array($result3)) {?>

        if (removeFileFieldOneBool == true) {
        translateInnerHTML(removeFileFieldOne, 'File already uploaded, click <a href="remove.php?file_name=<?php echo $row['national_exam_file']?>&filetype=national_exam_file"> here </a> to remove file, and click <a href="https://ilimi.org/applications/uploads/<?php echo $row['national_exam_file']; ?>" target="_blank"> here </a> to view it.', 'Fichier déjà chargé, cliquez sur <a href="remove.php?file_name=<?php echo $row['national_exam_file']?>&filetype=national_exam_file "> ici </a> pour supprimer le fichier, et cliquez sur <a href="https://ilimi.org/applications/uploads/<?php echo $row['national_exam_file']; ?> "target =" _ blank "> ici </a> pour l\'afficher.');
        } if (removeFileFieldTwoBool == true) {
        translateInnerHTML(removeFileFieldTwo, 'File already uploaded, click <a href="remove.php?file_name=<?php echo $row['final_grades_file']?>&filetype=final_grades_file"> here </a> to remove file, and click <a href="https://ilimi.org/applications/uploads/<?php echo $row['final_grades_file']; ?>" target="_blank"> here </a> to view it.', 'Fichier déjà chargé, cliquez sur <a href="remove.php?file_name=<?php echo $row['final_grades_file']?>&filetype=final_grades_file "> ici </a> pour supprimer le fichier, et cliquez sur <a href="https://ilimi.org/applications/uploads/<?php echo $row['final_grades_file']; ?> "target =" _ blank "> ici </a> pour l\'afficher.');
        } if (removeFileFieldThreeBool == true) {
        translateInnerHTML(removeFileFieldThree, 'File already uploaded, click <a href="remove.php?file_name=<?php echo $row['transcripts_file']?>&filetype=transcripts_file"> here </a> to remove file, and click <a href="https://ilimi.org/applications/uploads/<?php echo $row['transcripts_file']; ?>" target="_blank"> here </a> to view it.', 'Fichier déjà chargé, cliquez sur <a href="remove.php?file_name=<?php echo $row['transcripts_file']?>&filetype=transcripts_file "> ici </a> pour supprimer le fichier, et cliquez sur <a href="https://ilimi.org/applications/uploads/<?php echo $row['transcripts_file']; ?> "target =" _ blank "> ici </a> pour l\'afficher.');
        } if (removeFileFieldFourBool == true) {
        translateInnerHTML(removeFileFieldFour, 'File already uploaded, click <a href="remove.php?file_name=<?php echo $row['identity_file']?>&filetype=identity_file"> here </a> to remove file, and click <a href="https://ilimi.org/applications/uploads/<?php echo $row['identity_file']; ?>" target="_blank"> here </a> to view it.', 'Fichier déjà chargé, cliquez sur <a href="remove.php?file_name=<?php echo $row['identity_file']?>&filetype=identity_file "> ici </a> pour supprimer le fichier, et cliquez sur <a href="https://ilimi.org/applications/uploads/<?php echo $row['identity_file']; ?> "target =" _ blank "> ici </a> pour l\'afficher.');
        } if (removeFileFieldFiveBool == true) {
        translateInnerHTML(removeFileFieldFive, 'File already uploaded, click <a href="remove.php?file_name=<?php echo $row['letter_file']?>&filetype=letter_file"> here </a> to remove file, and click <a href="https://ilimi.org/applications/uploads/<?php echo $row['letter_file']; ?>" target="_blank"> here </a> to view it.', 'Fichier déjà chargé, cliquez sur <a href="remove.php?file_name=<?php echo $row['letter_file']?>&filetype=letter_file "> ici </a> pour supprimer le fichier, et cliquez sur <a href="https://ilimi.org/applications/uploads/<?php echo $row['letter_file']; ?> "target =" _ blank "> ici </a> pour l\'afficher.');
        } if (removeFileFieldSixBool == true) {
        translateInnerHTML(removeFileFieldSix, 'File already uploaded, click <a href="remove.php?file_name=<?php echo $row['scholarship_file']?>&filetype=scholarship_file"> here </a> to remove file, and click <a href="https://ilimi.org/applications/uploads/<?php echo $row['scholarship_file']; ?>" target="_blank"> here </a> to view it.', 'Fichier déjà chargé, cliquez sur <a href="remove.php?file_name=<?php echo $row['scholarship_file']?>&filetype=scholarship_file "> ici </a> pour supprimer le fichier, et cliquez sur <a href="https://ilimi.org/applications/uploads/<?php echo $row['scholarship_file']; ?> "target =" _ blank "> ici </a> pour l\'afficher.');
        } 

<?php } ?>

        if (alertDeletedBool == true) {
        translateInnerHTML(alertDeleted, "Your file was successfully deleted!<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">                         <span aria-hidden=\"true\">&times;</span> </button>", "Votre fichier a été supprimé avec succès!<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">                         <span aria-hidden=\"true\">&times;</span> </button>");
        } 
        if (alertWrongFileBool == true) {
        translateInnerHTML(alertWrongFile, "Sorry, please choose a file that is either a .pdf, .jpg, or .png<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">                         <span aria-hidden=\"true\">&times;</span> </button>", "Désolé, veuillez choisir un fichier au format .pdf, .jpg ou .png.<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">                         <span aria-hidden=\"true\">&times;</span> </button>");
        } 
if (alertFileToBigBool == true) {
        translateInnerHTML(alertFileToBig, "Sorry, file size is to big, cannot exceed 5MB<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">                         <span aria-hidden=\"true\">&times;</span> </button>", "Désolé, la taille du fichier est trop grande, elle ne peut dépasser 5 MB<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">                         <span aria-hidden=\"true\">&times;</span> </button>");
        }
        if (alertNormalBool == true) {
        translateInnerHTML(alertNormal, "Remember you can always save your application and come back to it later!<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">                         <span aria-hidden=\"true\">&times;</span> </button>", "Rappelez-vous que vous pouvez toujours sauvegarder votre application et y revenir plus tard!<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">                         <span aria-hidden=\"true\">&times;</span> </button>");
        } if (alertSavedBool == true) {
        translateInnerHTML(alertSaved, "Your application was saved successfully, you can come back and finish it later!<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">                         <span aria-hidden=\"true\">&times;</span> </button>", "Votre application a été enregistrée avec succès, vous pouvez revenir et la finir plus tard!<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">                         <span aria-hidden=\"true\">&times;</span> </button>");
        }
        languageLocalStorageChange();
        
        


      }
function languageLocalStorageChange() {
                if (languageButton.innerHTML=="French") {
          language = "English";
          localStorage.setItem('language', 'English');
        } else if (languageButton.innerHTML=="English") {
          language = "French";
          localStorage.setItem('language', 'French');
        }
      }
        function changeLanguageOnLoad() {
        var language = localStorage.getItem('language');
         if (language=="French") {
          languageChange();
        } else if (language != "English") {
          language = English;
        
        }
      }
    </script>
  </div>
  </div>
  </body>
</html>