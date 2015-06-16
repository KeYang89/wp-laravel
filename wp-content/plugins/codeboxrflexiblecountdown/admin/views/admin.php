<?php
/**
 * Represents the view for the administration dashboard.
 *
 * This includes the header, options, and other information that should provide
 * The User Interface to the end user.
 *
 * @package   Codeboxr_Flexible_CountDown
 * @author    Codeboxr <info@codeboxr.com>
 * @license   GPL-2.0+
 * @link      http://codeboxr.com/
 * @copyright 2015 Codeboxr
 */
?>

<div class="wrap columns-2">

	<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
	<div id="poststuff">
		<div id="post-body" class="metabox-holder columns-2">
			<div id="post-body-content" style="position: relative;">
				<?php
				$this->cbfc_settings_api->show_navigation();
				$this->cbfc_settings_api->show_forms();
				?>
			</div>
			<div id="postbox-container-1" class="postbox-container-1">
				<?php require_once( plugin_dir_path( __FILE__ ). '../../public/views/sidebar.php' ); ?>
			</div>
		</div>
	</div>
</div>
