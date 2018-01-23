<?php
if( is_active_sidebar( 'sidebar-page' ) ) {
		dynamic_sidebar('sidebar-page');
	}elseif( is_active_sidebar( 'sidebar-1' ) ) {
		dynamic_sidebar('sidebar-1');
	}