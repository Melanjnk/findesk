<?php
use Bitrix\Main;
/**
 * Created by PhpStorm.
 * User: alteraSPB74
 * Date: 25.01.2017
 * Time: 13:35
 */
class Edit extends \CBitrixComponent
{
    public function executeComponent()
    {
        $OpinionController = new OpinionController();
        $this->arResult['EDIT'] = $OpinionController->EditAction();
        $this->arResult['OPINION'] = $OpinionController->DetailAction()[0];
        $this->IncludeComponentTemplate();
        return $this->arResult["Y"];
    }
}