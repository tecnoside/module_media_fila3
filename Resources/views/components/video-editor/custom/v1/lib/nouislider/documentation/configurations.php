<<<<<<< HEAD
<?php declare(strict_types=1);
$title = 'noUiSlider - Configurations';
$description = '';
=======
<?php
$title = "noUiSlider - Configurations";
$description = "";
>>>>>>> 4757f34 (.)
$direction = ($_GET['dir'] ?? null) === 'rtl' ? 'dir="rtl"' : 'ltr';
?>
<html <?php echo $direction; ?>></html>

<style>

    .configuration {
        margin: 50px;
        width: 300px;
    }

    h2 {
        margin-bottom: 20px;
    }

    .vertical {
        height: 300px;
        display: inline-block;
    }

    .vertical .noUi-target {
        height: 100%;
    }

</style>

<input placeholder="Test for focus">

<div class="configuration">
    <h2>Horizontal - LTR</h2>
    <div id="horizontal-ltr"></div>
</div>
<div class="configuration">
    <h2>Horizontal - RTL</h2>
    <div id="horizontal-rtl"></div>
</div>
<div class="configuration vertical">
    <h2>Vertical - LTR</h2>
    <div id="vertical-ltr"></div>
</div>
<div class="configuration vertical">
    <h2>Vertical - RTL</h2>
    <div id="vertical-rtl"></div>
<<<<<<< HEAD
</div><?php run('horizontal-ltr'); ?><?php run('horizontal-rtl'); ?><?php run('vertical-ltr'); ?><?php run('vertical-rtl'); ?>
=======
</div>

<?php run('horizontal-ltr'); ?>
<?php run('horizontal-rtl'); ?>
<?php run('vertical-ltr'); ?>
<?php run('vertical-rtl'); ?>
>>>>>>> 4757f34 (.)

