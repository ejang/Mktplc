<?php

/**
 * @file
 * This file is empty by default because the base theme chain (Alpha & Omega) provides
 * all the basic functionality. However, in case you wish to customize the output that Drupal
 * generates through Alpha & Omega this file is a good place to do so.
 * 
 * Alpha comes with a neat solution for keeping this file as clean as possible while the code
 * for your subtheme grows. Please read the README.txt in the /preprocess and /process subfolders
 * for more information on this topic.
**/ 

// Add some cool text to the search block form
function civiccommons_form_alter(&$form, &$form_state, $form_id) {

  if ($form_id == 'search_block_form') {
    // HTML5 placeholder attribute
    $form['search_block_form']['#attributes']['placeholder'] = t('Enter Keyword');
    $form['actions']['submit']['#value'] = t(''); // Change the text on the submit button
    $form['actions']['submit'] = array('#type' => 'image_button', '#src' => base_path() . path_to_theme() . '/images/search_btn.png');

}
}

/**
 * Preprocessor for page.tpl.php template file.
 */
function civiccommons_preprocess_page(&$vars, $hook) {

  drupal_set_message("All content on the site is dummy content and will be deleted on October 4.", 'status');

}

/* Search */
function civiccommons_preprocess_search_result (&$vars) {
  $vars['nodetype'] = $vars['result']['type'];
}





function civiccommons_preprocess_region(&$vars) {
  if (isset($vars['elements']['#page']['node']) && $vars['elements']['#region'] == 'content') {
    $vars['theme_hook_suggestions'][] = 'region__content__'. $vars['elements']['#page']['node']->type;
  }

}

?>