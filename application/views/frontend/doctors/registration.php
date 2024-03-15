<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$baseUrl = $this->config->item('base_url');
?>
<div class="clear"></div>
	<div class="inner-page">
        
        	<div class="wrapper">
            
            		
                    <div class="registration-wrapper">
                    	<h2>Healthcare User Registration</h2>
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
                        	<label>First Name <span class="requiredspan">*</span></label>
                       		 <input value="<?php if(isset($_POST['first_name'])){ echo $_POST['first_name']; }?>" name="first_name" type="text" placeholder="First Name" class="registration">
                        </div>
                        <div class="input-files">
                        	<label>Last Name <span class="requiredspan">*</span></label>
                       		 <input value="<?php if(isset($_POST['last_name'])){ echo $_POST['last_name']; }?>" name="last_name" type="text" placeholder="Last Name" class="registration">
                        </div>
                        <div class="input-files">
                        	<label>Display Name <span class="requiredspan">*</span></label>
                       		 <input value="<?php if(isset($_POST['display_name'])){ echo $_POST['display_name']; }?>" name="display_name" type="text" placeholder="Display Name" class="registration">
                        </div>
                        <div class="input-files">
                        	<label>Zip Code <span class="requiredspan">*</span></label>
                       		 <input value="<?php if(isset($_POST['zip_code'])){ echo $_POST['zip_code']; }?>" name="zip_code" type="text" placeholder="Zip Code" class="registration">
                        </div>
                        <div class="input-files">
                        	<label>Phone <span class="requiredspan">*</span></label>
                       		 <input value="<?php if(isset($_POST['phone'])){ echo $_POST['phone']; }?>" name="phone" type="text" placeholder="Phone" class="registration">
                        </div>
                        <div class="input-files">
                        	<label>City <span class="requiredspan">*</span></label>
                            <select name="city" class="registration select2">
                                <option value="">Please Select City</option>
                                <?php foreach($cities as $city){ ?>
                                <option <?php if(isset($_POST['city']) && $_POST['city']==$city['id']){ echo 'selected'; }?> value="<?php echo $city['id']; ?>"><?php echo $city['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="input-files">
                        	<label>Country <span class="requiredspan">*</span></label>
                            <select name="country" class="registration select2">
                                <option value="">Please Select Country</option>
                                <?php foreach($countries as $country){ ?>
                                <option <?php if(isset($_POST['country']) && $_POST['country']==$country['id']){ echo 'selected'; }?> value="<?php echo $country['id']; ?>"><?php echo $country['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="input-files">
                        	<label>Address <span class="requiredspan">*</span></label>
                       		 <input value="<?php if(isset($_POST['address'])){ echo $_POST['address']; }?>" name="address" type="text" placeholder="Address" class="registration">
                        </div>
<!--
                        <div class="input-files">
                        	<label>Categtory <span class="requiredspan">*</span></label>
                           
                            <select name="category" class="registration select2">
                                <option value="">Please Select Category</option>
                                <?php foreach($categories as $category){ ?>
                                <option <?php if(isset($_POST['category']) && $_POST['category']==$category['id']){ echo 'selected'; }?> value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
-->
                        
                        <div class="input-files availabity_checks">
                        	<label>Please Select Category</label>
                           <?php foreach($categories as $category){ ?>
                            <div class="setavailability"><input type="checkbox" name="category[]" value="<?php echo $category['id']; ?>"><span><?php echo $category['name']; ?></span></div>
                           <?php } ?>
                        </div>
                        
                        
                        
                        <div class="input-files">
                        	<label>Brief Description</label>
                            <textarea class="registration" name="description"><?php if(isset($_POST['description'])){ echo $_POST['description']; }?></textarea>
                        </div>
                        <div class="input-files">
                        	<label>About Us</label>
                            <textarea class="registration" name="aboutus"><?php if(isset($_POST['aboutus'])){ echo $_POST['aboutus']; }?></textarea>
                        </div>
                        <div class="input-files">
                        	<label>Education</label>
                            <textarea class="registration" name="education"><?php if(isset($_POST['education'])){ echo $_POST['education']; }?></textarea>
                        </div>
<!--
                        <div class="input-files">
                        	<label>Biography</label>
                            <textarea class="registration" name="biography"><?php if(isset($_POST['biography'])){ echo $_POST['biography']; }?></textarea>
                        </div>
-->
                        <div class="input-files">
                        	<label>Image <span class="requiredspan">*</span></label>
                             <input required name="image" type="file" class="registration">
                        </div>
                        <div class="input-files">
                        	<label>Website</label>
                       		 <input value="<?php if(isset($_POST['website'])){ echo $_POST['website']; }?>" name="website" type="text" placeholder="Website" class="registration">
                        </div>
                        <div class="input-files availabity_checks">
                        	<label>Availability</label>
                            <div class="setavailability"><input type="checkbox" name="availability[]" value="1"><span>Monday</span></div>
                            <div class="setavailability"><input type="checkbox" name="availability[]" value="2"><span>Tuesday</span></div>
                            <div class="setavailability"><input type="checkbox" name="availability[]" value="3"><span>Wednesday</span></div>
                            <div class="setavailability"><input type="checkbox" name="availability[]" value="4"><span>Thursday</span></div>
                            <div class="setavailability"><input type="checkbox" name="availability[]" value="5"><span>Friday</span></div>
                            <div class="setavailability"><input type="checkbox" name="availability[]" value="6"><span>Saturday</span></div>
                            <div class="setavailability"><input type="checkbox" name="availability[]" value="0"><span>Sunday</span></div>
                        </div>
                        <div class="clear"></div>
                        
                        <div class="input-files availabity_checks">
                        	<label>Type Of Payments</label>
                            <div class="setavailability"><input type="checkbox" name="payments[]" value="Visa"><span><img src="<?php echo $baseUrl; ?>assets/frontend/images/1.png"></span></div>
                            <div class="setavailability"><input type="checkbox" name="payments[]" value="Master Card"><span><img src="<?php echo $baseUrl; ?>assets/frontend/images/2.png"></span></div>
                            <div class="setavailability"><input type="checkbox" name="payments[]" value="American Express"><span><img src="<?php echo $baseUrl; ?>assets/frontend/images/3.png"></span></div>
                            <div class="setavailability"><input type="checkbox" name="payments[]" value="Cash"><span><img src="<?php echo $baseUrl; ?>assets/frontend/images/4.png"></span></div>
                            <div class="setavailability"><input type="checkbox" name="payments[]" value="Cheque"><span><img src="<?php echo $baseUrl; ?>assets/frontend/images/5.png"></span></div>
                        </div>
                        <div class="clear"></div>
                        
                        
                        
                        	 <div class="box-heading heading-width heading-width111"><h3>Social Profile</h3>
           	
            </div>
                 <div class="lines">
            	<div class="lines-small"></div></div>
                    
                        
                        <div class="input-files">
                        	<label>Facebook</label>
                       		 <input value="<?php if(isset($_POST['facebook'])){ echo $_POST['facebook']; }?>" name="facebook" type="text" placeholder="Facebook" class="registration">
                        </div>
                        <div class="input-files">
                        	<label>Twitter</label>
                       		 <input value="<?php if(isset($_POST['twitter'])){ echo $_POST['twitter']; }?>" name="twitter" type="text" placeholder="Twitter" class="registration">
                        </div>
                        <div class="input-files">
                        	<label>Google +</label>
                       		 <input value="<?php if(isset($_POST['google_plus'])){ echo $_POST['google_plus']; }?>" name="google_plus" type="text" placeholder="Google +" class="registration">
                        </div>
                        
                        <div class="input-files fullcaptcha">
                        	<label><?php echo $captcha['image']; ?></label>
                            <input type="text" required autocomplete="off" name="userCaptcha"
                                   placeholder="Enter above text" class="registration"
                                   value="<?php if (!empty($userCaptcha)) {
                                       echo $userCaptcha;
                                   } ?>"/>
<!--
                            <div class="input-error">
                                   <?php if(isset($validation_errors_captcha) && $validation_errors_captcha!=''){?> Invalid captcha<?php }?>
                                    </div> 
-->
                        </div>
                <div class="input-files">
                        	<label></label>
                            <input required name="terms" type="checkbox" class=""> I have read and agree to the <a href="#">terms and conditions</a>
                        </div>
                       <div class="">
                     	<input type="submit" value="register" class="register-btn"> 
                        </div>
                     	
                     </form>
                        </div>
                    
                    </div>
            
            </div>
        </div>
    