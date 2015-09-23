<?php
/*
Plugin Name: Custom Theme Options
Plugin URI: http://wordpress.org/plugins/custom-theme-options/
Description: Custom Theme Options plugin easy to manage your custom theme options like copyright text,youtube, facebook, twitter links etc.
Version: 1.1
Author: Jinesh.P.V, Web Designer and Developer.
Author URI: http://weblumia.com/
*/
/**
	Copyright 2013 Jinesh.P.V (email: jinuvijay5@gmail.com)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as
	published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 */
 
if ( basename( $_SERVER['PHP_SELF'] ) == basename( __FILE__ ) ) {
	die( 'Sorry, but you cannot access this page directly.' );
}

if ( version_compare( PHP_VERSION, '5', '<' ) ) {
	$out			=	"<div id='message' style='width:94%' class='message error'>";
	$out 			.=	sprintf( "<p><strong>Your PHP version is '%s'.<br>The Ajax Event Calendar WordPress plugin requires PHP 5 or higher.</strong></p><p>Ask your web host how to enable PHP 5 on your site.</p>", PHP_VERSION );
	$out 			.=	"</div>";
	print $out;
}

add_action( 'init', 'do_output_buffer' );
add_action( 'admin_menu', 'lumia_add_menu' );
add_action( 'admin_head', 'lumia_admin_styles' );
add_action( 'admin_footer', 'lumia_admin_scripts' );
add_action( "load-theme-settings", 'lumia_save_options' );
add_action( 'admin_head', 'lumia_media_scripts' );

function do_output_buffer() {
	ob_start();
	$settings			=	get_option( "lumia_theme_options" );
	if ( empty( $settings ) ) {
		$settings['header_option_texts']		=	'';
		$settings['header_option_values']		=	'';
		add_option( "lumia_theme_options", $settings, '', 'yes' );
	}
}

function lumia_add_menu() {
	add_theme_page( __( 'Custom Theme Settings', 'lumia_theme' ), __( 'Custom Theme Settings', 'lumia_theme' ), 'edit_theme_options', 'theme_options', 'lumia_theme_admin_options' );
}

function lumia_admin_styles() {
	?>
	<style type="text/css">
	.wrap table.theme_options tr td{
		vertical-align:middle;
	}
	.wrap table.theme_options tr td b{
		line-height:27px; 
		font-size:16px;
	}
	.wrap table.theme_options tr td strong{
		color:#21759B;
	}
	.wrap table.theme_options tr td label{
		cursor:pointer;
	}
	.wrap table.theme_options thead tr td, .wrap table.theme_options tfoot tr td{
		line-height:40px;
	}
	.wrap table.theme_options tr td a.addnewrow, .wrap table.theme_options tr td a.deleterow, .wrap table.theme_options tr td a.sitebtn{
		background:url(<?php echo plugins_url();?>/custom-theme-options/images/add.png) no-repeat center center;
		height:20px;
		width:20px;
		display:inline-block;
		margin-left:5px;
		vertical-align:middle;
	 }
	 .wrap table.theme_options tr td a.sitebtn{
		background:url(<?php echo plugins_url();?>/custom-theme-options/images/image_add.png) no-repeat center center;
	 }
	 .wrap table.theme_options tr td a.deleterow{
		background:url(<?php echo plugins_url();?>/custom-theme-options/images/delete.png) no-repeat center center;
	 }
     </style>
	<?php
}

function lumia_media_scripts() {
	if( $_REQUEST['page'] == 'theme_options' ){
		if( function_exists( 'wp_enqueue_media' ) ){
			wp_enqueue_media();
		}else{
			wp_enqueue_style( 'thickbox' );
			wp_enqueue_script( 'media-upload' );
			wp_enqueue_script( 'thickbox' );
		}
	}
}

function lumia_admin_scripts() {
?>
<script type="text/javascript">
//<![CDATA[
	jQuery( document ).ready( function( e ){
		jQuery( '.logoadd' ).click(function() {
			window.send_to_editor = function(html) {
				imgurl		=	jQuery( 'img', html ).attr( 'src' );
				jQuery( '#site_logo' ).val( imgurl );
				tb_remove();
			}
		});
		jQuery( '.faviconadd' ).click(function() {
			window.send_to_editor = function(html) {
				imgurl		=	jQuery( 'img', html ).attr( 'src' );
				jQuery( '#site_favicon' ).val( imgurl );
				tb_remove();
			}
		});

		jQuery( ".theme_options" ).delegate( ".addnewrow", "click", function(){
			var html			=	'<tr><td><label class="fleld_name">Field Name</label></td><td><input type="text" class="regular-text" name="header_option_values[]" value="" /><a href="javascript:;" class="addnewrow"></a><a href="javascript:;" class="deleterow"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="description">Enter your own label name, please click on "Field Name" label.</span></td></tr>';
			var row				=	jQuery( this ).closest( 'tr' );
			var newRow			=	jQuery( html ).insertAfter( row ); 
			
			newRow.find( '.deleterow' ).click( function() {
				jQuery( this ).closest( 'tr' ).remove();
			});
		});
		jQuery( '.deleterow' ).click( function() {
			jQuery( this ).closest( 'tr' ).remove();
		});
		jQuery( ".theme_options" ).delegate( "label.fleld_name", "click", function(){
			$text				=	jQuery( this ).html();
			jQuery( this ).replaceWith( '<input type="text" name="header_option_texts[]" value="' + $text + '" />' );
			console.log(jQuery( this ).closest( 'td' ).find( 'input').attr( 'class' ));
		});
	});
//]]>
</script>
<?php
}

function lumia_save_options(){
	
	$theme_options								=	get_option( "lumia_theme_options" );
	$theme_options['header_option_texts']		=	( $_POST['header_option_texts'] != '' ) ? $_POST['header_option_texts'] : $theme_options['header_option_texts'];
	$header_option_values						=	$_POST['header_option_values'];
	$theme_options['site_logo']					=	( $_POST['site_logo'] != '' ) 			? $_POST['site_logo'] 			: $theme_options['site_logo'];
	$theme_options['site_favicon']				=	( $_POST['site_favicon'] != '' ) 		? $_POST['site_favicon'] 		: $theme_options['site_favicon'];
	
	for( $i = 0; $i < count( $_POST['header_option_values'] ); $i++ ){
		$label_text								=	( $_POST['header_option_texts'][$i] != '' ) ? $_POST['header_option_texts'][$i] : '';
		$option_value							=	( $_POST['header_option_values'][$i] != '' ) ? $_POST['header_option_values'][$i] : '';
		if( !empty( $label_text ) && !empty( $option_value ) ){ 
			$labelname							=	strtolower( str_replace( " ", "_", $label_text ) );
			$theme_options['header_option_values'][$labelname]	=	wp_filter_post_kses( $option_value );
		}
	}
	
	$updated									=	update_option( "lumia_theme_options", $theme_options );
	
	wp_redirect( admin_url( 'themes.php?page=theme_options&updated=true' ) );
	exit;
}

function lumia_theme_admin_options(){
	?>
    <div class="wrap">
    	<div id="icon-options-general" class="icon32"><br></div>
        <h2><?php _e( 'Custom Theme Settings', 'lumia_theme' );?></h2>
        <?php if ( 'true' == esc_attr( $_GET['updated'] ) ) echo '<div class="updated" ><p>Theme Settings updated.</p></div>'; ?>
        <form action="<?php admin_url( 'themes.php?page=theme-settings' ); ?>" method="post">
            <?php settings_fields( 'general' ); ?>
            <?php if( $_POST['save_settings'] == 'Y' ) { lumia_save_options(); }?>
			<?php 
			$options					=	get_option( 'lumia_theme_options' );
			$site_logo					=	( $options['site_logo'] != '' ) ? $options['site_logo'] : '';
			$site_favicon				=	( $options['site_favicon'] != '' ) ? $options['site_favicon'] : '';
			?>
            <p>&nbsp;</p>
            <table class="wp-list-table widefat theme_options" cellspacing="0">
            	<thead>
                	<tr>
                    	<td style="width:20%"><b><?php _e( 'General Options', 'lumia_theme' );?></b></td>
                        <td style="width:80%">&nbsp;</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><label class="fleld_name"><?php _e( 'Site Logo', 'lumia_theme' );?></label></td>
                        <td><input type="text" class="regular-text" id="site_logo" name="site_logo" value="<?php echo $site_logo;?>" /><a href="javascript:;" title="Add Logo" data-editor="content"class="sitebtn logoadd insert-media"></a></td>
                    </tr>
                    <tr>
                        <td><label class="fleld_name"><?php _e( 'Site Favicon', 'lumia_theme' );?></label></td>
                        <td><input type="text" class="regular-text" id="site_favicon" name="site_favicon" value="<?php echo $site_favicon;?>" /><a href="javascript:;" title="Add Favicon" data-editor="content" class="sitebtn faviconadd insert-media"></a></td>
                    </tr>
                	<?php 
					if( !empty( $options['header_option_texts'] ) && !empty( $options['header_option_values'] ) ) {
						$count				=	count( $options['header_option_values'] );
						for( $i = 0; $i < $count; $i++ ) {
							$label_text		=	( $options['header_option_texts'][$i] != '' ) ? $options['header_option_texts'][$i] : '';
							$labelname		=	strtolower( str_replace( " ", "_", $label_text ) );
							$option_value	=	( $options['header_option_values'][$labelname] != '' ) ? $options['header_option_values'][$labelname] : '';
							if( !empty( $label_text ) && !empty( $option_value ) ){ 
								?>
                                <tr>
                                    <td><label class="fleld_name"><?php echo $label_text;?></label><input type="hidden" value="<?php echo $label_text;?>" name="header_option_texts[]" /></td>
                                    <td><input type="text" class="regular-text" name="header_option_values[]" value="<?php echo $option_value;?>" /><a href="javascript:;" class="addnewrow"></a><a href="javascript:;" class="deleterow"></a></td>
                                </tr>
                            <?php } ?>
                    	<?php } ?>
                    <?php } else { ?>
                    <tr>
                        <td><label class="fleld_name"><?php _e( 'Field Name', 'lumia_theme' );?></label></td>
                        <td><input type="text" class="regular-text" name="header_option_values[]" value="" /><a href="javascript:;" class="addnewrow"></a></td>
                    </tr>
                    <?php }?>
                </tbody>
            	<tfoot>
                	<tr>
                    	<td style="width:20%"><b><?php _e( 'Overview', 'lumia_theme' );?></b></td>
                        <td style="width:80%">&nbsp;</td>
                    </tr>
                	<tr>
                    	<td colspan="2" style="line-height:23px;"><?php _e( '<span class="description"><strong>Usage</strong>: For Eg: if your label name is "<strong>Linked In</strong>", please use these functions&nbsp;&nbsp;&nbsp;<strong>$options	=	get_option( \'lumia_theme_options\' );</strong>&nbsp;&nbsp;&nbsp;<strong>echo $options[\'header_option_values\'][\'linked_in\'];</strong></span>', 'lumia_theme' );?></td>
                    </tr>
                </tfoot>
            </table>
            <p class="submit">
            	<input type="submit" value="Save Changes" class="button button-primary" id="submit" name="submit">
            	<input type="hidden" value="Y" name="save_settings" />
            </p>
        </form>
    </div>
	<?php
}
?>