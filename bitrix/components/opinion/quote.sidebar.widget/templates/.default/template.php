<?php
/**
 * Created by PhpStorm.
 * User: alteraSPB74
 * Date: 25.01.2017
 * Time: 13:35
 */
?>
<a href="/opinion/detail.php?ID=<?= $arResult['OPINION']['ID']; ?>" class="opinion-cite opinion-cite_aside mb_20">
    <span class="opinion-cite__cite"><?= ($arResult['OPINION']['PREVIEW_TEXT']); ?></span>
    <span class="opinion-cite__more">Подробнее</span>
</a>