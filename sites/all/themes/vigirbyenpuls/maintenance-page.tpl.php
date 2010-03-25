<?php
// $Id: maintenance-page.tpl.php,v 1.2.2.1 2009/04/30 00:13:31 goba Exp $

/**
 * @file maintenance-page.tpl.php
 *
 * Theme implementation to display a single Drupal page while off-line.
 *
 * All the available variables are mirrored in page.tpl.php. Some may be left
 * blank but they are provided for consistency.
 *
 *
 * @see template_preprocess()
 * @see template_preprocess_maintenance_page()
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">

<head>
  <title><?php print $head_title; ?></title>
  <?php print $head; ?>
  <?php print $styles; ?>
   <!--[if IE 6]><link type="text/css" rel="stylesheet" media="all" href="/sites/all/themes/vigirbyenpuls/styles/ie/msie6.css" /><![endif]-->
  <?php print $scripts; ?>
</head>

<body class="<?php print $body_classes; if (!empty($admin)) print ' admin-bar'; ?>">
  <?php if (!empty($admin)) print $admin; ?>
  <div id="outerwrapper">
  <div id="wrapper">
  <div id="header">

    <a href="<?php print $base_path; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
    <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
		</a>
      
    <?php if ($main_menu_links): ?>
        <?php print $main_menu_links; ?>
    <?php endif; ?>
    
    <?php if ($secondary_menu_links): ?>
        <?php print $secondary_menu_links; ?>
    <?php endif; ?>

    <?php if ($search_box): ?>
      <div id="search-box" ><?php print $search_box; ?></div>
    <?php endif; ?>

   </div> <!-- end #header -->

<?php if ($header || $header_graphic): ?>
  <div id="header-region" class="region">
    <?php print $header_graphic; ?>
    <?php print $header; ?>
  </div>
<?php endif; ?>
   
  <div id="content" >
	   <?php if ($left): ?>
    	<div id="sidebar-left" class="region">
      	<?php print $left; ?>
    	</div>
  	<?php endif; ?>

    <div id="main-content">
      <?php if ($content_top): ?>
 				<div id="content-top-region" class="region">
    			<?php print $content_top; ?>
  			</div>
			<?php endif; ?>
      
			
      
      <?php if ($tabs): ?>
        <div class="tabs"><?php print $tabs; ?></div>
      <?php endif; ?>
      
      <?php print $messages; ?>
      <?php print $help; ?>
      
    	<?php if ($title): ?>
        <h1 class="title" id="page-title"><?php print $title; ?></h1>
      <?php endif; ?>
      
			<?php print $content; ?>
    
    	<?php if ($content_bottom): ?>
 				<div id="content-bottom-region" class="region">
    			<?php print $content_bottom; ?>
  			</div>
			<?php endif; ?>
    	
      <?php print $feed_icons; ?>
    </div> <!-- end #main-content -->
    
		<?php if ($right): ?>
      <div id="sidebar-right" class="region">
        <?php print $right; ?>
      </div>
    <?php endif; ?>
    
		</div> <!-- end #content -->
    
    <?php if ($bottom_left || $bottom_right): ?>
      <div id="bottom-regions">
      
        <?php if ($bottom_left): ?>
          <div id="bottom-left" class="region">
            <?php print $bottom_left; ?>
          </div>
        <?php endif; ?>
          
        <?php if ($bottom_right): ?>
          <div id="bottom-right" class="region">
            <?php print $bottom_right; ?>
          </div>
        <?php endif; ?>
      
      </div>
		<?php endif; ?>

  
  </div>
  <div id="footer" >
    <?php if ($footer || $footer_message): ?>
      <div id="footer-region" class="region">
        <?php print $footer_message; ?>
				<?php print $footer; ?>
      </div>
    <?php endif; ?>
  </div>
</div>
  <?php print $closure; ?>
</body>

</html>
