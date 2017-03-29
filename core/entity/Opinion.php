<?php

/**
 * Created by PhpStorm.
 * User: alteraSPB74
 * Date: 25.01.2017
 * Time: 12:37
 */
class Opinion
{
    private $id = 0;
    private $active = '';
    private $activeFrom = '';
    private $activeTo = '';
    private $name = 0;
    private $subname = '';
    private $quote = '';
    private $previewText = '';
    private $detailText = '';
    private $detailPhoto = '';
    private $previewPhoto = '';
    private $author = 0;
    /* Attention added field not for constructor! */
    private $authorField = [];
    private $type = '';
    private $category = [];
    private $hashTag = [];
    private $cntAllShow = 0;
    private $cntTodayShow = 0;
    private $status = 0;

    /**
     * Opinion constructor.
     * @param int $id
     * @param string $active
     * @param string $activeFrom
     * @param string $activeTo
     * @param int $name
     * @param string $quote
     * @param string $previewText
     * @param string $detailText
     * @param string $detailPhoto
     * @param string $previewPhoto
     * @param int $author
     * @param string $type
     * @param array $category
     * @param array $hashTag
     * @param int $cntAllShow
     * @param int $cntTodayShow
     * @param int $status
     */
    public function __construct($id, $active, $activeFrom, $activeTo, $name, $subname,
                                $quote, $previewText, $detailText, $detailPhoto, $previewPhoto,
                                $author, $type, array $category, array $hashTag,
                                $cntAllShow, $cntTodayShow,$status)
    {
        $this->id = $id;
        $this->active = $active;
        $this->activeFrom = $activeFrom;
        $this->activeTo = $activeTo;
        $this->name = $name;
        $this->subname = $subname;
        $this->quote = $quote;
        $this->previewText = $previewText;
        $this->detailText = $detailText;
        $this->detailPhoto = $detailPhoto;
        $this->previewPhoto = $previewPhoto;
        $this->author = $author;
        $this->type = $type;
        $this->category = $category;
        $this->hashTag = $hashTag;
        $this->cntAllShow = $cntAllShow;
        $this->cntTodayShow = $cntTodayShow;
        $this->status = $status;
    }


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param string $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return string
     */
    public function getActiveFrom()
    {
        return $this->activeFrom;
    }

    /**
     * @param string $activeFrom
     */
    public function setActiveFrom($activeFrom)
    {
        $this->activeFrom = $activeFrom;
    }

    /**
     * @return string
     */
    public function getActiveTo()
    {
        return $this->activeTo;
    }

    /**
     * @param string $activeTo
     */
    public function setActiveTo($activeTo)
    {
        $this->activeTo = $activeTo;
    }

    /**
     * @return int
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param int $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSubname()
    {
        return $this->subname;
    }

    /**
     * @param string $subname
     */
    public function setSubname($subname)
    {
        $this->subname = $subname;
    }

    /**
     * @return string
     */
    public function getQuote()
    {
        return $this->quote;
    }

    /**
     * @param string $quote
     */
    public function setQuote($quote)
    {
        $this->quote = $quote;
    }

    /**
     * @return string
     */
    public function getPreviewText()
    {
        return $this->previewText;
    }

    /**
     * @param string $previewText
     */
    public function setPreviewText($previewText)
    {
        $this->previewText = $previewText;
    }

    /**
     * @return string
     */
    public function getDetailText()
    {
        return $this->detailText;
    }

    /**
     * @param string $detailText
     */
    public function setDetailText($detailText)
    {
        $this->detailText = $detailText;
    }

    /**
     * @return string
     */
    public function getDetailPhoto()
    {
        return CFile::GetPath($this->detailPhoto);
    }

    /**
     * @param string $detailPhoto
     */
    public function setDetailPhoto($detailPhoto)
    {
        $this->detailPhoto = $detailPhoto;
    }

    /**
     * @return string
     */
    public function getPreviewPhoto()
    {
        return CFile::GetPath($this->previewPhoto);
    }

    /**
     * @param string $previewPhoto
     */
    public function setPreviewPhoto($previewPhoto)
    {
        $this->previewPhoto = $previewPhoto;
    }

    /**
     * @return int
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param int $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return array
     */
    public function getAuthorField()
    {
        return $this->authorField;
    }

    /**
     * @param array $authorField
     */
    public function setAuthorField($authorField)
    {
        $this->authorField = $authorField;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return array
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param array $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return array
     */
    public function getHashTag()
    {
        return $this->hashTag;
    }

    /**
     * @param array $hashTag
     */
    public function setHashTag($hashTag)
    {
        $this->hashTag = $hashTag;
    }

    /**
     * @return int
     */
    public function getCntAllShow()
    {
        return $this->cntAllShow;
    }

    /**
     * @param int $cntAllShow
     */
    public function setCntAllShow($cntAllShow)
    {
        $this->cntAllShow = $cntAllShow;
    }

    /**
     * @return int
     */
    public function getCntTodayShow()
    {
        return $this->cntTodayShow;
    }

    /**
     * @param int $cntTodayShow
     */
    public function setCntTodayShow($cntTodayShow)
    {
        $this->cntTodayShow = $cntTodayShow;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
//        http://findesk.ru/opinion/detail.php?ID=1300
        return '/opinion/detail.php?ID=' . $this->getId();
    }

    public function getHashTagString()
    {
        return implode(",",$this->hashTag);
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }


}