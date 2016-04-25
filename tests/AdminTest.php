<?php
/**
 * Created by PhpStorm.
 * User: den
 * Date: 08/04/2016
 * Time: 15:52
 */

namespace ItbTest;

use Itb\Model\Admin;

/**
 * Class AdminTest
 * @package ItbTest
 */
class AdminTest extends \PHPUnit_Framework_TestCase
{

    /**
     * testing getters and setters for id
     */
    public function testSetGetId()
    {
        // Arrange
    $admin = new Admin();
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
        $admin = new Admin();
        $expectedResult ='Boris';
        $admin->setName('Boris');

        // Act
        $result = $admin->getName();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    /**
     * testing getters and setters for image
     */
    public function testSetGetImage()
    {
        // Arrange
    $admin = new Admin();
        $expectedResult = 'default.jpg';
        $admin->setImage('default.jpg');

    // Act
    $result = $admin->getImage();

    // Assert
    $this->assertEquals($expectedResult, $result);
    }
}
