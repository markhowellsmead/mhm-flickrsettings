<?php
/*
Plugin Name: Flickr settings plugin
Plugin URI: 
Description: Provides backend settings fields to store Flickr configuration information.
Author: Mark Howells-Mead
Version: 1.0
Author URI: http://permanenttourist.ch/
*/

class MHMFlickrSettings {
 
	public $key     = '';
	public $version = '1.0';
	
	public function __construct(){
		$this->key = basename(__DIR__);
		add_action( 'admin_init', array($this, 'init_flickrsettings') );
	}
 
	function init_flickrsettings() {

		add_settings_section('flickr_settings', 'Flickr configuration', array($this, 'settings_description'), 'media');
		
		add_settings_field('flickr_key', 'Key', array($this, 'field_key'), 'media', 'flickr_settings');
		add_settings_field('flickr_secret', 'Secret', array($this, 'field_secret'), 'media', 'flickr_settings');
		add_settings_field('flickr_userid', 'User ID', array($this, 'field_userid'), 'media', 'flickr_settings');

		register_setting( 'media', 'flickr_key' );
		register_setting( 'media', 'flickr_secret' );
		register_setting( 'media', 'flickr_userid' );

	}
	
	function settings_description() {
		echo '';
	}

	function field_key() {
		echo '<input name="flickr_key" id="flickr_key" type="text" value="' . get_option( 'flickr_key' ) . '" class="regular-text ltr" />';
	}
	function field_secret() {
		echo '<input name="flickr_secret" id="flickr_secret" type="text" value="' . get_option( 'flickr_secret' ) . '" class="regular-text ltr" />';
	}
	function field_userid() {
		echo '<input name="flickr_userid" id="flickr_userid" type="text" value="' . get_option( 'flickr_userid' ) . '" class="regular-text ltr" />';
	}

}
 
new MHMFlickrSettings();