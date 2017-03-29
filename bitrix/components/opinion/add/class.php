<?php
use Bitrix\Main;
/**
 * Created by PhpStorm.
 * User: alteraSPB74
 * Date: 25.01.2017
 * Time: 13:35
 */
class Add extends \CBitrixComponent
{
    public function executeComponent()
    {
        $OpinionController = new OpinionController();
        $this->arResult['ADD'] = $OpinionController->AddAction();
        $this->IncludeComponentTemplate();
        return $this->arResult["Y"];
    }
}