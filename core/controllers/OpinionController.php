<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

/**
 * Created by PhpStorm.
 * User: alteraSPB74
 * Date: 25.01.2017
 * Time: 13:32
 */
class OpinionController
{
    /**
     * @param array $opinions
     * @return array
     */
    private function mergeUserInfoAndOpinion($opinions)
    {
        $userRepo = new UserRepo();
        foreach ($opinions as &$opinion) {
            if ($opinion instanceof Opinion)
                $opinion->setAuthorField($userRepo->getUserById($opinion->getAuthor()));
        }
        return $opinions;
    }

    private function getOpitionIndexFilter()
    {
//        $filter = [];
        $filter = ['PROPERTY_STATUS'=>1 ]; //только те у которых указан статус показать
        $val = new ValidationController();
        $type = $val->eraseFields($_REQUEST['TYPE']);
        $search = $val->eraseFields($_REQUEST['SEARCH']);
        $hashTag = $val->eraseFields($_REQUEST['hashTag']);
//        dump($hashTag);
        if ($type) {
            $filter['PROPERTY_TYPE'] = $type;
        }
        if ($search) {
            $filter['NAME'] = '%' . $search . '%';
        }
        if ($hashTag) {
            $filter['PROPERTY_HASH_TAG'] = $hashTag;
        }
        return $filter;
    }

    /**
     * @return array
     */
    public function IndexAction()
    {
        $opinionRepo = new OpinionRepo();
        return $this->mergeUserInfoAndOpinion(
            $opinionRepo->getAllObject('', $this->getOpitionIndexFilter()));
    }

    /**
     * @return array
     */
    public function DetailAction()
    {
        $opinionRepo = new OpinionRepo();
        $val = new ValidationController();
        $id = $val->eraseFields($_REQUEST['ID']);

        if (!is_numeric($id)) {
            return [];
        }
        return $this->mergeUserInfoAndOpinion($opinionRepo->getObjectById($id));
    }

    /**
     *
     */
    public function FilterAction()
    {
        $opinionRepo = new OpinionRepo();
        $filter['HASH_TAG'] = $opinionRepo->getHashTags();
        return $filter;
    }

    private function prepareFields()
    {
        $fields = [];
        $val = new ValidationController();

        $id = $val->eraseFields($_REQUEST['ID']);

        $name = $val->eraseFields($_REQUEST['NAME']);
        $previewPhoto = $_FILES['PICTURE'];
        $detailPhoto = $_FILES['PICTURE'];

        $previewText = $val->eraseFields($_REQUEST['PREVIEW_TEXT']);
        $detailText = $val->eraseFields($_REQUEST['DETAIL_TEXT']);

        $fields['ID'] = $id;

        $fields['NAME'] = $name;
        $fields['PREVIEW_PICTURE'] = $previewPhoto;
        $fields['DETAIL_PICTURE'] = $detailPhoto;

        $fields['PREVIEW_TEXT'] = $previewText;
        $fields['DETAIL_TEXT'] = $detailText;

        return $fields;
    }

    private function prepareProperties()
    {
        $properties = [];

        $val = new ValidationController();

        $type = $val->eraseFields($_REQUEST['TYPE']);
        $subName = $val->eraseFields($_REQUEST['SUB_NAME']);
        $quote = $val->eraseFields($_REQUEST['QUOTE']);
        $hashTags = $val->eraseFields($_REQUEST['HASH_TAGS']);
        $tmpHashTag = explode(',',$hashTags);
        $hashTag = [];
        foreach ($tmpHashTag as $tmp){
            $hashTag[] = trim($tmp);
        }

        global $USER;
        $properties['USER'] = $USER->GetID();//$type;
        $properties['TYPE'] = $type;//$type;
        $properties['SUB_NAME'] = $subName;
        $properties['QUOTE'] = $quote;
        $properties['HASH_TAG'] = $hashTag;

//        dump($properties);
//        die;
        return $properties;
    }

    public function AddAction()
    {
        $opinionRepo = new OpinionRepo();
        if ($_REQUEST['ADD_OPINION'] == 1) {
            return $opinionRepo->addObject($this->prepareFields(), $this->prepareProperties());
        }
    }

    /**
     * @return mixed
     */
    public function WidgetAction($type)
    {
        if ($type == 'recommends') {
            $opinionRepo = new OpinionRepo();
            return $opinionRepo->getWidgetRecommends();
        } else {
            $opinionRepo = new OpinionRepo();
            return $opinionRepo->getWidget();
        }
    }

    /**
     * @return bool
     */
    public function EditAction()
    {
        $opinionRepo = new OpinionRepo();
        if ($_REQUEST['EDIT_OPINION'] == 1) {
            return $opinionRepo->editObject($this->prepareFields(), $this->prepareProperties());;
        }
        return false;
    }
}