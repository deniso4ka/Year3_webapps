<?php
/**
 * Created by PhpStorm.
 * User: den
 * Date: 03/04/2016
 * Time: 16:33
 */

namespace Itb\Model;


/**
 * admin
 * Class Admin
 * @package Itb\model
 */
class Admin extends MyDatabaseTable
{
    /**
     * variable used to store id
     * @var int
     */
    private $id;
    /**
     * variable used to store name
     * @var
     */
    private $name;
    /**
     * variable used to store the image file
     * @var string
     */
    private $image;
    /**
     * function used to get an Id
     * @return int id
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * function used to set id
     * @param int
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    /**
     * function used to get name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * function sets the name
     * @param string
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    /**
     * function used to get Image
     * @return hi deniss this is David
     */
    public function getImage()
    {
        return $this->image;
    }
    /**
     * function used to set an image
     * @param string
     */
    public function setImage($image)
    {
        $this->image = $image;
    }
}
