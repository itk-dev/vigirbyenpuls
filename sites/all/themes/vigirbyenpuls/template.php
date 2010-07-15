<?php

// $Id: template.php,v 1.1.2.2 2009/03/29 15:46:36 dvessel Exp $

function vigirbyenpuls_preprocess_page(& $variables, $hook) {

	//
	// For easy printing of variables.
	//
	$variables['logo_img']= $variables['logo'] ? theme('image', substr($variables['logo'], strlen(base_path())), t('Home'), t('Home')) : '';
	$variables['linked_logo_img']= $variables['logo_img'] ? l($variables['logo_img'], '<front>', array ('attributes' => array ('id' => 'logo', 'rel' => 'home', 'title' => t('Home')), 'html' => TRUE)) : '';
	$variables['linked_site_name']= $variables['site_name'] ? l($variables['site_name'], '<front>', array ('rel' => 'home', 'title' => t('Home'))) : '';
	$variables['main_menu_links']= theme('links', $variables['primary_links'], array (
		'class' => 'links main-menu'
	));
	$variables['secondary_menu_links']= theme('links', $variables['secondary_links'], array ('class' => 'links secondary-menu'));

	// Load conditional stylesheets for IE 6
	$variables['iestyles']  = '<!--[if IE 6]>';
	$variables['iestyles'] .= '<link type="text/css" rel="stylesheet" media="all" href="/' . drupal_get_path(theme, vigirbyenpuls) . '/styles/ie/msie6.css" />';
	$variables['iestyles'] .= '<![endif]-->';


  // Generate header_graphic variable for printing
  	if (module_exists('path')) {

		$node = $variables['node'];
		if (isset ($node->field_header[0])) 
        { // Node field header exists
            if ($node->field_header[0][nid] != null)
            { // And is liked to a valid node
				$node= node_load($node->field_header[0][nid]);
				$variables[header_graphic]= '<img id="header-graphic" src="/' . $node->field_graphic[0][filepath] . '" />';
			}
		}
  }

  //
  // Generate additional template suggestions for page.tpl.php
  //
  
	// Confirm module path enabled	
	if (module_exists('path')) {

		// Hent url alias og isoler sidste del af urlen
		$url_alias = drupal_get_path_alias($_GET['q']);
		$alias_parts = explode('/', $url_alias);
		$last = array_reverse($alias_parts);
		$last_part = $last[0]; 

		// Tjek, at der ikke er tale om en edit-side
		if ($last_part != "edit") {

			// Check if single node is being displayed
			if (arg(0) == "node" && is_numeric(arg(1))) {

				// Check if node is assigned taxonomy term and retrive term if so
				if (isset ($variables['node']->taxonomy)) {
					$target_tax = 0;
					$node_tax = $variables['node']->taxonomy;

					// retrieve name of category
					$tid = array_keys($node_tax);
					$name = $node_tax[$tid[$target_tax]]->name;

					// Clean output
					$clean_name = check_plain($name);
					$dash_name = str_replace(" ", "-", $clean_name);
					$lc_name = strtolower($dash_name);

					// add taxonomy term to body class
					$variables['body_classes'] .= $variables['body_classes'] . " tax-$lc_name";

				} // end of taxonomy check
			} // end of node/id check

			// Create array for template suggestions
			$templates = array ();
			$template_name = "page";

			// Add url-segments to template suggestions
			foreach ($alias_parts as $part) {
				if ($part != "page") {
					$template_name = $template_name . '-' . $part;
					$templates[] = $template_name;
				}
			} // end of foreach loop

			$variables['template_files'] = $templates;
		

		} // end of edit check
	} // end of if module exists
}