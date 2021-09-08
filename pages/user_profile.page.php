<?php include './sections/header.section.php'; ?>

<?php include './includes/autoloader.inc.php';?>
<?php include './classes/Connection.class.php';?>
<?php include './classes/User.class.php';?>
<?php include './sections/navbar.section.php'; ?>
<!-- content start -->
<div class="row d-flex justify-content-around align-self-center">
    <div class="col col-lg-11 col-md-11">
        <div class="card card-forms">
			<div class="card-header card-head-bg">
				<div class="label-heading"><h5 class="text-center text-white">User profile</h5></div>
			</div><!-- card-header -->
			<div class="card-body card-bg-new">
						<!-- bio -->
						<?php 
						$user_id = $_SESSION['user_session'];
						$update = new User();
						$profile_img = $update->profile_img($user_id);
						if($profile_img){
							echo '<div class=""><img src="img/user_img/'.$profile_img.'"class="card-img-top img-border-radius" style="width: 18rem;" alt="user img"></div>';
						}else{
							echo '<div class=""><img src="img/user_img/035-chef.png" class="card-img-top img-border-radius" style="width: 18rem;" alt="user img"></div>';	
						}
						?>
						
												<!-- collapse update img start -->
						<div class="">								
					<a class="text-new" type="button" data-toggle="collapse" data-target="#update_img" aria-expanded="false" aria-controls="update_img"><i class="far fa-edit"></i>
					</a>
					<div class="collapse" id="update_img">
					<div class="card card-body">
					<form action="" id="profile_img_form" method="POST" enctype="multipart/form-data">
					<div class="form-group">
					<input class="form-control" type="file" id="profile_img" name="profile_img" placeholder="Upload img..." required>
					<div class="profile_img-error error text-danger"></div>
					</div><!-- form-group -->
					<div class="form-group">
					<button type="submit" id="upload_img_btn" value="upload_img" class="btn btn-outline-new btn-block form-btn">Upload img</button>
					</div><!-- form-group -->
					</form><!-- form -->
					</div>
					</div>
					</div>
					<!-- collapse update img end -->
				
				<?php


			$user_id = $_SESSION['user_session'];
			$info = new User();
			$result = $info->user_info($user_id);
			
			if ($result->num_rows > 0) {
			
			
			while($row = $result->fetch_assoc()) {
				
			echo'	

			<div class="card card-body card-body-new">

			';
			if($_SESSION['type'] == 'business'){
				echo '
				<div class="container">
			<div class="row justify-content-between">
				<div class="col-auto">
				<h5>'. $row["id_number"] .'</h5>
				</div>
				<div class="col-auto">
				<!-- collapse id number start -->
			<a class="text-new"  data-toggle="collapse" data-target="#id_number_area" aria-expanded="false" aria-controls="id_number_area">
			<i class="far fa-edit"></i>
			</a>
			<div class="collapse" id="id_number_area">
			<div class="card card-body">
			<form action="" id="update_id_number_form" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<input class="form-control" type="number" id="update_id_number" name="update_id_number" placeholder="Enter Conpany Id number..." min="999999999999" max="9999999999999">
				<div class="update_id_number-error error text-danger"></div>
			</div><!-- form-group -->
			<div class="form-group">
				<input type="password" autocomplete="false" name="id_number_password" id="id_number_password" class="form-control" placeholder="Enter Password..." required>
				<div class="id_number_password-error error text-danger"></div>
			</div><!-- form-group -->
			<div class="form-group">
			<button type="submit" id="update_id_number_btn" value="update_id_number_btn" class="btn btn-outline-new btn-block form-btn">Update Id number</button>
			</div><!-- form-group -->
			</form><!-- form -->
			</div>
			</div>
			<!-- collapse update id number end -->
				</div>
			</div>
			</div>
			<br>
				';}


			echo'

			<div class="container">
			<div class="row justify-content-between">
				<div class="col-auto">
				<h3>'. $row["fullname"] .'</h3>
				</div>
				<div class="col-auto">
				<!-- collapse update city start -->
			<a class="text-new"  data-toggle="collapse" data-target="#update_fullname_area" aria-expanded="false" aria-controls="update_fullname_area">
			<i class="far fa-edit"></i>
			</a>
			<div class="collapse" id="update_fullname_area">
			<div class="card card-body">
			<form action="" id="update_fullname_form" method="POST" enctype="multipart/form-data">
			<div class="form-group">
			<input class="form-control" type="text" id="update_fullname" name="update_fullname" placeholder="Enter fullname..." required>
			<div class="update_fullname-error error text-danger"></div>
			</div><!-- form-group -->
			<div class="form-group">
				<input type="password" autocomplete="false" name="fullname_password" id="fullname_password" class="form-control" placeholder="Enter Password..." required>
				<div class="fullname_password-error error text-danger"></div>
			</div><!-- form-group -->
			<div class="form-group">
			<button type="submit" id="update_fullname_btn" value="update_fullname_btn" class="btn btn-outline-new btn-block form-btn">Update fullname</button>
			</div><!-- form-group -->
			</form><!-- form -->
			</div>
			</div>
			<!-- collapse update fullname end -->
				</div>
			</div>
			</div>
			<br>


			<div class="container">
			<div class="row justify-content-between">
				<div class="col-auto">
				<h5>'. $row["user_email"] .'</h5>
				</div>
				<div class="col-auto">
				<!-- collapse update email start -->
			<a class="text-new"  data-toggle="collapse" data-target="#update_email_area" aria-expanded="false" aria-controls="update_email_area">
			<i class="far fa-edit"></i>
			</a>
			<div class="collapse" id="update_email_area">
			<div class="card card-body">
			<form action="" id="update_email_form" method="POST" enctype="multipart/form-data">
			<div class="form-group">
			<input class="form-control" type="email" id="update_email" name="update_email" placeholder="Enter email..." required>
			<div class="update_email-error error text-danger"></div>
			</div><!-- form-group -->
			<div class="form-group">
				<input type="password" autocomplete="false" name="email_password" id="email_password" class="form-control" placeholder="Enter Password..." required>
				<div class="email_password-error error text-danger"></div>
			</div><!-- form-group -->
			<div class="form-group">
			<button type="submit" id="update_email_btn" value="update_email_btn" class="btn btn-outline-new btn-block form-btn">Update email</button>
			</div><!-- form-group -->
			</form><!-- form -->
			</div>
			</div>
			<!-- collapse update email end -->
				</div>
			</div>
			</div>
			<br>


			<div class="container">
			<div class="row justify-content-between">
				<div class="col-auto">
				<h5>'. $row["phone"] .'</h5>
				</div>
				<div class="col-auto">
				<!-- collapse update phone start -->
			<a class="text-new" type="button" data-toggle="collapse" data-target="#update_phone_area" aria-expanded="false" aria-controls="update_phone_area">
			<i class="far fa-edit"></i>
			</a>
			<div class="collapse" id="update_phone_area">
			<div class="card card-body">
			<form action="" id="update_phone_form" method="POST" enctype="multipart/form-data">
			<div class="form-group">
			<input class="form-control" type="tel" pattern="^[+]?[0-9]{9,12}$" id="update_phone" name="update_phone" placeholder="Enter phone number..." required>
			<div class="update_phone-error error text-danger"></div>
			</div><!-- form-group -->
			<div class="form-group">
				<input type="password" autocomplete="false" name="phone_password" id="phone_password" class="form-control" placeholder="Enter Password..." required>
				<div class="phone_password-error error text-danger"></div>
			</div><!-- form-group -->
			<div class="form-group">
			<button type="submit" id="update_phone_btn" value="update_phone_btn" class="btn btn-outline-new btn-block form-btn">Update phone</button>
			</div><!-- form-group -->
			</form><!-- form -->
			</div>
			</div>

			<!-- collapse update phone end -->
				</div>
			</div>
			</div>
			<br>


			<div class="container">
			<div class="row justify-content-between">
				<div class="col-auto">
				<h5>'. $row["address"] .'</h5>
				</div>
				<div class="col-auto">
				<!-- collapse update address start -->
			<a class="text-new type="button" data-toggle="collapse" data-target="#update_address_area" aria-expanded="false" aria-controls="update_address_area">
			<i class="far fa-edit"></i>
			</a>
			<div class="collapse" id="update_address_area">
			<div class="card card-body">
			<form action="" id="update_address_form" method="POST" enctype="multipart/form-data">
			<div class="form-group">
			<input class="form-control" type="text" id="update_address" name="update_address" placeholder="Enter address..." required>
			<div class="update_address-error error text-danger"></div>
			</div><!-- form-group -->
			<div class="form-group">
				<input type="password" autocomplete="false" name="address_password" id="address_password" class="form-control" placeholder="Enter Password..." required>
				<div class="address_password-error error text-danger"></div>
			</div><!-- form-group -->
			<div class="form-group">
			<button type="submit" id="update_address_btn" value="update_address_btn" class="btn btn-outline-new btn-block form-btn">Update address</button>
			</div><!-- form-group -->
			</form><!-- form -->
			</div>
			</div>
			<!-- collapse update address end -->
				</div>
			</div>
			</div>
			<br>



			<div class="container">
			<div class="row justify-content-between">
				<div class="col-auto">
				<h5>'. $row["city"] .'</h5>
				</div>
				<div class="col-auto">
				<!-- collapse update city start -->
			<a class="text-new" type="button" data-toggle="collapse" data-target="#update_city_area" aria-expanded="false" aria-controls="update_city_area"><i class="far fa-edit"></i></a>
			<div class="collapse" id="update_city_area">
			<div class="card card-body">
			<form action="" id="update_city_form" method="POST" enctype="multipart/form-data">
			<div class="form-group">
			<input class="form-control" type="text" id="update_city" name="update_city" placeholder="Enter city..." required>
			<div class="update_city-error error text-danger"></div>
			</div><!-- form-group -->
			<div class="form-group">
				<input type="password" autocomplete="false" name="city_password" id="city_password" class="form-control" placeholder="Enter Password..." required>
				<div class="city_password-error error text-danger"></div>
			</div><!-- form-group -->
			<div class="form-group">
			<button type="submit" id="update_city_btn" value="update_city_btn" class="btn btn-outline-new btn-block form-btn">Update city</button>
			</div><!-- form-group -->
			</form><!-- form -->
			</div>
			</div>

			<!-- collapse update city end -->
				</div>
			</div>
			</div>
			<br>



			<div class="container">
			<div class="row justify-content-between">
				<div class="col-auto">
				<h5>'. $row["zip_code"] .'</h5>
				</div>
				<div class="col-auto">
				<!-- collapse update zip code start -->
			<a class="text-new"  data-toggle="collapse" data-target="#update_zipcode_area" aria-expanded="false" aria-controls="update_zipcode_area">
			<i class="far fa-edit"></i>
			</a>
			<div class="collapse" id="update_zipcode_area">
			<div class="card card-body">
			<form action="" id="update_zipcode_form" method="POST" enctype="multipart/form-data">
			<div class="form-group">
			<input class="form-control" type="text" id="update_zipcode" name="update_zipcode" placeholder="Enter zip code..." required>
			<div class="update_zipcode-error error text-danger"></div>
			</div><!-- form-group -->
			<div class="form-group">
				<input type="password" autocomplete="false" name="zipcode_password" id="zipcode_password" class="form-control" placeholder="Enter Password..." required>
				<div class="zipcode_password-error error text-danger"></div>
			</div><!-- form-group -->
			<div class="form-group">
			<button type="submit" id="update_zipcode_btn" value="update_zipcode_btn" class="btn btn-outline-new btn-block form-btn">Update zip code</button>
			</div><!-- form-group -->
			</form><!-- form -->
			</div>
			</div>

			<!-- collapse update zip code end -->
				</div>
			</div>
			</div>

			<br>

			<div class="container">
			<div class="row justify-content-between">
				<div class="col-auto">
				<h5>'. $row["country"] .'</h5>
				</div>
				<div class="col-auto">
				<!-- collapse update country start -->
			<a class="text-new"  data-toggle="collapse" data-target="#update_country_area" aria-expanded="false" aria-controls="update_country_area">
			<i class="far fa-edit"></i>
			</a>
			<div class="collapse" id="update_country_area">
			<div class="card card-body">
			<form action="" id="update_country_form" method="POST" enctype="multipart/form-data">
			<div class="form-group">
			<select class="form-control" id="update_country" name="update_country" required>
				<option value="">Choose country...</option>
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
				<div class="update_country-error error text-danger"></div>
				</div><!-- form-group -->
				<div class="form-group">
					<input type="password" autocomplete="false" name="country_password" id="country_password" class="form-control" placeholder="Enter Password..." required>
					<div class="country_password-error error text-danger"></div>
				</div><!-- form-group -->
				<div class="form-group">
				<button type="submit" id="update_country_btn" value="update_country_btn" class="btn btn-outline-new btn-block form-btn">Update country</button>
			</div><!-- form-group -->
			</form><!-- form -->
			</div>
			</div>
			</div>
			<!-- collapse update country end -->
				</div>
			</div>
			</div>


				';
			}
			} else {
			echo '
				

			<div class="card card-body">
			<form action="" id="user_profile_form" method="POST" enctype="multipart/form-data">';
			if($_SESSION['type'] == 'business'){
				echo '
					<div class="form-group">
					<input class="form-control" type="number" id="id_number" name="id_number" placeholder="Enter Conpany Id number..." min="999999999999" max="9999999999999" required>
				<div class="id_number-error error text-danger"></div>
				</div><!-- form-group -->';}
				echo '
				<div class="form-group">
					<input class="form-control" type="tel" pattern="^[+]?[0-9]{9,12}$" id="phone" name="phone" placeholder="Enter phone number..." required>
						<div class="phone-error error text-danger"></div>
				</div><!-- form-group -->
				<div class="form-group">
					<input class="form-control" type="text" id="address" name="address" placeholder="Enter address..." required>
						<div class="address-error error text-danger"></div>
				</div><!-- form-group -->
				<div class="form-group">
					<input class="form-control" id="city" type="text" name="city" placeholder="Enter city..." required>
						<div class="city-error error text-danger"></div>
				</div><!-- form-group -->
				<div class="form-group">
					<input class="form-control" type="number" id="zip_code" name="zip_code" placeholder="Enter zip code..." required>
						<div class="zip_code-error error text-danger"></div>
				</div><!-- form-group -->
				<div class="form-group">
					<select class="form-control" id="country" name="country" required>
						<option value="">Choose country...</option>
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
						<div class="country-error error text-danger"></div>
				</div><!-- form-group -->
				<div class="form-group">
					<button type="submit" id="insert_bio" value="bilo sta" name="insert_bio" class="btn btn-outline-new btn-block form-btn">Create profile</button>
				</div><!-- form-group -->
				</form><!-- form -->
			</div>
			
			';
			}


			?>


				<div class="container">
				<div class="row justify-content-between">
					<div class="col-auto">
						<!-- collapse update password start -->
						<a class="text-new"  data-toggle="collapse" data-target="#update_password_area" aria-expanded="false" aria-controls="update_password_area">Update password
						<i class="far fa-edit"></i>
						</a>
						<div class="collapse" id="update_password_area">
						<div class="card card-body">
						<form action="" id="update_password_form" method="POST" enctype="multipart/form-data">
							<div class="form-group">
							<input type="password" autocomplete="false"id="old_password" class="form-control" placeholder="Enter old password..." required>
							<div class="old_password-error error text-danger"></div>
							</div><!-- form-group -->
							<div class="form-group">
							<input type="password" autocomplete="false" name="update_password" id="update_password" class="form-control" placeholder="Enter new password..." required>
							<div class="update_password-error error text-danger"></div>
							</div><!-- form-group -->
							<div class="form-group">
							<input type="password" autocomplete="false"id="re_new_password" class="form-control" placeholder="Reetape new password..." required>
							<div class="re_new_password-error error text-danger"></div>
							</div><!-- form-group -->
							<div class="form-group">
							<button type="submit" id="update_password_btn" value="update_password_btn" class="btn btn-outline-new btn-block form-btn">Update password</button>
							</div><!-- form-group -->
						</form><!-- form -->
						</div>
						</div>
						<!-- collapse update password end -->
					</div>
					<div class="col-auto">
					<!-- collapsedelete profile update bio start -->
						<a class="text-danger" type="button" data-toggle="collapse" data-target="#delete_profile_area" aria-expanded="false" aria-controls="delete_profile_area">Delete profile <i class="fas fa-user-times"></i></a>
						<div class="collapse" id="delete_profile_area">
						<div class="card card-body">
						<form action="" id="delete_profile_form" method="POST" enctype="multipart/form-data">
								<div class="form-group">
									<input type="email" name="delete_profile_email" id="delete_profile_email" class="form-control" placeholder="Enter Email..." autocomplete="off" required>
									<div class="delete_profile_email-error error text-danger"></div>
								</div><!-- form-group -->
								<div class="form-group">
									<input type="password" autocomplete="false" name="delete_profile_password" id="delete_profile_password" class="form-control" placeholder="Enter Password..." required>
									<div class="delete_profile_password-error error text-danger"></div>
								</div><!-- form-group -->
								<div class="form-group">
									<button type="submit" id="delete_profile_btn" name="delete_profile_btn" value="delete_profile_btn" class="btn btn-outline-danger btn-radius btn-block form-btn">Delete profile</button>
								</div><!-- form-group -->
							</form><!-- form -->
						</div>
						</div>
						<!-- collapse delete profile end -->
						</div>
					</div>
					</div>

			
			

			</div><!-- card-body -->

		</div><!-- card -->

	</div><!-- col -->

</div><!-- content end -->
    




		





<?php include './sections/footer.section.php'; ?>