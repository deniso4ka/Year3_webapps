<?php
/**
 * Created by PhpStorm.
 * User: den
 * Date: 08/04/2016
 * Time: 16:03
 */

namespace ItbTest;

use Itb\Model\Student;

/**
 * Class StudentTest
 * @package ItbTest
 */
class StudentTest extends \PHPUnit_Framework_TestCase
{

    /**
     * testing getters and setters for id
     */
    public function testSetGetId()
    {
        // Arrange
        $student = new Student();
        $expectedResult = 1;
        $student->setId(1);

        // Act
        $result = $student->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    /**
     * testing getters and setters for name
     */
    public function testSetGetName()
    {
        // Arrange
        $student = new Student();
        $expectedResult = 'name';
        $student->setName('name');

        // Act
        $result = $student->getName();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    /**
     * testing getters and setters for project id
     */
    public function testSetGetProjectId()
    {
        // Arrange
        $student = new Student();
        $expectedResult = 111;
        $student->setProjectId(111);

        // Act
        $result = $student->getProjectId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    /**
     * testing getters and setters for member id
     */
    public function testSetGetMemberId()
    {
        // Arrange
        $student = new Student();
        $expectedResult = 222;
        $student->setMemberId(222);

        // Act
        $result = $student->getMemberId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    /**
     * testing getters and seters for status
     */
    public function testSetGetStatus()
    {
        // Arrange
        $student = new Student();
        $expectedResult = 'admin';
        $student->setStatus('admin');

        // Act
        $result = $student->getStatus();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    /**
     * testing getters and seters for image
     */
    public function testSetGetImage()
    {
        // Arrange
        $student = new Student();
        $expectedResult = 'image.jpg';
        $student->setImage('image.jpg');

        // Act
        $result = $student->getImage();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
}
