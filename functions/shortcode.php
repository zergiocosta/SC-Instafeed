<?php

// Add Shortcode to display feed
function sc_instafeed_display() { ?>
	<div id="instafeed"></div> <?php
}
add_shortcode( 'sc_instafeed', 'sc_instafeed_display' );