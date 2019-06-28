<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://dugudlabs.com
 * @since      1.0.0
 *
 * @package    Virtual_Jewellery_Try_On
 * @subpackage Virtual_Jewellery_Try_On/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Virtual_Jewellery_Try_On
 * @subpackage Virtual_Jewellery_Try_On/admin
 * @author     dugudlabs <ravinstra5876@gmail.com>
 */
class Virtual_Jewellery_Try_On_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Virtual_Jewellery_Try_On_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Virtual_Jewellery_Try_On_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/virtual-jewellery-try-on-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Virtual_Jewellery_Try_On_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Virtual_Jewellery_Try_On_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_script('jquery');    wp_enqueue_script('media-upload');   wp_enqueue_script('thickbox'); 
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/virtual-jewellery-try-on-admin.js', array( 'jquery' ), $this->version, false );

	}


		public function add_menu() {
     add_menu_page("JewelFit","JewelFit", "manage_options", "tryjewelmenu",  'show_admin_menu', $icon_url = '', $position = null );
      add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes_image' ) );
      
      add_action( 'save_post', array( $this, 'save_image' ));
    
	}

	
	
	
	
	////save neck image
 public function save_image($post_id){
     $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'case_study_bg_nonce' ] ) && wp_verify_nonce( $_POST[ 'case_study_bg_nonce' ], 'case_study_bg_submit' ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce  ) {
        return;
    }

    // Checks for input and sanitizes/saves if needed\
	$url=esc_url_raw($_POST[ 'my_image_URL' ]);
    if( isset( $url ) ) {
    	$try_on_option=sanitize_text_field($_POST['try_on_option']);
    	$selected_try_option="try_on_head";
    	if($try_on_option=="try_on_neck")
    	{
    		$selected_try_option="try_on_neck";
    		update_post_meta( $post_id, 'try_on_head', '' );
    		update_post_meta( $post_id, 'try_on_ear', '' );
    	}
    	else if($try_on_option=="try_on_ear")
    	{
    		$selected_try_option="try_on_ear";
    		update_post_meta( $post_id, 'try_on_head', '' );
    		update_post_meta( $post_id, 'try_on_neck', '' );
    	}
    	else
    	{
    		update_post_meta( $post_id, 'try_on_ear', '' );
    		update_post_meta( $post_id, 'try_on_neck', '' );
    	}
        update_post_meta( $post_id, $selected_try_option, $url);
        update_post_meta( $post_id, "selected_try_option", $selected_try_option );

          //update_post_meta( $post_id, 'try_on_image_rvgud', plugin_dir_url( __FILE__ ) . 'images/glasses.png' );
    }    
    }
   

 	public function add_meta_boxes_image($post_types) {
    $post_types = array('product');
         //limit meta box to certain post types
    global $post;
    $product = get_product( $post->ID );
    
   		add_meta_box(
            'wf_child_letters_neck'
            ,__( 'Try On', 'woocommerce' )
            ,array( $this, 'render_meta_box_content_image' )
            ,$post_type
            ,'advanced'
            ,'high'
        );
       
        
        
    
}

 public function render_meta_box_content_image(){
 	global $post;

 	$selected_try_option=get_post_meta($post->ID,"selected_try_option",true);
 	if($selected_try_option==null || $selected_try_option =='')
 	{
 		$selected_try_option="try_on_head";
 	}
	$url =get_post_meta($post->ID,$selected_try_option, true);  ?>
	 <span style="float: left;">Check Out Preamium Version For More Features At : <a  href="https://www.dugudlabs.com/jewelfit" target="_blank">JewelFit Gold</a>
	 </span></br>
	<select name="try_on_option">
	<option selected="selected" value="try_on_head">try on head</option>
  <option value="try_on_neck">try on neck</option>
  <option value="try_on_ear">try on ear</option>
  


</select>
    <input hidden="hidden" id="my_image_URL" name="my_image_URL" type="text" value="<?php echo $url;?>"  style="width:400px;" />
    

<?php if($url==null || $url ==''){?>
<a id="my_upl_button">Set Try On Image</a>
<?php }
else {?>
<script>
function remove_try_on(){
    jQuery('#my_image_URL').val('');
    jQuery('#picsrc').hide();
}</script>
<img src="<?php echo $url;?>" style="width:200px;" id="picsrc" />
<a id="my_upl_button">Change</a>
<a onclick="remove_try_on();">Remove</a>
 <?php  } ?>

    <script>
   jQuery('#my_upl_button').click(function() {

        var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

        jQuery('#my_image_URL').val(attachment.url);
	jQuery('#picsrc').attr('src',attachment.url);
        wp.media.editor.send.attachment = send_attachment_bkp;
    }

    wp.media.editor.open();
    });

    
  
    </script>
<?php
   

}
	





}


 function show_admin_menu() { 
    
     include_once plugin_dir_path(__FILE__)."partials/virtual-jewellery-try-on-admin-display.php";
 }

