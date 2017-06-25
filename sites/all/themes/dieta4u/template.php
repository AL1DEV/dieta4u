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

  if ($variables['view_mode'] == 'full') {
    $variables['theme_hook_suggestions'][] = 'node__' . $variables['type'] . '__full';
  }
}

function dieta4u_preprocess_page(&$variables, $hook) {
//    drupal_add_js(drupal_get_path('theme', 'dieta4u') . '/js/ui.spinner.min.js', array(
//        'type' => 'file',
//        'group' => JS_THEME,
//    ));

    drupal_add_js(drupal_get_path('theme', 'dieta4u') . '/js/jquery.maskedinput.min.js', array(
        'type' => 'file',
        'group' => JS_THEME,
    ));

    drupal_add_js(drupal_get_path('theme', 'dieta4u') . '/js/jquery.validate.min.js', array(
        'type' => 'file',
        'group' => JS_THEME,
    ));

    drupal_add_js(drupal_get_path('theme', 'dieta4u') . '/js/dieta4u-validator.js', array(
        'type' => 'file',
        'group' => JS_THEME,
    ));

    drupal_add_js(drupal_get_path('theme', 'dieta4u') . '/js/dieta4u.js', array(
        'type' => 'file',
        'group' => JS_THEME,
    ));

    $vars['scripts'] = drupal_get_js();
}

function dieta4u_preprocess_html(&$variables) {
    if (current_path() == drupal_is_front_page()) {
        $description = array(
            '#type' => 'html_tag',
            '#tag' => 'meta',
            '#attributes' => array(
                'name' => 'description',
                'content' => '	Интернет магазин dieta4u.com.ua. Капсулы, таблетки и порошки для похудения, жироудаляющие капсулы, препараты для похудения, капсулы для снижение веса, капсулы для коррекции фигуры, порошок для нормализации обмена веществ, порошок для похудения, жевательные таблетки для похудения, препараты для коррекции веса. Продажа в Украине',
            )
        );
        drupal_add_html_head($description, 'description');

        $keywords = array(
            '#type' => 'html_tag',
            '#tag' => 'meta',
            '#attributes' => array(
                'name' => 'keywords',
                'content' => 'капсулы, таблетки и порошки для похудения, жироудаляющие капсулы, препараты для похудения, капсулы для снижение веса, капсулы для коррекции фигуры, порошок для нормализации обмена веществ, порошок для похудения, жевательные таблетки для похудения, препараты для коррекции веса, Украина, продажа, цены',
            )
        );
        drupal_add_html_head($keywords, 'keywords');
    }
//    drupal_add_css('https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900&amp;subset=cyrillic,cyrillic-ext', array('type' => 'external'));
}


function dieta4u_preprocess_field(&$variables, $hook) {
    $element = $variables['element'];
    if (isset($element['#field_name'])) {
        if ($element['#field_name'] == 'field_product_form' && (drupal_is_front_page() || arg(0) == 'catalog')) {
            $fid = isset($element['#items'][0]['taxonomy_term']->field_form_created_image[LANGUAGE_NONE]) ? $element['#items'][0]['taxonomy_term']->field_form_created_image[LANGUAGE_NONE][0]['fid'] : '';
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
                       $form = $count . ' капсул';
                       if($count == 1){
                           $form = $count . ' капсула';
                       }
                       if(in_array($count,[2,3,4])){
                           $form = $count . ' капсулы';
                       }
                       break;
                   case 'Порошок':
                       $form = $count . ' порошков';
                       if($count == 1){
                           $form = $count . ' порошок';
                       }
                       if(in_array($count,[2,3,4])){
                           $form = $count . ' порошка';
                       }
                       break;
                   case 'Таблетки':
                       $form = $count . ' таблеток';
                       if($count == 1){
                           $form = $count . ' таблетка';
                       }
                       if(in_array($count,[2,3,4])){
                           $form = $count . ' таблетка';
                       }
                       break;
                   case 'Тюбик':
                       $form = $count . ' тюбиков';
                       if($count == 1){
                           $form = $count . ' тюбик';
                       }
                       if(in_array($count,[2,3,4])){
                           $form = $count . ' тюбика';
                       }
                       break;
               }
               $variables['items'][0]['#markup'] = $form;
           }
        }
    }
}