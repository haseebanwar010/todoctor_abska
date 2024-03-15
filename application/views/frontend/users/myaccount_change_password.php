<?php echo $header; echo $header_search; ?>
    </div>
    
     <div class="clear"></div>
     
     
    <div class="container-myaccount">
    		<div class="wrapper">
            	<?php echo $myaccount_menu;?>
            	<div class="my-account">
                	 <div class="box-heading heading-width"><h3>Change Password</h3>
           		
                         
               
                         
                         
            	<!--<div class="submit-success"> echo $this->session->flashdata('success_message'); }?> </div>
          -->
            </div>
                 <div class="lines">
            	<div class="lines-small"></div></div>
                    
                    
                    
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
                    
                    
                    
                   <form action="" class="register-box" enctype="multipart/form-data" action="<?php echo base_url()?>my-account/change-password" method="post">
            		<label>Old Password </label>
                	<input type="password" placeholder="Old Password " class="register-form" name="old_password" value="<?php echo set_value('old_password'); ?>">
                    
                    <label>New Password</label>
                	<input type="password" placeholder="New Password" class="register-form" name="new_password" value="<?php echo set_value('new_password'); ?>">
                    
                    <label>Confirm Password</label>
                	<input type="password" placeholder="Confirm Password" class="register-form" name="confirm_password" value="<?php echo set_value('confirm_password'); ?>">
                   
                <input type="submit" value="Update Password" class="register-btn">
            
            </form>
                </div>
            </div>
    </div>
    <div class="clear"></div>
 
  <?php echo $footer;?>