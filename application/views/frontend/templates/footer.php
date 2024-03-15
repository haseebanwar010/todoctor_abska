<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$baseUrl = $this->config->item('base_url');
$sitedata=getsitedata();

?>
 <div class="clear"></div>
    <div class="footer">
    	
    	<div class="wrapper">
        	<div class="about-us">
            	<h3>Contact us</h3>
            	<div class="address">
                <?php echo $sitedata->address; ?>
                </div>
                <div class="ph">
               <?php echo $sitedata->phone; ?>
                </div>
                <div class="email">
                <?php echo $sitedata->email; ?>
                </div>
            </div>
<!--
        	<div class="links links1">
            	<h3>Providers by Location</h3>
            	<ul>
                    <?php foreach($cities as $city){ ?>
                	<li><a href="#"><?php echo $city['name']; ?></a></li>
                    <?php } ?>
                </ul>
            
            </div>
            <div class="links">
            <h3>Medical Specialty</h3>
            	<ul>
                    <?php foreach($categories as $category){ ?>
                	<li><a href="<?php echo $baseUrl; ?>doctor/listing/<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a></li>
                    <?php } ?>
                </ul>
            
            </div>
-->
        <div class="newsletter">
<!--
        	<h3>Newsletter</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam consequat nunc et libero elementum euismod. </p>
            <div class="news">
            <a href="#" class="right-btn"></a>
            <input type="text" class="newsletterinpu" placeholder="Enter Email Address">
            	
          </div>
-->
          <h3>Social Media</h3>
            <div class="socials"><ul>
            	<a target="_blank" href="<?php echo $sitedata->facebook; ?>"><li class="fb"></li></a>
                <a target="_blank" href="<?php echo $sitedata->twitter; ?>"><li class="t"></li></a>
                <a target="_blank" href="<?php echo $sitedata->youtube; ?>"><li class="u"></li></a>
                <a target="_blank" href="<?php echo $sitedata->google_plus; ?>"><li class="g"></li></a>
                <a target="_blank" href="<?php echo $sitedata->linkedin; ?>"><li class="l"></li></a>
            </ul></div>
        </div>
        </div>
    
    </div>
    <div class="copy-rights">
    
    	<div class="wrapper">
        
        	<div class="copy">© 2016 Tudoctor.com All Rights Reserved
</div>
            <div class="poweredby">Powered By: <a target="_blank" href="http://abaskatech.com/">Abaska Technologies</a></div>
        
        </div>
    
    </div>
 

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
     	<div class="login-icons"><img src="<?php echo $baseUrl; ?>assets/frontend/images/logins.png" /></div> 
         <form class="login-area">
                    
                    	<input type="text" placeholder="Username" class="input-login">		
                    	<input type="text" placeholder="Password" class="input-login1">						<button type="submit" value="Submit" class="login-button">Login</button>
                        	<a href="#" class="forgot">Forgot Password </a>
                    <a href="#" class="new-account">New Account</a>
                 <div class="clear"></div>
                    </form>
                    
     
    </div>
  </div>
</div>

     <script src="<?php echo $baseUrl; ?>assets/frontend/js/bootstrap.min.js"></script>
<?php if(isset($page) && $page=="bookdoctor"){ ?>
<?php }else{ ?>
    <script type="text/javascript" src="<?php echo $baseUrl; ?>assets/frontend/engine1/jquery.js"></script>

<?php } ?>

    <script type="text/javascript">
		$(document).ready(function(){
			
				$('.mobile_menu a').click(function(){
				$('.menu').slideToggle();
				
				});
            $('#submitBtn').click(function(){
                var zipcode=$('#zip_code').val();
                var city=$('#city').val();
                if((zipcode==null || zipcode=="")){
                    alert('Zipcode is required!');
                }else{
                    $('#mainsearchform').submit();
                }
            });
            
            
             $(".ratingstarclicker").click(function(){
                 $('#ratingform').submit();
             });
                 $(".ratingstarclicker").mouseover(function(){
            var ratingvalue=$(this).data('starvalue');
            $('#ratingvalue').val(ratingvalue);
            if(ratingvalue==1){
                $('#rat1').addClass('activestar');
                $('#rat2').removeClass('activestar');
                $('#rat3').removeClass('activestar');
                $('#rat4').removeClass('activestar');
                $('#rat5').removeClass('activestar');
            }else if(ratingvalue==2){
                $('#rat1').addClass('activestar');
                $('#rat2').addClass('activestar');
                $('#rat3').removeClass('activestar');
                $('#rat4').removeClass('activestar');
                $('#rat5').removeClass('activestar');
            }else if(ratingvalue==3){
                $('#rat1').addClass('activestar');
                $('#rat2').addClass('activestar');
                $('#rat3').addClass('activestar');
                $('#rat4').removeClass('activestar');
                $('#rat5').removeClass('activestar');
            }else if(ratingvalue==4){
                $('#rat1').addClass('activestar');
                $('#rat2').addClass('activestar');
                $('#rat3').addClass('activestar');
                $('#rat4').addClass('activestar');
                $('#rat5').removeClass('activestar');
            }else if(ratingvalue==5){
                $('#rat1').addClass('activestar');
                $('#rat2').addClass('activestar');
                $('#rat3').addClass('activestar');
                $('#rat4').addClass('activestar');
                $('#rat5').addClass('activestar');
            }
            
        });
			
		});
	</script>
    <script type="text/javascript" src="<?php echo $baseUrl; ?>assets/frontend/engine1/wowslider.js"></script>
	<script type="text/javascript" src="<?php echo $baseUrl; ?>assets/frontend/engine1/script.js"></script>
    <script src="<?php echo $baseUrl; ?>assets/frontend/js/classie.js"></script>
     
		<script src="<?php echo $baseUrl; ?>assets/frontend/js/selectFx.js"></script>
		<script>
			(function() {
				[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {	
					new SelectFx(el);
				} );
			})();
		</script>

<!-- Select2 -->
<script src="<?php echo $baseUrl; ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- DataTables -->
<script src="<?php echo $baseUrl; ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $baseUrl; ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();
  });
</script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
