<script>
    $(document).ready(function () {
       var selectNewsType = $("select[name='NEWS_TYPE']");
        selectNewsType.on('change',function () {
            window.location.href = $(this).val();
        });
    });
</script>
<div class="filter">

    <form action="" method="post" class="has-validation-callback">

        <div class="cols cols_padding_0 filter__topline clear mb_16">

            <div class="cols__col cols__col_3 filter__type">
                <div class="selectbox">
                    <select name="NEWS_TYPE" class="select select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                        <option value="/news/">Новости</option>
                        <option value="/analytics/">Аналитика</option>
                        <option value="/articles/">Статьи</option>
                        <option value="/opinion/" selected="selected">Мнения экспертов</option>
                    </select>
                </div>
            </div>

            <div class="cols__col cols__col_3 filter__region">
                <div class="selectbox">
                    <select name="TYPE" class="select select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                        <option value="">Все категории</option>
                        <option value="109" <?=selectedSelectOpinion('TYPE',109);?>>Бизнес</option>
                        <option value="110" <?=selectedSelectOpinion('TYPE',110);?>>Франшизы</option>
                    </select>
                </div>
            </div>

            <div class="filter__searchbox">
                <input type="text" name="SEARCH" value="<?=$_REQUEST['SEARCH'];?>" class="input filter__search" placeholder="Начните искать что важно">
                <button type="submit" class="filter__submit"><span class="filter__submit-span">Найти</span></button>
            </div>

        </div>

    </form>

    <div class="filter__hashtags">
        <?
        $cntHashTags = 0;
        foreach ($arResult['FILTER']['HASH_TAG'] as $hashTag) { $cntHashTags++;?>
            <a href="?hashTag=<?=$hashTag;?>"
                <?=($hashTag==$_REQUEST['hashTag'])?'style="border: solid 1px; border-color: #0074b4;
    color: #0074b4;"':'';?>
               class="filter__hashtag" <?=($cntHashTags > 3) ? 'data-hidden="true"' : '';?>><?='#'.$hashTag;?></a>
        <?}?>
        <span class="filter__hashtag-trigger js-hashtag-trigger toggle-text" data-origin="Еще" data-replace="Свернуть">Еще</span>
    </div>

</div>