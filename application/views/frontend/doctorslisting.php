<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$baseUrl = $this->config->item('base_url');
?>
<div class="clear"></div>
	<div class="inner-page">
        
        	<div class="wrapper">
                <div class="sp">
            		<div class="left-section">
                    	<div class="left-menu">
                        	<h3>Categories</h3>
                        	<ul>
                                <?php foreach($categories as $category){ ?>
                            	<li><a href="<?php echo $baseUrl; ?>doctor/listing/<?php echo $category['id']; ?>"><?php echo $category['name']; ?><span class="cate-main">(<?php echo $category['counter']; ?>)</span></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    		
                    
                    </div>
                    <div class="doctor-listing">
                    
                    	<h3>Search Result</h3>
                        <div class="listing">
                        	<ul>
                                <?php if(empty($doctors)){ ?>
                                <p class="norecordfound">No Record Found!</p>
                                <?php }else{ foreach($doctors as $doctor){ ?>
                                <li>
                            	<a href="<?php echo $baseUrl; ?>doctor/detail/<?php echo $doctor['id']; ?>">
                                
                                	<div class="doc-pic"><img src="<?php echo $baseUrl; ?>uploads/thumb/<?php echo $doctor['image']; ?>" /></div>
                                    <div class="doc-info">
                                    	<h4><?php echo $doctor['display_name']; ?></h4>
                                        <div class="ratingwrapper">
                                            <?php for($i=1;$i<=5;$i++){ if($i<=$doctor['avgrating']){ ?>
                      <i data-starvalue='1' id="" class="fa fa-star activestar"></i>
                    <?php }else{ ?>
                      <i data-starvalue='1' id="" class="fa fa-star"></i>
                      <?php } } ?>
                                        </div>
                                        <h5><?php echo $doctor['cattext']; ?></h5>
                                        <p class="availabledays"><?php echo $doctor['availability_text']; ?></p>
                                        <p class="availabledays"><?php echo $doctor['payments']; ?></p>
                                        <h6><?php echo $doctor['address']; ?></h6>
                                        <p><?php if(strlen($doctor['description'])>66){ echo substr($doctor['description'],0,66)."..."; }else{ echo $doctor['description']; } ?></p>
                                    </div>
                                </a>
                            	
                            </li>
                                <?php } } ?>
                        	
                        </ul></div>
                        <div class="clear"></div>
                    
                    </div>
                </div>
            </div>
        </div>
    