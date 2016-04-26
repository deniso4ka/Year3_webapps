<?php
/**
 * Created by PhpStorm.
 * User: den
 * Date: 23/03/2016
 * Time: 21:20
 */

namespace Itb\Model;

/**
 * user
 * Class User
 * @package Itb\Model
 */
class User extends MyDatabaseTable
{
    /**
     * variable is used to hold id
     * @var int
     */
    private $id;
    /**
     * variable is used to hold rank
     * @var string
     */
    private $rank;
    /**
     * variable is used to hold student id
     * @var string
     */
    private $studentId;
    /**
     * variable is used to hold member id
     * @var int
     */
    private $memberId;
    /**
     * variable is used to hold password
     * @var string
     */
    private $password;
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
     * function is used to get rank
     * @return string
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * function is used to set rank
     * @param string
     */
    public function setRank($rank)
    {
        $this->rank = $rank;
    }


    /**
     * function is used to get password
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }


    /**
     * function is used to set password
     * @param string
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * function is used to get student id
     * @return int
     */
    public function getStudentId()
    {
        return $this->studentId;
    }

    /**
     * function is used to set student id
     * @param int
     */
    public function setStudentId($studentId)
    {
        $this->studentId = $studentId;
    }

    /**
     * function is used to get member id
     * @return int
     */
    public function getMemberId()
    {
        return $this->memberId;
    }

    /**
     * function is used to set member id
     * @param int
     */
    public function setMemberId($memberId)
    {
        $this->memberId = $memberId;
    }
}
