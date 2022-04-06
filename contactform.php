<?php
/*
   Plugin Name: ContactForm to DB
   Plugin URI: https://#
   description: Вивід списку із БД
   Version: 1.0
   Author: Admin
   Author URI: https://#
*/

function contactform_table()
{
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    $tablename = $wpdb->prefix . "contactform";
    $sql = "CREATE TABLE $tablename (
	 	id int(11) NOT NULL AUTO_INCREMENT,
	 	name varchar(255) NOT NULL,
	 	email varchar(255) NOT NULL,
	 	phone varchar(255) NOT NULL,
	 	dates varchar(255) NOT NULL,
  		PRIMARY KEY (id)
  	) $charset_collate;";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

register_activation_hook(__FILE__, 'contactform_table');

function contactform_menu()
{
    add_menu_page("ContactForm to DB", "ContactForm to DB", "manage_options",
        "contactform", "displayList", "dashicons-email-alt");
    add_submenu_page("contactform", "All requests", "All requests", "manage_options",
        "allentries", "displayList");
	add_submenu_page("contactform", "Add request", "Add request",
        "manage_options", "addnewentry", "addEntry");
    remove_submenu_page('contactform','contactform');
}

add_action("admin_menu", "contactform_menu");

function displayList()
{
    include "displaylist.php";
}

function addEntry()
{
    include "addentry.php";
}