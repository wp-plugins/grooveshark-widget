<?php
/**
 * Plugin Name: Grooveshark Widget
 * Plugin URI: http://www.7le.ro
 * Description: Grooveshark Widget offers you a simple way to integrate <a href="http://listen.grooveshark.com/" target="_blank">Grooveshark</a> <a href="http://widgets.grooveshark.com/" target="_blank">Widget</a> player into your <a href="http://wordpress.org/" target="_blank">Wordpress</a> sidebar.
 * Version: 1.0.1
 * Author: Raul MATEI
 * Author URI: http://www.7le.ro
 * Changelog:
 * v1.0   - [2009/07/08] Grooveshark Widget public release
 * v1.0.1 - [2009/07/13] markup of the <embed> HTML element has been corrected
*/

/*
    Copyright (C) 2009 Matei Petru-Raul (email: 7le@7le.ro; web: http://www.7le.ro, http://blog.7le.ro)

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

add_action('widgets_init', 'grooveshark_load_widgets');
add_action('admin_print_scripts','grooveshark_widget_load_scripts');

function grooveshark_load_widgets() {
	register_widget('Grooveshark_Widget');
}

function grooveshark_widget_load_scripts() {
    if (is_admin()) {
        echo "<link type=\"text/css\" rel=\"stylesheet\" media=\"all\" href=\"" . WP_PLUGIN_URL . "/grooveshark-widget/css/grooveshark-widget.css\" />\n";
    }
}

function widget_build($widgetid, $width, $height, $colortheme, $autoplay) {
    switch ($colortheme) {
        case 0:  $wcolors = attribute_escape("&bbg=000000&bfg=666666&bt=FFFFFF&bth=000000&pbg=FFFFFF&pbgh=666666&pfg=000000&pfgh=FFFFFF&si=FFFFFF&lbg=FFFFFF&lbgh=666666&lfg=000000&lfgh=FFFFFF&sb=FFFFFF&sbh=666666"); break;
        case 1:  $wcolors = attribute_escape("&bbg=CCA20C&bfg=CC7C0C&bt=4D221C&bth=CCA20C&pbg=4D221C&pbgh=CC7C0C&pfg=CCA20C&pfgh=4D221C&si=4D221C&lbg=4D221C&lbgh=CC7C0C&lfg=CCA20C&lfgh=4D221C&sb=4D221C&sbh=CC7C0C"); break;
        case 2:  $wcolors = attribute_escape("&bbg=99FF00&bfg=FF0054&bt=0088FF&bth=99FF00&pbg=0088FF&pbgh=FF0054&pfg=99FF00&pfgh=0088FF&si=0088FF&lbg=0088FF&lbgh=FF0054&lfg=99FF00&lfgh=0088FF&sb=0088FF&sbh=FF0054"); break;
        case 3:  $wcolors = attribute_escape("&bbg=FFED90&bfg=A8D46F&bt=359668&bth=FFED90&pbg=359668&pbgh=A8D46F&pfg=FFED90&pfgh=359668&si=359668&lbg=359668&lbgh=A8D46F&lfg=FFED90&lfgh=359668&sb=359668&sbh=A8D46F"); break;
        case 4:  $wcolors = attribute_escape("&bbg=E0E4CC&bfg=A7DBD8&bt=F38630&bth=E0E4CC&pbg=F38630&pbgh=A7DBD8&pfg=E0E4CC&pfgh=F38630&si=F38630&lbg=F38630&lbgh=A7DBD8&lfg=E0E4CC&lfgh=F38630&sb=F38630&sbh=A7DBD8"); break;
        case 5:  $wcolors = attribute_escape("&bbg=FFFFFF&bfg=F6D61F&bt=377D9F&bth=FFFFFF&pbg=377D9F&pbgh=F6D61F&pfg=FFFFFF&pfgh=377D9F&si=377D9F&lbg=377D9F&lbgh=F6D61F&lfg=FFFFFF&lfgh=377D9F&sb=377D9F&sbh=F6D61F"); break;
        case 6:  $wcolors = attribute_escape("&bbg=450512&bfg=8A0721&bt=D9183E&bth=450512&pbg=D9183E&pbgh=8A0721&pfg=450512&pfgh=D9183E&si=D9183E&lbg=D9183E&lbgh=8A0721&lfg=450512&lfgh=D9183E&sb=D9183E&sbh=8A0721"); break;
        case 7:  $wcolors = attribute_escape("&bbg=B4D5DA&bfg=B1BABF&bt=813B45&bth=B4D5DA&pbg=813B45&pbgh=B1BABF&pfg=B4D5DA&pfgh=813B45&si=813B45&lbg=813B45&lbgh=B1BABF&lfg=B4D5DA&lfgh=813B45&sb=813B45&sbh=B1BABF"); break;
        case 8:  $wcolors = attribute_escape("&bbg=E8DA5E&bfg=FFFFFF&bt=FF4746&bth=E8DA5E&pbg=FF4746&pbgh=FFFFFF&pfg=E8DA5E&pfgh=FF4746&si=FF4746&lbg=FF4746&lbgh=FFFFFF&lfg=E8DA5E&lfgh=FF4746&sb=FF4746&sbh=FFFFFF"); break;
        case 9:  $wcolors = attribute_escape("&bbg=993937&bfg=B81207&bt=5AA3A0&bth=993937&pbg=5AA3A0&pbgh=B81207&pfg=993937&pfgh=5AA3A0&si=5AA3A0&lbg=5AA3A0&lbgh=B81207&lfg=993937&lfgh=5AA3A0&sb=5AA3A0&sbh=B81207"); break;
        case 10: $wcolors = attribute_escape("&bbg=FFFFFF&bfg=E9FF24&bt=009609&bth=FFFFFF&pbg=009609&pbgh=E9FF24&pfg=FFFFFF&pfgh=009609&si=009609&lbg=009609&lbgh=E9FF24&lfg=FFFFFF&lfgh=009609&sb=009609&sbh=E9FF24"); break;
        case 11: $wcolors = attribute_escape("&bbg=FFFFFF&bfg=D6D6D6&bt=7A7A7A&bth=FFFFFF&pbg=7A7A7A&pbgh=D6D6D6&pfg=FFFFFF&pfgh=7A7A7A&si=7A7A7A&lbg=7A7A7A&lbgh=D6D6D6&lfg=FFFFFF&lfgh=7A7A7A&sb=7A7A7A&sbh=D6D6D6"); break;
        case 12: $wcolors = attribute_escape("&bbg=FFFFFF&bfg=9A9A9A&bt=D70860&bth=FFFFFF&pbg=D70860&pbgh=9A9A9A&pfg=FFFFFF&pfgh=D70860&si=D70860&lbg=D70860&lbgh=9A9A9A&lfg=FFFFFF&lfgh=D70860&sb=D70860&sbh=9A9A9A"); break;
        case 13: $wcolors = attribute_escape("&bbg=000000&bfg=620BB3&bt=FFFFFF&bth=000000&pbg=FFFFFF&pbgh=620BB3&pfg=000000&pfgh=FFFFFF&si=FFFFFF&lbg=FFFFFF&lbgh=620BB3&lfg=000000&lfgh=FFFFFF&sb=FFFFFF&sbh=620BB3"); break;
        case 14: $wcolors = attribute_escape("&bbg=4B3120&bfg=716627&bt=A6984D&bth=4B3120&pbg=A6984D&pbgh=716627&pfg=4B3120&pfgh=A6984D&si=A6984D&lbg=A6984D&lbgh=716627&lfg=4B3120&lfgh=A6984D&sb=A6984D&sbh=716627"); break;
        case 15: $wcolors = attribute_escape("&bbg=F1CE09&bfg=FFFFFF&bt=000000&bth=F1CE09&pbg=000000&pbgh=FFFFFF&pfg=F1CE09&pfgh=000000&si=000000&lbg=000000&lbgh=FFFFFF&lfg=F1CE09&lfgh=000000&sb=000000&sbh=FFFFFF"); break;
        case 16: $wcolors = attribute_escape("&bbg=FFBDBD&bfg=FFA3A3&bt=DD1122&bth=FFBDBD&pbg=DD1122&pbgh=FFA3A3&pfg=FFBDBD&pfgh=DD1122&si=DD1122&lbg=DD1122&lbgh=FFA3A3&lfg=FFBDBD&lfgh=DD1122&sb=DD1122&sbh=FFA3A3"); break;
        case 17: $wcolors = attribute_escape("&bbg=E0DA4A&bfg=F9FF34&bt=FFFFFF&bth=E0DA4A&pbg=FFFFFF&pbgh=F9FF34&pfg=E0DA4A&pfgh=FFFFFF&si=FFFFFF&lbg=FFFFFF&lbgh=F9FF34&lfg=E0DA4A&lfgh=FFFFFF&sb=FFFFFF&sbh=F9FF34"); break;
        case 18: $wcolors = attribute_escape("&bbg=579DD6&bfg=74BF43&bt=CD231F&bth=579DD6&pbg=CD231F&pbgh=74BF43&pfg=579DD6&pfgh=CD231F&si=CD231F&lbg=CD231F&lbgh=74BF43&lfg=579DD6&lfgh=CD231F&sb=CD231F&sbh=74BF43"); break;
        case 19: $wcolors = attribute_escape("&bbg=B2C2E6&bfg=FBF5D3&bt=012C5F&bth=B2C2E6&pbg=012C5F&pbgh=FBF5D3&pfg=B2C2E6&pfgh=012C5F&si=012C5F&lbg=012C5F&lbgh=FBF5D3&lfg=B2C2E6&lfgh=012C5F&sb=012C5F&sbh=FBF5D3"); break;
        case 20: $wcolors = attribute_escape("&bbg=60362A&bfg=482E24&bt=E8C28E&bth=60362A&pbg=E8C28E&pbgh=482E24&pfg=60362A&pfgh=E8C28E&si=E8C28E&lbg=E8C28E&lbgh=482E24&lfg=60362A&lfgh=E8C28E&sb=E8C28E&sbh=482E24"); break;
        case 21: $wcolors = attribute_escape("&bbg=151617&bfg=151617&bt=BABABA&bth=BABABA&pbg=303030&pbgh=F0F0F0&pfg=BABABA&pfgh=303030&si=454545&lbg=787878&lbgh=292929&lfg=FAFAFA&lfgh=FCFCFC&sb=787878&sbh=787878"); break;
    }
    $player="
        <object width=\"" . $width . "\" height=\"" . $height . "\">
            <param name=\"movie\" value=\"http://listen.grooveshark.com/widget.swf\" />
            <param name=\"wmode\" value=\"window\" />
            <param name=\"allowScriptAccess\" value=\"always\" />
            <param name=\"flashvars\" value=\"hostname=cowbell.grooveshark.com&amp;widgetID=" . $widgetid . "&amp;style=metal" . $wcolors . "&amp;p=". $autoplay . "\" />
            <embed src=\"http://listen.grooveshark.com/widget.swf\" type=\"application/x-shockwave-flash\" width=\"" . $width . "\" height=\"" . $height . "\" flashvars=\"hostname=cowbell.grooveshark.com&amp;widgetID=" . $widgetid . "&amp;style=metal" . $wcolors . "&amp;p=". $autoplay . "\" allowScriptAccess=\"always\" wmode=\"window\" />
        </object>";
    return $player;
}


class Grooveshark_Widget extends WP_Widget {

    function Grooveshark_Widget() {
		$widget_ops  = array( 'classname' => 'grooveshark', 'description' => __('A simple way to integrate Grooveshark Widget into your Wordpress sidebar.', 'grooveshark') );
		$control_ops = array( 'width' => 500, 'id_base' => 'grooveshark-widget' );
		$this->WP_Widget( 'grooveshark-widget', __('Grooveshark Widget', 'grooveshark'), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );
		$title      = apply_filters('widget_title', $instance['title'] );
		$widgetid   = $instance['widgetid'];
        $username   = $instance['username'];
        $width      = $instance['width'];
        $height     = $instance['height'];
		$autoplay   = $instance['autoplay'];
		$colortheme = $instance['colortheme'];
        $player     = widget_build($widgetid, $width, $height, $colortheme, $autoplay);

		echo $before_widget;
		if ($title)
            echo $before_title . $title . $after_title;

        if ($widgetid && $width && $height) {
            echo "\n" . $player . "\n";
        } else {
            echo "<p>" . _e('Please complete all settings in the widgets page.', 'grooveshark') . "</p>";
        }
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title']      = strip_tags( $new_instance['title'] );
		$instance['widgetid']   = strip_tags( $new_instance['widgetid'] );
        $instance['username']   = strip_tags( $new_instance['username'] );
        $instance['password']   = strip_tags( $new_instance['password'] );
        $instance['width']      = strip_tags( $new_instance['width'] );
        $instance['height']     = strip_tags( $new_instance['height'] );
		$instance['autoplay']   = $new_instance['autoplay'];
		$instance['colortheme'] = $new_instance['colortheme'];
		return $instance;
	}

	function form( $instance ) {
		$defaults = array('title' => __('Grooveshark Widget', 'grooveshark'), 'colortheme' => '0', 'autoplay' => '0', 'username' => __('available soon', 'grooveshark'));
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
        <div id="grooveshark-widget-leftside">
            <!-- Widget Title -->
            <h4><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Widget Title:', 'exemple'); ?></label></h4>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
            <?php /* in the future
            <!-- Username -->
            <h4><label for="<?php echo $this->get_field_id( 'username' ); ?>"><?php _e('Username:', 'grooveshark'); ?></label></h4>
            <input class="widefat" disabled type="text" id="<?php echo $this->get_field_id( 'username' ); ?>" name="<?php echo $this->get_field_name( 'username' ); ?>" value="<?php echo $instance['username']; ?>" />

            <!-- Password -->
            <h4><label for="<?php echo $this->get_field_id( 'password' ); ?>"><?php _e('Password:', 'grooveshark'); ?></label></h4>
            <input class="widefat" disabled type="password" id="<?php echo $this->get_field_id( 'password' ); ?>" name="<?php echo $this->get_field_name( 'password' ); ?>" value="<?php echo $instance['password']; ?>" />
            */ ?>
            <!-- Widget ID -->
            <h4><label for="<?php echo $this->get_field_id( 'widgetid' ); ?>"><?php _e('Widget ID:', 'grooveshark'); ?></label></h4>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'widgetid' ); ?>" name="<?php echo $this->get_field_name( 'widgetid' ); ?>" value="<?php echo $instance['widgetid']; ?>" />

            <!-- Widget Width -->
            <h4><label for="<?php echo $this->get_field_id( 'width' ); ?>"><?php _e('Widget Width (px):', 'grooveshark'); ?></label></h4>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" value="<?php echo $instance['width']; ?>" />

            <!-- Widget Height -->
            <h4><label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php _e('Widget Height (px):', 'grooveshark'); ?></label></h4>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" value="<?php echo $instance['height']; ?>" />

            <!-- Color Theme -->
            <h4><label for="<?php echo $this->get_field_id( 'colortheme' ); ?>"><?php _e('Color Theme:', 'grooveshark'); ?></label></h4>
            <select class="widefat" id="<?php echo $this->get_field_id( 'colortheme' ); ?>" name="<?php echo $this->get_field_name( 'colortheme' ); ?>">
            <?php $tnames = array("Default","Walking on the Sun","Neon Disaster","Golf Course","Creamcicle at the Beach Party","Toy Boat","Wine and Chocolate Covered Strawberries","Japanese Kite","Eggs and Catsup","Shark Bait","Sesame Street","Robot Food","Asian Haircut","Goth Girl","I Woke Up And My House Was Gone","Too Drive To Drunk","She Said She Was 18","Lemon Party","Hipster Sneakers","Blue Moon I Saw You Standing Alone","Monkey Trouble In Paradise","7le");
            for ($i = 0; $i < count($tnames); $i++) { $ctheme = $tnames[$i]; echo "\n"; ?>
                <option value="<?php _e($i, 'grooveshark'); ?>" <?php if ($i == $instance['colortheme']) { ?>selected="selected"<?php } ?>><?php _e($ctheme, 'grooveshark'); ?></option><?php echo "\n"; } ?>
            </select>

            <!-- Autoplay -->
            <h4><label for="<?php echo $this->get_field_id( 'autoplay' ); ?>"><?php _e('Autoplay:', 'grooveshark'); ?></label></h4>
            <select class="small-input" id="<?php echo $this->get_field_id( 'autoplay' ); ?>" name="<?php echo $this->get_field_name( 'autoplay' ); ?>">
                <option value="1" <?php if ($instance['autoplay'] == 1 ) { ?>selected="selected"<?php } ?>>Yes</option>
                <option value="0" <?php if ($instance['autoplay'] == 0 ) { ?>selected="selected"<?php } ?>>No</option>
            </select>
        </div>
        <div id="grooveshark-widget-rightside">
            <h4><?php _e('Widget Preview', 'grooveshark'); ?></h4>
            <?php _e(widget_build($instance['widgetid'], '240', '300', $instance['colortheme'], '0'), 'grooveshark'); ?>
            <em>Widget preview dimensions are fixed at 240 pixels in width and 300 pixels in height due to screen size restraints.</em>
        </div>
        <div id="grooveshark-widget-footer">Press on the "Save" button to refresh the widget preview.</div>
	<?php
	}
}
?>