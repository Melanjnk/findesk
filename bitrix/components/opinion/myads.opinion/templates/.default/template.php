<?php
/**
 * Created by PhpStorm.
 * User: alteraSPB74
 * Date: 01.02.2017
 * Time: 11:54
 */
?>

<?
//dump($arResult['MY_OPINION']);
?>
<div class="cols__col cols__col_9">

    <div class="clear">
        <a href="/personal/add/opinion/" class="button button_lblue h1-relative-button"><span class="plus-icon">+</span>
            НОВОЕ МНЕНИЕ</a>
        <div class="h1">Мои мнения</div>
    </div>

    <? if (count($arResult['MY_OPINION']) > 0) { ?>
        <? foreach ($arResult['MY_OPINION'] as $opinion) {
            if ($opinion instanceof Opinion) {
//                dump($opinion);
            }
            ?>

            <div class="fd-opinion__list">

                <div class="mb_8 clear">
                    <a href="/opinion/" class="fd-opinion__category-link"><? foreach ($opinion->getType() as $type) {
                            echo $type . ' ';
                        } ?></a>
                    <div class="fd-opinion__controls">
                        <? if ($opinion->getStatus() == 1) { ?>
                            <a href="?HIDE=<?= $opinion->getId(); ?>" class="fd-opinion__toggle-list">Скрыть</a>
                        <? } else { ?>
                            <a href="?SHOW=<?= $opinion->getId(); ?>" class="fd-opinion__toggle-list">Показать</a>
                        <? } ?>
                        <a href="/personal/opinion/edit/?ID=<?= $opinion->getId(); ?>"
                           class="fd-opinion__edit-button button button_stroke button_smaller button_lblue">
                            <i class="icon icon_pen"></i> ИЗМЕНИТЬ</a>
                    </div>
                </div>

                <div class="h2"><a href="<?= $opinion->getUrl(); ?>" class="color_black"><?= $opinion->getName(); ?></a>
                </div>
                <?= $opinion->getPreviewText(); ?>

                <div class="anylisting__footer clear">
                    <div class="anylisting__crumbs">
                        <span class="anylisting__crumb"><?= $opinion->getActiveFrom(); ?></span>
                        <span class="anylisting__crumb"><?= getReadTimeString($opinion->getDetailText()); ?></span>
                        <a href="/" class="anylisting__crumb">findesk.ru</a>
                    </div>

                    <div class="anylisting__info">
                        <a href="" class="anylisting__inf"><i
                                class="icon icon_eye"></i>0<?= $opinion->getCntAllShow(); ?></a>
                        <a href="" class="anylisting__inf"><i
                                class="icon icon_comment"></i><?= 0;//<?= $opinion->getComments();    ?></a>
                    </div>
                </div>
            </div>
        <? } ?>
    <? } else { ?>
        <div>У вас ещё нет ни одного мнения.</div>
    <? } ?>
</div>
