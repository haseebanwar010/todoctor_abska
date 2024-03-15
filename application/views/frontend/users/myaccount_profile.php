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
                    	<div class="job-detail-heading">Name :</div>
                        <div class="job-detail-heading2"><?php echo  $userData['name']; ?></div>
                         
                    </div>
                    <div class="job-detail">
                    	<div class="job-detail-heading">Email Address :</div>
                        <div class="job-detail-heading2"><?php echo $userData['email'];?></div>
                    </div>
                    <div class="job-detail">
                    	<div class="job-detail-heading">Address :</div>
                        <div class="job-detail-heading2"><?php echo $userData['address'];?></div>
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