<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$baseUrl = $this->config->item('base_url');
?> 
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
           <?php if(validation_errors()){ ?>
        <section class="content alertcontent">    
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                <?php echo validation_errors(); ?>
            </div>
        </section>
    <?php } ?>
        <?php if(!empty($this->session->flashdata('msg'))){ ?>
            <section class="content alertcontent">    
        <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                <?=$this->session->flashdata('msg')?>
              </div>    
          </section>
    <?php } ?>
        <!-- Content Header (Page header) -->
         <section class="content-header">
      <h1>
        Update Password
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $baseUrl; ?>"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Update Password</li>
      </ol>
    </section>
       
        
        
        <!-- Main content -->
        <section class="content">
              <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Update Password</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form role="form" action="<?php echo site_url('auth/change_password')?>" method="post" enctype="multipart/form-data">
            <?php $user = $this->session->get_userdata(); ?>
            <input type="hidden" id="staff_id" name="staff_id" value="<?php echo $user['userid']?>">
            <!-- right column -->
               <div class="col-md-12">   
               <div class="row">      
              <div class="col-md-6">
            	<div class="form-group">
                   <input type="password" class="form-control"  id="old_password" name="old_password" placeholder="Old Password" value="">
                </div>
             </div>
                   <div class="col-md-6">
            	<div class="form-group">
                   <input type="password" class="form-control"  id="new_password" name="new_password" placeholder="New Password" value="">
                </div>
             </div>
             </div>
             <div class="row">   
             <div class="col-md-6">
            	<div class="form-group">
                   <input type="password" class="form-control"  id="confirm_password" name="confirm_password" placeholder="Confirm Password" value="">
                </div>
             </div>
             </div>
             </div>
            <div class="col-md-6">
            
              <button type="submit" class="btn bg-navy margin submitbtn">Submit</button>
            </div><!-- /.col -->
            
            </form>
                  </div>
            </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
       