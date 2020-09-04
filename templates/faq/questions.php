<h2 class="heading-red"><?= $category->name ?></h2>
<ul class="faq__questions">
    <?php foreach ($posts as $post): ?>
        <li class="faq__question">
            <input type="checkbox" id="faq-<?= $post->ID ?>">
            <label for="faq-<?= $post->ID ?>">
                <?= $post->post_title ?>
                <span class="btn btn--square"></span>
            </label>
            <div class="faq__answer">
                <div class="wrapper">
                    <?= get_field('faq_answer', $post) ?>
                </div>
            </div>
        </li>
    <?php endforeach; ?>
</ul>
