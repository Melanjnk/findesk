<?php
use \Bitrix\Main;

/**
 * Created by PhpStorm.
 * User: alteraSPB74
 * Date: 01.02.2017
 * Time: 11:51
 */
class MyadsOpinion extends \CBitrixComponent
{
    /**
     *
     */
    public function executeComponent()
    {
        $this->arReuslt['AJAX'] = $this->ajax();
        $this->arResult['MY_OPINION'] = $this->getMyOpinions();
        $this->IncludeComponentTemplate();
    }

    private function getMyOpinions()
    {
        $opinions = [];
        $opinionRepo = new OpinionRepo();
        global $USER;
        if ($USER->IsAuthorized()) {
            $opinions = $opinionRepo->getObjectByUserId($USER->GetID());
        }
        return $opinions;
    }

    private function ajax()
    {
        global $USER;
        if ($USER->IsAuthorized() && isset($_REQUEST['HIDE'])) {

            $arPropertyArchive = ['STATUS'=>'0'];

            // Установим новое значение для данного свойства данного элемента
            CIBlockElement::SetPropertyValuesEx($_REQUEST['HIDE'], false, $arPropertyArchive);

            header('Location: http://findesk.ru/personal/opinion/');
            die;
        }
        if ($USER->IsAuthorized() && isset($_REQUEST['SHOW'])) {

            $arPropertyArchive = ['STATUS'=>'1'];

            // Установим новое значение для данного свойства данного элемента
            CIBlockElement::SetPropertyValuesEx($_REQUEST['SHOW'], false, $arPropertyArchive);

            header('Location: http://findesk.ru/personal/opinion/');
            die;
        }
    }
}