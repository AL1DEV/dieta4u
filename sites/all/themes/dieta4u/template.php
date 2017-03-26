<?php

function dieta4u_commerce_cart_empty_block(){
  return '<div class="headerCard">
     <i class="glyphicon glyphicon-shopping-cart"></i><span id="CartCount" class="hidden-count">Корзина</span>
     </div>';
}


function dieta4u_preprocess_node(&$variables) {
  if ($variables['view_mode'] == 'slider') {
    $variables['theme_hook_suggestions'][] = 'node__' . $variables['type'] . '__slider';
  }
}