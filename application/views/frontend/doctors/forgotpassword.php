<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$baseUrl = $this->config->item('base_url');
?>
<div class="clear"></div>
	<div class="inner-page">
        
        	<div class="wrapper">
            
            		
                    <div class="registration-wrapper">
                    	<h2>Forgot Password</h2>
                        	<div class="registration_wrp">
                   	<div class="regi"> <form action="" class="forms" method="post">
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
                        <?php if(!empty($this->session->flashdata('login_error'))){ ?>
        <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Error!</h4>
                <?=$this->session->flashdata('login_error')?>
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
                        	<label>Email Address</label>
                       		 <input value="<?php if(isset($_POST['email'])){ echo $_POST['email']; }?>" type="text" name="email" placeholder="Email Address" class="registration">
                        </div>
                        
                     	<input type="submit" value="submit" class="register-btn"> 
                     	
                     </form>
                        </div></div>
                    
                    </div>
            
            </div>
        </div>
    