<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$baseUrl = $this->config->item('base_url');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<title>Untitled Document</title>
<link href="<?php echo $baseUrl; ?>assets/frontend/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>assets/frontend/css/cs-select.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>assets/frontend/css/cs-skin-elastic.css" />
    
  <link rel="stylesheet" href="<?php echo $baseUrl; ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo $baseUrl; ?>assets/bower_components/select2/dist/css/select2.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo $baseUrl; ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
 
    
<link href="<?php echo $baseUrl; ?>assets/frontend/css/css.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>assets/frontend/engine1/style.css" />

	
</head>
<body>
<!-- /.modal -->
	<div class="bn-container">
    <div class="container <?php if(isset($page) && $page=='homepage'){}else{ echo 'inner-con'; }?>">
    	<div class="wrapper">
            <div class="logos">
        	<a href="<?php echo $baseUrl; ?>"><div class="logo"><img src="<?php echo $baseUrl; ?>assets/frontend/images/logo.png"></div> </a></div>
            <div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'en,es', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        <?php if(isset($page) && $page=="bookdoctor"){ ?>
<?php }else{ ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<?php } ?>    
            <div class="menu_right mmenu">
            <div class="mobile_menu">
              	<a href="javascript:void(0);">
                	<span></span>
                	<span></span>
                	<span></span>
                </a>
              </div>
          <div class="menu">
            
            	<ul>
                	<li><a href="<?php echo $baseUrl; ?>">Home</a></li>
                    <li><a href="<?php echo $baseUrl; ?>pages/aboutus">About Us</a></li>
<!--                    <li><a href="<?php echo $baseUrl; ?>">Search Doctor</a></li>-->
<!--                    <li><a href="<?php echo $baseUrl; ?>doctor/listing">Medical Specialty</a></li>-->
               
<!--                    <li><a href="<?php echo $baseUrl; ?>pages/contactus">Contact Us</a></li>-->
                    	
                
                </ul>
            
            </div>
                </div>
            <div class="section_right">
                <?php if(isset($_SESSION['doctor_session']) && !empty($_SESSION['doctor_session'])){ ?>
                <a href="<?php echo $baseUrl; ?>doctoraccount" class="login-doctor ">Healthcare User Account</a>
                <?php }else{ ?>
                <a href="<?php echo $baseUrl; ?>doctor/login" class="login-doctor ">Healthcare user</a>
                <?php } ?>
          
                
                
            <?php if(isset($_SESSION['frontuser_session']) && !empty($_SESSION['frontuser_session'])){ ?>
           <a href="<?php echo $baseUrl; ?>useraccount" class="login-doctor login-doctor1">User Account</a>
            <?php }else{ ?>
          <a href="<?php echo $baseUrl; ?>user/login" class="login-doctor login-doctor1">User login</a>
                <?php } ?>
           </div>
                
    
        </div>
    
    
    </div>