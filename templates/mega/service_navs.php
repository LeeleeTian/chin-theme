<?php
$menuItem = ICL_LANGUAGE_CODE == 'en' ? $en : $ch;
$pageId = get_post_meta(get_field($menuItem, 'options'), '_menu_item_object_id', true);
$columns = subPages($pageId);
?>
<div class="mega-menu">
  <div class="container">
    <div class="row mega-menu__row">
      <div class="col-sm-4 mega-menu__col-left"
        style="background-image: url('<?= $background['url'] ?>')">
        <div class="wrapper">
          <a href="<?= get_permalink($pageId) ?>"
            class="btn btn--white">
            <?= $btnLabel ?>
          </a>
        </div>
      </div>
      <div class="col-sm-8">
        <?php if ($columns): ?>
        <div class="row">
          <?php foreach ($columns as $column): ?>
          <div class="col-sm-6 col-md-4">
            <ul class="mega-menu__links">
              <?php foreach ($column as $page): ?>
              <li>
                <a href="<?= get_permalink($page->ID) ?>">
                  <?= $page->post_title ?>
                  <span class="btn btn--square"></span>
                </a>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>