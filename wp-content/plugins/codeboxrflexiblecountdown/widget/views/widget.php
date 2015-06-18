<?php
/**
* @package   Codeboxr_Flexible_CountDown
* @author    Codeboxr <info@codeboxr.com>
* @license   GPL-2.0+
* @link      http://codeboxr.com/
* @copyright 2014 Codeboxr
*/
?>
<?php echo $title; ?>

<?php

    $args['type']   = $instance['cbfc_countdown_style'];
    $args['date']   = $instance['cbfc_date'];
    $args['hour']   = $instance['cbfc_hour'];
    $args['minute'] = $instance['cbfc_min'];

    echo cbfc_flexible_countdown($args);
?>