<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$baseUrl = $this->config->item('base_url');
?>
<div class="clear"></div>
	<div class="inner-page">
        
        	<div class="wrapper">
            
            		
                    <div class="registration-wrapper">
                    	<h2>User Registration</h2>
                   	<div class="regi"> <form action="" class="forms" method="post" enctype="multipart/form-data">
                        <?php if(validation_errors()){ ?>
        <section class="content alertcontent">    
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                <?php echo validation_errors(); ?>
            </div>
        </section>
    <?php } ?>
            <?php if(!empty($this->session->flashdata('error_msg'))){ ?>
        <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Error!</h4>
                <?=$this->session->flashdata('error_msg')?>
              </div>          
    <?php } ?>
            <?php if(!empty($this->session->flashdata('msg'))){ ?>
        <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                <?=$this->session->flashdata('msg')?>
              </div>          
    <?php } ?>
                    <div class="input-files">
                        <label>Full Name <span class="requiredspan">*</span></label>
                       		 <input value="<?php if(isset($_POST['name'])){ echo $_POST['name']; }?>" name="name" type="text" placeholder="Full Name" class="registration">
                        </div>
                        <div class="input-files">
                        	<label>Email Address <span class="requiredspan">*</span></label>
                       		 <input value="<?php if(isset($_POST['email'])){ echo $_POST['email']; }?>" name="email" type="text" placeholder="Email Address" class="registration">
                        </div>
                        
                        <div class="input-files">
                        	<label>Password <span class="requiredspan">*</span></label>
                       		 <input value="<?php if(isset($_POST['password'])){ echo $_POST['password']; }?>" name="password" type="password" placeholder="Password" class="registration">
                        </div>
                        
                        <div class="input-files">
                        	<label>Confirm Password <span class="requiredspan">*</span></label>
                       		 <input value="<?php if(isset($_POST['cpassword'])){ echo $_POST['cpassword']; }?>" name="cpassword" type="password" placeholder="Confirm Password" class="registration">
                        </div>
                        
                        <div class="input-files">
                        	<label>Address <span class="requiredspan">*</span></label>
                       		 <input value="<?php if(isset($_POST['address'])){ echo $_POST['address']; }?>" name="address" type="text" placeholder="Address" class="registration">
                        </div>
                        
                       <div class="input-files fullcaptcha">
                        	<label><?php echo $captcha['image']; ?></label>
                            <input type="text" required autocomplete="off" name="userCaptcha"
                                   placeholder="Enter above text" class="registration"
                                   value="<?php if (!empty($userCaptcha)) {
                                       echo $userCaptcha;
                                   } ?>"/>
                            <div class="input-error">
                                   <?php if(isset($validation_errors_captcha) && $validation_errors_captcha!=''){?> Invalid captcha<?php }?>
                                    </div> 
                        </div>
                        <div class="input-files">
                        	<label></label>
                            <input required name="terms" type="checkbox" class=""> I have read and agree to the <a href="#">terms and conditions</a>
                        </div>
                        <div>
                     	<input type="submit" value="register" class="register-btn"> 
                        </div>
                     	
                     </form>
                        </div>
                    
                    </div>
            
            </div>
        </div>
    