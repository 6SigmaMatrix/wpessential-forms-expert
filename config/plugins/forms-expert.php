<?php

use WPEssential\Plugins\Panel\Fields\Select;
use WPEssential\Plugins\Panel\Fields\Wysiwyg;

$section_init = WPEssential\Plugins\Panel\Section::make( __( 'Subscribers', 'wpessential' ), 'wpessential_subscribers' );
$section_init->description( __( 'The is the WPEssential Subscriber plugin settings. There has many options to customize the plugin working.', 'wpessential' ) );
$section_init->icon_type( 'icon' );
$section_init->icon( 'location' );
$section_init->note_desc( __( 'The is the WPEssential Subscriber plugin settings. There has many options to customize the plugin working.', 'wpessential' ) );
$section_init->note_icon( 'WarningFilled' );
$section_init->note_title( 'Subscribers' );
$section_init->priority( 11 );
$section_init->controls( [
	Select::make( __( 'Notification Events', 'wpessential-subscribers' ) )
		  ->subtitle( __( 'Select the post events to send the notifications to all subscribers', 'wpessential-subscribers' ) )
		  ->placeholder( __( 'Select the event', 'wpessential-subscribers' ) )
		  ->options( [
			  'any'     => __( 'Any', 'wpessential-subscribers' ),
			  'publish' => __( 'Publish', 'wpessential-subscribers' ),
			  'draft'   => __( 'Draft', 'wpessential-subscribers' ),
			  'pending' => __( 'Pending for Review', 'wpessential-subscribers' ),
		  ] )
		  ->multiple( true )
		  ->toArray(),
	Select::make( __( 'Notification For', 'wpessential-subscribers' ) )
		  ->subtitle( __( 'Select the post types to send alert on post events.', 'wpessential-subscribers' ) )
		  ->placeholder( __( 'Select the post types', 'wpessential' ) )
		  ->data( 'post_types' )
		  ->multiple( true )
		  ->default( [ 'post' ] )
		  ->toArray(),
	Wysiwyg::make( __( 'Newsletter Thank you', 'wpessential-subscribers' ) )
		   ->subtitle( __( 'Template the subscriber thank you email.', 'wpessential-subscribers' ) )
		   ->description( __( 'Site Name : {{site_name}}, Site URL: {{site_url}}, Site Logo: {{site_logo}}, Sender Email: {{sender_email}}, Sender Name: {{sender_name}}', 'wpessential-subscribers' ) )
		   ->toArray(),
] );

return $section_init->toArray();
