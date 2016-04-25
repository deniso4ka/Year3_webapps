<?php
/**
 * Created by PhpStorm.
 * User: den
 * Date: 08/04/2016
 * Time: 16:03
 */

namespace ItbTest;

use Itb\Model\Publication;

/**
 * Class PublicationTest
 * @package ItbTest
 */
class PublicationTest extends \PHPUnit_Framework_TestCase
{

    /**
     * testing getters and setters for id
     */
    public function testSetGetId()
    {
        // Arrange
        $publication = new Publication();
        $expectedResult = 1;
        $publication->setId(1);

        // Act
        $result = $publication->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    /**
     * testing getters and setters for title
     */
    public function testSetGetTitle()
    {
        // Arrange
        $publication = new Publication();
        $expectedResult = 'Some Title';
        $publication->setTitle('Some Title');

        // Act
        $result = $publication->getTitle();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    /**
     * testing getters and setters for author id
     */
    public function testSetGetAuthorId()
    {
        // Arrange
        $publication = new Publication();
        $expectedResult = 10;
        $publication->setAuthorId(10);

        // Act
        $result = $publication->getAuthorId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    /**
     * testing getters and setters for url
     */
    public function testSetGetUrl()
    {
        // Arrange
        $publication = new Publication();
        $expectedResult = 'www.some.com';
        $publication->setUrl('www.some.com');

        // Act
        $result = $publication->getUrl();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    /**
     * testing getters and setters for pdf path
     */
    public function testSetGetPdfPath()
    {
        // Arrange
        $publication = new Publication();
        $expectedResult = 'http:\\image\file.php';
        $publication->setPdfPath('http:\\image\file.php');

        // Act
        $result = $publication->getPdfPath();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
}
