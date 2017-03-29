<?php
use Bitrix\Main;
/**
 * Created by PhpStorm.
 * User: alteraSPB74
 * Date: 25.01.2017
 * Time: 13:35
 */
class Filter extends \CBitrixComponent
{
    public function executeComponent()
    {
        $OpinionController = new OpinionController();
        $this->arResult['FILTER'] = $OpinionController->FilterAction();
        $this->IncludeComponentTemplate();
        return $this->arResult["Y"];
    }
}