<?php
/**
 * Created by PhpStorm.
 * User: den
 * Date: 22/03/2016
 * Time: 21:40
 */

namespace Itb\Model;

/**
 * project
 * Class Project
 * @package Itb\Model
 */
class Project extends MyDatabaseTable
{
    /**
     * variable is used to hold an id
     * @var int
     */
    private $id;
    /**
     * variable is used to hold the name
     * @var string
     */
    private $name;
    /**
     *variable is used to hold the supervisor
     * @var string
     */
    private $supervisor;
    /**
     * variable is used to hold description
     * @var string
     */
    private $description;
    /**
     * variable is used to hold status
     * @var string
     */
    private $status;
    /**
     * variable is used to hold image
     * @var string
     */
    private $image;



    /**
     * function used to get id
     * @return int
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
     * function used to set name
     * @param string
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * function is used to get supervisor
     * @return string
     */
    public function getSupervisor()
    {
        return $this->supervisor;
    }

    /**
     * function is used to set supervisor
     * @param string
     */
    public function setSupervisor($supervisor)
    {
        $this->supervisor = $supervisor;
    }

    /**
     * function is used to get description
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * function is used to set description
     * @param string
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * function is used to get status
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * function is used to set status
     * @param string
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * function is used to get image
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * function is used to set image
     * @param string
     */
    public function setImage($image)
    {
        $this->image = $image;
    }
}
