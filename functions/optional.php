<?php
  // Change default excerpt Length
	function new_excerpt_length($length) {
		return 140;
	}
	add_filter('excerpt_length', 'new_excerpt_length');
?>