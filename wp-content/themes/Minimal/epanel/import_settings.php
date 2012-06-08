<?php 
add_action( 'admin_enqueue_scripts', 'import_epanel_javascript' );
function import_epanel_javascript( $hook_suffix ) {
	if ( 'admin.php' == $hook_suffix && isset( $_GET['import'] ) && isset( $_GET['step'] ) && 'wordpress' == $_GET['import'] && '1' == $_GET['step'] )
		add_action( 'admin_head', 'admin_headhook' );
}

function admin_headhook(){ ?>
	<script type="text/javascript">
		jQuery(document).ready(function($){
			$("p.submit").before("<p><input type='checkbox' id='importepanel' name='importepanel' value='1' style='margin-right: 5px;'><label for='importepanel'>Replace ePanel settings with sample data values</label></p>");
		});
	</script>
<?php }

add_action('import_end','importend');
function importend(){
	global $wpdb, $shortname;
	
	#make custom fields image paths point to sampledata/sample_images folder
	$sample_images_postmeta = $wpdb->get_results("SELECT meta_id, meta_value FROM $wpdb->postmeta WHERE meta_value REGEXP 'http://et_sample_images.com'");
	if ( $sample_images_postmeta ) {
		foreach ( $sample_images_postmeta as $postmeta ){
			$template_dir = get_template_directory_uri();
			if ( is_multisite() ){
				switch_to_blog(1);
				$main_siteurl = site_url();
				restore_current_blog();
				
				$template_dir = $main_siteurl . '/wp-content/themes/' . get_template();
			}
			preg_match( '/http:\/\/et_sample_images.com\/([^.]+).jpg/', $postmeta->meta_value, $matches );
			$image_path = $matches[1];
			
			$local_image = preg_replace( '/http:\/\/et_sample_images.com\/([^.]+).jpg/', $template_dir . '/sampledata/sample_images/$1.jpg', $postmeta->meta_value );
			
			$local_image = preg_replace( '/s:55:/', 's:' . strlen( $template_dir . '/sampledata/sample_images/' . $image_path . '.jpg' ) . ':', $local_image );
			
			$wpdb->update( $wpdb->postmeta, array( 'meta_value' => $local_image ), array( 'meta_id' => $postmeta->meta_id ), array( '%s' ) );
		}
	}

	if ( !isset($_POST['importepanel']) )
		return;
	
	$importOptions = 'YToxMDA6e3M6MDoiIjtOO3M6MTI6Im1pbmltYWxfbG9nbyI7czowOiIiO3M6MTU6Im1pbmltYWxfZmF2aWNvbiI7czowOiIiO3M6MjA6Im1pbmltYWxfY29sb3Jfc2NoZW1lIjtzOjQ6IkdyZXkiO3M6MTg6Im1pbmltYWxfYmxvZ19zdHlsZSI7TjtzOjE4OiJtaW5pbWFsX2dyYWJfaW1hZ2UiO047czoyMDoibWluaW1hbF9jYXRudW1fcG9zdHMiO3M6MToiNiI7czoyNDoibWluaW1hbF9hcmNoaXZlbnVtX3Bvc3RzIjtzOjE6IjUiO3M6MjM6Im1pbmltYWxfc2VhcmNobnVtX3Bvc3RzIjtzOjE6IjUiO3M6MjA6Im1pbmltYWxfdGFnbnVtX3Bvc3RzIjtzOjE6IjUiO3M6MTk6Im1pbmltYWxfZGF0ZV9mb3JtYXQiO3M6NjoiTSBqLCBZIjtzOjE5OiJtaW5pbWFsX3VzZV9leGNlcnB0IjtOO3M6MTk6Im1pbmltYWxfaG9tZV9wYWdlXzEiO3M6NToiQWJvdXQiO3M6MTY6Im1pbmltYWxfYmxvZ19jYXQiO3M6NDoiQmxvZyI7czoxNjoibWluaW1hbF9zZXJ2aWNlcyI7czoyOiJvbiI7czoyNDoibWluaW1hbF9ob21lcGFnZV93aWRnZXRzIjtOO3M6MTc6Im1pbmltYWxfc2VydmljZV8xIjtzOjk6IldoYXQgSSBEbyI7czoxNzoibWluaW1hbF9zZXJ2aWNlXzIiO3M6ODoiV2hvIEkgQW0iO3M6MTc6Im1pbmltYWxfc2VydmljZV8zIjtzOjk6IldoYXQgSSBEbyI7czoyMjoibWluaW1hbF9leGxjYXRzX3JlY2VudCI7TjtzOjE2OiJtaW5pbWFsX2ZlYXR1cmVkIjtzOjI6Im9uIjtzOjE3OiJtaW5pbWFsX2R1cGxpY2F0ZSI7czoyOiJvbiI7czoxNjoibWluaW1hbF9mZWF0X2NhdCI7czo4OiJGZWF0dXJlZCI7czoyMDoibWluaW1hbF9mZWF0dXJlZF9udW0iO3M6MToiMyI7czoxNzoibWluaW1hbF91c2VfcGFnZXMiO047czoxODoibWluaW1hbF9mZWF0X3BhZ2VzIjtOO3M6MjE6Im1pbmltYWxfc2xpZGVyX2VmZmVjdCI7czo0OiJmYWRlIjtzOjE5OiJtaW5pbWFsX3NsaWRlcl9hdXRvIjtOO3M6MjQ6Im1pbmltYWxfc2xpZGVyX2F1dG9zcGVlZCI7czo0OiIzMDAwIjtzOjE3OiJtaW5pbWFsX21lbnVwYWdlcyI7TjtzOjI0OiJtaW5pbWFsX2VuYWJsZV9kcm9wZG93bnMiO3M6Mjoib24iO3M6MTc6Im1pbmltYWxfaG9tZV9saW5rIjtzOjI6Im9uIjtzOjE4OiJtaW5pbWFsX3NvcnRfcGFnZXMiO3M6MTA6InBvc3RfdGl0bGUiO3M6MTg6Im1pbmltYWxfb3JkZXJfcGFnZSI7czozOiJhc2MiO3M6MjU6Im1pbmltYWxfdGllcnNfc2hvd25fcGFnZXMiO3M6MToiMyI7czoxNjoibWluaW1hbF9tZW51Y2F0cyI7TjtzOjM1OiJtaW5pbWFsX2VuYWJsZV9kcm9wZG93bnNfY2F0ZWdvcmllcyI7czoyOiJvbiI7czoyNDoibWluaW1hbF9jYXRlZ29yaWVzX2VtcHR5IjtzOjI6Im9uIjtzOjMwOiJtaW5pbWFsX3RpZXJzX3Nob3duX2NhdGVnb3JpZXMiO3M6MToiMyI7czoxNjoibWluaW1hbF9zb3J0X2NhdCI7czo0OiJuYW1lIjtzOjE3OiJtaW5pbWFsX29yZGVyX2NhdCI7czozOiJhc2MiO3M6MjM6Im1pbmltYWxfZGlzYWJsZV90b3B0aWVyIjtOO3M6MTc6Im1pbmltYWxfcG9zdGluZm8yIjthOjQ6e2k6MDtzOjY6ImF1dGhvciI7aToxO3M6NDoiZGF0ZSI7aToyO3M6MTA6ImNhdGVnb3JpZXMiO2k6MztzOjg6ImNvbW1lbnRzIjt9czoxODoibWluaW1hbF90aHVtYm5haWxzIjtzOjI6Im9uIjtzOjI1OiJtaW5pbWFsX3Nob3dfcG9zdGNvbW1lbnRzIjtzOjI6Im9uIjtzOjI5OiJtaW5pbWFsX3RodW1ibmFpbF93aWR0aF9wb3N0cyI7czozOiIxODUiO3M6MzA6Im1pbmltYWxfdGh1bWJuYWlsX2hlaWdodF9wb3N0cyI7czozOiIxODUiO3M6MjM6Im1pbmltYWxfcGFnZV90aHVtYm5haWxzIjtOO3M6MjY6Im1pbmltYWxfc2hvd19wYWdlc2NvbW1lbnRzIjtOO3M6Mjk6Im1pbmltYWxfdGh1bWJuYWlsX3dpZHRoX3BhZ2VzIjtzOjM6IjE4NSI7czozMDoibWluaW1hbF90aHVtYm5haWxfaGVpZ2h0X3BhZ2VzIjtzOjM6IjE4NSI7czoxNzoibWluaW1hbF9wb3N0aW5mbzEiO2E6NDp7aTowO3M6NjoiYXV0aG9yIjtpOjE7czo0OiJkYXRlIjtpOjI7czoxMDoiY2F0ZWdvcmllcyI7aTozO3M6ODoiY29tbWVudHMiO31zOjI0OiJtaW5pbWFsX3RodW1ibmFpbHNfaW5kZXgiO3M6Mjoib24iO3M6Mjk6Im1pbmltYWxfdGh1bWJuYWlsX3dpZHRoX3VzdWFsIjtzOjM6IjE2NCI7czozMDoibWluaW1hbF90aHVtYm5haWxfaGVpZ2h0X3VzdWFsIjtzOjM6IjE2NCI7czoyMToibWluaW1hbF9jdXN0b21fY29sb3JzIjtOO3M6MTc6Im1pbmltYWxfY2hpbGRfY3NzIjtOO3M6MjA6Im1pbmltYWxfY2hpbGRfY3NzdXJsIjtzOjA6IiI7czoyMjoibWluaW1hbF9jb2xvcl9tYWluZm9udCI7czowOiIiO3M6MjI6Im1pbmltYWxfY29sb3JfbWFpbmxpbmsiO3M6MDoiIjtzOjIyOiJtaW5pbWFsX2NvbG9yX3BhZ2VsaW5rIjtzOjA6IiI7czoyOToibWluaW1hbF9jb2xvcl9wYWdlbGlua19hY3RpdmUiO3M6MDoiIjtzOjIyOiJtaW5pbWFsX2NvbG9yX2hlYWRpbmdzIjtzOjA6IiI7czoyNzoibWluaW1hbF9jb2xvcl9zaWRlYmFyX2xpbmtzIjtzOjA6IiI7czoxOToibWluaW1hbF9mb290ZXJfdGV4dCI7czowOiIiO3M6MjU6Im1pbmltYWxfY29sb3JfZm9vdGVybGlua3MiO3M6MDoiIjtzOjIyOiJtaW5pbWFsX3Nlb19ob21lX3RpdGxlIjtOO3M6Mjg6Im1pbmltYWxfc2VvX2hvbWVfZGVzY3JpcHRpb24iO047czoyNToibWluaW1hbF9zZW9faG9tZV9rZXl3b3JkcyI7TjtzOjI2OiJtaW5pbWFsX3Nlb19ob21lX2Nhbm9uaWNhbCI7TjtzOjI2OiJtaW5pbWFsX3Nlb19ob21lX3RpdGxldGV4dCI7czowOiIiO3M6MzI6Im1pbmltYWxfc2VvX2hvbWVfZGVzY3JpcHRpb250ZXh0IjtzOjA6IiI7czoyOToibWluaW1hbF9zZW9faG9tZV9rZXl3b3Jkc3RleHQiO3M6MDoiIjtzOjIxOiJtaW5pbWFsX3Nlb19ob21lX3R5cGUiO3M6Mjc6IkJsb2dOYW1lIHwgQmxvZyBkZXNjcmlwdGlvbiI7czoyNToibWluaW1hbF9zZW9faG9tZV9zZXBhcmF0ZSI7czozOiIgfCAiO3M6MjQ6Im1pbmltYWxfc2VvX3NpbmdsZV90aXRsZSI7TjtzOjMwOiJtaW5pbWFsX3Nlb19zaW5nbGVfZGVzY3JpcHRpb24iO047czoyNzoibWluaW1hbF9zZW9fc2luZ2xlX2tleXdvcmRzIjtOO3M6Mjg6Im1pbmltYWxfc2VvX3NpbmdsZV9jYW5vbmljYWwiO047czozMDoibWluaW1hbF9zZW9fc2luZ2xlX2ZpZWxkX3RpdGxlIjtzOjk6InNlb190aXRsZSI7czozNjoibWluaW1hbF9zZW9fc2luZ2xlX2ZpZWxkX2Rlc2NyaXB0aW9uIjtzOjE1OiJzZW9fZGVzY3JpcHRpb24iO3M6MzM6Im1pbmltYWxfc2VvX3NpbmdsZV9maWVsZF9rZXl3b3JkcyI7czoxMjoic2VvX2tleXdvcmRzIjtzOjIzOiJtaW5pbWFsX3Nlb19zaW5nbGVfdHlwZSI7czoyMToiUG9zdCB0aXRsZSB8IEJsb2dOYW1lIjtzOjI3OiJtaW5pbWFsX3Nlb19zaW5nbGVfc2VwYXJhdGUiO3M6MzoiIHwgIjtzOjI3OiJtaW5pbWFsX3Nlb19pbmRleF9jYW5vbmljYWwiO047czoyOToibWluaW1hbF9zZW9faW5kZXhfZGVzY3JpcHRpb24iO047czoyMjoibWluaW1hbF9zZW9faW5kZXhfdHlwZSI7czoyNDoiQ2F0ZWdvcnkgbmFtZSB8IEJsb2dOYW1lIjtzOjI2OiJtaW5pbWFsX3Nlb19pbmRleF9zZXBhcmF0ZSI7czozOiIgfCAiO3M6MzE6Im1pbmltYWxfaW50ZWdyYXRlX2hlYWRlcl9lbmFibGUiO3M6Mjoib24iO3M6Mjk6Im1pbmltYWxfaW50ZWdyYXRlX2JvZHlfZW5hYmxlIjtzOjI6Im9uIjtzOjM0OiJtaW5pbWFsX2ludGVncmF0ZV9zaW5nbGV0b3BfZW5hYmxlIjtzOjI6Im9uIjtzOjM3OiJtaW5pbWFsX2ludGVncmF0ZV9zaW5nbGVib3R0b21fZW5hYmxlIjtzOjI6Im9uIjtzOjI0OiJtaW5pbWFsX2ludGVncmF0aW9uX2hlYWQiO3M6MDoiIjtzOjI0OiJtaW5pbWFsX2ludGVncmF0aW9uX2JvZHkiO3M6MDoiIjtzOjMwOiJtaW5pbWFsX2ludGVncmF0aW9uX3NpbmdsZV90b3AiO3M6MDoiIjtzOjMzOiJtaW5pbWFsX2ludGVncmF0aW9uX3NpbmdsZV9ib3R0b20iO3M6MDoiIjtzOjE4OiJtaW5pbWFsXzQ2OF9lbmFibGUiO047czoxNzoibWluaW1hbF80NjhfaW1hZ2UiO3M6MDoiIjtzOjE1OiJtaW5pbWFsXzQ2OF91cmwiO3M6MDoiIjtzOjE5OiJtaW5pbWFsXzQ2OF9hZHNlbnNlIjtzOjA6IiI7fQ==';
	
	/*global $options;
	
	foreach ($options as $value) {
		if( isset( $value['id'] ) ) { 
			update_option( $value['id'], $value['std'] );
		}
	}*/
	
	$importedOptions = unserialize(base64_decode($importOptions));
	
	foreach ($importedOptions as $key=>$value) {
		if ($value != '') update_option( $key, $value );
	}
	update_option( $shortname . '_use_pages', 'false' );
} ?>