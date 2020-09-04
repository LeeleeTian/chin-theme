<?php
$twoColumnTextTitle = get_field('two_column_text_title');
$leftHeading  = get_field('two_column_left_heading');
$rightHeading = get_field('two_column_right_heading');
$leftContent  = get_field('two_column_left_content');
$rightContent = get_field('two_column_right_content');
$hasLeadingContent = true;

$content = [
    $twoColumnTextTitle,
    $leftHeading,
    $rightHeading,
    $leftContent,
    $rightContent,
];

if (!array_filter($content)) {
    $hasLeadingContent = false;
}

?>
<?php if (!$hasLeadingContent): ?>
<?php else: ?>
<div class="home__services text-services">
    <div class="container">
        <?php if($twoColumnTextTitle):?>
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="heading-red"><?= $twoColumnTextTitle ?></h2>
            </div>
        </div>
        <?php endif; ?>
        <div class="row home__services__leading">
            <div class="col-sm-6">
                <div class="home-service-left">
                    <h1 class="home-service-heading">
                        <?= $leftHeading ?>
                    </h1>
                    <div class="home-service-content">
                        <?= $leftContent ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="home-service-right">
                    <h2 class="home-service-heading">
                        <?= $rightHeading ?>
                    </h2>
                    <div class="home-service-content">
                        <?= $rightContent ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>
