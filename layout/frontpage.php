<?php
if (!empty($CFG->themedir) and file_exists("$CFG->themedir/cornwallcollege2014")) {
    require_once ($CFG->themedir."/cornwallcollege2014/lib.php");
} else {
    require_once ($CFG->dirroot."/theme/cornwallcollege2014/lib.php");
}

$themedirectory = $CFG->dirroot."/theme/";

// $PAGE->blocks->region_has_content('region_name') doesn't work as we do some sneaky stuff 
// to hide nav and/or settings blocks if requested
$blocks_side_pre = trim($OUTPUT->blocks_for_region('side-pre'));
$hassidepre = strlen($blocks_side_pre);
$blocks_side_post = trim($OUTPUT->blocks_for_region('side-post'));
$hassidepost = strlen($blocks_side_post);

if (empty($PAGE->layout_options['noawesomebar'])) {
    $topsettings = $this->page->get_renderer('theme_cornwallcollege2014','topsettings');
    cornwallcollege2014_initialise_awesomebar($PAGE);
    $awesome_nav = $topsettings->navigation_tree($this->page->navigation);
    $awesome_settings = $topsettings->settings_tree($this->page->settingsnav);
}

$custommenu = $OUTPUT->custom_menu();
$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));

$bodyclasses = array();

if(!empty($PAGE->theme->settings->useeditbuttons) && $PAGE->user_allowed_editing()) {
    if (cornwallcollege2014_initialise_editbuttons($PAGE)) {
        $bodyclasses[] = 'cornwallcollege2014_with_edit_buttons';
    }
}

if ($hassidepre && !$hassidepost) {
    $bodyclasses[] = 'side-pre-only';
} else if ($hassidepost && !$hassidepre) {
    $bodyclasses[] = 'side-post-only';
} else if (!$hassidepost && !$hassidepre) {
    $bodyclasses[] = 'content-only';
}

if(!empty($PAGE->theme->settings->persistentedit)) {
    if(property_exists($USER, 'editing') && $USER->editing) {
        $OUTPUT->set_really_editing(true);
    }
    if ($PAGE->user_allowed_editing()) {
        $USER->editing = 1;
        $bodyclasses[] = 'cornwallcollege2014_persistent_edit';
    }
}

if(!empty($PAGE->theme->settings->usemodchoosertiles)) {
    $bodyclasses[] = 'cornwallcollege2014_modchooser_tiles';
}

if (!empty($PAGE->theme->settings->footnote)) {
    $footnote = $PAGE->theme->settings->footnote;
} else {
    $footnote = '<!-- There was no custom footnote set -->';
}

// Tell IE to use the latest engine (no Compatibility mode), if the user is using IE.
$ie = false;
if (class_exists('core_useragent')) {
    if (core_useragent::check_ie_version()) {
        $ie = true;
    }
} else if (check_browser_version("MSIE", "0")) {
    $ie = true;
}
if ($ie) {
    header('X-UA-Compatible: IE=edge');
}

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes() ?>>
<head>
    <title><?php echo $PAGE->title ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->pix_url('favicon', 'theme')?>" />
    <meta name="description" content="<?php echo strip_tags(format_text($SITE->summary, FORMAT_HTML)) ?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
    <script type="text/javascript">
    YUI().use('node', function(Y) {
        window.thisisy = Y;
    	Y.one(window).on('scroll', function(e) {
    	    var node = Y.one('#back-to-top');

    	    if (Y.one('window').get('docScrollY') > Y.one('#page-content-wrapper').getY()) {
    		    node.setStyle('display', 'block');
    	    } else {
    		    node.setStyle('display', 'none');
    	    }
    	});

    });
    </script>
</head>
<body id="<?php p($PAGE->bodyid) ?>" class="<?php p($PAGE->bodyclasses.' '.join(' ', $bodyclasses)) ?>">
<?php echo $OUTPUT->standard_top_of_body_html();
if (empty($PAGE->layout_options['noawesomebar'])) {  ?>
    <div id="awesomebar" class="cornwallcollege2014-awesome-bar">
        <?php
                echo $awesome_nav;
                if ($hascustommenu && !empty($PAGE->theme->settings->custommenuinawesomebar) && empty($PAGE->theme->settings->custommenuafterawesomebar)) {
                    echo $custommenu;
                }
                echo $awesome_settings;
                if ($hascustommenu && !empty($PAGE->theme->settings->custommenuinawesomebar) && !empty($PAGE->theme->settings->custommenuafterawesomebar)) {
                    echo $custommenu;
                }
                echo $topsettings->settings_search_box();
        ?>
    </div>
<?php } ?>

<div id="page">

<!-- START OF HEADER -->
   
    <div id="page-header" class="clearfix">
		<div id="page-header-wrapper">
	        <h1 class="headermain"><img src="<?php echo $OUTPUT->pix_url('CCGLogo', 'theme'); ?>" /><div class="title"><?php echo $PAGE->heading ?></div></h1>
    	    <div class="headermenu">
        		<?php
        		    if (!empty($PAGE->theme->settings->showuserpicture)) {
        				if (isloggedin())
        				{
        					echo ''.$OUTPUT->user_picture($USER, array('size'=>55)).'';
        				}
        				else {
        					?>
						<img class="userpicture" src="<?php echo $OUTPUT->pix_url('image', 'theme'); ?>" />
						<?php
        				}
        			}
        		echo $OUTPUT->login_info();
    	        echo $OUTPUT->lang_menu();
	        	echo $PAGE->headingmenu;
		        ?>	    
	    	</div>
	    </div>
    </div>
    
    <?php if ($hascustommenu && empty($PAGE->theme->settings->custommenuinawesomebar)) { ?>
      <div id="custommenu" class="cornwallcollege2014-awesome-bar"><?php echo $custommenu; ?></div>
 	<?php } ?>
  	  
<!-- END OF HEADER -->

<!-- START OF CONTENT -->

<div id="page-content-wrapper" class="clearfix">
    <div id="page-content">
        <div id="region-main-box">
            <div id="region-post-box">
            
                <div id="region-main-wrap">
                    <div id="region-main">
                        <div class="region-content">
                            <?php echo method_exists($OUTPUT, "main_content")?$OUTPUT->main_content():core_renderer::MAIN_CONTENT_TOKEN ?>
                        </div>
                    </div>
                </div>
                
                <?php if ($hassidepre) { ?>
                <div id="region-pre" class="block-region">
                    <div class="region-content">
                        <?php echo $blocks_side_pre ?>
                    </div>
                </div>
                <?php } ?>
                
                <?php if ($hassidepost) { ?>
                <div id="region-post" class="block-region">
                    <div class="region-content">
                        <?php echo $blocks_side_post ?>
                    </div>
                </div>
                <?php } ?>
                
            </div>
        </div>
    </div>
</div>

<!-- END OF CONTENT -->

<!-- START OF FOOTER -->

    <div id="page-footer">
		<div class="footnote"><?php echo $footnote; ?></div>
        <p class="helplink">
        <?php echo page_doc_link(get_string('moodledocslink')) ?>
        </p>

        <?php
        echo $OUTPUT->login_info();
        echo $OUTPUT->home_link();
        echo $OUTPUT->standard_footer_html();
        ?>
        <div class="footer"><?php include ($themedirectory."cornwallcollege2014/layout/footer.php") ?></div>
    </div>
    


<!-- END OF FOOTER -->

</div>
<?php echo $OUTPUT->standard_end_of_body_html() ?>
<div id="back-to-top"> 
    <a class="arrow" href="#">▲</a> 
    <a class="text" href="#">Back to Top</a> 
</div>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-39812445-3', 'cornwall.ac.uk');
  ga('send', 'pageview');

</script>
</body>
</html>
