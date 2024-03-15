<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$baseUrl = $this->config->item('base_url');
?>
 <div class="clear"></div>
    
    	<div class="inner-page">
        
        	<div class="wrapper">
              <?php if($this->session->flashdata('success_message')!=''){?>
						<section class="content alertcontent">    
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Success!</h4>
                <?php echo $this->session->flashdata('success_message'); ?>
            </div>
        </section>
                     <?php } ?>
                <div class="sp">
            		<div class="left-section detail-profile">
                    	<div class="left-menu ">
                        	<h3>Categories</h3>
                        	<ul>
                            	<?php foreach($categories as $category){ ?>
                            	<li><a href="<?php echo $baseUrl; ?>doctor/listing/<?php echo $category['id']; ?>"><?php echo $category['name']; ?><span class="cate-main">(<?php echo $category['counter']; ?>)</span></a></li>
                                <?php } ?>
                                
                                
                            </ul>
                        </div>
                    		
                    
                    </div>
                    <div class="doctor-profile">
                    
                    	<div class="doct-pic"><img src="<?php echo $baseUrl; ?>uploads/<?php echo $doctor['image']; ?>"/></div>
                       	<div class="doct-detail-dc">
                        		<h4><?php echo $doctor['display_name']; ?></h4>
                            <div class="ratingwrapper">
                            <?php if($allowrating=="yes"){ ?>
                            <form id="ratingform" method="post" action="<?php echo $baseUrl; ?>doctor/submitrating">
                            <input type="hidden" name="rating_value" value="" id="ratingvalue">
                            <input type="hidden" name="doctor_id" value="<?php echo $doctor['id']; ?>">
                            </form>
                        <div class="ratinginputs">
                            <i data-starvalue='1' id="rat1" class="fa fa-star ratingstarclicker"></i>
                            <i data-starvalue='2' id="rat2" class="fa fa-star ratingstarclicker"></i>
                            <i data-starvalue='3' id="rat3" class="fa fa-star ratingstarclicker"></i>
                            <i data-starvalue='4' id="rat4" class="fa fa-star ratingstarclicker"></i>
                            <i data-starvalue='5' id="rat5" class="fa fa-star ratingstarclicker"></i>
                        </div>
                            <?php }else{ ?>
                            
                            <?php for($i=1;$i<=5;$i++){ if($i<=$avgratingval){ ?>
                      <i data-starvalue='1' id="" class="fa fa-star activestar"></i>
                    <?php }else{ ?>
                      <i data-starvalue='1' id="" class="fa fa-star"></i>
                      <?php } } ?>
                            
                            <?php } ?>
                            <p class="ratinp">(Average Rating <?php echo $avgratingval; ?> Based on <?php echo $totalratings; ?> rating) </p>
                                <p class="availabledays"><strong>Availability: </strong><?php echo $doctor['availability_text']; ?></p>
                                <p class="availabledays"><strong>Type of Payments: </strong><?php echo $doctor['payments']; ?></p>
                            </div>
                            <a class="btn btn-default doctdetailbook" style="float: right;vertical-align: top;margin-top: -25px" href="<?php echo $baseUrl; ?>doctor/booking/<?php echo $doctor['id']; ?>">BOOK NOW</a>
                                <h5><?php echo $doctor['cattext']; ?></h5>
                                <div class="icons-email phone_icons"><?php echo $doctor['phone']; ?></div>
                                 <div class="icons-email"><?php echo $doctor['description']; ?></p>
                                <div class="icons-email"><?php echo $doctor['address']; ?></div>
                            
                            
                            
                            <div id="map" class="detailmap"></div>
    <script>
        $( document ).ready(function() {
            var address="<?php echo $doctor['address']; ?>";
            address = address.split(' ').join('+');
            var outputlat =0;
          var outputlong =0;
        var getlatlangurl="https://maps.googleapis.com/maps/api/geocode/json?address="+address+"&key=AIzaSyBxMeZhnLJfK4ax7_GOGDd00OS5-jBFc4M";
            console.log(getlatlangurl);
            $.ajax({url: getlatlangurl, success: function(result){
                console.log(result);
                outputlat=result.results[0].geometry.location.lat;
                outputlong=result.results[0].geometry.location.lng;
                initMap(outputlat,outputlong);
            }});
        });
        
      var map;
      function initMap(paramlat,paramlong) {
        var myLatLng = {lat: paramlat, lng: paramlong};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Hello World!'
        });

      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxMeZhnLJfK4ax7_GOGDd00OS5-jBFc4M"
    async defer></script>

                            
                            
                                 <div class="icons-email phone_icons"><?php echo $doctor['phone']; ?></div>
                            
                            <?php if($doctor['website']!=''){?><div class="icons-email web_icons"><a target="_blank" href="<?php  echo $doctor['website']; ?>"><?php  echo $doctor['website']; ?></a></div><?php }?>
                                 <div class="socialmedialinksdoctor"> 
                                     <?php if($doctor['facebook']!=''){?><a target="_blank" href="<?php  echo $doctor['facebook'];?>"><img src="<?php echo $baseUrl.'assets/frontend/images/facebook_ico.png'; ?>" /></a><?php }?> &nbsp; <?php if($doctor['twitter']!=''){?><a target="_blank" href="<?php  echo $doctor['twitter']; ?>"><img src="<?php echo $baseUrl.'assets/frontend/images/twitter_ico.png'; ?>" /></a> <?php }?>&nbsp;<?php if($doctor['google_plus']!=''){?><a target="_blank" href="<?php  echo $doctor['google_plus']; ?>"><img src="<?php echo $baseUrl.'assets/frontend/images/gplus_ico.png'; ?>" /></a> <?php }?></div>
                            
                            
                                 
                               
                        
                        </div>
                        <div class="profile">
                        	<div class="proflile-icons">About Us</div>
                            <p><?php echo $doctor['aboutus']; ?></p>
                        
                        </div>
                         <div class="profile">
                        	<div class="proflile-icons proflile-icon1">Education</div>
                            <p><?php echo $doctor['education']; ?></p>
                        
                        </div>
<!--
                         <div class="profile">
                        	<div class="proflile-icons proflile-icon2">Biography</div>
                            <p><?php echo $doctor['biography']; ?> </p>
                        
                        </div>
-->
              </div>
                </div>
            </div>
        </div>
    