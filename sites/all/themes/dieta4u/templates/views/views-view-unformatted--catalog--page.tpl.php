<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php if (!empty($title)): ?>
    <h3><?php print $title; ?></h3>
<?php endif; ?>
<?php foreach ($rows as $id => $row): ?>
    <?php if (($id % 4) == 0): ?><div class="row"><?php endif; ?>
    <div<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
        <?php print $row; ?>
    </div>
    <?php if ($id == 3 || $id == 7 || $id == 11 || $id == 15 || $id == 19): ?></div><?php endif; ?>
<?php endforeach; ?>