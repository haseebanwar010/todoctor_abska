<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$baseUrl = $this->config->item('base_url');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Doctor Detail
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $baseUrl; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $baseUrl; ?>admin/doctors">Doctors</a></li>
        <li class="active">Doctor Detail</li>
      </ol>
    </section>

   
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-info-circle"></i> Personal Information
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
          
        <div class="col-sm-4 invoice-col">
          <address>
            <strong>Name: </strong><?php echo $doctor['first_name']." ".$doctor['last_name']; ?><br>
            <strong>Display Name: </strong><?php echo $doctor['display_name']; ?><br>
            <strong>Email: </strong><?php echo $doctor['email']; ?><br>
            
            <strong>Phone: </strong><?php echo $doctor['phone']; ?><br>
            <strong>City: </strong><?php echo $doctor['city_name']; ?><br>
            <strong>Country: </strong><?php echo $doctor['country_name']; ?><br>
          </address>
        </div>
          <div class="col-sm-4 invoice-col">
              <address>
                  <strong>ZipCode: </strong><?php echo $doctor['zip_code']; ?><br>
                  <strong>Address: </strong><?php echo $doctor['address']; ?><br>
                  <strong>Category Name: </strong><?php echo $doctor['cattext']; ?><br>
                  <strong>Start Time: </strong><?php echo $doctor['start_time']; ?><br>
                  <strong>End Time: </strong><?php echo $doctor['end_time']; ?><br>
                  <strong>Availability: </strong><p class="availabledays availabledaysadmin"><?php echo $doctor['availability_text']; ?></p><br>
<!--                  <strong>Weekend Open: </strong><?php if($doctor['weekend_open']==1){ echo "Yes"; }else{ echo "No"; } ?><br>-->
              </address>
          </div>
          
          <div class="col-sm-4 invoice-col">
              <address>
                  <strong>Website: </strong><?php echo $doctor['website']; ?><br>
                  <strong>Facebook: </strong><a target="_blank" href="<?php echo $doctor['facebook']; ?>"><?php echo $doctor['facebook']; ?></a><br>
                  <strong>Twitter: </strong><a target="_blank" href="<?php echo $doctor['twitter']; ?>"><?php echo $doctor['twitter']; ?></a><br>
                  <strong>Google+: </strong><a target="_blank" href="<?php echo $doctor['google_plus']; ?>"><?php echo $doctor['google_plus']; ?></a><br>
              </address>
          </div>
        
        
      </div>
      
        <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-info-circle"></i> About Us
          </h2>
        </div>
      </div>
        <div class="row invoice-info">
          
        <div class="col-xs-12 customdescriptionp">
                <p><?php echo $doctor['aboutus']; ?></p>
            </div>
        </div>
        
        <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-book"></i> Eduacation
          </h2>
        </div>
      </div>
        <div class="row invoice-info">
          
        <div class="col-xs-12 customdescriptionp">
                <p><?php echo $doctor['education']; ?></p>
            </div>
        </div>
        
<!--
        
        <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-edit"></i> Biography
          </h2>
        </div>
      </div>
        <div class="row invoice-info">
          
        <div class="col-xs-12 customdescriptionp">
                <p><?php echo $doctor['biography']; ?></p>
            </div>
        </div>
        
-->
        
    </section>
    <section class="content">
        
        
          <div class="box box-warning overflowbox">
            <div class="box-header">
              <h3 class="box-title">Appointments</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Appointment Id</th>
                  <th>Start Time</th>
                  <th>End Time</th>
                  <th>Patient Name</th>
                  <th>Patient Email</th>
                  <th>Patient Phone</th>
<!--                  <th>About Disease</th>-->
                    <th>Office Visit</th>
                  <th>Procedure</th>
                  <th>Lab Work</th>
                  <th>Medicine Refills</th>
                  <th>Immunization</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               
                    <?php foreach($appointments as $appointment){ ?>
                <tr>
                  <td><?php echo $appointment['id']; ?></td>
                  <td><?php echo $appointment['start_time']; ?></td>
                  <td><?php echo $appointment['end_time']; ?></td>
                  <td><?php echo $appointment['patient_name']; ?></td>
                  <td><?php echo $appointment['patient_email']; ?></td>
                  <td><?php echo $appointment['patient_phone']; ?></td>
<!--                  <td><?php echo $appointment['about_disease']; ?></td>-->
                    <td><?php if($appointment['office_visit_bit']==1){ echo $appointment['office_visit_detail']; }else{ echo "N/A"; } ?></td>
                    <td><?php if($appointment['procedure_bit']==1){ echo $appointment['procedure_detail']; }else{ echo "N/A"; } ?></td>
                    <td><?php if($appointment['labwork_bit']==1){ echo $appointment['labwork_detail']; }else{ echo "N/A"; } ?></td>
                    <td><?php if($appointment['medicine_bit']==1){ echo $appointment['medicine_detail']; }else{ echo "N/A"; } ?></td>
                    <td><?php if($appointment['immunization_bit']==1){ echo $appointment['immunization_detail']; }else{ echo "N/A"; } ?></td>
                  <td><?php if($appointment['status']==1){ ?><small class="label bg-green">Approved</small><?php } else{ ?><small class="label bg-yellow">Pending</small><?php } ?></td>
                  <td>
                      <a href="<?php echo $baseUrl; ?>admin/users/detail/<?php echo $appointment['user_id']; ?>"><button class="btn btn-info">User Detail</button></a>
                    </td>
                </tr>
                    <?php } ?>
                </tbody>
<!--
                <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Title</th>
                  <th>Date</th>
                  <th>Price</th>
                  <th>Functional Area</th>
                  <th>Job Shift</th>
                  <th>Job Type</th>
                  <th>Total Positions</th>
                  <th>Action</th>
                </tr>
                </tfoot>
-->
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    </section>
</div>