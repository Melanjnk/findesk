<?php
/**
 * Created by PhpStorm.
 * User: alteraSPB74
 * Date: 25.01.2017
 * Time: 13:35
 */
?>

<div class="tabs">
    <div class="tabs__head clear">
        <a href="?SORT=NEW" class="tabs__link <?= ($_GET['SORT'] == 'NEW') ? 'tabs__link_active' : ''; ?>">Новые</a>
        <a href="?SORT=POPULAR" class="tabs__link <?= ($_GET['SORT'] == 'POPULAR') ? 'tabs__link_active' : ''; ?>">Популярные</a>
    </div>
</div>

<div class="fd-opinion mb_40">
    <? foreach ($arResult['OPINION'] as $opinion) {
        if ($opinion instanceof Opinion) {
        }
        if (empty($opinion->getQuote())) {
            ?>

            <div class="fd-opinion__list">

                <div class="opinion-author mb_24 clear">
                    <div class="opinion-author__overflow">
                        <span class="opinion-author__image"
                              style="background-image: url('<?= $opinion->getAuthorField()->getPhoto(); ?>');"></span>
                        <div class="opinion-author__name"><a href="/user/<?= $opinion->getAuthor(); ?>/"
                                                             class="opinion-author__name-link"><?= $opinion->getAuthorField()->getName(); ?></a>
                        </div>
                        <div class="opinion-author__position"><?= $opinion->getAuthorField()->getCompany(); ?></div>
                    </div>
                </div>

                <div class="h2"><a href="<?= $opinion->getUrl(); ?>" class="color_black"><?= $opinion->getName(); ?></a>
                </div>
                <p><img src="<?= $opinion->getPreviewPhoto(); ?>" alt=""></p>
                <p><?= $opinion->getPreviewText(); ?></p>

                <div class="anylisting__footer clear">
                    <div class="anylisting__crumbs">
                        <span class="anylisting__crumb"><?= $opinion->getActiveFrom(); ?></span>
                        <span class="anylisting__crumb">3 минуты чтения</span>
                    </div>

                    <div class="anylisting__info">
                        <a href="#" class="anylisting__inf"><i
                                class="icon icon_eye"></i><?= $opinion->getCntTodayShow(); ?></a>
                        <a href="#" class="anylisting__inf"><i
                                class="icon icon_comment"></i><?= ($opinion->getCntAllShow()) ? $opinion->getCntAllShow() : '0'; ?>
                        </a>
                    </div>
                </div>
            </div>
        <? } else {
            ?>

            <a href="<?= $opinion->getUrl(); ?>" class="opinion-cite">
								<span class="opinion-author mb_24 clear">
									<span class="opinion-author__overflow">
										<span
                                            class="opinion-author__name"><?= $opinion->getAuthorField()->getName(); ?></span>
										<span
                                            class="opinion-author__position"><?= $opinion->getAuthorField()->setDecsription(); ?></span>
									</span>
								</span>


                <span class="opinion-cite__cite"><?= $opinion->getQuote(); ?></span>

                <span class="clear">
                <span class="opinion-cite__more">подробнее</span>
            </a>
        <? }
    } ?>
</div>
