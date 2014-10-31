<?php

/**
 * Settings for the cornwallcollege2014 theme
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

    // Background colour setting
    $name = 'theme_cornwallcollege2014/backgroundcolor';
    $title = get_string('backgroundcolor','theme_cornwallcollege2014');
    $description = get_string('backgroundcolordesc', 'theme_cornwallcollege2014');
    $default = '#EEE';
    $previewconfig = array('selector'=>'html', 'style'=>'backgroundColor');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $settings->add($setting);

    // Foot note setting
    $name = 'theme_cornwallcollege2014/footnote';
    $title = get_string('footnote','theme_cornwallcollege2014');
    $description = get_string('footnotedesc', 'theme_cornwallcollege2014');
    $setting = new admin_setting_confightmleditor($name, $title, $description, '');
    $settings->add($setting);

    // Custom CSS file
    $name = 'theme_cornwallcollege2014/customcss';
    $title = get_string('customcss','theme_cornwallcollege2014');
    $description = get_string('customcssdesc', 'theme_cornwallcollege2014');
    $setting = new admin_setting_configtextarea($name, $title, $description, '');
    $settings->add($setting);
    
    // Show user profile picture
    $name = 'theme_cornwallcollege2014/showuserpicture';
    $title = get_string('showuserpicture','theme_cornwallcollege2014');
    $description = get_string('showuserpicturedesc', 'theme_cornwallcollege2014');
    $default = 0;
    $choices = array(1=>'Yes', 0=>'No');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $settings->add($setting);

    // Editing Mode heading
    $settings->add(new admin_setting_heading('themecornwallcollege2014editingsettings', get_string('editingsettings', 'theme_cornwallcollege2014'), get_string('editingsettingsdesc', 'theme_cornwallcollege2014')));

    // Enable mod chooser "tiles"
    $name = 'theme_cornwallcollege2014/usemodchoosertiles';
    $title = get_string('usemodchoosertiles','theme_cornwallcollege2014');
    $description = get_string('usemodchoosertilesdesc', 'theme_cornwallcollege2014');
    $default = 0;
    $choices = array(0=>'No', 1=>'Yes');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $settings->add($setting);

    // Enable edit buttons (replace rows of icons)
    $name = 'theme_cornwallcollege2014/useeditbuttons';
    $title = get_string('useeditbuttons','theme_cornwallcollege2014');
    $description = get_string('useeditbuttonsdesc', 'theme_cornwallcollege2014');
    $default = 1;
    $choices = array(1=>'Yes', 0=>'No');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $settings->add($setting);

    // Enable "persistent editing mode" (no need to turn on/off edit mode)
    $name = 'theme_cornwallcollege2014/persistentedit';
    $title = get_string('persistentedit','theme_cornwallcollege2014');
    $description = get_string('persistenteditdesc', 'theme_cornwallcollege2014');
    $default = 0;
    $choices = array(0=>'No', 1=>'Yes');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $settings->add($setting);

    // Awesomebar / Navigation heading
    $settings->add(new admin_setting_heading('themecornwallcollege2014awesombarsettings', get_string('awesomebarsettings', 'theme_cornwallcollege2014'), get_string('awesomebarsettingsdesc', 'theme_cornwallcollege2014')));

    // Hide Settings block
    $name = 'theme_cornwallcollege2014/hidesettingsblock';
    $title = get_string('hidesettingsblock','theme_cornwallcollege2014');
    $description = get_string('hidesettingsblockdesc', 'theme_cornwallcollege2014');
    $default = 1;
    $choices = array(1=>'Yes', 0=>'No');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $settings->add($setting);

    // Hide Navigation block
    $name = 'theme_cornwallcollege2014/hidenavigationblock';
    $title = get_string('hidenavigationblock','theme_cornwallcollege2014');
    $description = get_string('hidenavigationblockdesc', 'theme_cornwallcollege2014');
    $default = 0;
    $choices = array(1=>'Yes', 0=>'No');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $settings->add($setting);

    // Add custom menu to Awesomebar
    $name = 'theme_cornwallcollege2014/custommenuinawesomebar';
    $title = get_string('custommenuinawesomebar','theme_cornwallcollege2014');
    $description = get_string('custommenuinawesomebardesc', 'theme_cornwallcollege2014');
    $default = 0;
    $choices = array(1=>'Yes', 0=>'No');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $settings->add($setting);

    // Place custom menu after Awesomebar
    $name = 'theme_cornwallcollege2014/custommenuafterawesomebar';
    $title = get_string('custommenuafterawesomebar','theme_cornwallcollege2014');
    $description = get_string('custommenuafterawesomebardesc', 'theme_cornwallcollege2014');
    $default = 0;
    $choices = array(0=>'No', 1=>'Yes');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $settings->add($setting);

    // Hide courses menu from non-logged-in users
    $name = 'theme_cornwallcollege2014/coursesloggedinonly';
    $title = get_string('coursesloggedinonly','theme_cornwallcollege2014');
    $description = get_string('coursesloggedinonlydesc', 'theme_cornwallcollege2014');
    $default = 0;
    $choices = array(0=>'No', 1=>'Yes');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $settings->add($setting);

    // Don't actually show courses under "Courses" menu item
    $name = 'theme_cornwallcollege2014/coursesleafonly';
    $title = get_string('coursesleafonly','theme_cornwallcollege2014');
    $description = get_string('coursesleafonlydesc', 'theme_cornwallcollege2014');
    $default = 0;
    $choices = array(0=>'Yes', 1=>'No'); // This seems backwards, but makes it easier for users to understand as it eliminates the double-negative.
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $settings->add($setting);

    // Expand to activities at cost of performance
    $name = 'theme_cornwallcollege2014/expandtoactivities';
    $title = get_string('expandtoactivities','theme_cornwallcollege2014');
    $description = get_string('expandtoactivitiesdesc', 'theme_cornwallcollege2014');
    $default = 0;
    $choices = array(0=>'No', 1=>'Yes');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $settings->add($setting);
   

}