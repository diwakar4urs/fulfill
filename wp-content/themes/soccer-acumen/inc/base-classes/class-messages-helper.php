<?php
/**
* @ Notification Helper
* @ return String
* @ 
*/

if( !class_exists( 'Birds_Eye_NotificationsHelper' ) ) {
	class Birds_Eye_NotificationsHelper{
		
		public $message;
		
		public function __construct() {
			// Do Something here..
		}
		
		/**
		 * @Soccer Acumen
		 * $return {HTML}
		 */
		public static function success( $message = 'No recored found' ) {
			global $post;
			
			$output	 = '';
			$output	.= '<div class="col-md-12 message-success alert alert-success  alert-dismissible" role="alert"><p>';
			$output	.= $message;
			$output	.= '</p></div>';
			
			echo force_balance_tags ( $output ); 		
		}
		
		/**
		 * @Errors
		 * $return {HTML}
		 */
		public static function error( $message='No recored found' ) {
			global $post;
		   
		   $output	 = '';
		   $output	.= '<div class="col-md-12 message-warning alert alert-danger alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"> <i class="icon-times-circle"></i></span></button>
						  <i class="icon-warning2"></i>'.$message.'
						</div>';
		  
		   echo force_balance_tags ( $output ); 	
		
		}
	  
	  	/**
		 * @Warnings
		 * $return {HTML}
		 */
		public static function warning( $message='No recored found' ) {
		  global $post;	
			
		  $output	 = '';
		  $output	.= '<div class="col-md-12 message-warning alert alert-warning  alert-dismissible" role="alert"><p>';
		  $output	.= $message;
		  $output	.= '</p></div>';
		 
		 echo force_balance_tags ( $output ); 
		}
		
		/**
		 * @Infomation
		 * $return {HTML}
		 */
		public static function informations($message='No recored found') { 
		  global $post;
		 
		  $output	 = '';
		  $output	.= '<div class="col-md-12 message-informations alert alert-info  alert-dismissible"  role="alert"><p>';
		  $output	.= $message;
		  $output	.= '</p></div>';
		 
		 echo force_balance_tags ( $output ); 
		
		}
	}
	new Birds_Eye_NotificationsHelper();
}
?>