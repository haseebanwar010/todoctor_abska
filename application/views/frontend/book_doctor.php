<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$baseUrl = $this->config->item('base_url');
?>



<link href='<?php echo $baseUrl; ?>/assets/fullcalendar/fullcalendar.css' rel='stylesheet' />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js'></script>
<script src='<?php echo $baseUrl; ?>/assets/fullcalendar/fullcalendar.js'></script>
<?php 
$start_time=$doctor['start_time'];
$end_time=$doctor['end_time'];
if($doctor['weekend_open']==1){
    $weekend_open=true;
}
else{
    $weekend_open=false;
}

?>

<!--$start_time,$end_time,$weekend_open-->


                <script type="text/javascript">
                 var hiddendays=<?php echo json_encode($hiddendays); ?>;

                    console.log(hiddendays);
                    /*
                     jQuery document ready
                     */


                    $(document).ready(function()
                    {
                        /*
                         date store today date.
                         d store today date.
                         m store current month.
                         y store current year.
                         */
                        var dateToday = new Date();
                        var date = new Date();
                        var d = date.getDate();
                        var m = date.getMonth();
                        var y = date.getFullYear();
                       // alert(y);

                       // alert(da);
                        /*
                         Initialize fullCalendar and store into variable.
                         Why in variable?
                         Because doing so we can use it inside other function.
                         In order to modify its option later.
                         */

                        var calendar = $('#calendar').fullCalendar(
                            {
                                /*
                                 header option will define our calendar header.
                                 left define what will be at left position in calendar
                                 center define what will be at center position in calendar
                                 right define what will be at right position in calendar
                                 */
                                header:
                                {
                                    left: 'prev,next today',
                                    center: 'title',
                                    right: 'agendaWeek,agendaDay'
                                },


                                firstDay:1,
                                minTime: "<?php if($start_time) echo $start_time; else echo "09:00:00";?>",

                                maxTime: "<?php if($end_time) echo $end_time; else echo "20:00:00"?>",
//                                maxTime: "18:00:00",
                                slotMinutes: 15,

                                allDaySlot:false,
                              //  weekends:false,
                              hiddenDays: hiddendays,

                                allDayDefault:false,


                                /*


                                 defaultView option used to define which view to show by default,
                                 for example we have used agendaWeek.
                                 */
                                defaultView: 'agendaWeek',
                                /*
                                 selectable:true will enable user to select datetime slot
                                 selectHelper will add helpers for selectable.
                                 */
                                selectable: true,
                                selectHelper: true,
                                /*
                                 when user select timeslot this option code will execute.
                                 It has three arguments. Start,end and allDay.
                                 Start means starting time of event.
                                 End means ending time of event.
                                 allDay means if events is for entire day or not.
                                 */
                                editable: false,
                                
                                eventSources: [

                                    // your event source
                                    {
                                        url: '<?php echo $baseUrl; ?>doctor/doctorappointments_json/<?php echo $doctor['id'] ?>', // use the `url` property
                                        color: 'red',    // an option!
                                        textColor: 'blue'  // an option!
                                    }
                                ],



                                select: function(start, end, allDay)
                                {

                                  var  starttime = $.fullCalendar.formatDate(start,'yyyy-MM-dd HH:mm:ss');
                                 var   endtime = $.fullCalendar.formatDate(end,'yyyy-MM-dd HH:mm:ss');

                                    var check = $.fullCalendar.formatDate(start,'yyyy-MM-dd HH:mm ');
                                    var today = $.fullCalendar.formatDate(new Date(),'yyyy-MM-dd HH:mm ');

                                    if(check < today)
                                    {
                                        alert("Time Over Please Select another time!")
                                    }
                                    else {


                                        var title = "";

                                        if (title) {


                                            calendar.fullCalendar('renderEvent',
                                                {
                                                    // title: title,
                                                    start: start,
                                                    end: end,
                                                    //   start: starttime,
                                                    //  end: endtime,
                                                    allDay: 0
                                                },
                                                true // make the event "stick"
                                            );

                                        }
                                        calendar.fullCalendar('unselect');


                                    $('#start_time').val(starttime);
                                    $('#end_time').val(endtime);
                                   $('#PatientModal').modal('show');
                                     
                                    }
                                }








                            });

                    });

                </script>
                <style type="text/css">

                    #calendar
                    {
                        width: 900px;
                        margin: 0 auto;
                    }
                </style>
<div class="wrapper">
    <div class="messagestop" style="margin-top:20px;">
 <?php if(!empty($this->session->flashdata('error_msg'))){ ?>
        <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Error!</h4>
                <?=$this->session->flashdata('error_msg')?>
              </div>          
    <?php } ?>
            <?php if(!empty($this->session->flashdata('msg'))){ ?>
        <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                <?=$this->session->flashdata('msg')?>
              </div>          
    <?php } ?>
    </div>
</div>
            <!--FullCalendar container div-->
            <div id='calendar'></div>

<br>
<br>
<br>
<br>
        <?php
        
        ?>







<div id="PatientModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Patient  Information
                </h4>
            </div>

            <form class="form-horizontal" method="post" action="<?php echo $baseUrl; ?>doctor/submitbooking" id="patient_form" role="form">
            <!-- Modal Body -->
            <div class="modal-body">
<!--                --><?php //print_r($User)?>

                        <input type="hidden" name="doctor_id" value="<?php echo $doctor['id']?>"/>
                    <div class="form-group">
                        <label  class="col-sm-3 control-label"
                                for="inputEmail3">Full Name</label>
                        <div class="col-sm-9">
                            <input required type="text" class="form-control" name="patient_name" value="<?php echo $userinfo['name']; ?>"
                                   id="inputEmail3" placeholder="Full Name"/>
                        </div>
                    </div>

                <div class="form-group">
                    <label  class="col-sm-3 control-label"
                            for="inputEmail3">Start time</label>
                    <div class="col-sm-9">
                        <input required type="text" readonly class="form-control" name="start_time"
                               id="start_time" placeholder="Full Name"/>
                    </div>
                </div>

                <div class="form-group">
                    <label  class="col-sm-3 control-label"
                            for="inputEmail3">End Time</label>
                    <div class="col-sm-9">
                        <input required type="text" readonly class="form-control" name="end_time"
                               id="end_time" placeholder="Full Name"/>
                    </div>
                </div>



                    <div class="form-group">
                        <label  class="col-sm-3 control-label"
                                for="inputEmail3">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="patient_email" id="inputEmail3" value="<?php echo $userinfo['email']; ?>" placeholder="Email"/>
                        </div>
                    </div>



                <div class="form-group">
                    <label  class="col-sm-3 control-label"
                            for="inputEmail3">Phone</label>
                    <div class="col-sm-9">
                        <input type="text" required class="form-control" value="" name="patient_phone" id="inputEmail3" placeholder="Phone"/>
                    </div>
                </div>
                
                <div class="form-group checkboxpopup">
                    <label  class="col-sm-3 control-label"
                            for="inputEmail3">Office Visit</label>
                    <div class="col-sm-9">
                        <input type="checkbox" class="setchkbox form-control" value="1" name="office_visit_bit"/>
                        <input type="text" class="form-control" value="" name="office_visit_detail" placeholder="Specify Reason"/>
                    </div>
                </div>
<!--
                <div class="form-group">
                    <label  class="col-sm-3 control-label"
                            for="inputEmail3">Reasons & Specify</label>
                    <div class="col-sm-9">
                       <input type="text" class="form-control" value="" name="office_visit_detail" placeholder="Reasons & Specify "/>
                    </div>
                </div>
-->
                <div class="form-group checkboxpopup">
                    <label  class="col-sm-3 control-label"
                            for="inputEmail3">Procedure</label>
                    <div class="col-sm-9">
                        <input type="checkbox" class="form-control" value="1" name="procedure_bit"/>
                        <input type="text" class="form-control" value="" name="procedure_detail" placeholder="Specify Reason"/>
                    </div>
                </div>
<!--
                <div class="form-group">
                    <label  class="col-sm-3 control-label"
                            for="inputEmail3">Reasons & Specify</label>
                    <div class="col-sm-9">
                       
                    </div>
                </div>
-->
                
                <div class="form-group checkboxpopup">
                    <label  class="col-sm-3 control-label"
                            for="inputEmail3">Lab Work</label>
                    <div class="col-sm-9">
                        <input type="checkbox" class="form-control" value="1" name="labwork_bit"/>
                        <input type="text" class="form-control" value="" name="labwork_detail" placeholder="Specify Reason"/>
                    </div>
                </div>
<!--
                <div class="form-group">
                    <label  class="col-sm-3 control-label"
                            for="inputEmail3">Reasons & Specify</label>
                    <div class="col-sm-9">
                       <input type="text" class="form-control" value="" name="labwork_detail" placeholder="Reasons & Specify "/>
                    </div>
                </div>
-->
                <div class="form-group checkboxpopup">
                    <label  class="col-sm-3 control-label"
                            for="inputEmail3">Medicine Refills</label>
                    <div class="col-sm-9">
                        <input type="checkbox" class="form-control" value="1" name="medicine_bit"/>
                        <input type="text" class="form-control" value="" name="medicine_detail" placeholder="Specify Reason"/>
                    </div>
                </div>
<!--
                <div class="form-group">
                    <label  class="col-sm-3 control-label"
                            for="inputEmail3">Reasons & Specify</label>
                    <div class="col-sm-9">
                       <input type="text" class="form-control" value="" name="medicine_detail" placeholder="Reasons & Specify "/>
                    </div>
                </div>
-->
                <div class="form-group checkboxpopup">
                    <label  class="col-sm-3 control-label"
                            for="inputEmail3">Immunization</label>
                    <div class="col-sm-9">
                        <input type="checkbox" class="form-control" value="1" name="immunization_bit"/>
                        <input type="text" class="form-control" value="" name="immunization_detail" placeholder="Specify Reason"/>
                    </div>
                </div>
<!--
                <div class="form-group">
                    <label  class="col-sm-3 control-label"
                            for="inputEmail3">Reasons & Specify</label>
                    <div class="col-sm-9">
                       
                    </div>
                </div>
-->


<!--
                    <div class="form-group">
                        <label  class="col-sm-2 control-label"
                                for="about_disease">Chief complain</label>
                        <div class="col-sm-10">

                            <textarea required name="about_disease" id="about_disease" class="form-control"></textarea>
                        </div>
                    </div>
-->

            </div>
            <div class="clear"></div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
                <button type="reset" onclick=" $('#PatientModal').modal('hide');" class="btn btn-primary"
                        data-dismiss="modal">
                    Close
                </button>

            </div>

            </form>
        </div>
    </div>
</div>
