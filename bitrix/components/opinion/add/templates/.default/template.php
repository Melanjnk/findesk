<?
global $USER;
?>

<? if ($arResult['ADD'] && empty($arResult['ADD']['ERROR'])) { ?>
    <div class="myad-success mb_52">
        <div class="h1">Мнение опубликовано</div>
        <div class="mb_44">
            <p>В ближайшие три часа мнение проверят модераторы и опубликуют. <br>Об этом мы сразу оповестим вас по
                почте <a href="mailto:<?= $USER->GetEmail(); ?>"><?= $USER->GetEmail(); ?></a></p>
            <p>Спасибо за потраченное время!</p>
        </div>
        <div class="myad-success__buttons">
            <a href="/personal/add/opinion" class="button button_lblue">ЕЩЕ ОДНО МНЕНИЕ</a>
            <a href="/personal/opinion/" class="button button_stroke button_lblue">В МОИ МНЕНИЯ</a>
        </div>
    </div>
<? } else { ?>
    <? if (!empty($arResult['ADD']['ERROR'])) { ?>
        <div class="myad-success mb_52">
            <div class="h1">Ошибка</div>
            <div class="mb_44">
                <p><?= $arResult['ADD']['ERROR']; ?></p>
            </div>
        </div>
    <? } ?>
    <form action="" method="post" enctype="multipart/form-data" id="ADD_OPINION">

        <div class="add-opinion mb_16">

            <div class="fz_20 mb_20">Новое мнение</div>

            <div class="add-opinion-table">

                <div class="add-opinion-table__row clear mb_24">

                    <div class="add-opinion-table__label-cell">
                        <label class="add-opinion-table__label">Категория</label>
                    </div>

                    <div class="add-opinion-table__overflow">

                        <div class="selectbox width_280">
                            <select name="TYPE" class="select">
                                <option value="109">Бизнес</option>
                                <option value="110">Франшиза</option>
                            </select>
                        </div>

                    </div>

                </div>

                <div class="add-opinion-table__row clear mb_24">

                    <div class="add-opinion-table__label-cell">
                        <label class="add-opinion-table__label">Заголовок</label>
                    </div>

                    <div class="add-opinion-table__overflow">

                        <input type="text" name="NAME" class="input" placeholder="Емкий и короткий"
                               value=""
                        />

                    </div>

                </div>

                <div class="add-opinion-table__row clear mb_24">

                    <div class="add-opinion-table__label-cell">
                        <label class="add-opinion-table__label">Подзаголовок</label>
                    </div>

                    <div class="add-opinion-table__overflow">

                        <input type="text" name="SUB_NAME" class="input" value="" placeholder="Подзаголовок"/>

                    </div>

                </div>

                <div class="add-opinion-table__row clear mb_24">

                    <div class="add-opinion-table__label-cell ps_rel">
                        <label class="add-opinion-table__label">Важная цитата</label>

                        <div class="add-opinion-cite">
                            <span class="add-opinion-cite__trigger js-add-opinion-cite-tigger">подробнее</span>

                            <div class="add-opinion-cite__tooltip">
                                <div class="add-opinion-cite__tooltip-screen">
                                    <img src="/bitrix/templates/info_light_blue/images/tmp/catalog-img-02.jpg" alt="">
                                </div>

                                <div class="add-opinion-cite__tooltip-text">
                                    <div class="add-opinion-cite__title">Цитата — это самый сок мнения</div>
                                    <p>Эта цитата призвана удивить и привлечь пользователя в вашу статью из общего
                                        списка материалов. <br>Чтобы все получилось, цитата должна быть емкой яркой и
                                        отражать суть всей статьи</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="add-opinion-table__overflow">

                        <textarea class="textarea" name="QUOTE" cols="30" rows="10"
                                  placeholder="Вырванный из текста кусочек, который призван удивить"></textarea>

                    </div>

                </div>

                <div class="add-opinion-table__row clear mb_24">

                    <div class="add-opinion-table__label-cell">
                        <label class="add-opinion-table__label">Обложка</label>
                    </div>

                    <div class="add-opinion-table__overflow">

                        <div class="add-opinion-table__filebar clear">

                            <label class="add-opinion-table__file-remove">
                                <input type="checkbox" style="visibility: hidden;" name="ACTION" value="REMOVE_PHOTO">
                                УДАЛИТЬ <i class="icon icon_trash"></i>
                            </label>

                            <label class="button button_lblue button_stroke">
                                ЗАГРУЗИТЬ ИЗ ФАЙЛА...
                                <input class="add-opinion-table__file-input" type="file" name="PICTURE"
                                       onchange="readURL(this);" accept="image/gif, image/jpeg, image/png">
                            </label>

                            <span class="add-opinion-table__file-note">
													Рекомендуемый размер <br>830x290 пикселей
												</span>

                        </div>

                        <div class="user-cover-edit-mode" style="display: none;">
                            <div class="user-cover-edit-mode__in">
                                <img id="OPINION_PREVIEW_IMG" src="" alt="">
                            </div>
                        </div>

                    </div>

                </div>

                <div class="add-opinion-table__row clear mb_24">

                    <div class="add-opinion-table__label-cell">
                        <label class="add-opinion-table__label">Краткое описание</label>
                    </div>

                    <div class="add-opinion-table__overflow">

                        <textarea name="PREVIEW_TEXT" cols="30" rows="10" placeholder="Текст мнения"></textarea>

                    </div>

                </div>
                <div class="add-opinion-table__row clear mb_24">

                    <div class="add-opinion-table__label-cell">
                        <label class="add-opinion-table__label">Подробное описание</label>
                    </div>

                    <div class="add-opinion-table__overflow">

                        <textarea name="DETAIL_TEXT" cols="30" rows="10" placeholder="Текст мнения"></textarea>

                    </div>

                </div>

                <div class="add-opinion-table__row clear mb_24">

                    <div class="add-opinion-table__label-cell">
                        <label class="add-opinion-table__label">Теги</label>
                    </div>

                    <div class="add-opinion-table__overflow">

                        <input type="text" name="HASH_TAGS" class="input" placeholder="Перечислите через запятую"
                               value=""
                        />

                    </div>

                </div>

            </div><!-- add-opinion-table end -->

        </div><!-- add-opinion end -->

        <div class="add-opinion-footer">
            <div class="fz_20 mb_16">Проверьте, что вы ничего не забыли</div>
            <button type="submit" class="button button_lblue" name="ADD_OPINION" value="1">СОХРАНИТЬ И ОПУБЛИКОВАТЬ
            </button>
        </div>

    </form>

<? } ?>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#OPINION_PREVIEW_IMG')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function () {

        var PICTURE = $("input[name='PICTURE']");

        var ACTION = $("input[name='ACTION']");
        ACTION.on('change', function () {
            var name = $(this).val();
            var isChecked = $(this).is(':checked');
            var opinionPreviewImg = $('#OPINION_PREVIEW_IMG');
            var imgCover = $('.user-cover-edit-mode');
            var removeBtn = $('.add-opinion-table__file-remove');
            if (isChecked) {
                opinionPreviewImg.hide();
                imgCover.hide();
                //скрываем кнопку удаления
                removeBtn.hide();
                // обнуляем input type = "file" name Picture
                PICTURE.prop('value', null);
                // сброс чек бокса
                $(this).prop('checked', false);
                console.log('change action: ' + name + ' Is checked? ' + isChecked);
            }
        });

        PICTURE.on('change', function () {
            console.log('change file Picture');
            //ajax Load on server

            var opinionPreviewImg = $('#OPINION_PREVIEW_IMG');
            var imgCover = $('.user-cover-edit-mode');
            var removeBtn = $('.add-opinion-table__file-remove');

            opinionPreviewImg.show();
            imgCover.show();
            removeBtn.show();
        });
    });
</script>