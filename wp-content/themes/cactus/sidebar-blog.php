<?php
if( is_active_sidebar( 'sidebar-blog' ) ) {
		dynamic_sidebar('sidebar-blog');
	}elseif( is_active_sidebar( 'sidebar-1' ) ) {
		dynamic_sidebar('sidebar-1');
	}