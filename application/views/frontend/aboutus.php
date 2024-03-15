<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$baseUrl = $this->config->item('base_url');
?>
    <div class="clear"></div>
    
    	<div class="inner-page">
        
        	<div class="wrapper">
            
            		
                    <div class="registration-wrapper">
                    	<h2><?php echo $content[0]['title']; ?></h2>
                   	<div class="regi"> 
                   
                     <div class="our-mission"><img src="<?php echo $baseUrl; ?>uploads/<?php echo $content[0]['image']; ?>" /></div>
                        <div class="our-mission-text">
                        	<p><?php echo nl2br($content[0]['description']); ?></p>
                        </div>
                        
                     </div>
                    
                    </div>
            
            </div>
        </div>
        
            