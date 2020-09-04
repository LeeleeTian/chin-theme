<?php if (is_array($icons)): ?>
    <ul class="social__icons">
        <?php foreach ($icons as $icon): ?>
        
            <?php if($icon['account_type'] === 'wechat'): ?>
            <li>
                <div class="hover_img">
                    <a style="cursor:pointer;">
                        <span>
                            <img src="<?= TrueLib::getImageUrl('chin_qr.jpg') ?>" alt="image" height="200" />
                        </span> 
                        <i class="fa fa-<?= $icon['account_type'] ?>"></i>
                    </a>
                </div>
            </li>
            <?php else: ?>
                <li>
                    <a href="<?= $icon['account_url'] ?>" target="_blank">
                        <i class="fa fa-<?= $icon['account_type'] ?>"></i>
                    </a>
                </li>
            <?php endif; ?>
               
        <?php endforeach; ?>
    </ul>
<?php endif; ?>


<style>

.hover_img a { 
        position:relative; 
}

.hover_img a span {  
        position:absolute; 
        display:none; 
        z-index:99; 
}

.hover_img a:hover span { 
        display: block;
        bottom: 30px;
        right: -67px;
}

</style>
