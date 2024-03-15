<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$baseUrl = $this->config->item('base_url');
$sitedata=getsitedata();

?>
    <div class="clear"></div>
    
    
    	<div class="inner-page">
        
        	<div class="wrapper">
            
            		
                    <div class="registration-wrapper">
                    	<h2>Contact Us</h2>
                   	<div class="regi"> 
                      
                    
                   
                        
                        <div class="contact-us-form">
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
                            <form method="post" action="">
                                <div class="col-sm-6 inputfields">
                                    <input type="text" name="name" placeholder="Enter Name" class="registration">
                                </div>
                                <div class="col-sm-6 inputfields">
                                    <input type="text" name="email" placeholder="Enter Email" class="registration">
                                </div>
                                <div class="col-sm-6 inputfields">
                                    <input type="text" name="phone" placeholder="Enter Phone" class="registration">
                                </div>
                                <div class="col-sm-6 inputfields">
                                    <input type="text" name="address" placeholder="Enter Address" class="registration">
                                </div>
                                <div class="col-sm-12 inputfields textarefield">
                                    <textarea name="description" class="registration" placeholder="Enter Message"></textarea>
                                </div>
                                <div class="col-sm-12 inputfields">
                                    <button type="submit" class="register-btn">Send</button>
                                </div>
                            </form>
                         </div>
                       
                        
                
                <div class="support">
                        	<h4>Support</h4>
                            
               
                        	<div class="support-contact">
                            	<h3>Address</h3>
                            	<p><?php echo $sitedata->address; ?></p>
                            </div>
                            <div class="support-contact contact_us_icons2">
                            	<h3>Support</h3>
                            	<p><?php echo $sitedata->phone; ?></p>
                            </div><div class="support-contact contact_us_icons3">
                            	<h3>Email Support</h3>
                            	<p><?php echo $sitedata->email; ?></p>
                            </div>
<!--
                          <div class="support-contact contact_us_icons4">
                           	<h3>Social Media</h3>
                           	  <ul>
                               	  <li><a target="_blank" href="<?php echo $sitedata->facebook; ?>"><img src="<?php echo $baseUrl; ?>assets/frontend/images/fb-cont.png"></a></li>
                                   <li><a target="_blank" href="<?php echo $sitedata->skype; ?>"><img src="<?php echo $baseUrl; ?>assets/frontend/images/skype-cont.png"></a></li>
                                    <li><a target="_blank" href="<?php echo $sitedata->twitter; ?>"><img src="<?php echo $baseUrl; ?>assets/frontend/images/tw-cont.png"></a></li>
                                  
                                
                              </ul>
                            </div>
-->
                        
                        </div>
                 
                     </div>
                    
                    </div>
            
            </div>
        </div>
        
  