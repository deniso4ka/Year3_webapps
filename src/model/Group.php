<?php
/**
 * Created by PhpStorm.
 * User: den
 * Date: 23/03/2016
 * Time: 15:32
 */

namespace Itb\Model;

/**
 * group
 * Class Group
 * @package Itb\Model
 */
class Group extends MyDatabaseTable
{
    /**
     * variable used to hold id
     * @var int
     */
    private $id;
    /**
     * variable used to hold name
     * @var string
     */
    private $name;
    /**
     * variable used to hold projectid
     * @var int
     */
    private $projectId;

    /**
     * function used to get Id
     * @return id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * function used to set Id
     * @param id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * function used to get Name
     * @return name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * function used to set Name
     * @param int
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * function used to get ProjectId
     * @return projectId
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * function used to set ProjectId
     * @param int
     */
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;
    }
}
