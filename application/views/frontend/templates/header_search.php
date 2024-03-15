<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$baseUrl = $this->config->item('base_url');
?> <div class="new-inner-search">
    <div class="wrapper">
    	<div class="search-heading">Search Your Healthcare User</div>
        <div class="search-section innersearch">
				
               <div class="sc">
                    <form method="post" action="<?php echo $baseUrl; ?>doctor/listing">
                
<!--
                	<div class="drop-down-secitons ddds1"><section>
				<select class="cs-select cs-skin-elastic" name="city">
					<option value="" disabled>City</option>
                    <?php foreach($cities as $city){ ?>
					<option <?php if(isset($_POST['city']) && $_POST['city']==$city['id']){ echo 'selected'; } ?> value="<?php echo $city['id']; ?>" data-class="flag-france"><?php echo $city['name']; ?></option>
                    <?php } ?>
				</select>
			</section></div>
-->
                    <div class="drop-down-secitons ddds2"><section>
				<select class="cs-select cs-skin-elastic" name="category">
					<option value="" disabled>Category</option>
                    <?php foreach($categories as $category){ ?>
					<option <?php if(isset($_POST['category']) && $_POST['category']==$city['id']){ echo 'selected'; } ?> value="<?php echo $category['id']; ?>" data-class="flag-france"><?php echo $category['name']; ?></option>
                    <?php } ?>
				</select>
			</section></div>
                        <div class="loctions">
                    	<input value="<?php if(isset($_POST['zip_code'])){ echo $_POST['zip_code']; }?>" name="zip_code" type="text" class="my-location" placeholder="Near" >
                    </div>
                        <button class="search-butons">Search</button>
                    </form>
                </div>        
        
        </div>
    </div>
    </div>