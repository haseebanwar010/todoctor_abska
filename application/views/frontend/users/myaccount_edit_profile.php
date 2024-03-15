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
            		<label>Full Name </label>
                	<input type="text" placeholder="Full Name " class="register-form" name="name" value="<?php echo $userData['name'];?>">
                    
                    <label>Email Address</label>
                	<input type="text" placeholder="Email Address" class="register-form" name="email" value="<?php echo $userData['email'];?>">
                   
                    <label>Address </label>
                	<input type="text" placeholder="Address" class="register-form" name="address" value="<?php echo $userData['address'];?>">
                    
                  <input type="hidden" value="<?php echo $userData['id']; ?>" name="id">
                <input type="submit" value="Update Now" class="register-btn">
            
            </form>
                </div>
            </div>
    </div>
    <div class="clear"></div>
 
  <?php echo $footer;?>