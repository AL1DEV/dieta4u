
<?php if (!$label_hidden): ?>
    <div class="field-label"<?php print $title_attributes; ?>></div>
<?php endif; ?>
<div class="field-items"<?php print $content_attributes; ?>>
        <div class="field-item <?php print 0 % 2 ? 'odd' : 'even'; ?>"<?php print $item_attributes[0]; ?>><?php print render($items[0]); ?></div>
</div>