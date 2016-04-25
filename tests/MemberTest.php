<?php
/**
 * Created by PhpStorm.
 * User: den
 * Date: 08/04/2016
 * Time: 16:02
 */

namespace ItbTest;

use Itb\Model\Member;

/**
 * Class MemberTest
 * @package ItbTest
 */
class MemberTest extends \PHPUnit_Framework_TestCase
{

    /**
     * testing getters and setters for id
     */
    public function testSetGetId()
    {
        // Arrange
        $member = new Member();
        $expectedResult = 1;
        $member->setId(1);

        // Act
        $result = $member->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    /**
     * testing getters and setters for name
     */
    public function testSetGetName()
    {
        // Arrange
        $member = new Member();
        $expectedResult = 'Deniss';
        $member->setName('Deniss');

        // Act
        $result = $member->getName();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    /**
     * testing getters and setters for project id
     */
    public function testSetGetProjectId()
    {
        // Arrange
        $member = new Member();
        $expectedResult = 1;
        $member->setProjectId(1);

        // Act
        $result = $member->getProjectId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    /**
     * testing getters and setters for status
     */
    public function testSetGetStatus()
    {
        // Arrange
        $member = new Member();
        $expectedResult = 'admin';
        $member->setStatus('admin');

        // Act
        $result = $member->getStatus();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    /**
     * testing getters and setters for image
     */
    public function testSetGetImage()
    {
        // Arrange
        $member = new Member();
        $expectedResult = 'default.jpg';
        $member->setImage('default.jpg');

        // Act
        $result = $member->getImage();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
}
