<?php
/**
 * Created by PhpStorm.
 * User: den
 * Date: 08/04/2016
 * Time: 16:01
 */

namespace ItbTest;

use Itb\Model\Group;

/**
 * Class GroupTest
 * @package ItbTest
 */
class GroupTest extends \PHPUnit_Framework_TestCase
{
    /**
     * testing getters and setters for id
     */
    public function testSetGetId()
    {
        // Arrange
        $admin = new Group();
        $expectedResult = 100;
        $admin->setId(100);

        // Act
        $result = $admin->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    /**
     * testing getters and setters for name
     */
    public function testSetGetName()
    {
        // Arrange
        $group = new Group();
        $expectedResult = 'deniss';
        $group->setName('deniss');

        // Act
        $result = $group->getName();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    /**
     * testing getters and setters for project id
     */
    public function testSetGetProjectId()
    {
        // Arrange
        $group = new Group();
        $expectedResult = 80;
        $group->setProjectId(80);

        // Act
        $result = $group->getProjectId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
}
