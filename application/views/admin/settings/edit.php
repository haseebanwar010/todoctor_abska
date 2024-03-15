









<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$baseUrl = $this->config->item('base_url');
?>
<!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
 
    
    
    <div class="content-wrapper">
        
        <?php if(!empty($this->session->flashdata('msg'))){ ?>
        <section class="content alertcontent">  
        <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                <?=$this->session->flashdata('msg')?>
              </div>          
        </section>
    <?php } ?>
        
        
        
    <section class="content-header">
      <h1>
        Update Settings
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $baseUrl; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $baseUrl; ?>admin/settings">Settings</a></li>
        <li class="active">Update Setting</li>
      </ol>
    </section>
          <section class="content">
              <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Update Setting</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form id="" role="form" method="post" action="<?php echo $baseUrl; ?>admin/settings/edit/<?php echo $settings[0]['id']; ?>" enctype="multipart/form-data">
                  <input type="hidden" name="id" value="<?php echo $settings[0]['id']; ?>">
                <!-- text input -->
                 <div class="col-md-6">
                    <div class="form-group">
                    	<label for="f_name">Email</label>
                        <input type="email" class="form-control"  value="<?php echo $settings[0]['email']; ?>"  id="email" name="email" placeholder="">
                    </div>
                </div>
                
                  
                 <div class="col-md-6">
                    <div class="form-group">
                    	<label for="f_name">Phone</label>
                        <input type="text"  class="form-control" value="<?php echo $settings[0]['phone']; ?>"  id="phone" name="phone" placeholder="">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                    	<label for="f_name">Address</label>
                       <input type="text"  class="form-control" value="<?php echo $settings[0]['address']; ?>"  id="address" name="address" placeholder="">
                    </div>
                </div>
                  <div class="col-md-6">
                    <div class="form-group">
                    	<label for="f_name">Facebook</label>
                       <input type="text"  class="form-control" value="<?php echo $settings[0]['facebook']; ?>"  id="facebook" name="facebook" placeholder="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    	<label for="f_name">Twitter</label>
                       <input type="text"  class="form-control" value="<?php echo $settings[0]['twitter']; ?>"  id="twitter" name="twitter" placeholder="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    	<label for="f_name">Google+</label>
                       <input type="text"  class="form-control" value="<?php echo $settings[0]['google_plus']; ?>"  id="google_plus" name="google_plus" placeholder="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    	<label for="f_name">Linkedin</label>
                       <input type="text"  class="form-control" value="<?php echo $settings[0]['linkedin']; ?>"  id="linkedin" name="linkedin" placeholder="">
                    </div>
                </div>
                  <div class="col-md-6">
                    <div class="form-group">
                    	<label for="f_name">Youtube</label>
                       <input type="text"  class="form-control" value="<?php echo $settings[0]['youtube']; ?>"  id="youtube" name="youtube" placeholder="">
                    </div>
                </div>
                  <div class="col-md-6">
                    <div class="form-group">
                    	<label for="f_name">Skype</label>
                       <input type="text"  class="form-control" value="<?php echo $settings[0]['skype']; ?>"  id="skype" name="skype" placeholder="">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <button class="btn bg-navy margin submitbtn" type="submit">Submit</button>
                    </div>
                </div> 
              </form>
            </div>
            <!-- /.box-body -->
          </div>
        </section>
    </div>






