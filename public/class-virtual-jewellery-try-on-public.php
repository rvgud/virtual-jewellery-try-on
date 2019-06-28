<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://dugudlabs.com
 * @since      1.0.0
 *
 * @package    Virtual_Jewellery_Try_On
 * @subpackage Virtual_Jewellery_Try_On/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Virtual_Jewellery_Try_On
 * @subpackage Virtual_Jewellery_Try_On/public
 * @author     dugudlabs <ravinstra5876@gmail.com>
 */
class Virtual_Jewellery_Try_On_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}
	public function start(){
		add_action( 'woocommerce_single_product_summary', 'show_button', 32 ,0 );
			//add_action( 'woocommerce_after_shop_loop_item', 'show_loop_button', 10);
			//add_action( 'woocommerce_after_shop_loop', 'show_try_on_popup', 10);
	}


	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/virtual-jewellery-try-on-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name.'jquery', plugin_dir_url( __FILE__ ) . 'css/jquery-ui.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name.'bootstrap-res',plugin_dir_url( __FILE__ ) . 'css/bootstrap-responsive.css', array(), $this->version, 'all' );
        wp_enqueue_style( $this->plugin_name.'bootstrap', plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/virtual-jewellery-try-on-public.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name.'htmtocanvas_tryon', plugin_dir_url( __FILE__ ) . 'js/html2canvas.min.js', array( 'jquery' ), $this->version, false );
        wp_enqueue_script( $this->plugin_name.'htmtocanvas_tryon', plugin_dir_url( __FILE__ ) . 'js/html2canvas.min.js', array( 'jquery' ), $this->version, false );
        wp_enqueue_script( $this->plugin_name.'bootstrapjs', plugin_dir_url( __FILE__ ) . 'js/bootstrap.min.js');
        //wp_enqueue_script( $this->plugin_name.'jqueryuijs', plugin_dir_url( __FILE__ ) . 'js/jquery-ui.js');
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-widget');
		wp_enqueue_script('jquery-ui-mouse');
		wp_enqueue_script('jquery-ui-draggable');
		wp_enqueue_script('jquery-ui-droppable');
		wp_enqueue_script('jquery-ui-resizable');
		wp_enqueue_script('jquery-ui-tooltip');
        wp_enqueue_script('jquery-touch-punch',array( 'jquery-ui-mouse','jquery-ui-widget' ));
        wp_enqueue_script("load_core_functions", plugin_dir_url(__FILE__) . 'js/load_core_functions.js',  array( 'jquery' ), $this->version,false );


	}

}
function show_button(){
	
    global $product; 
    global $post;
    $try_on_neck=get_post_meta($post->ID,'try_on_neck', true); 
    $try_on_ear=get_post_meta($post->ID,'try_on_ear', true); 
    $try_on_ear_2=get_post_meta($post->ID,'try_on_ear', true);
    $try_on_head=get_post_meta($post->ID,'try_on_head', true); 
    $id = $product->get_id();
    $img_url= get_the_post_thumbnail_url($product_id);
    $scode="[add_to_cart_url id='".$id."']";
    $scode = do_shortcode("[add_to_cart_url id='".$id."']");
    if(($try_on_neck !=null || $try_on_neck !='') ||  ($try_on_ear !=null || $try_on_ear !='') || ($try_on_head !=null || $try_on_head !='')){
    	?>
    	<script>
    		console.log("hello");
    	function set_properties_jewels(name,try_on_neck,try_on_ear,try_on_ear_2,try_on_head,id){
    		if((try_on_neck !=null || try_on_neck !='')){
    			document.getElementById('neckimage').src=try_on_neck;
    		}
    		if((try_on_ear !=null || try_on_ear !='')){
                document.getElementById('earimage').src=try_on_ear;
				document.getElementById('earimage_2').src=try_on_ear_2;    		}
    		if((try_on_head !=null || try_on_head !='')){
				document.getElementById('headimage').src=try_on_head;
    		}
    	}
    	</script>
    	<button type="button" class="btn btn-info" onclick="set_properties_jewels('BIBA','<?php echo $try_on_neck;?>','<?php echo $try_on_ear;?>','<?php echo $try_on_ear_2;?>','<?php echo $try_on_head;?>','<?php echo $scode;?>');" data-toggle="modal" data-target="#TryOnModal">TryOn</button>
    	<?php
    	include_once plugin_dir_path(__FILE__).'partials/virtual-jewellery-try-on-public-display.php';
    }
   
}
