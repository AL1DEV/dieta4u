<?php

function dieta4u_commerce_cart_empty_block(){
    return '<div class="separate"></div><div class="headerCard">
     <i class="glyphicon glyphicon-shopping-cart"></i><span id="CartCount" class="hidden-count">Корзина <div class="line-item-summary">
     <div class="line-item-quantity">
      <span class="line-item-quantity-raw">0</span><span class="line-item-quantity-label">item</span>
     </div>
      </div></span>
     </div>';
}


function dieta4u_preprocess_node(&$variables) {
  if ($variables['view_mode'] == 'slider') {
    $variables['theme_hook_suggestions'][] = 'node__' . $variables['type'] . '__slider';
  }
}

function dieta4u_preprocess_html(&$variables) {
    drupal_add_css('https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900&amp;subset=cyrillic,cyrillic-ext', array('type' => 'external'));
}

function dieta4u_preprocess_field(&$variables, $hook) {
    $element = $variables['element'];
    if (isset($element['#field_name'])) {
        if ($element['#field_name'] == 'field_product_form') {
            $fid = isset ($element['#items'][0]['taxonomy_term']->field_form_created_image) ? $element['#items'][0]['taxonomy_term']->field_form_created_image[LANGUAGE_NONE][0]['fid'] : '';
            if($fid){
                $file = file_load($fid);
                $uri = $file->uri;
                $url = file_create_url($uri);
                $variables['items'][0]['#markup'] = "<img src='$url'>";
            }
        }
        if ($element['#field_name'] == 'field_count_in_box') {
           $form = isset($element['#object']->field_product_form) ? $element['#object']->field_product_form[LANGUAGE_NONE][0]['taxonomy_term']->name : '';
           if($form){
               $count = $variables['items'][0]['#markup'];
               switch ($form){
                   case 'Капсулы':
                       $form = format_plural($count, t('@count item'), t('@count item'));
                       break;
                   case 'Порошок':
                       break;
               }
               $variables['items'][0]['#markup'] = $form;
           }
        }
    }
}