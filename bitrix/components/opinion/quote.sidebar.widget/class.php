<?php
use Bitrix\Main;
/**
 * Created by PhpStorm.
 * User: alteraSPB74
 * Date: 25.01.2017
 * Time: 13:35
 */
class QuoteSidebarWidget extends \CBitrixComponent
{
    public function executeComponent()
    {
        $OpinionController = new OpinionController();
        $this->arResult['OPINION'] = $OpinionController->WidgetAction()[0];
        $this->IncludeComponentTemplate();
        return $this->arResult["Y"];
    }
}