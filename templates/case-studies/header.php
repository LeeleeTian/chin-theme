<?php
    $classes = ['heading-red'];
    if ($italic) {
        $classes[] = 'italic';
    }
?>
<h2 class="<?= implode(' ', $classes) ?>"><?= $header ?></h2>