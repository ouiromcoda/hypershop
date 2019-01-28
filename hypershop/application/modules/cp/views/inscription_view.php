<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en"> 

<head>
<meta charset="utf-8"/>
<title>S-Cash - Votre banque mobile!</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content name="description"/>
<meta content name="author"/>

<meta name="robots" content="index, follow">
<link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/favicon.png"  />

<link rel="canonical" href="<?php echo base_url('ouvrir-un-compte') ?>" />

<link href="<?php echo base_url(); ?>assets/new_login/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/new_login/assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/new_login/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/new_login/assets/css/style-metro.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/new_login/assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/new_login/assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/new_login/assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?php echo base_url(); ?>assets/new_login/assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/new_login/assets/plugins/select2/select2_metro.css"/>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/sweetalert/sweetalert.css"/>

<link href="<?php echo base_url(); ?>assets/new_login/assets/css/pages/login-soft.css" rel="stylesheet" type="text/css"/>
<link rel="shortcut icon" href="favicon.ico"/>

<style>
    .error {color: red;}
</style>

<script type="text/javascript">
    var site_url = '<?php echo site_url(); ?>';
</script>

</head>

<body class="login">

<div class="logo">
    <a href="<?php echo site_url('accueil'); ?>">
        <img style="width: 150px; height: 45px;" src="<?php echo base_url(); ?>assets/images/logo_scash.png">
    </a>
</div>


<div class="content">


<form method="post" action="<?php echo site_url('cp/step1'); ?>" class="form-vertical">
  <center><h3>Ouverture de compte</h3></center>
  
  <?php if(isset($error_message)) {
          echo "<div class='error'>".$error_message."</div> <p>&nbsp;</p>";
      }
  ?>

  <div class="control-group">
    <label class="control-label visible-ie8 visible-ie9">Nom & Prénoms</label>
    <div class="controls">
      <div class="input-icon left">
        <i class="icon-font"></i>
        <input placeholder="Nom & Prénoms" value="<?= set_value('name_user'); ?>" name="name_user" class="m-wrap placeholder-no-fix" type="text" />
          <?php echo form_error('name_user','<span class="error">','</span>'); ?>
      </div>
    </div>
  </div>

<div class="control-group">
  <label class="control-label visible-ie8 visible-ie9">Email</label>
  <div class="controls">
    <div class="input-icon left">
      <i class="icon-envelope"></i>
      <input placeholder="Email" value="<?= set_value('email_user'); ?>" name="email_user" class="m-wrap placeholder-no-fix" type="text" />
      <?php echo form_error('email_user','<span class="error">','</span>'); ?>
    </div>
  </div>
</div>

<div class="control-group">
<div class="row-fluid">
<label class="control-label visible-ie8 visible-ie9">Pays</label>
<div class="controls">
<select name="country" id="" class="span12 select2">
<option value></option>
<option value="AF">Afghanistan</option>
<option value="AL">Albania</option>
<option value="DZ">Algeria</option>
<option value="AS">American Samoa</option>
<option value="AD">Andorra</option>
<option value="AO">Angola</option>
<option value="AI">Anguilla</option>
<option value="AQ">Antarctica</option>
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
<option value="BA">Bosnia and Herzegowina</option>
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
<option value="CD">Congo, the Democratic Republic of the</option>
<option value="CK">Cook Islands</option>
<option value="CR">Costa Rica</option>
<option value="CI">Cote d'Ivoire</option>
<option value="HR">Croatia (Hrvatska)</option>
<option value="CU">Cuba</option>
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
<option value="GN">Guinea</option>
<option value="GW">Guinea-Bissau</option>
<option value="GY">Guyana</option>
<option value="HT">Haiti</option>
<option value="HM">Heard and Mc Donald Islands</option>
<option value="VA">Holy See (Vatican City State)</option>
<option value="HN">Honduras</option>
<option value="HK">Hong Kong</option>
<option value="HU">Hungary</option>
<option value="IS">Iceland</option>
<option value="IN">India</option>
<option value="ID">Indonesia</option>
<option value="IR">Iran (Islamic Republic of)</option>
<option value="IQ">Iraq</option>
<option value="IE">Ireland</option>
<option value="IL">Israel</option>
<option value="IT">Italy</option>
<option value="JM">Jamaica</option>
<option value="JP">Japan</option>
<option value="JO">Jordan</option>
<option value="KZ">Kazakhstan</option>
<option value="KE">Kenya</option>
<option value="KI">Kiribati</option>
<option value="KP">Korea, Democratic People's Republic of</option>
<option value="KR">Korea, Republic of</option>
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
<option value="MO">Macau</option>
<option value="MK">Macedonia, The Former Yugoslav Republic of</option>
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
<option value="KN">Saint Kitts and Nevis</option>
<option value="LC">Saint LUCIA</option>
<option value="VC">Saint Vincent and the Grenadines</option>
<option value="WS">Samoa</option>
<option value="SM">San Marino</option>
<option value="ST">Sao Tome and Principe</option>
<option value="SA">Saudi Arabia</option>
<option value="SN">Senegal</option>
<option value="SC">Seychelles</option>
<option value="SL">Sierra Leone</option>
<option value="SG">Singapore</option>
<option value="SK">Slovakia (Slovak Republic)</option>
<option value="SI">Slovenia</option>
<option value="SB">Solomon Islands</option>
<option value="SO">Somalia</option>
<option value="ZA">South Africa</option>
<option value="GS">South Georgia and the South Sandwich Islands</option>
<option value="ES">Spain</option>
<option value="LK">Sri Lanka</option>
<option value="SH">St. Helena</option>
<option value="PM">St. Pierre and Miquelon</option>
<option value="SD">Sudan</option>
<option value="SR">Suriname</option>
<option value="SJ">Svalbard and Jan Mayen Islands</option>
<option value="SZ">Swaziland</option>
<option value="SE">Sweden</option>
<option value="CH">Switzerland</option>
<option value="SY">Syrian Arab Republic</option>
<option value="TW">Taiwan, Province of China</option>
<option value="TJ">Tajikistan</option>
<option value="TZ">Tanzania, United Republic of</option>
<option value="TH">Thailand</option>
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
<option value="VG">Virgin Islands (British)</option>
<option value="VI">Virgin Islands (U.S.)</option>
<option value="WF">Wallis and Futuna Islands</option>
<option value="EH">Western Sahara</option>
<option value="YE">Yemen</option>
<option value="ZM">Zambia</option>
<option value="ZW">Zimbabwe</option>
</select>
</div>
</div>
</div>

<p>Enter les détails de votre compte:</p>

<div class="control-group">
<label class="control-label visible-ie8 visible-ie9">Mot de passe</label>
<div class="controls">
<div class="input-icon left">
<i class="icon-lock"></i>
<input class="m-wrap placeholder-no-fix" name="password_user" type="password" autocomplete="off" id="register_password" placeholder="Mot de passe"/>
<?php echo form_error('password_user','<span class="error">','</span>'); ?>
</div>
</div>
</div>

<div class="control-group">
<label class="control-label visible-ie8 visible-ie9">Confirmation</label>
<div class="controls">
<div class="input-icon left">
<i class="icon-ok"></i>
<input class="m-wrap placeholder-no-fix" name="password_confirmation" type="password" autocomplete="off" placeholder="Entrez à nouveau votre mot de passe"/>
<?php echo form_error('password_confirmation','<span class="error">','</span>') . '<br/>'; ?>
</div>
</div>
</div>

<input type="hidden" name="id_role" value="2" class="form-control">

<div class="control-group">
<div class="controls">
<label class="checkbox">
<input checked="checked" type="checkbox" name="tnc"/>
     J'accepte les <a class="blue" href="#">Termes de politique de confidentialité du service Terms of Service</a>
     <?php echo form_error('tnc','<span class="error">','</span>') . '<br/>'; ?>
</label>
<div id="register_tnc_error"></div>
</div>
</div>

<div class="form-actions">
<a id="register-back-btn" href="<?php echo site_url('espace-client'); ?>" class="btn">
<i class="m-icon-swapleft"></i> Retour
</a>
<button type="submit" id="register-submit-btn" class="btn green pull-right">
Ouverture de compte <i class="m-icon-swapright m-icon-white"></i>
</button>
</div>
</form>

</div>


<div class="copyright">
2017 &copy; <a href="http://www.wellibo.ci/">Wellibo</a>
</div>


 <script src="<?php echo base_url(); ?>assets/new_login/assets/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/new_login/assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/new_login/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/new_login/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/new_login/assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<!--[if lt IE 9]>
  <script src="assets/plugins/excanvas.min.js"></script>
  <script src="assets/plugins/respond.min.js"></script>  
  <![endif]-->
<script src="<?php echo base_url(); ?>assets/new_login/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/new_login/assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/new_login/assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/new_login/assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>


<script src="<?php echo base_url(); ?>assets/new_login/assets/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/new_login/assets/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/new_login/assets/plugins/select2/select2.min.js"></script>


<script src="<?php echo base_url(); ?>assets/new_login/assets/scripts/app.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/new_login/assets/scripts/login-soft.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/sweetalert/sweetalert.min.js" type="text/javascript"></script>

<script>
    jQuery(document).ready(function() {     
      App.init();
      Login.init();
    });
  </script>


    <?php
        if($this->session->flashdata('succes')) {
            
             $home_page = site_url();

             $success_dialog = <<< DIALOG
                 <script type="text/javascript">
                      
                      swal({
                          title: "Bravo",
                          text: "Votre compte a été crée avec success! Veuillez vérifier votre adresse email pour l'activation!",
                          type: "success",
                          showCancelButton: false,
                          confirmButtonColor: "#35aa47",
                          confirmButtonText: "Okay",
                          closeOnConfirm: false,
                        },
                        function(isConfirm){
                          if (isConfirm) {
                            window.location.href = '{$home_page}';
                          }
                      });

                  </script>
DIALOG;

            echo $success_dialog;
            die();
        }
    ?>

</body>

</html>