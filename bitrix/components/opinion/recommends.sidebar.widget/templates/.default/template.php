<?php
/**
 * Created by PhpStorm.
 * User: alteraSPB74
 * Date: 25.01.2017
 * Time: 13:35
 */
?>
<div class="opinion-author-list mb_20">

    <div class="h2 mb_8">Рекомендуемые</div>

    <? foreach ($arResult['AUTHOR'] as $author) {
        if ($author instanceof User) {
        }
        ?>

        <a href="/user/<?=$author->getId()?>/?tab=opinion" class="opinion-author-list__elem">

            <span class="opinion-author opinion-author_aside clear">
                <span class="opinion-author__image" style="background-image: url(<?= $author->getPhoto(); ?>);"></span>
                <span class="opinion-author__overflow">
                    <span class="opinion-author__name"><?= $author->getName(); ?></span>
                    <span class="opinion-author__position"><?= $author->getDecsription(); ?></span>
                </span>
            </span>

        </a>

    <? } ?>

    <a href="/experts/" class="opinion-author-list__all">Показать все</a>

</div>