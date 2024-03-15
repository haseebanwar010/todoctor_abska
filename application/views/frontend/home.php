<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$baseUrl = $this->config->item('base_url');
?>
<div class="wrapper">
        <div class="search-section">
<!--
				<h2>Find and book a doctor / 
appointment right now.</h2>
-->
                <p>Search for doctors and schedule appointments online</p>
                <div class="sc">
                    <form id="mainsearchform" method="post" action="<?php echo $baseUrl; ?>doctor/listing">
                
<!--
                	<div class="drop-down-secitons ddds1"><section>
				<select class="cs-select cs-skin-elastic" name="city" id="city">
					<option value="" disabled selected>City</option>
                    <?php foreach($cities as $city){ ?>
					<option value="<?php echo $city['id']; ?>" data-class="flag-france"><?php echo $city['name']; ?></option>
                    <?php } ?>
				</select>
			</section></div>
-->
                    <div class="drop-down-secitons ddds2"><section>
				<select class="cs-select cs-skin-elastic" name="category">
					<option value="" disabled selected>Category</option>
                    <?php foreach($categories as $category){ ?>
					<option value="<?php echo $category['id']; ?>" data-class="flag-france"><?php echo $category['name']; ?></option>
                    <?php } ?>
				</select>
			</section></div>
                        <div class="loctions">
                    	<input name="zip_code" id="zip_code" type="text" class="my-location" placeholder="Near" >
                    </div>
                        <a class="search-butons" id="submitBtn">Search</a>
<!--                        <button class="search-butons">Search</button>-->
                    </form>
                </div>        
        
        </div>
    </div>
    <div class="banner">
    
    <div id="wowslider-container1">
	<div class="ws_images"><ul>
        <?php foreach($banners as $banner){ ?>
<li><img src="<?php echo $baseUrl; ?>uploads/<?php echo $banner['image']; ?>" alt="Desert" title="" id="wows1_0"/></li>
        <?php } ?>
</ul>
</div>
<div class="ws_bullets"><div>
<a href="#" title="Desert"><img src="data1/tooltips/desert.jpg" alt="Desert"/>1</a>
<a href="#" title="Jellyfish"><img src="data1/tooltips/jellyfish.jpg" alt="Jellyfish"/>2</a>
<a href="#" title="Koala"><img src="data1/tooltips/koala.jpg" alt="Koala"/>3</a>
<a href="#" title="Lighthouse"><img src="data1/tooltips/lighthouse.jpg" alt="Lighthouse"/>4</a>

</div></div>

	<div class="ws_shadow"></div>
	</div>
    </div>
    
    </div>