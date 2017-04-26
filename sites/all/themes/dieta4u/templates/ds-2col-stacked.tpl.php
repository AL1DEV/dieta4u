<?php

/**
 * @file
 * Display Suite 2 column stacked template.
 */
?>

<?php
$product_id = isset($node->field_product['und'][0]) ? $node->field_product['und'][0]['product_id'] : '';
$product =  isset($product_id) ? commerce_product_load($product_id) : '';

$country = field_view_field('commerce_product', $product, 'field_product_country' ,'full');
$form  = field_view_field('commerce_product', $product, 'field_product_form' ,'full');
$count = field_view_field('commerce_product', $product, 'field_count_in_box' ,'full');

?>

<div class="col-md-5">
    <?php print $left; ?>
</div>

<div class="col-md-7">
    <div class="row">
        <div class="col-md-12">
            <h1><?php print $node->title; ?></h1>
        </div>
    </div>
    <div class="row">
        <?php foreach (array($country, $form, $count) as $field) : ?>
            <?php if($field): ?>
                <div class="col-md-4"><?php print render($field) ?></div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <hr/>
    <?php print $right; ?>
</div>

<div class="row">
    <div class="col-md-12 description">
        <?php print $footer; ?>
    </div>
</div>