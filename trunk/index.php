<?php
/*
Plugin Name: Flickr settings plugin
Plugin URI: https://wordpress.org/plugins/mhm-flickrsettings/
Description: Provides backend settings fields to store Flickr configuration information.
Author: Mark Howells-Mead
Version: 1.2.0
Author URI: https://permanenttourist.ch/
*/

namespace MHM\FlickrSettings;

class Plugin {

	public $key     = '';
	public $version = '1.2.0';

	public function __construct(){
		$this->key = basename(__DIR__);
		add_action( 'admin_init', array($this, 'initSettings') );

		$this->handleOlderValues();

	}
	
	public function handleOlderValues(){
    	/**
    	 * Versions of the plugin before v1.2.0 stored option values in individual database entries. 
    	 * Make sure that those values can still be found, depsite the change to array-based storage.
    	 */
		add_filter( 'option_flickr_key', function ( $value ) {
            $settings = get_option( 'mhm_flickr_settings');
            if ( isset( $settings['flickr_key'] ) ) {
                $value = $settings['flickr_key'];
            }
            return $value;
        });

		add_filter( 'option_flickr_secret', function ( $value ) {
            $settings = get_option( 'mhm_flickr_settings');
            if ( isset( $settings['flickr_secret'] ) ) {
                $value = $settings['flickr_secret'];
            }
            return $value;
        });

		add_filter( 'option_flickr_userid', function ( $value ) {
            $settings = get_option( 'mhm_flickr_settings');
            if ( isset( $settings['flickr_userid'] ) ) {
                $value = $settings['flickr_userid'];
            }
            return $value;
        });
    	
	}

	public function initSettings() {

		add_settings_section('settings', 'Flickr configuration', array($this, 'settingsDescription'), 'media');

		add_settings_field('flickr_key', 'Key', array($this, 'fieldFlickrKey'), 'media', 'settings');
		add_settings_field('flickr_secret', 'Secret', array($this, 'fieldFlickrSecret'), 'media', 'settings');
		add_settings_field('flickr_userid', 'User ID', array($this, 'fieldFlickrUserID'), 'media', 'settings');
		
		register_setting( 'media', 'mhm_flickr_settings');

	}

    public function settingsDescription()
    {
        // Nothing to see here.
    }

    public function fieldFlickrKey()
    {
        echo '<input name="mhm_flickr_settings[flickr_key]" id="flickr_key" type="text" value="'.esc_attr(get_option('flickr_key')).'" class="regular-text ltr" />';
    }

    public function fieldFlickrSecret()
    {
        echo '<input name="mhm_flickr_settings[flickr_secret]" id="flickr_secret" type="text" value="'.esc_attr(get_option('flickr_secret')).'" class="regular-text ltr" />';
    }

    public function fieldFlickrUserID()
    {
        echo '<input name="mhm_flickr_settings[flickr_userid]" id="flickr_userid" type="text" value="'.esc_attr(get_option('flickr_userid')).'" class="regular-text ltr" />';
    }

}

new Plugin();
