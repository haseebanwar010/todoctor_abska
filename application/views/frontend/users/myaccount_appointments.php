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
                	 <div class="box-heading heading-width"><h3>My Appointments</h3>
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
                    
                    
          <div class="box overflowbox">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Start Time</th>
                  <th>End Time</th>
                  <th>Patient Name</th>
<!--                  <th>Patient Email</th>-->
                  <th>Patient Phone</th>
<!--                  <th>Reason for Visit</th>-->
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
<!--                  <td><?php echo $appointment['patient_email']; ?></td>-->
                  <td><?php echo $appointment['patient_phone']; ?></td>
<!--                  <td><?php echo $appointment['about_disease']; ?></td>-->
                    <td><?php if($appointment['office_visit_bit']==1){ echo $appointment['office_visit_detail']; }else{ echo "N/A"; } ?></td>
                    <td><?php if($appointment['procedure_bit']==1){ echo $appointment['procedure_detail']; }else{ echo "N/A"; } ?></td>
                    <td><?php if($appointment['labwork_bit']==1){ echo $appointment['labwork_detail']; }else{ echo "N/A"; } ?></td>
                    <td><?php if($appointment['medicine_bit']==1){ echo $appointment['medicine_detail']; }else{ echo "N/A"; } ?></td>
                    <td><?php if($appointment['immunization_bit']==1){ echo $appointment['immunization_detail']; }else{ echo "N/A"; } ?></td>
                  <td><?php if($appointment['status']==1){ ?><small class="label bg-green">Approved</small><?php } else{ ?><small class="label bg-yellow">Pending</small><?php } ?></td>
                  <td>
                      <a href="<?php echo $baseUrl; ?>doctor/detail/<?php echo $appointment['doctor_id']; ?>"><button class="btn btn-info">Doctor Detail</button></a>
                    </td>
                </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Start Time</th>
                  <th>End Time</th>
                  <th>Patient Name</th>
<!--                  <th>Patient Email</th>-->
                  <th>Patient Phone</th>
<!--                  <th>Reason for Visit</th>-->
                    <th>Office Visit</th>
                  <th>Procedure</th>
                  <th>Lab Work</th>
                  <th>Medicine Refills</th>
                  <th>Immunization</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
                    
                    
                </div>
            
        </div>
    </div>
    <div class="clear"></div>
 
  <?php echo $footer;?>