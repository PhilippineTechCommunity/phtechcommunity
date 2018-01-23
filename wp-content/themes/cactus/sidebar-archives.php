<?php
if( is_active_sidebar( 'sidebar-archives' ) ) {
		dynamic_sidebar('sidebar-archives');
	}elseif( is_active_sidebar( 'sidebar-1' ) ) {
		dynamic_sidebar('sidebar-1');
	}