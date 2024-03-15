<?php echo $header; echo $header_search; ?>
    </div>
    
     <div class="clear"></div>
     
     
    <div class="container-myaccount">
    		<div class="wrapper">
            	<?php echo $myaccount_menu;?>
            	<div class="my-account">
                	 <div class="box-heading heading-width"><h3>profile</h3>
           	
            </div>
                 <div class="lines">
            	<div class="lines-small"></div></div>
                    
                    
                    
                    
                    
                    	<?php if($this->session->flashdata('error_message')!=''){?>
					<div class="isa_error">
                           <i class="fa fa-times-circle"></i>
                          <?php echo $this->session->flashdata('error_message'); ?>
                        </div>
                       <?php }?>
                     <?php if($this->session->flashdata('success_message')!=''){?>
						<section class="content alertcontent">    
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                <?php echo $this->session->flashdata('success_message'); ?>
            </div>
        </section>
                     <?php }?>
                         
                               <?php if(validation_errors()){ ?>
        <section class="content alertcontent">    
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                <?php echo validation_errors(); ?>
            </div>
        </section>
    <?php } ?>
          
                    
                   <form action="" class="register-box" enctype="multipart/form-data" action="" method="post">
                       <input type="hidden" name="id" value="<?php echo $userData['id']; ?>">
            		 <div class="input-files">
                        	<label>Email Address</label>
                       		 <input value="<?php echo $userData['email']; ?>" name="email" type="text" placeholder="Email Address" class="registration">
                        </div>
                        
                        
                        <div class="input-files">
                        	<label>First Name</label>
                       		 <input value="<?php echo $userData['first_name']; ?>" name="first_name" type="text" placeholder="First Name" class="registration">
                        </div>
                        <div class="input-files">
                        	<label>Last Name</label>
                       		 <input value="<?php echo $userData['last_name']; ?>" name="last_name" type="text" placeholder="Last Name" class="registration">
                        </div>
                        <div class="input-files">
                        	<label>Display Name</label>
                       		 <input value="<?php echo $userData['display_name']; ?>" name="display_name" type="text" placeholder="Display Name" class="registration">
                        </div>
                        <div class="input-files">
                        	<label>Zip Code</label>
                       		 <input value="<?php echo $userData['zip_code']; ?>" name="zip_code" type="text" placeholder="Zip Code" class="registration">
                        </div>
                        <div class="input-files">
                        	<label>Phone</label>
                       		 <input value="<?php echo $userData['phone']; ?>" name="phone" type="text" placeholder="Phone" class="registration">
                        </div>
                        <div class="input-files">
                        	<label>City</label>
                            <select name="city" class="registration select2">
                                <option value="">Please Select City</option>
                                <?php foreach($cities as $city){ ?>
                                <option <?php if($userData['city']==$city['id']){ echo 'selected'; }?> value="<?php echo $city['id']; ?>"><?php echo $city['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="input-files">
                        	<label>Country</label>
                            <select name="country" class="registration select2">
                                <option value="">Please Select Country</option>
                                <?php foreach($countries as $country){ ?>
                                <option <?php if($userData['country']==$country['id']){ echo 'selected'; }?> value="<?php echo $country['id']; ?>"><?php echo $country['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="input-files">
                        	<label>Address</label>
                       		 <input value="<?php echo $userData['address']; ?>" name="address" type="text" placeholder="Address" class="registration">
                        </div>
                        
                        
<!--
                        <div class="input-files">
                        	<label>Categtory</label>
                            <select name="category" class="registration select2">
                                <option value="">Please Select Category</option>
                                <?php foreach($categories as $category){ ?>
                                <option <?php if($userData['category']==$category['id']){ echo 'selected'; }?> value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
-->
                        
                        <div class="input-files availabity_checks">
                        	<label>Please Select Category</label>
                           
                            <div class="setavailability99">
                            <?php foreach($categories as $category){ ?>
                                <input <?php foreach($userData['category'] as $innercat){ if($innercat==$category['id']){ echo 'checked'; } }?> type="checkbox" name="category[]" value="2"; ?><span><?php echo $category['name']; ?></span>
                                <?php }  ?>
    
                          
                            </div>
                           
                        </div>
                        
                        

                        
                        
                        
                        <div class="input-files">
                        	<label>Brief Description</label>
                            <textarea class="registration" name="description"><?php echo $userData['description']; ?></textarea>
                        </div>
                        <div class="input-files">
                        	<label>About Us</label>
                            <textarea class="registration" name="aboutus"><?php echo $userData['aboutus']; ?></textarea>
                        </div>
                        <div class="input-files">
                        	<label>Education</label>
                            <textarea class="registration" name="education"><?php echo $userData['education']; ?></textarea>
                        </div>
<!--
                        <div class="input-files">
                        	<label>Biography</label>
                            <textarea class="registration" name="biography"><?php echo $userData['biography']; ?></textarea>
                        </div>
-->
                        <div class="input-files">
                        	<label>Image</label>
                             <input name="image" type="file" class="registration">
                        </div>
                       
                       
                                  	 <div class="box-heading heading-width heading-width111"><h3>Contact Info</h3>
           	
            </div>
                 <div class="lines">
            	<div class="lines-small"></div></div>
                    
                    
                       
                       
                       <div class="input-files">
                        	<label>Start Time</label>
                            <select name="start_time" class="registration select2">
                                <option value="">Please Select Start Time</option>
                                <option <?php if($userData['start_time']=='00:00'){ echo "selected"; } ?> value="00:00">00:00</option>
                                <option <?php if($userData['start_time']=='01:00'){ echo "selected"; } ?> value="01:00">01:00</option>
                                <option <?php if($userData['start_time']=='02:00'){ echo "selected"; } ?> value="02:00">02:00</option>
                                <option <?php if($userData['start_time']=='03:00'){ echo "selected"; } ?> value="03:00">03:00</option>
                                <option <?php if($userData['start_time']=='04:00'){ echo "selected"; } ?> value="04:00">04:00</option>
                                <option <?php if($userData['start_time']=='05:00'){ echo "selected"; } ?> value="05:00">05:00</option>
                                <option <?php if($userData['start_time']=='06:00'){ echo "selected"; } ?> value="06:00">06:00</option>
                                <option <?php if($userData['start_time']=='07:00'){ echo "selected"; } ?> value="07:00">07:00</option>
                                <option <?php if($userData['start_time']=='08:00'){ echo "selected"; } ?> value="08:00">08:00</option>
                                <option <?php if($userData['start_time']=='09:00'){ echo "selected"; } ?> value="09:00">09:00</option>
                                <option <?php if($userData['start_time']=='10:00'){ echo "selected"; } ?> value="10:00">10:00</option>
                                <option <?php if($userData['start_time']=='11:00'){ echo "selected"; } ?> value="11:00">11:00</option>
                                <option <?php if($userData['start_time']=='12:00'){ echo "selected"; } ?> value="12:00">12:00</option>
                                <option <?php if($userData['start_time']=='13:00'){ echo "selected"; } ?> value="13:00">13:00</option>
                                <option <?php if($userData['start_time']=='14:00'){ echo "selected"; } ?> value="14:00">14:00</option>
                                <option <?php if($userData['start_time']=='15:00'){ echo "selected"; } ?> value="15:00">15:00</option>
                                <option <?php if($userData['start_time']=='16:00'){ echo "selected"; } ?> value="16:00">16:00</option>
                                <option <?php if($userData['start_time']=='17:00'){ echo "selected"; } ?> value="17:00">17:00</option>
                                <option <?php if($userData['start_time']=='18:00'){ echo "selected"; } ?> value="18:00">18:00</option>
                                <option <?php if($userData['start_time']=='19:00'){ echo "selected"; } ?> value="19:00">19:00</option>
                                <option <?php if($userData['start_time']=='20:00'){ echo "selected"; } ?> value="20:00">20:00</option>
                                <option <?php if($userData['start_time']=='21:00'){ echo "selected"; } ?> value="21:00">21:00</option>
                                <option <?php if($userData['start_time']=='22:00'){ echo "selected"; } ?> value="22:00">22:00</option>
                                <option <?php if($userData['start_time']=='23:00'){ echo "selected"; } ?> value="23:00">23:00</option>
                            </select>
                        </div>
                       <div class="input-files">
                        	<label>End Time</label>
                            <select name="end_time" class="registration select2">
                                <option value="">Please Select End Time</option>
                                <option <?php if($userData['end_time']=='00:00'){ echo "selected"; } ?> value="00:00">00:00</option>
                                <option <?php if($userData['end_time']=='01:00'){ echo "selected"; } ?> value="01:00">01:00</option>
                                <option <?php if($userData['end_time']=='02:00'){ echo "selected"; } ?> value="02:00">02:00</option>
                                <option <?php if($userData['end_time']=='03:00'){ echo "selected"; } ?> value="03:00">03:00</option>
                                <option <?php if($userData['end_time']=='04:00'){ echo "selected"; } ?> value="04:00">04:00</option>
                                <option <?php if($userData['end_time']=='05:00'){ echo "selected"; } ?> value="05:00">05:00</option>
                                <option <?php if($userData['end_time']=='06:00'){ echo "selected"; } ?> value="06:00">06:00</option>
                                <option <?php if($userData['end_time']=='07:00'){ echo "selected"; } ?> value="07:00">07:00</option>
                                <option <?php if($userData['end_time']=='08:00'){ echo "selected"; } ?> value="08:00">08:00</option>
                                <option <?php if($userData['end_time']=='09:00'){ echo "selected"; } ?> value="09:00">09:00</option>
                                <option <?php if($userData['end_time']=='10:00'){ echo "selected"; } ?> value="10:00">10:00</option>
                                <option <?php if($userData['end_time']=='11:00'){ echo "selected"; } ?> value="11:00">11:00</option>
                                <option <?php if($userData['end_time']=='12:00'){ echo "selected"; } ?> value="12:00">12:00</option>
                                <option <?php if($userData['end_time']=='13:00'){ echo "selected"; } ?> value="13:00">13:00</option>
                                <option <?php if($userData['end_time']=='14:00'){ echo "selected"; } ?> value="14:00">14:00</option>
                                <option <?php if($userData['end_time']=='15:00'){ echo "selected"; } ?> value="15:00">15:00</option>
                                <option <?php if($userData['end_time']=='16:00'){ echo "selected"; } ?> value="16:00">16:00</option>
                                <option <?php if($userData['end_time']=='17:00'){ echo "selected"; } ?> value="17:00">17:00</option>
                                <option <?php if($userData['end_time']=='18:00'){ echo "selected"; } ?> value="18:00">18:00</option>
                                <option <?php if($userData['end_time']=='19:00'){ echo "selected"; } ?> value="19:00">19:00</option>
                                <option <?php if($userData['end_time']=='20:00'){ echo "selected"; } ?> value="20:00">20:00</option>
                                <option <?php if($userData['end_time']=='21:00'){ echo "selected"; } ?> value="21:00">21:00</option>
                                <option <?php if($userData['end_time']=='22:00'){ echo "selected"; } ?> value="22:00">22:00</option>
                                <option <?php if($userData['end_time']=='23:00'){ echo "selected"; } ?> value="23:00">23:00</option>
                            </select>
                        </div>
                       
<!--
                       <div class="input-files">
                        	<label>Weekend Open</label>
                            <select name="weekend_open" class="registration select2">
                                <option value="">Please Select Weekend Open</option>
                                <option <?php if($userData['weekend_open']==1){ echo "selected"; } ?> value="1">Yes</option>
                                <option <?php if($userData['weekend_open']==0){ echo "selected"; } ?> value="0">No</option>
                            </select>
                        </div>
-->
                        <div class="input-files">
                        	<label>Website</label>
                       		 <input value="<?php echo $userData['website']; ?>" name="website" type="text" placeholder="Website" class="registration">
                        </div>
                       <div class="input-files availabity_checks availabity_checks_edit">
                        	<label>Availability</label>
                           
                            <input <?php foreach($userData['availability'] as $availbile){ if($availbile==1){ echo 'checked'; } } ?> type="checkbox" name="availability[]" value="1"><span>Monday</span>
                            <input <?php foreach($userData['availability'] as $availbile){ if($availbile==2){ echo 'checked'; } } ?> type="checkbox" name="availability[]" value="2"><span>Tuesday</span>
                            <input <?php foreach($userData['availability'] as $availbile){ if($availbile==3){ echo 'checked'; } } ?> type="checkbox" name="availability[]" value="3"><span>Wednesday</span>
                            <input <?php foreach($userData['availability'] as $availbile){ if($availbile==4){ echo 'checked'; } } ?> type="checkbox" name="availability[]" value="4"><span>Thursday</span>
                            <input <?php foreach($userData['availability'] as $availbile){ if($availbile==5){ echo 'checked'; } } ?> type="checkbox" name="availability[]" value="5"><span>Friday</span>
                            <input <?php foreach($userData['availability'] as $availbile){ if($availbile==6){ echo 'checked'; } } ?> type="checkbox" name="availability[]" value="6"><span>Saturday</span>
                            <input <?php foreach($userData['availability'] as $availbile){ if($availbile==0){ echo 'checked'; } } ?> type="checkbox" name="availability[]" value="0"><span>Sunday</span>
                        </div>
                       
                           	 <div class="box-heading heading-width heading-width111"><h3>Social Profile</h3>
           	
            </div>
                 <div class="lines">
            	<div class="lines-small"></div></div>
                    
                       
                        <div class="input-files">
                        	<label>Facebook</label>
                       		 <input value="<?php echo $userData['facebook']; ?>" name="facebook" type="text" placeholder="Facebook" class="registration">
                        </div>
                        <div class="input-files">
                        	<label>Twitter</label>
                       		 <input value="<?php echo $userData['twitter']; ?>" name="twitter" type="text" placeholder="Twitter" class="registration">
                        </div>
                        <div class="input-files">
                        	<label>Google +</label>
                       		 <input value="<?php echo $userData['google_plus']; ?>" name="google_plus" type="text" placeholder="Google +" class="registration">
                        </div>
                       
                <input type="submit" value="Update Now" class="register-btn">
            
            </form>
                </div>
            </div>
    </div>
    <div class="clear"></div>
 
  <?php echo $footer;?>