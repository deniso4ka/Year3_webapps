<?php
namespace ItbTest;

use Itb\Model\User;

/**
 * Class UserTest
 * @package ItbTest
 */

class UserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * testing getters and seters for id
     */
    public function testSetGetId()
    {
        // Arrange
        $user = new User();
        $expectedResult = 1;
        $user->SetId(1);

        // Act
        $result = $user->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    /**
     * testing getters and seters for rank
     */
    public function testSetGetRank()
    {
        // Arrange
        $user = new User();
        $expectedResult ='Test';
        $user->SetRank('Test');

        // Act
        $result = $user->getRank();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    /**
     * testing getters and seters for student id
     */
    public function testSetGetStudentId()
    {
        // Arrange
        $user = new User();
        $expectedResult = 1;
        $user->SetStudentId(1);

        // Act
        $result = $user->getStudentId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    /**
     * testing getters and seters for member id
     */
    public function testSetGetMemberId()
    {
        // Arrange
        $user = new User();
        $expectedResult = 10;
        $user->SetMemberId(10);

        // Act
        $result = $user->getMemberId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    /**
     * testing getters and seters for password
     */
    public function testSetGetPassword()
    {
        // Arrange
        $user = new User();
        $expectedResult = 'password';
        $user->SetPassword('password');

        // Act
        $result = $user->getPassword();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
}
