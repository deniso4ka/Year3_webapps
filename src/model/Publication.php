<?php
/**
 * Created by PhpStorm.
 * User: den
 * Date: 22/03/2016
 * Time: 14:18
 */

namespace Itb\Model;

/**
 * publication
 * Class Publication
 * @package Itb\Model
 */
class Publication extends MyDatabaseTable
{
    /**
     * variable is used to hold id
     * @var int
     */
    private $id;
    /**
     * variable is used to hold title
     * @var string
     */
    private $title;
    /**
     * variable is used to hold autorId
     * @var int
     */
    private $authorId;
    /**
     * variable is used to hold url
     * @var string
     */
    private $url;
    /**
     * variable is used to hold  pdfPath
     * @var string
     */
    private $pdfPath;

    /**
     * function is used to get id
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * function is used to set id
     * @param int
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * function is used to get title
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * function is used to set title
     * @param string
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * function is used to get authorId
     * @return int
     */
    public function getAuthorId()
    {
        return $this->authorId;
    }

    /**
     * function is used to set authorId
     * @param int
     */
    public function setAuthorId($authorId)
    {
        $this->authorId = $authorId;
    }

    /**
     * function is used to get url
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * function is used to set url
     * @param string
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * function is used to get pdfPath
     * @return string
     */
    public function getPdfPath()
    {
        return $this->pdfPath;
    }

    /**
     * function is used to set pdfPath
     * @param string
     */
    public function setPdfPath($pdfPath)
    {
        $this->pdfPath = $pdfPath;
    }
}
