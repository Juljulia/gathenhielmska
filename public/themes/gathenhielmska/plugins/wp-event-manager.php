<?php

declare(strict_types=1);

// Add your own function to filter the fields
add_filter('event_manager_event_listing_data_fields', 'unset_fields_event_manager');

function unset_fields_event_manager($fields)
{
    foreach ($fields as $key => $value) {
        unset($fields[$key]);
    }

    // And return the modified fields
    return $fields;
}

add_filter('event_manager_event_listing_data_fields', 'add_fields_event_manager');

function add_fields_event_manager($fields)
{
    $fields['_event_title'] = [
        'label' => 'Event Title',
        'type' => 'text',
        'required' => true,
        'placeholder' => 'Event Title',
        'priority' => 1,
    ];

    $fields['_event_venue'] = [
        'label' => 'Venue ',
        'type' => 'text',
        'required' => true,
        'placeholder' => 'Please enter the venue for the event',
        'priority' => 2,
    ];

    $fields['_event_location'] = [
        'label' => 'Location',
        'type' => 'text',
        'required' => true,
        'placeholder' => 'Stigbergstorget 7 414 63 Göteborg',
        'priority' => 3,
    ];

    $fields['_event_banner'] = [
        'label' => 'Image',
        'type' => 'file',
        'required' => true,
        'priority' => 4,
        'ajax' => 1,
        'multiple' => '',
        'allowed_mime_types' => [
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'gif' => 'image/gif',
            'png' => 'image/png',
        ]
    ];

    $fields['_event_description'] = [
        'label' => 'Description',
        'type' => 'wp-editor',
        'required' => true,
        'placeholder' => 'Please write a description about the event',
        'priority' => 5,
    ];

    $fields['_event_start_time'] = [
        'label' => 'Start time',
        'type' => 'time',
        'required' => true,
        'placeholder' => '',
        'priority' => 6,
    ];

    $fields['_event_start_date'] = [
        'label' => 'Start date',
        'type' => 'date',
        'required' => true,
        'placeholder' => '',
        'priority' => 7,
    ];

    $fields['_event_end_time'] = [
        'label' => 'End time',
        'type' => 'time',
        'required' => true,
        'placeholder' => '',
        'priority' => 8,
    ];

    $fields['_event_end_date'] = [
        'label' => 'End date',
        'type' => 'date',
        'required' => true,
        'placeholder' => '',
        'priority' => 9,
    ];

    $fields['_organizer_name'] = [
        'label' => 'Organizer name',
        'type' => 'text',
        'required' => true,
        'placeholder' => 'Enter the name of the organizer',
        'priority' => 10,
    ];

    $fields['_organizer_description'] = [
        'label' => 'Organizer description',
        'type' => 'wp-editor',
        'required' => true,
        'placeholder' => '',
        'priority' => 11,
    ];


    $fields['_organizer_email'] = [
        'label' => 'Organizer email',
        'type' => 'text',
        'required' => true,
        'placeholder' => 'Enter the email to the organizer',
        'priority' => 12,
    ];

    $fields['_organizer_website'] = [
        'label' => 'Organizer website',
        'type' => 'text',
        'required' => true,
        'placeholder' => 'Website URL e.g http://www.yourorganization.com',
        'priority' => 13,
    ];

    return $fields;
}

//Find all submenus or menus

// add_action('admin_init', 'wpse_136058_debug_admin_menu');

// function wpse_136058_debug_admin_menu()
// {

//     echo '<pre>' . print_r($GLOBALS['menu'], TRUE) . '</pre>';
// }

add_action('admin_menu', 'remove_event_manager_subpages', 999);

function remove_event_manager_subpages()
{
    remove_submenu_page("edit.php?post_type=event_listing", "event-manager-form-editor");
    remove_submenu_page("edit.php?post_type=event_listing", "event-manager-addons");
}

//removing templates at single-event-listings
// $template = __DIR__ .'/public/themes/gathenhielmska/page-templates/';
// $template_name = 'event.php';
// $template_path = 'event-filters';

// return apply_filters( 'event_manager_locate_template', $template, $template_name, $template_path );

// $template_name = 'content-single-event_listing';

// add_filter( 'event_manager_locate_template', function( $template, $template_name, $template_path ) {
// 	$custom_template_path = __DIR__ . DIRECTORY_SEPARATOR . $template_path . DIRECTORY_SEPARATOR . $template_name;

// 	if ( file_exists( $custom_template_path ) ) {
// 		return $custom_template_path;
// 	}

// 	return $template;
// }, 10, 3 );
