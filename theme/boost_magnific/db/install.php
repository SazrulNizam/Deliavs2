<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Theme custom Installation.
 *
 * @package     theme_boost_magnific
 * @copyright   2024 Eduardo kraus (http://eduardokraus.com)
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Theme_boost_magnific install function.
 *
 * @return void
 * @throws Exception
 */
function xmldb_theme_boost_magnific_install() {
    global $DB, $SITE;

    if (method_exists("core_plugin_manager", "reset_caches")) {
        core_plugin_manager::reset_caches();
    }

    set_config("frontpage_avaliablecourses_text", "", "theme_boost_magnific");
    set_config("frontpage_avaliablecourses_instructor", 1, "theme_boost_magnific");

    set_config("top_scroll_background_color", "#5C5D5F", "theme_boost_magnific");
    set_config("top_scroll_text_color", "#FFFFFF", "theme_boost_magnific");

    set_config("slideshow_numslides", 0, "theme_boost_magnific");
    for ($i = 1; $i <= 9; $i++) {
        set_config("slideshow_info_{$i}", "", "theme_boost_magnific");
        set_config("slideshow_image_{$i}", "", "theme_boost_magnific");
        set_config("slideshow_url_{$i}", "", "theme_boost_magnific");
        set_config("slideshow_text_{$i}", "", "theme_boost_magnific");
    }

    set_config("frontpage_about_enable", 0, "theme_boost_magnific");
    set_config("frontpage_about_logo", "", "theme_boost_magnific");
    set_config("frontpage_about_title", get_string("frontpage_about_title_default", "theme_boost_magnific"));
    set_config("frontpage_about_description", "", "theme_boost_magnific");
    for ($i = 1; $i <= 4; $i++) {
        set_config("frontpage_about_text_{$i}", get_string("frontpage_about_text_{$i}_defalt", "theme_boost_magnific"));
        if ($i == 1) {
            $count = $DB->get_field_select("course", "COUNT(*)", "id != {$SITE->id}");
            set_config("frontpage_about_number_{$i}", $count, "theme_boost_magnific");
        } else if ($i == 2) {
            $roleid = $DB->get_field_select("role", "id", "shortname = 'teacher'");
            $count = $DB->get_field_select("role_assignments", "COUNT(DISTINCT userid)", "roleid = {$roleid}");
            set_config("frontpage_about_number_{$i}", $count, "theme_boost_magnific");
        } else if ($i == 3) {
            $roleid = $DB->get_field_select("role", "id", "shortname = 'student'");
            $count = $DB->get_field_select("role_assignments", "COUNT(DISTINCT userid)", "roleid = {$roleid}");
            set_config("frontpage_about_number_{$i}", $count, "theme_boost_magnific");
        } else if ($i == 4) {
            $count = $DB->get_field_select("course_modules", "COUNT(*)", "visible = 1 AND course != {$SITE->id}");
            set_config("frontpage_about_number_{$i}", $count, "theme_boost_magnific");
        }
    }

    set_config("footer_type", 0, "theme_boost_magnific");
    set_config("footer_description", $SITE->fullname, "theme_boost_magnific");
    set_config("footer_links_title", get_string("footer_links_title_default", "theme_boost_magnific"));
    set_config("footer_links", "", "theme_boost_magnific");
    set_config("footer_social_title", get_string("footer_social_title_default", "theme_boost_magnific"));
    set_config("social_youtube", "", "theme_boost_magnific");
    set_config("social_linkedin", "", "theme_boost_magnific");
    set_config("social_facebook", "", "theme_boost_magnific");
    set_config("social_twitter", "", "theme_boost_magnific");
    set_config("social_instagram", "", "theme_boost_magnific");
    set_config("contact_footer_title", get_string("footer_contact_title_default", "theme_boost_magnific"));
    set_config("contact_address", "", "theme_boost_magnific");
    set_config("contact_phone", "", "theme_boost_magnific");
    set_config("contact_email", "", "theme_boost_magnific");

    set_config("login_theme", "theme_image_login", "theme_boost_magnific");
    set_config("login_backgroundfoto", "", "theme_boost_magnific");
    set_config("login_backgroundcolor", "", "theme_boost_magnific");

    set_config("login_login_description", "", "theme_boost_magnific");
    set_config("login_forgot_description", "", "theme_boost_magnific");
    set_config("login_signup_description", "", "theme_boost_magnific");

    set_config("home_type", 0, "theme_boost_magnific");
    set_config("frontpage_mycourses_text", "", "theme_boost_magnific");
    set_config("frontpage_mycourses_instructor", "", "theme_boost_magnific");
    set_config("logo_color", "", "theme_boost_magnific");
    set_config("logo_write", "", "theme_boost_magnific");
    set_config("fontfamily", "Roboto", "theme_boost_magnific");
    set_config("fontfamily_title", "Montserrat", "theme_boost_magnific");
    set_config("fontfamily_menus", "Roboto", "theme_boost_magnific");
    set_config("fontfamily_sitename", "Oswald", "theme_degrade");
    set_config("customcss", "", "theme_boost_magnific");
    set_config("footer_show_copywriter", 1, "theme_boost_magnific");

    $fonts = "<style>\n@import url('https://fonts.googleapis.com/css2?"
        . "family=Acme" .
        "&family=Almendra:ital,wght@0,400;0,700;1,400;1,700" .
        "&family=Bad+Script" .
        "&family=Dancing+Script:wght@400..700" .
        "&family=Great+Vibes" .
        "&family=Marck+Script" .
        "&family=Nanum+Pen+Script" .
        "&family=Orbitron:wght@400..900" .
        "&family=Ubuntu+Condensed" .
        "&family=Ubuntu+Mono:ital,wght@0,400;0,700;1,400;1,700" .
        "&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700" .
        "&display=swap');\n</style>";
    set_config("pagefonts", $fonts, "theme_boost_magnific");

    $fonts = "<style>\n@import url('https://fonts.googleapis.com/css2?" .
        "&family=Briem+Hand:wght@100..900" .
        "&family=Epilogue:ital,wght@0,100..900;1,100..900" .
        "&family=Inter+Tight:ital,wght@0,100..900;1,100..900" .
        "&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900" .
        "&family=Manrope:wght@200..800" .
        "&family=Montserrat:ital,wght@0,100..900;1,100..900" .
        "&family=Open+Sans:ital,wght@0,300..800;1,300..800" .
        "&family=Oswald:wght@200..700" .
        "&family=Oxygen:wght@300;400;700" .
        "&family=Poetsen+One" .
        "&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900" .
        "&family=Raleway:ital,wght@0,100..900;1,100..900" .
        "&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900" .
        "&display=swap');\n</style>";
    set_config("sitefonts", $fonts, "theme_boost_magnific");

    // Icons.
    boost_magnific_install_settings_icons();
}

/**
 * boost_magnific_install_settings_icons function
 *
 * @throws dml_exception
 */
function boost_magnific_install_settings_icons() {
    global $CFG;

    for ($i = 1; $i <= 20; $i++) {
        set_config("settings_icons_name_{$i}", "", "theme_boost_magnific");
        set_config("settings_icons_image_{$i}", "", "theme_boost_magnific");
    }

    $files = ["audio_file", "video_file", "book", "game", "money", "slide", "support", "download"];
    set_config("settings_icons_num", count($files), "theme_boost_magnific");

    $fs = get_file_storage();
    $filerecord = new stdClass();
    $filerecord->component = "theme_boost_magnific";
    $filerecord->contextid = context_system::instance()->id;
    $filerecord->userid = get_admin()->id;
    $filerecord->filepath = "/";
    $filerecord->itemid = 0;

    $i = 1;
    foreach ($files as $file) {
        $filerecord->filearea = "settings_icons_image_{$i}";
        $filerecord->filename = "{$file}.svg";
        try {
            $fs->create_file_from_pathname($filerecord, "{$CFG->dirroot}/theme/boost_magnific/pix/material/{$file}.svg");

            $default = get_string("settings_icons_default_{$file}", "theme_boost_magnific");
            set_config("settings_icons_name_{$i}", $default, "theme_boost_magnific");
        } catch (Exception $e) {
            echo $e->getMessage() . "<br>";
        }

        $i++;
    }
}
