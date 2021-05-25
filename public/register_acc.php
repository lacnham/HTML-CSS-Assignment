<?php 

require_once("../private/initialize.php"); 

//Redirect users back to my account page (if they already logged in)
if ($_SESSION["login"] == true){
    redirect_to(url_for("my-account.php"));
}

$fname = '';
$lname = '';
$password = '';
$re_pass = '';
$prof_pic = '';
$address = '';
$country = '';
$zipcode = '';
$email = '';
$phone = '';
$account_type = '';
$error = '';

//Check when user submit the form in method POST
if  (is_post_request()) {
    $fname = $_POST["fname"] ?? '';
    $lname = $_POST['lname'] ?? '';
    $password = $_POST['password'] ?? '';
    $re_pass = $_POST['re_pass'];
    $prof_pic = $_POST['prof_pic'] ?? '';
    $address = $_POST['address'] ?? '';
    $country = $_POST['country'] ?? '';
    $zipcode = $_POST['zipcode'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $account_type = $_POST['account_type'];
    $error = '';

    if ($account_type == "store_owner") {
        $business_name = $_POST['business_name'];
        $store_name = $_POST['store_name'];
        $store_category = $_POST['store_category'];
    } else {
        $business_name = $store_name = $store_category = 'null';
    }

//Certain requirements for submit/save FORM DATA to EXTERNAL FILES
    if (
        has_length_greater_than($fname, 3) &&
        has_length_greater_than($lname, 3) &&
        has_valid_email_format($email) &&
        has_length_greater_than($address, 3) &&
        has_length_greater_than($zipcode, 3) &&
        has_length_greater_than($phone, 8) &&
        $password == $re_pass
    ){        
        // if(!detect_identicals($email, $phone)){
        //     $error = '<label class="text-failed">Email/Phone is already registered</label>';

        // } else {
        $hash_pass = password_hash($password, PASSWORD_BCRYPT);

        //Avatar upload
        if ($_FILES["prof_pic"]["error"] == UPLOAD_ERR_OK){
            //Avatar file name
            $ava_tempname = $_FILES["prof_pic"]["tmp_name"];

            $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
            //Get the file extension
            $extensions= array("jpeg","jpg","png");
        
            if(in_array($file_ext,$extensions)=== false){
                $error ='<label class="text-failed">extension not allowed, please choose a JPEG or PNG file.</label>';
            }

            // store new avatar 
            //Overwrite file if it already existed
            $name = basename($_FILES["prof_pic"]["name"]);
            $ava_src = PRIVATE_PATH . '/database/account_avatar/' . $name; 
            move_uploaded_file($ava_tempname, $ava_src);

            } else {
            $ava_src = PRIVATE_PATH . '/database/account_avatar/avatar.jpg';
        }

        $fp = fopen(PRIVATE_PATH . '/database/registered_account.csv', 'a');        

        // $colname = ["Id", "FirstName", "LastName", "Password", "Address", "Country", "Zipcode", "Email", "PhoneNumber", "AccountType", "BusinessName", "StoreName", "StoreCategory"];

        // $data = [$id_num, $fname, $lname, $hash_pass, $address, $country, $zipcode, $email, $phone, $account_type, $business_name, $store_name, $store_category, $ava_src];

        // if (count(file(PRIVATE_PATH . '/database/registered_account.csv') == 0)) {
        //     foreach ($colname as $header){
        //         fputcsv($fp, $header);
        //     }
        // }

        $id_num = count(file(PRIVATE_PATH . '/database/registered_account.csv'));
        if ($id_num > 1){
            $id_num = $id_num + 1 -1;
        }

        $form_data = array(
            "Id" => $id_num,
            "FirstName" => $fname, 
            "LastName" => $lname,
            "Password" => $hash_pass,
            "Address" => $address,
            "Country" => $country,
            "Zipcode" => $zipcode,
            "Email" => $email,
            "PhoneNumber" => $phone,
            "AccountType" => $account_type,
            "BusinessName" => $business_name,                     
            "StoreName" => $store_name, 
            "StoreCategory" => $store_category,
            "AvatarSrc" => $ava_src
        );
       
            fputcsv($fp, $form_data);
            $error = '<label class="text-success">Successfully Registered</label>';
    } else {
        $error = '<label class="text-failed">Register Failed</label>';
    }
        
} else {
    //Just display page
}

?>

<head>
    <meta charset="utf-08">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <link rel="stylesheet" href="./stylesheet/css.css">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        *{
            box-sizing: border-box;
        }

        .text-success{
            color: green;
        }

        .text-failed{
            color: red;
        }
    </style>
</head>

<body>
    <header class="simple-header-container">
        <div class="black-logo"> 
            <a href="index.php">
                <img class="logo" src="../image/shop-logo.png" alt="TaoHu"></a>    
        </div>
        <p>Create your Account</p>
        <div class="home-link">
            <a href="index.php">Home Page</a>
        </div>
    </header>
    

    <form id="registerform" enctype="multipart/form-data" action="<?php echo url_for('/register_acc.php'); ?>" method="post">
    <div class="register-acc-container">
        <div class="column">
        <h3>BASIC INFO:</h3>
    
        <div class="data">
        <input type="text" placeholder="First name" id="fname" class="form-control" name="fname" pattern="(?=.*[a-z]).{3,}" title="Must contain at least 3 characters" value="<?php echo $fname; ?>" required><br><br>
        </div>

        <div class="data">
        <input type="text" placeholder="Last name" id="lname" class="form-control" name="lname" pattern="(?=.*[a-z]).{3,}" title="Must contain at least 3 characters" value="<?php echo $lname; ?>" required><br><br>
        </div>

        <div class="data">
        <input type="password" placeholder="Password" id="psw" class="form-control" name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{7,20}$" title="Must contain a Lowercase, a Uppercase, a Digit, a Special Character and 8-20 characters" required><br><br>
        <span>
            <i class="fa fa-eye" aria-hidden="true" id="eye" onclick="toggleEye()"></i>
        </span>
        </div>
        <div id="message">
            <p id="letter" class="invalid">Password must contain a <b>lowercase</b> letter</p>
            <p id="capital" class="invalid">Password must contain a <b>capital</b> letter</p>
            <p id="number" class="invalid">Password must contain a <b>number</b></p>
            <p id="specialChar" class="invalid">Password must contain a <b>Special Character</b></p>
            <p id="length" class="invalid">Password must contain between <b>8-20 characters</b></p>
        </div>

        <div class="data">
        <input type="password" placeholder="Confirm Password" id="re_pass" class="form-control" name="re_pass" required><br><br>
        <span>
            <i class="fa fa-eye" aria-hidden="true" id="eye2" onclick="toggleEye2()"></i>
        </span>
        </div>         

        <div class="data">
        <h4>Profile picture</h4>
        <input type="file" id="prof-pic" name="prof_pic"><br><br>  
        </div>

        <div class="data">
        <input type="text" placeholder="Address" id="address" class="form-control" name="address" value="<?php echo $address; ?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{3,}" title="Must contain at least 3 characters" required><br><br>
        </div>

        <div class="data">
        <select id="country" name="country" class="form-control" required>
            <option>Select Country</option>
            <option value="AF">Afghanistan</option>
            <option value="AX">Aland Islands</option>
            <option value="AL">Albania</option>
            <option value="DZ">Algeria</option>
            <option value="AS">American Samoa</option>
            <option value="AD">Andorra</option>
            <option value="AO">Angola</option>
            <option value="AI">Anguilla</option>
            <option value="AQ">Antarctica</option>
            <option value="AG">Antigua and Barbuda</option>
            <option value="AR">Argentina</option>
            <option value="AM">Armenia</option>
            <option value="AW">Aruba</option>
            <option value="AU">Australia</option>
            <option value="AT">Austria</option>
            <option value="AZ">Azerbaijan</option>
            <option value="BS">Bahamas</option>
            <option value="BH">Bahrain</option>
            <option value="BD">Bangladesh</option>
            <option value="BB">Barbados</option>
            <option value="BY">Belarus</option>
            <option value="BE">Belgium</option>
            <option value="BZ">Belize</option>
            <option value="BJ">Benin</option>
            <option value="BM">Bermuda</option>
            <option value="BT">Bhutan</option>
            <option value="BO">Bolivia</option>
            <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
            <option value="BA">Bosnia and Herzegovina</option>
            <option value="BW">Botswana</option>
            <option value="BV">Bouvet Island</option>
            <option value="BR">Brazil</option>
            <option value="IO">British Indian Ocean Territory</option>
            <option value="BN">Brunei Darussalam</option>
            <option value="BG">Bulgaria</option>
            <option value="BF">Burkina Faso</option>
            <option value="BI">Burundi</option>
            <option value="KH">Cambodia</option>
            <option value="CM">Cameroon</option>
            <option value="CA">Canada</option>
            <option value="CV">Cape Verde</option>
            <option value="KY">Cayman Islands</option>
            <option value="CF">Central African Republic</option>
            <option value="TD">Chad</option>
            <option value="CL">Chile</option>
            <option value="CN">China</option>
            <option value="CX">Christmas Island</option>
            <option value="CC">Cocos (Keeling) Islands</option>
            <option value="CO">Colombia</option>
            <option value="KM">Comoros</option>
            <option value="CG">Congo</option>
            <option value="CD">Congo, Democratic Republic of the Congo</option>
            <option value="CK">Cook Islands</option>
            <option value="CR">Costa Rica</option>
            <option value="CI">Cote D'Ivoire</option>
            <option value="HR">Croatia</option>
            <option value="CU">Cuba</option>
            <option value="CW">Curacao</option>
            <option value="CY">Cyprus</option>
            <option value="CZ">Czech Republic</option>
            <option value="DK">Denmark</option>
            <option value="DJ">Djibouti</option>
            <option value="DM">Dominica</option>
            <option value="DO">Dominican Republic</option>
            <option value="EC">Ecuador</option>
            <option value="EG">Egypt</option>
            <option value="SV">El Salvador</option>
            <option value="GQ">Equatorial Guinea</option>
            <option value="ER">Eritrea</option>
            <option value="EE">Estonia</option>
            <option value="ET">Ethiopia</option>
            <option value="FK">Falkland Islands (Malvinas)</option>
            <option value="FO">Faroe Islands</option>
            <option value="FJ">Fiji</option>
            <option value="FI">Finland</option>
            <option value="FR">France</option>
            <option value="GF">French Guiana</option>
            <option value="PF">French Polynesia</option>
            <option value="TF">French Southern Territories</option>
            <option value="GA">Gabon</option>
            <option value="GM">Gambia</option>
            <option value="GE">Georgia</option>
            <option value="DE">Germany</option>
            <option value="GH">Ghana</option>
            <option value="GI">Gibraltar</option>
            <option value="GR">Greece</option>
            <option value="GL">Greenland</option>
            <option value="GD">Grenada</option>
            <option value="GP">Guadeloupe</option>
            <option value="GU">Guam</option>
            <option value="GT">Guatemala</option>
            <option value="GG">Guernsey</option>
            <option value="GN">Guinea</option>
            <option value="GW">Guinea-Bissau</option>
            <option value="GY">Guyana</option>
            <option value="HT">Haiti</option>
            <option value="HM">Heard Island and Mcdonald Islands</option>
            <option value="VA">Holy See (Vatican City State)</option>
            <option value="HN">Honduras</option>
            <option value="HK">Hong Kong</option>
            <option value="HU">Hungary</option>
            <option value="IS">Iceland</option>
            <option value="IN">India</option>
            <option value="ID">Indonesia</option>
            <option value="IR">Iran, Islamic Republic of</option>
            <option value="IQ">Iraq</option>
            <option value="IE">Ireland</option>
            <option value="IM">Isle of Man</option>
            <option value="IL">Israel</option>
            <option value="IT">Italy</option>
            <option value="JM">Jamaica</option>
            <option value="JP">Japan</option>
            <option value="JE">Jersey</option>
            <option value="JO">Jordan</option>
            <option value="KZ">Kazakhstan</option>
            <option value="KE">Kenya</option>
            <option value="KI">Kiribati</option>
            <option value="KP">Korea, Democratic People's Republic of</option>
            <option value="KR">Korea, Republic of</option>
            <option value="XK">Kosovo</option>
            <option value="KW">Kuwait</option>
            <option value="KG">Kyrgyzstan</option>
            <option value="LA">Lao People's Democratic Republic</option>
            <option value="LV">Latvia</option>
            <option value="LB">Lebanon</option>
            <option value="LS">Lesotho</option>
            <option value="LR">Liberia</option>
            <option value="LY">Libyan Arab Jamahiriya</option>
            <option value="LI">Liechtenstein</option>
            <option value="LT">Lithuania</option>
            <option value="LU">Luxembourg</option>
            <option value="MO">Macao</option>
            <option value="MK">Macedonia, the Former Yugoslav Republic of</option>
            <option value="MG">Madagascar</option>
            <option value="MW">Malawi</option>
            <option value="MY">Malaysia</option>
            <option value="MV">Maldives</option>
            <option value="ML">Mali</option>
            <option value="MT">Malta</option>
            <option value="MH">Marshall Islands</option>
            <option value="MQ">Martinique</option>
            <option value="MR">Mauritania</option>
            <option value="MU">Mauritius</option>
            <option value="YT">Mayotte</option>
            <option value="MX">Mexico</option>
            <option value="FM">Micronesia, Federated States of</option>
            <option value="MD">Moldova, Republic of</option>
            <option value="MC">Monaco</option>
            <option value="MN">Mongolia</option>
            <option value="ME">Montenegro</option>
            <option value="MS">Montserrat</option>
            <option value="MA">Morocco</option>
            <option value="MZ">Mozambique</option>
            <option value="MM">Myanmar</option>
            <option value="NA">Namibia</option>
            <option value="NR">Nauru</option>
            <option value="NP">Nepal</option>
            <option value="NL">Netherlands</option>
            <option value="AN">Netherlands Antilles</option>
            <option value="NC">New Caledonia</option>
            <option value="NZ">New Zealand</option>
            <option value="NI">Nicaragua</option>
            <option value="NE">Niger</option>
            <option value="NG">Nigeria</option>
            <option value="NU">Niue</option>
            <option value="NF">Norfolk Island</option>
            <option value="MP">Northern Mariana Islands</option>
            <option value="NO">Norway</option>
            <option value="OM">Oman</option>
            <option value="PK">Pakistan</option>
            <option value="PW">Palau</option>
            <option value="PS">Palestinian Territory, Occupied</option>
            <option value="PA">Panama</option>
            <option value="PG">Papua New Guinea</option>
            <option value="PY">Paraguay</option>
            <option value="PE">Peru</option>
            <option value="PH">Philippines</option>
            <option value="PN">Pitcairn</option>
            <option value="PL">Poland</option>
            <option value="PT">Portugal</option>
            <option value="PR">Puerto Rico</option>
            <option value="QA">Qatar</option>
            <option value="RE">Reunion</option>
            <option value="RO">Romania</option>
            <option value="RU">Russian Federation</option>
            <option value="RW">Rwanda</option>
            <option value="BL">Saint Barthelemy</option>
            <option value="SH">Saint Helena</option>
            <option value="KN">Saint Kitts and Nevis</option>
            <option value="LC">Saint Lucia</option>
            <option value="MF">Saint Martin</option>
            <option value="PM">Saint Pierre and Miquelon</option>
            <option value="VC">Saint Vincent and the Grenadines</option>
            <option value="WS">Samoa</option>
            <option value="SM">San Marino</option>
            <option value="ST">Sao Tome and Principe</option>
            <option value="SA">Saudi Arabia</option>
            <option value="SN">Senegal</option>
            <option value="RS">Serbia</option>
            <option value="CS">Serbia and Montenegro</option>
            <option value="SC">Seychelles</option>
            <option value="SL">Sierra Leone</option>
            <option value="SG">Singapore</option>
            <option value="SX">Sint Maarten</option>
            <option value="SK">Slovakia</option>
            <option value="SI">Slovenia</option>
            <option value="SB">Solomon Islands</option>
            <option value="SO">Somalia</option>
            <option value="ZA">South Africa</option>
            <option value="GS">South Georgia and the South Sandwich Islands</option>
            <option value="SS">South Sudan</option>
            <option value="ES">Spain</option>
            <option value="LK">Sri Lanka</option>
            <option value="SD">Sudan</option>
            <option value="SR">Suriname</option>
            <option value="SJ">Svalbard and Jan Mayen</option>
            <option value="SZ">Swaziland</option>
            <option value="SE">Sweden</option>
            <option value="CH">Switzerland</option>
            <option value="SY">Syrian Arab Republic</option>
            <option value="TW">Taiwan, Province of China</option>
            <option value="TJ">Tajikistan</option>
            <option value="TZ">Tanzania, United Republic of</option>
            <option value="TH">Thailand</option>
            <option value="TL">Timor-Leste</option>
            <option value="TG">Togo</option>
            <option value="TK">Tokelau</option>
            <option value="TO">Tonga</option>
            <option value="TT">Trinidad and Tobago</option>
            <option value="TN">Tunisia</option>
            <option value="TR">Turkey</option>
            <option value="TM">Turkmenistan</option>
            <option value="TC">Turks and Caicos Islands</option>
            <option value="TV">Tuvalu</option>
            <option value="UG">Uganda</option>
            <option value="UA">Ukraine</option>
            <option value="AE">United Arab Emirates</option>
            <option value="GB">United Kingdom</option>
            <option value="US">United States</option>
            <option value="UM">United States Minor Outlying Islands</option>
            <option value="UY">Uruguay</option>
            <option value="UZ">Uzbekistan</option>
            <option value="VU">Vanuatu</option>
            <option value="VE">Venezuela</option>
            <option value="VN">Viet Nam</option>
            <option value="VG">Virgin Islands, British</option>
            <option value="VI">Virgin Islands, U.s.</option>
            <option value="WF">Wallis and Futuna</option>
            <option value="EH">Western Sahara</option>
            <option value="YE">Yemen</option>
            <option value="ZM">Zambia</option>
            <option value="ZW">Zimbabwe</option>
        </select>
        </div>
        <br>

        <div class="data">
        <input type="text" placeholder="ZIP CODE" id="zipcode" name="zipcode" class="form-control" pattern="^[0-9]{4,6}$" title="Must contain 4-6 digits, no whitespace" value="<?php echo $zipcode; ?>" required><br><br>
        </div>
    </div>

    <div class="column">
        <h3>CONTACT INFO:</h3> 
        <div class="data">         
        <input type="email" placeholder="Email" id="registerEmail" name="email" class="form-control" value="<?php echo $email; ?>" required><br><br>
        <div id="emailMSGcontainer">
            <p id="emailMSG" class="invalid">Valid Email Address</p>
        </div>
    </div>

        <div class="data">
        <input type="text" placeholder="Phone number" id="phone" name="phone" class="form-control" value="<?php echo $phone; ?>" required><br><br>
        <div id="phoneMSGcontainer">
            <p id="phoneMSG" class="invalid">Valid Phone Number</p></div>
        </div>

        <h3 class="account-type-heading">YOUR ACCOUNT TYPE:</h3>
        <input type="radio" id="storeowner" onclick="acctype()" name="account_type" value="storeowner" required>
        <label for="storeowner">Store owner</label><br><br>
        
        <input type="radio" id="shopper" onclick="acctype()" name="account_type" value="shopper" required>
        <label for="shopper">Shopper</label><br><br>
        
        <div id="ifOwner" style="display:none">
            <h3>STORE INFO:</h3>
            <div class="data">
            <label for="business_name">Business name:</label><br>
            <input type="text" id="business_name" name="business_name" class="form-control"><br><br>
            </div>

            <div class="data">
            <label for="store_name">Store name:</label><br>
            <input type="text" id="store_name" name="store_name" class="form-control"><br><br>
            </div>

            <div class="data">
            <label for="store_catergory">Store Category:</label>
            <select id="store_category" name="store_category" class="form-control2">
                <option value="technology" class="option">Department Stores</option>
                <option value="clothes" class="option">Grocery Stores</option>
                <option value="grocery" class="option">Restaurants</option>
                <option value="accessory" class="option">Clothing</option>
                <option value="accessory" class="option">Accessory</option>
                <option value="accessory" class="option">Pharmacies</option>
                <option value="accessory" class="option">Technology</option>
                <option value="accessory" class="option">Pet Stores</option>
                <option value="accessory" class="option">Toys</option>
                <option value="accessory" class="option">Specialty Stores</option>
                <option value="accessory" class="option">Thrift stores</option>
                <option value="accessory" class="option">Kiosks</option>
            </select>
            </div>
        </div>        
        <br>        
        
        <div class="data">
        <input type="checkbox" id="agree-box" name="agree_box" class="agree-checkbox" required>
        <label for="agree_box">
            I accept the <a href="copyright.php" style="text-decoration: underline;">Terms of Service</a>
        </label>
        </div>
        <span>HELLLO</span>
        <?php echo $error; ?>
    </div>

    <div class="submit-reset-container">
        <div class="submit-reset-big">
        <div class="submit-reset">
        <input type="submit" class="btn" id="btn" value="submit">
        <input type="reset" class="reset" value="reset">
        </div>
        </div>
    </div>
    </div>
    </form>       
</body>

<?php include(SHARED_PATH . "/mall_footer.php"); ?>
<script type="text/javascript" src="./js/register_acc.js"></script>
<script type="text/javascript" src="./js/shared.js"></script>