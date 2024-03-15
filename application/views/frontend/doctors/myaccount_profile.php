<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$baseUrl = $this->config->item('base_url');
?>
<?php echo $header; echo $header_search; ?>


    </div>
    
     <div class="clear"></div>
     
     
    <div class="container-myaccount">
        <div class="wrapper">
    		
            	<?php echo $myaccount_menu;?>
            	<div class="my-account">
                	 <div class="box-heading heading-width"><h3>View Profile</h3>
           		<?php if($this->session->flashdata('error_msg')!=''){ ?>
              
              	<div class="isa_error"><i class="fa fa-times-circle"></i>
                                   			<?php echo $this->session->flashdata('error_msg');$this->session->set_flashdata('error_msg','') ?>
                                		</div>
               <!--	<div class="input-error"><?php echo $this->session->flashdata('error_msg'); ?></div>-->
				 <?php }?>
                 <?php if($this->session->flashdata('success_msg')!=''){ ?>
              		<div class="isa_success"> <i class="fa fa-check"></i>
     											<?php echo $this->session->flashdata('success_msg');$this->session->set_flashdata('success_msg','') ?>
											</div>
               	<!--<div class="input-success"><?php echo $this->session->flashdata('success_msg'); ?></div>-->
				 <?php }?>
          
            </div>
                 <div class="lines">
            	<div class="lines-small"></div></div>
                    
                    
                     
                    <div class="job-detail">
                    	<div class="job-detail-heading">Email Address :</div>
                        <div class="job-detail-heading2"><?php echo $userData['email'];?></div>
                    </div>
                    <div class="job-detail">
                    	<div class="job-detail-heading">Full Name :</div>
                        <div class="job-detail-heading2"><?php echo  $userData['first_name']." ".$userData['last_name']; ?></div>
                    </div>
                    <div class="job-detail">
                    	<div class="job-detail-heading">Display Name :</div>
                        <div class="job-detail-heading2"><?php echo  $userData['display_name']; ?></div>
                    </div>
                    <div class="job-detail">
                    	<div class="job-detail-heading">Zip Code :</div>
                        <div class="job-detail-heading2"><?php echo  $userData['zip_code']; ?></div>
                    </div>
                    <div class="job-detail">
                    	<div class="job-detail-heading">Phone :</div>
                        <div class="job-detail-heading2"><?php echo $userData['phone'];?></div>
                    </div>
                    <div class="job-detail">
                    	<div class="job-detail-heading">Country :</div>
                        <div class="job-detail-heading2"><?php echo $userData['country_name'];?></div>
                    </div>
                    <div class="job-detail">
                    	<div class="job-detail-heading">City :</div>
                        <div class="job-detail-heading2"><?php echo $userData['city_name'];?></div>
                    </div>
                    <div class="job-detail">
                    	<div class="job-detail-heading">Address :</div>
                        <div class="job-detail-heading2"><?php echo $userData['address'];?></div>
                    </div>
                    <div class="job-detail">
                    	<div class="job-detail-heading">Category :</div>
                        <div class="job-detail-heading2"><?php echo $userData['cattext'];?></div>
                    </div>
                    <div class="job-detail">
                    	<div class="job-detail-heading">Availability :</div>
                        <div class="job-detail-heading2"><p class="availabledays availabledays2"><?php echo $userData['availability_text']; ?></p></div>
                    </div>
                    <div class="job-detail">
                    	<div class="job-detail-heading">Type Of Payments:</div>
                        <div class="job-detail-heading2"><?php echo $userData['payments'];?></div>
                    </div>
                    <div class="job-detail">
                    	<div class="job-detail-heading">Brief Description :</div>
                        <div class="job-detail-heading2"><?php echo $userData['description'];?></div>
                    </div>
                    <div class="job-detail">
                    	<div class="job-detail-heading">About Us :</div>
                        <div class="job-detail-heading2"><?php echo $userData['aboutus'];?></div>
                    </div>
                    <div class="job-detail">
                    	<div class="job-detail-heading">Education :</div>
                        <div class="job-detail-heading2"><?php echo $userData['education'];?></div>
                    </div>
<!--
                    <div class="job-detail">
                    	<div class="job-detail-heading">Biography :</div>
                        <div class="job-detail-heading2"><?php echo $userData['biography'];?></div>
                    </div>
-->
                    <div class="job-detail">
                    	<div class="job-detail-heading">Website :</div>
                        <div class="job-detail-heading2"><a target="_blank" href="<?php echo $userData['website'];?>"><?php echo $userData['website'];?></a></div>
                    </div>
                    <div class="job-detail">
                    	<div class="job-detail-heading">Facebook :</div>
                        <div class="job-detail-heading2"><a href="<?php echo $userData['facebook']; ?>"><?php echo $userData['facebook']; ?></a></div>
                    </div>
                    <div class="job-detail">
                    	<div class="job-detail-heading">Twitter :</div>
                        <div class="job-detail-heading2"><a href="<?php echo $userData['twitter']; ?>"><?php echo $userData['twitter']; ?></a></div>
                    </div>
                    <div class="job-detail">
                    	<div class="job-detail-heading">google+ :</div>
                        <div class="job-detail-heading2"><a href="<?php echo $userData['google_plus']; ?>"><?php echo $userData['google_plus']; ?></a></div>
                    </div>
                    <div class="job-detail">
                    	<div class="job-detail-heading">Image :</div>
                        <div class="job-detail-heading2"><img src="<?php echo $baseUrl; ?>uploads/thumb/<?php echo $userData['image']; ?>"></div>
                    </div>
                    
                   
                    <div class="job-detail">
                    	<div class="job-detail-heading">Created Date :</div>
                        <div class="job-detail-heading2"><?php echo date('d-M-Y',strtotime($userData['created_date']));?></div>
                    </div>
                </div>
            
        </div>
    </div>
    <div class="clear"></div>
 
  <?php echo $footer;?>