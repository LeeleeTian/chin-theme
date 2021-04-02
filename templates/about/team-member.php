<?php
//$c = explode(' ', trim($class));
//$class = array_shift($c);
$class = 'red';
?>
<div class="team__member text-center" data-toggle="modal" data-target=".team__modal"
     data-img="<?= $member['image']['url'] ?>"
     data-name="<?= $member['name'] ?>"
     data-occupation="<?= $member['occupation'] ?>"
     data-phone="<?= $member['phone'] ?>"
     data-header="<?= $member['header'] ?>"
     data-description="<?= $member['description'] ?>"
     data-class="<?= $class ?>">
    <img src="<?= $member['image']['url'] ?>" alt="<?= $member['name'] ?>" data-toggle="modal" data-target=".team__modal" class="img-responsive">
    <div class="wrapper">
        <p class="team__member__name"><?= $member['name'] ?></p>
        <p class="team__member__occupation"><?= $member['occupation'] ?></p>
    </div>
</div>