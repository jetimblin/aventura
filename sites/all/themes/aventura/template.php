<?php

function aventura_preprocess_html(&$variables) {
	drupal_add_js(drupal_get_path('theme', 'aventura') .'/js/aventura.js');
  drupal_add_js(drupal_get_path('theme', 'aventura') .'/js/jcaption.js');
  drupal_add_js(drupal_get_path('theme', 'aventura') .'/js/responsive-tables.js');
  drupal_add_css(drupal_get_path('theme', 'aventura') .'/css/responsive-tables.css');
}

function aventura_preprocess_article(&$vars) {
  if (variable_get('node_submitted_' . $vars['node']->type, TRUE)) {
    $date = format_date($vars['node']->created, 'M jS, Y');
    $vars['submitted'] = t('Posted by !username on !datetime', array('!username' => $vars['name'], '!datetime' => $date));
  }
}

function aventura_breadcrumb($variables) {
	
   if (count($variables['breadcrumb']) > 0) {
     $lastitem = sizeof($variables['breadcrumb']);
     $title = drupal_get_title();
     $crumbs = '<ul class="breadcrumbs">';
     $a=1;
     foreach($variables['breadcrumb'] as $value) {
         if ($a!=$lastitem){
          $crumbs .= '<li class="breadcrumb-'.$a.'">'. $value . ' ' . '</li>' . '<li class="breadcrumb-sep">'. '››' . ' ' . '</li>';
          $a++;
         }
				 else {
             $crumbs .= '<li class="breadcrumb-last">' . $value . '</li>' . '<li class="breadcrumb-sep">'. '››' . ' ' . '</li>' . '<li class="breadcrumb-current">'.$title.'</li> ';
         }
     }
     $crumbs .= '</ul>';
   return $crumbs;
   }
  
}

function aventura_preprocess_region(&$vars) {
  $theme = alpha_get_theme();

  if ($vars['elements']['#region'] == 'content') {
    $vars['breadcrumb'] = $theme->page['breadcrumb'];
  }
}