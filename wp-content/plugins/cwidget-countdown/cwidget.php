<?php
/*
Plugin Name: CWidget Countdown
Plugin URI: http://www.wpadami.com/
Description: Countdown Plugin by Serkan Algur
Version: 1.7
Author: Serkan Algur
Author URI: http://www.wpadami.com
License: GPL2
*/

class cwidget_plugin extends WP_Widget {

	// constructor
	function cwidget_plugin() {
		parent::WP_Widget(false, $name = __('CWidget Countdown', 'cwidget_plugin') );
		load_plugin_textdomain('cwidget_plugin',false,dirname(plugin_basename(__FILE__)).'/inc/language');
	}

	// widget form creation
	function form($instance) {
		// Check values
		if( $instance) {
			 $title = esc_attr($instance['title']);
			 $date = esc_attr($instance['date']);
			 $lang = esc_attr($instance['lang']);
			 $syear = esc_attr($instance['showy']);
			 $smonth = esc_attr($instance['showmo']);
			 $sday = esc_attr($instance['showd']);
			 $shour = esc_attr($instance['showh']);
			 $smin = esc_attr($instance['showmin']);
			 $ssec = esc_attr($instance['showsec']);
		} else {
			 $title = '';
			 $date = '';
			 $lang = '';
			 $syear = 'no';
			 $smonth = 'no';
			 $sday = 'yes';
			 $shour = 'yes';
			 $smin = 'yes';
			 $ssec = 'yes';
		}
		?>

		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'cwidget_plugin'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('date'); ?>"><?php _e('End Date (Y.M.D):', 'cwidget_plugin'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('date'); ?>" name="<?php echo $this->get_field_name('date'); ?>" type="text" value="<?php echo $date; ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('lang'); ?>"><?php _e('Language', 'cwidget_plugin'); ?></label>
		<select name="<?php echo $this->get_field_name('lang'); ?>" id="<?php echo $this->get_field_id('lang'); ?>" class="widefat">
		<option value=""><?php _e('Select Language', 'cwidget_plugin'); ?></option>
		<?php
		$options = array('Albanian' =>'sq','Arabic' =>'ar','Armenian' =>'hy','Bengali/Bangla' =>'bn','Bosnian' =>'bs','Bulgarian' =>'bg','Burmese' =>'my','Catalan' =>'ca','Chinese/Simplified' =>'zh-CN','Chinese/Traditional' =>'zh-TW', 'Croatian' =>'hr', 'Czech' =>'cs', 'Danish' =>'da', 'Dutch' =>'nl', 'English' => 'en', 'Estonian'=>'et', 'Farsi/Persian' =>'fa','Finnish' =>'fi', 'French' =>'fr','Galician' =>'gl', 'German' =>'de', 'Greek' =>'el', 'Gujarati' =>'gu', 'Hebrew' =>'he','Hungarian' =>'hu','Indonesian' =>'id', 'Italian' =>'it', 'Japanese' =>'ja', 'Kannada'=>'kn', 'Korean' =>'ko','Latvian' =>'lv','Lithuanian' =>'lt', 'Malayalam'=>'ml','Malaysian' =>'ms','Norwegian' =>'nb','Polish' =>'pl','Portuguese/Brazilian' =>'pt-BR', 'Romanian' =>'ro', 'Russian' =>'ru', 'Serbian' =>'sr', 'Serbian' =>'sr-SR', 'Slovak' =>'sk','Slovenian' =>'sl','Spanish' =>'es','Swedish' =>'sv','Thai' =>'th', 'Turkish' =>'tr', 'Ukrainian' =>'uk', 'Urdu' =>'ur','Uzbek' =>'uz','Vietnamese' =>'vi', 'Welsh' =>'cy');
		foreach ($options as $langu => $code) {
		echo '<option value="' . $code . '" id="' . $code . '"', $lang == $code ? ' selected="selected"' : '', '>', $langu, '</option>';
		}
		?>
		</select>
		</p>
		<p>
		<strong><?php _e('Show:', 'cwidget_plugin'); ?></strong><br/>
		<input id="<?php echo $this->get_field_id('showy'); ?>" name="<?php echo $this->get_field_name('showy'); ?>" type="checkbox" value="yes" <?php checked( 'yes', $syear ); ?> />
		<label for="<?php echo $this->get_field_id('showy'); ?>"><?php _e('Year', 'cwidget_plugin'); ?></label>&nbsp;<input id="<?php echo $this->get_field_id('showmo'); ?>" name="<?php echo $this->get_field_name('showmo'); ?>" type="checkbox" value="yes" <?php checked( 'yes', $smonth ); ?> />
		<label for="<?php echo $this->get_field_id('showmo'); ?>"><?php _e('Month', 'cwidget_plugin'); ?></label>&nbsp;<input id="<?php echo $this->get_field_id('showd'); ?>" name="<?php echo $this->get_field_name('showd'); ?>" type="checkbox" value="yes" <?php checked( 'yes', $sday ); ?> />
		<label for="<?php echo $this->get_field_id('showd'); ?>"><?php _e('Day', 'cwidget_plugin'); ?></label>&nbsp;<input id="<?php echo $this->get_field_id('showh'); ?>" name="<?php echo $this->get_field_name('showh'); ?>" type="checkbox" value="yes" <?php checked( 'yes', $shour ); ?> />
		<label for="<?php echo $this->get_field_id('showh'); ?>"><?php _e('Hour', 'cwidget_plugin'); ?></label>&nbsp;<input id="<?php echo $this->get_field_id('showmin'); ?>" name="<?php echo $this->get_field_name('showmin'); ?>" type="checkbox" value="yes" <?php checked( 'yes', $smin ); ?> />
		<label for="<?php echo $this->get_field_id('showmin'); ?>"><?php _e('Minute', 'cwidget_plugin'); ?></label>&nbsp;<input id="<?php echo $this->get_field_id('showsec'); ?>" name="<?php echo $this->get_field_name('showsec'); ?>" type="checkbox" value="yes" <?php checked( 'yes', $ssec ); ?> />
		<label for="<?php echo $this->get_field_id('showsec'); ?>"><?php _e('Second', 'cwidget_plugin'); ?></label>
		</p>
		<?php
	}
	// widget update
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		// Fields
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['date'] = strip_tags($new_instance['date']);
		$instance['lang'] = strip_tags($new_instance['lang']);
		$instance['showy'] = esc_attr($new_instance['showy']);
		$instance['showmo'] = esc_attr($new_instance['showmo']);
		$instance['showd'] = esc_attr($new_instance['showd']);
		$instance['showh'] = esc_attr($new_instance['showh']);
		$instance['showmin'] = esc_attr($new_instance['showmin']);
		$instance['showsec'] = esc_attr($new_instance['showsec']);
		return $instance;
	}
	// widget display
	function widget($args, $instance) {
		wp_enqueue_style('cwstyle',plugins_url('cwidget-countdown/inc/cstyled.css'));
		extract( $args );
		// these are the widget options
		$title = apply_filters('widget_title', $instance['title']);
		$date = $instance['date'];
		echo $before_widget;
		// Display the widget
		echo '<div class="widget-text cwidget_plugin_box">';
		// Check if title is set
		if ( $title ) {
		  echo $before_title . $title . $after_title;
		}
		// Check if text is set
		if( $date ) {
			$astext = explode('.',$date);
		}
		echo '<div class="countdown-styled"></div>';
		?>
		<script src="<?php echo plugins_url('cwidget-countdown/inc/countdown.js');?>" type="text/javascript"></script>
		<?php if ($instance["lang"] != 'en'){?>
		<script src="<?php echo plugins_url('cwidget-countdown/inc/clang').'/jquery.countdown-'.$instance["lang"].'.js';?>" type="text/javascript"></script>
		<?php }
		$format = 'dHMS';
		if($instance['showy'] == 'yes' || $instance['showmo'] == 'yes') {$format = 'YOdHMS';}
		?>
		<script type="text/javascript">
		jQuery(document).ready(function($) {
			var newYear = new Date();
			newYear = new Date(<?php echo $astext[0];?>,<?php echo $astext[1];?>-1,<?php echo $astext[2];?>);
			$('.countdown-styled').countdown({until: newYear,format: '<?php echo $format;?>',layout: '<?php if($instance['showy'] == 'yes'){?><div>{yn}<span>{yl}</span></div><?php } ?><?php if($instance['showmo'] == 'yes'){?><div>{on}<span>{ol}</span></div><?php } ?><?php if($instance['showd'] == 'yes'){?><div>{dn}<span>{dl}</span></div><?php } ?><?php if($instance['showh'] == 'yes'){?><div>{hnn}<span>{hl}</span></div><?php } ?><?php if($instance['showmin'] == 'yes'){?><div>{mnn}<span>{ml}</span></div><?php } ?><?php if($instance['showsec'] == 'yes'){?><div>{snn}<span>{sl}</span></div><?php } ?>'});
		  });
		</script>

		<?php
		echo '</div>';
		echo $after_widget;
	}
}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("cwidget_plugin");'));
