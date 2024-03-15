<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$baseUrl = $this->config->item('base_url');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Doctors
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $baseUrl; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $baseUrl; ?>admin/doctors">Doctors</a></li>
        <li class="active">All Doctors</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
<?php if(!empty($this->session->flashdata('msg'))){ ?>
        <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                <?=$this->session->flashdata('msg')?>
              </div>          
    <?php } ?>
               <?php if(!empty($this->session->flashdata('error_msg'))){ ?>
        <section class="content alertcontent">    
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                <?php echo $this->session->flashdata('error_msg'); ?>
            </div>
        </section>
    <?php } ?>
            
            
          <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title">All Doctors</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th></th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               
                    <?php foreach($doctors as $doctor){ ?>
                <tr>
                  <td><?php echo $doctor['id']; ?></td>
                  <td class="tableimg"><img src="<?php echo $baseUrl; ?>uploads/thumb/<?php echo $doctor['image']; ?>"></td>
                  <td><?php echo $doctor['display_name']; ?></td>
                  <td><?php echo $doctor['email']; ?></td>
                  <td><?php echo $doctor['phone']; ?></td>
                  <td><?php echo $doctor['address']; ?></td>
                  <td>
                      <a href="<?php echo $baseUrl; ?>admin/doctors/detail/<?php echo $doctor['id']; ?>"><button class="btn btn-info">Detail</button></a>
                      <?php if($doctor['status']==0){ ?><a href="<?php echo $baseUrl; ?>admin/doctors/approve/<?php echo $doctor['id']; ?>"><button class="btn btn-info">Approve</button></a><?php } ?>
                    </td>
                </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Id</th>
                  <th></th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        </div>
    </section>
</div>