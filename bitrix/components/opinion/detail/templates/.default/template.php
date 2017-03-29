<?php
/**
 * Created by PhpStorm.
 * User: alteraSPB74
 * Date: 25.01.2017
 * Time: 13:35
 */
?>
<div class="fd-opinion mb_40">
<? foreach ($arResult['OPINION'] as $opinion){
    if($opinion instanceof Opinion){} ?>
    <div class="fd-opinion__list">

        <div class="opinion-author mb_24 clear">
            <div class="opinion-author__overflow">
                <span class="opinion-author__image" style="background-image: url('<?=$opinion->getAuthorField()->getPhoto();?>');"></span>
                <div class="opinion-author__name"><a href="/user/<?=$opinion->getAuthor();?>/" class="opinion-author__name-link"><?=$opinion->getAuthorField()->getName();?></a></div>
                <div class="opinion-author__position"><?=$opinion->getAuthorField()->getCompany();?></div>
            </div>
        </div>

        <div class="h2"><span class="color_black"><?=$opinion->getName();?></span></div>
        <p><img src="<?=$opinion->getDetailPhoto();?>" alt=""></p>
        <p><?=$opinion->getPreviewText();?></p>
        <p><?=$opinion->getDetailText();?></p>

        <div class="anylisting__footer clear">
            <div class="anylisting__crumbs">
                <span class="anylisting__crumb"><?=$opinion->getActiveFrom();?></span>
                <span class="anylisting__crumb">3 минуты чтения</span>
            </div>

            <div class="anylisting__info">
                <a href="#" class="anylisting__inf"><i class="icon icon_eye"></i><?=$opinion->getCntTodayShow();?></a>
                <a href="#" class="anylisting__inf"><i class="icon icon_comment"></i><?=($opinion->getCntAllShow()) ? $opinion->getCntAllShow() :'0';?></a>
            </div>
        </div>
    </div>
<? } ?>
</div>
