<?php if ($status): ?>
    <div class="commerce-product-status">
        <?php if ($label): ?>
            <div class="commerce-product-status-label">
                <?php print $label; ?>
            </div>
        <?php endif; ?>
        <?php if($status == 'Active'): ?>
            <?php print'<div class="active">в наличии</div>';?>
        <?php else: ?>
            <?php print'<div class="disabled">нет в наличии</div>';?>
        <?php endif;?>
    </div>
<?php endif; ?>