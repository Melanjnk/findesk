<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/core/ObjectRepoInterFace.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/core/entity/Opinion.php");

/**
 * Created by PhpStorm.
 * User: alteraSPB74
 * Date: 25.01.2017
 * Time: 12:41
 */
class OpinionRepo implements ObjectRepoInterFace
{
    /**
     * @var array
     */
    private $arObjectSelect = [
        'ID', 'ACTIVE', 'PREVIEW_PICTURE', 'DETAIL_PAGE_URL', 'SORT', 'PREVIEW_TEXT', 'DETAIL_PICTURE',
        'TAGS', 'DETAIL_TEXT', 'DATE_ACTIVE_FROM', 'DATE_ACTIVE_TO', 'SHOW_COUNTER', 'NAME',
        'PROPERTY_TYPE', 'PROPERTY_CATEGORY', 'PROPERTY_USER', 'PROPERTY_HASH_TAG', 'PROPERTY_SUB_NAME',
        'PROPERTY_CNT_TODAY_SHOW', 'PROPERTY_QUOTE', 'PROPERTY_STATUS'
    ];

    /**
     * @var array
     */
    private $arObjectFilter = [
        'IBLOCK_ID' => IB_OPINION,
    ];

    /**
     * @var array
     */
    private $arObjectGroup = false;
    /**
     * @var array
     */
    private $arObjectOrder = ['ACTIVE_FROM'=>'DESC'];

    /**
     * @param string $method
     * @return mixed
     */
    public function getAllObject($method = 'Fetch', $filter = [])
    {
        $object = [];
        $objects = [];
        $order = [];
        if ($_GET['SORT'] == 'NEW') {
            $order = [
                'timestamp_x' => 'DESC'
            ];
        }
        if ($_GET['SORT'] == 'POPULAR') {
            $order = [
                'SHOW_COUNTER' => 'DESC'
            ];
        }

        $order = array_merge($order, $this->arObjectOrder);

        $filter = array_merge($filter, $this->arObjectFilter);
        $resBusiness = CIBlockElement::GetList($order, $filter, $this->arObjectGroup, false, $this->arObjectSelect);

        $tmpObject = [];

        while ($objectDb = $resBusiness->Fetch()) {
            $tmpObject[$objectDb['ID']][] = $objectDb;
        }

        foreach ($tmpObject as $id => $uniqueObject) {
            foreach ($uniqueObject as $double) {
                $object[$id]['ID'] = $id;
                $object[$id]['NAME'] = $double['NAME'];
                $object[$id]['SUB_NAME'] = $double['PROPERTY_SUB_NAME_VALUE'];
                $object[$id]['ACTIVE'] = $double['ACTIVE'];
                $object[$id]['DATE_ACTIVE_FROM'] = $double['DATE_ACTIVE_FROM'];
                $object[$id]['DATE_ACTIVE_TO'] = $double['DATE_ACTIVE_TO'];
                $object[$id]['QUOTE'] = $double['PROPERTY_QUOTE_VALUE'];
                $object[$id]['PREVIEW_TEXT'] = $double['PREVIEW_TEXT'];
                $object[$id]['DETAIL_TEXT'] = $double['DETAIL_TEXT'];
                $object[$id]['DETAIL_PICTURE'] = $double['DETAIL_PICTURE'];
                $object[$id]['PREVIEW_PICTURE'] = $double['PREVIEW_PICTURE'];
                $object[$id]['USER'] = $double['PROPERTY_USER_VALUE'];
                $object[$id]['QUOTE'] = $double['PROPERTY_QUOTE_VALUE'];
                $object[$id]['STATUS'] =  ($double['PROPERTY_STATUS_VALUE'] == '1') ? 1 : 0;
                $object[$id]['SHOW_COUNTER'] = $double['SHOW_COUNTER'];
                $object[$id]['CNT_TODAY_SHOW'] = $double['PROPERTY_CNT_TODAY_SHOW_VALUE'];
                if (!in_array($double['PROPERTY_TYPE_VALUE'], $object[$id]['TYPE'])) {
                    $object[$id]['TYPE'][] = $double['PROPERTY_TYPE_VALUE'];
                }
                if (!in_array($double['PROPERTY_CATEGORY_VALUE'], $object[$id]['CATEGORY'])) {
                    $object[$id]['CATEGORY'][] = $double['PROPERTY_CATEGORY_VALUE'];
                }
                if (!in_array($double['PROPERTY_HASH_TAG_VALUE'], $object[$id]['HASH_TAG'])) {
                    $object[$id]['HASH_TAG'][] = $double['PROPERTY_HASH_TAG_VALUE'];
                }
            }
        }

        foreach ($object as $opinion) {
            $objects[] = new Opinion(
                $opinion['ID'],
                $opinion['ACTIVE'],
                $opinion['DATE_ACTIVE_FROM'],
                $opinion['DATE_ACTIVE_TO'],
                $opinion['NAME'],
                $opinion['SUB_NAME'],
                $opinion['QUOTE'],
                $opinion['PREVIEW_TEXT'],
                $opinion['DETAIL_TEXT'],
                $opinion['DETAIL_PICTURE'],
                $opinion['PREVIEW_PICTURE'],
                $opinion['USER'],
                $opinion['TYPE'],
                $opinion['CATEGORY'],
                $opinion['HASH_TAG'],
                $opinion['SHOW_COUNTER'],
                $opinion['CNT_TODAY_SHOW'],
                $opinion['STATUS']
            );
        }
        return $objects;
    }

    /**
     * @param $id
     * @return array
     */
    public function getObjectByUserId($id)
    {

        $object = [];
        $objects = [];
        $order = [];
        if ($_GET['SORT'] == 'NEW') {
            $order = [
                'timestamp_x' => 'DESC'
            ];
        }
        if ($_GET['SORT'] == 'POPULAR') {
            $order = [
                'SHOW_COUNTER' => 'DESC'
            ];
        }

        $filter = ['PROPERTY_USER' => $id];
        $order = array_merge($order, $this->arObjectOrder);

        $filter = array_merge($filter, $this->arObjectFilter);
        $resBusiness = CIBlockElement::GetList($order, $filter, $this->arObjectGroup, false, $this->arObjectSelect);

        $tmpObject = [];

        while ($objectDb = $resBusiness->Fetch()) {
            $tmpObject[$objectDb['ID']][] = $objectDb;
        }

        foreach ($tmpObject as $id => $uniqueObject) {
            foreach ($uniqueObject as $double) {
                $object[$id]['ID'] = $id;
                $object[$id]['NAME'] = $double['NAME'];
                $object[$id]['SUB_NAME'] = $double['PROPERTY_SUB_NAME_VALUE'];
                $object[$id]['ACTIVE'] = $double['ACTIVE'];
                $object[$id]['DATE_ACTIVE_FROM'] = $double['DATE_ACTIVE_FROM'];
                $object[$id]['DATE_ACTIVE_TO'] = $double['DATE_ACTIVE_TO'];
                $object[$id]['QUOTE'] = $double['PROPERTY_QUOTE_VALUE'];
                $object[$id]['PREVIEW_TEXT'] = $double['PREVIEW_TEXT'];
                $object[$id]['DETAIL_TEXT'] = $double['DETAIL_TEXT'];
                $object[$id]['DETAIL_PICTURE'] = $double['DETAIL_PICTURE'];
                $object[$id]['PREVIEW_PICTURE'] = $double['PREVIEW_PICTURE'];
                $object[$id]['USER'] = $double['PROPERTY_USER_VALUE'];
                $object[$id]['STATUS'] = ($double['PROPERTY_STATUS_VALUE'] == '1') ? 1 : 0;
                $object[$id]['QUOTE'] = $double['PROPERTY_QUOTE_VALUE'];
                $object[$id]['SHOW_COUNTER'] = $double['SHOW_COUNTER'];
                $object[$id]['CNT_TODAY_SHOW'] = $double['PROPERTY_CNT_TODAY_SHOW_VALUE'];
                if (!in_array($double['PROPERTY_TYPE_VALUE'], $object[$id]['TYPE'])) {
                    $object[$id]['TYPE'][] = $double['PROPERTY_TYPE_VALUE'];
                }
                if (!in_array($double['PROPERTY_CATEGORY_VALUE'], $object[$id]['CATEGORY'])) {
                    $object[$id]['CATEGORY'][] = $double['PROPERTY_CATEGORY_VALUE'];
                }
                if (!in_array($double['PROPERTY_HASH_TAG_VALUE'], $object[$id]['HASH_TAG'])) {
                    $object[$id]['HASH_TAG'][] = $double['PROPERTY_HASH_TAG_VALUE'];
                }
            }
        }

        foreach ($object as $opinion) {
            $objects[] = new Opinion(
                $opinion['ID'],
                $opinion['ACTIVE'],
                $opinion['DATE_ACTIVE_FROM'],
                $opinion['DATE_ACTIVE_TO'],
                $opinion['NAME'],
                $opinion['SUB_NAME'],
                $opinion['QUOTE'],
                $opinion['PREVIEW_TEXT'],
                $opinion['DETAIL_TEXT'],
                $opinion['DETAIL_PICTURE'],
                $opinion['PREVIEW_PICTURE'],
                $opinion['USER'],
                $opinion['TYPE'],
                $opinion['CATEGORY'],
                $opinion['HASH_TAG'],
                $opinion['SHOW_COUNTER'],
                $opinion['CNT_TODAY_SHOW'],
                $opinion['STATUS']
            );
        }
        return $objects;
    }

    /**
     * @param $ID
     * @return array
     */
    public function getObjectById($ID)
    {
        $object = [];
        $objects = [];

        if (!is_numeric($ID)) {
            return $objects;
        }

        $filter = [
            'ID' => $ID
        ];

        $filter = array_merge($filter, $this->arObjectFilter);

        $resBusiness = CIBlockElement::GetList($this->arObjectOrder, $filter, $this->arObjectGroup, false, $this->arObjectSelect);

        $tmpObject = [];

        while ($objectDb = $resBusiness->Fetch()) {
            $tmpObject[$objectDb['ID']][] = $objectDb;
        }
//        dump($tmpObject);
//        die;
        foreach ($tmpObject as $id => $uniqueObject) {
            foreach ($uniqueObject as $double) {
                $object[$id]['ID'] = $id;
                $object[$id]['SUB_NAME'] = $double['PROPERTY_SUB_NAME_VALUE'];
                $object[$id]['NAME'] = $double['NAME'];
                $object[$id]['ACTIVE'] = $double['ACTIVE'];
                $object[$id]['DATE_ACTIVE_FROM'] = $double['DATE_ACTIVE_FROM'];
                $object[$id]['DATE_ACTIVE_TO'] = $double['DATE_ACTIVE_TO'];
                $object[$id]['QUOTE'] = $double['PROPERTY_QUOTE_VALUE'];
                $object[$id]['PREVIEW_TEXT'] = $double['PREVIEW_TEXT'];
                $object[$id]['DETAIL_TEXT'] = $double['DETAIL_TEXT'];
                $object[$id]['DETAIL_PICTURE'] = $double['DETAIL_PICTURE'];
                $object[$id]['PREVIEW_PICTURE'] = $double['PREVIEW_PICTURE'];
                $object[$id]['USER'] = $double['PROPERTY_USER_VALUE'];
                $object[$id]['STATUS'] =  ($double['PROPERTY_STATUS_VALUE'] == '1') ? 1 : 0;
                $object[$id]['SHOW_COUNTER'] = $double['SHOW_COUNTER'];
                $object[$id]['CNT_TODAY_SHOW'] = $double['PROPERTY_CNT_TODAY_SHOW_VALUE'];
                if (!in_array($double['PROPERTY_TYPE_VALUE'], $object[$id]['TYPE'])) {
                    $object[$id]['TYPE'][] = $double['PROPERTY_TYPE_VALUE'];
                }
                if (!in_array($double['PROPERTY_CATEGORY_VALUE'], $object[$id]['CATEGORY'])) {
                    $object[$id]['CATEGORY'][] = $double['PROPERTY_CATEGORY_VALUE'];
                }
                if (!in_array($double['PROPERTY_HASH_TAG_VALUE'], $object[$id]['HASH_TAG'])) {
                    $object[$id]['HASH_TAG'][] = $double['PROPERTY_HASH_TAG_VALUE'];
                }
            }
        }

        foreach ($object as $opinion) {
            $objects[] = new Opinion(
                $opinion['ID'],
                $opinion['ACTIVE'],
                $opinion['DATE_ACTIVE_FROM'],
                $opinion['DATE_ACTIVE_TO'],
                $opinion['NAME'],
                $opinion['SUB_NAME'],
                $opinion['QUOTE'],
                $opinion['PREVIEW_TEXT'],
                $opinion['DETAIL_TEXT'],
                $opinion['DETAIL_PICTURE'],
                $opinion['PREVIEW_PICTURE'],
                $opinion['USER'],
                $opinion['TYPE'],
                $opinion['CATEGORY'],
                $opinion['HASH_TAG'],
                $opinion['SHOW_COUNTER'],
                $opinion['CNT_TODAY_SHOW'],
                $opinion['STATUS']
            );
        }
        return $objects;
    }

    /**
     * @return array
     */
    public function getHashTags()
    {
        $object = [];

        $resBusiness = CIBlockElement::GetList($this->arObjectOrder, $this->arObjectFilter, $this->arObjectGroup, false, ['PROPERTY_HASH_TAG']);

        while ($objectDb = $resBusiness->Fetch()) {
            $object[] = $objectDb['PROPERTY_HASH_TAG_VALUE'];
        }
        return array_unique($object);
        return $object;
    }

    /**
     * @param $fields
     * @param $prop
     * @return bool|string
     */
    public function addObject($fields, $prop)
    {
        if (empty($fields['NAME'])) {
            return ['ERROR' => 'Нет заголовка для мнения!'];
        }
        if (empty($fields['PREVIEW_TEXT'])) {
            return ['ERROR' => 'Нет краткого описания!'];
        }
        if (empty($fields['DETAIL_TEXT'])) {
            return ['ERROR' => 'Нет подробного описания!'];
        }
        $el = new CIBlockElement;
        global $USER;
        $arLoadProductArray = Array(
            "MODIFIED_BY" => $USER->GetID(), // элемент изменен текущим пользователем
            "IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
            "IBLOCK_ID" => IB_OPINION,
            "PROPERTY_VALUES" => $prop,
            "NAME" => $fields['NAME'],
            "DATE_ACTIVE_FROM" => date("d.m.Y H:i:s"),
            "PREVIEW_TEXT" => $fields['PREVIEW_TEXT'],
            "PREVIEW_PICTURE" => $fields['PREVIEW_PICTURE'],
            "DETAIL_TEXT" => $fields['DETAIL_TEXT'],
            "DETAIL_PICTURE" => $fields['DETAIL_PICTURE'],
            "ACTIVE" => "Y",            // активен
        );

        if ($PRODUCT_ID = $el->Add($arLoadProductArray))
            return $PRODUCT_ID;
        else
            return $el->LAST_ERROR;
    }

    /**
     * @return array
     */
    public function getWidgetRecommends()
    {
        $user = new UserRepo();
        $be = $user->getExpertBusiness();
        $fre = $user->getExpertFranchise();

        $experts = array_merge($fre, $be);
        $idsEx = [];
        foreach ($experts as &$expert) {
            $id = $expert->getId();
            if ($expert instanceof User && in_array($id, $idsEx)) {
                unset($expert);
            } else {
                $rrr[] = $expert;
            }
            $idsEx[] = $id;
        }
        return $rrr;
    }

    /**
     * @return array
     */
    public function getWidget()
    {
        $objects = [];

        $filter = [
//            'ID' => '' // most new
        ];

        $filter = array_merge($filter, $this->arObjectFilter);

        $selectWidget = $this->arObjectSelect;
        unset($selectWidget[13]);
        unset($selectWidget[14]);
        unset($selectWidget[16]);

//        dump($selectWidget);
        $order = ['TIMESTAMP_X' => 'DESC'];
        $pagination = ['nPageCnt' => 1];

        $resBusiness = CIBlockElement::GetList($order, $filter, $this->arObjectGroup, $pagination, $selectWidget);

        while ($objectDb = $resBusiness->Fetch()) {
            $objects[] = $objectDb;
        }
//        dump(123);
        return $objects;
    }

    /**
     * @param $fields
     * @param $prop
     * @return mixed
     */
    public function editObject($fields, $prop)
    {
        $el = new CIBlockElement;

        global $USER;
//        dump($_REQUEST);
//        die;
        $arLoadProductArray = Array(
            "MODIFIED_BY" => $USER->GetID(), // элемент изменен текущим пользователем
            "IBLOCK_SECTION" => false,          // элемент лежит в корне раздела
            "PROPERTY_VALUES" => $prop,
            "NAME" => $fields['NAME'],

            "DATE_ACTIVE_FROM" => date("d.m.Y H:i:s"),
            "PREVIEW_TEXT" => $fields['PREVIEW_TEXT'],
            "PREVIEW_PICTURE" => ($_REQUEST['ACTION'] == 'REMOVE_PHOTO') ? array('del' => 'Y') : $fields['PREVIEW_PICTURE'],
            "DETAIL_TEXT" => $fields['DETAIL_TEXT'],
            "DETAIL_PICTURE" => (($_REQUEST['ACTION'] == 'REMOVE_PHOTO')) ? array('del' => 'Y') : $fields['DETAIL_PICTURE'],
            "ACTIVE" => "Y",            // активен

//            "DETAIL_PICTURE" => CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"]."/image.gif")
        );
        dump(($_REQUEST['ACTION'] == 'REMOVE_PHOTO') ? "321124" : $fields['PREVIEW_PICTURE']);
//        dump((($_REQUEST['ACTION']=='REMOVE_PHOTO')) ?  "" : $fields['DETAIL_PICTURE']);
//        die;

        $PRODUCT_ID = $fields['ID'];  // изменяем элемент с кодом (ID)
        return $el->Update($PRODUCT_ID, $arLoadProductArray);
    }
}