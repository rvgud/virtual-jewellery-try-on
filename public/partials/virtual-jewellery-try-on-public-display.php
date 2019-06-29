<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://dugudlabs.com
 * @since      1.0.0
 *
 * @package    Virtual_Jewellery_Try_On
 * @subpackage Virtual_Jewellery_Try_On/public/partials
 */
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<style type="text/css">
/* Important part */
.modal-dialog{
    overflow-y: initial !important
}
.modal-content{
    overflow-y: auto;
}
</style>
  

 <div class="container" id="contenainer">
  <!-- Trigger the modal with a button -->

  <!-- Modal -->
  <div class="modal fade" id="TryOnModal" data-backdrop="false" role="dialog" style="z-index: 10000000;margin-top: 45px;">
    <div class="modal-dialog" id="TryOnModal-dialog" >
    
      <!-- Modal content-->
      <div class="modal-content try_on_popup">
       <div class="modal-header" style="padding-top: 5px;
    padding-left: 5px;padding-bottom: 0px;">
            <div class="row" style="margin-bottom:0px;">
                <div class="col-md-12 col-lg-12  col-xs-12  col-sm-12">
                               
            </span>
                        <span class="picture glyphicon glyphicon-repeat" data-toggle="tooltip" data-placement="top" title="Rotate Clockwise" onclick="rotate_right()">
                        </span>
                           
                    <span class="picture glyphicon glyphicon-repeat rotate-gly" onclick="rotate_left()" data-toggle="tooltip" data-placement="top" title="Rotate Anti Clock Wise">
                        </span> 
                   
                    
                       <!-- <a id="linkimage" onclick="this.css('display','none');"><span  id="download_btn"  style="display:none" class="picture glyphicon glyphicon-download"> </span></a>-->
                       
                    
                    
            <button type="button" class="close" data-dismiss="modal">&times;</button>
                 </div>   </div>
          </div>
        <div class="modal-body" id="modal_body">
            <div class="row" style="margin-bottom:0px;">
                <div class="col-lg-12 col-xs-12 col-sm-12">
                    <div class="row" style="margin-bottom:0px;">
                        <div style="overflow: hidden;" class="col-lg-12  col-md-12 col-xs-12 col-sm-12">
                            <div id="image_download" class="row" >
                                <div id="galssimagediv"  >
                             <img  id="earimage" src=""  class="img-responsive img-thumbnail fixed_images" onclick="setActiveItem('galssimagediv');" >
                        </div>
                        <div id="galssimagediv_ear_2"  >
                             <img  id="earimage_2" src=""  class="img-responsive img-thumbnail fixed_images"  onclick="setActiveItem('galssimagediv_ear_2');" >
                        </div>
                        <div id="galssimagediv_neck"  >
                            <img  id="neckimage" src=""  class="img-responsive img-thumbnail fixed_images" onclick="setActiveItem('galssimagediv_neck');" >
                        </div>
                        <div id="galssimagediv_head"  >
                            <img  id="headimage" src=""  class="img-responsive img-thumbnail fixed_images" onclick="setActiveItem('galssimagediv_head');"  >
                        </div>
                        <img style="width: 100%;"  src="<?php echo plugin_dir_url(__FILE__).'/images/female.png' ?>" id="imageCanvas" class="img-responsive img-thumbnail fixed_images" alt="Cinque Terre">
                        <img    id="front_uploaded"  style="display:none;width: 100%;" class="img-thumbnail fixed_images" />
                        <img     id="side_uploaded"  style="display:none;width: 100%;" class="img-thumbnail fixed_images"/>
                       </div>
                                
                               
          <button id="save_btn" style="display:none;" class=".btn btn-success savendownload"  onclick="save_image(this);"> Save</button>
          <a href="#" id="linkimage" onclick="show_save(this);" style="display:none;" class="btn btn-info savendownload" role="button">Download</a>
       <video style="display:none; width: -webkit-fill-available;" id="video" controls autoplay></video><canvas  width ="308px" height="231px" class="img-responsive img-thumbnail fixed_images" id="c" style="display:none;"> </canvas>
                            <button id="capture_btn" style="display:none;" class=".btn btn-success savendownload"  onclick="snapshot();"> Capture</button> 
                        </div>
                        
                       
                         
                    </div>
                    
                </div>
                
                
            </div>
        </div>
            
        <div class="modal-footer">
        
        
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
