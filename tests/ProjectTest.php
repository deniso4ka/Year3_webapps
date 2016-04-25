<?php
/**
 * Created by PhpStorm.
 * User: den
 * Date: 08/04/2016
 * Time: 16:02
 */

namespace ItbTest;

use Itb\Model\Project;

/**
 * Class ProjectTest
 * @package ItbTest
 */
class ProjectTest extends \PHPUnit_Framework_TestCase
{

    /**
     * testing getters and setters for id
     */
    public function testSetGetId()
    {
        // Arrange
        $project = new Project();
        $expectedResult = 11;
        $project->setId(11);

        // Act
        $result = $project->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    /**
     * testing getters and setters for name
     */
    public function testSetGetName()
    {
        // Arrange
        $project = new Project();
        $expectedResult = 'Project';
        $project->setName('Project');

        // Act
        $result = $project->getName();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    /**
     * testing getters and setters for supervisor
     */
    public function testSetGetSupervisor()
    {
        // Arrange
        $project = new Project();
        $expectedResult = 'Supervisor';
        $project->setSupervisor('Supervisor');

        // Act
        $result = $project->getSupervisor();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    /**
     * testing getters and setters for description
     */
    public function testSetGetDescription()
    {
        // Arrange
        $project = new Project();
        $expectedResult = 'Unity gaming project';
        $project->setDescription('Unity gaming project');

        // Act
        $result = $project->getDescription();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    /**
     * testing getters and setters for status
     */
    public function testSetGetStatus()
    {
        // Arrange
        $project = new Project();
        $expectedResult = 'student';
        $project->setStatus('student');

        // Act
        $result = $project->getStatus();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    /**
     * testing getters and setters for image
     */
    public function testSetGetImage()
    {
        // Arrange
        $project = new Project();
        $expectedResult = 'some.jpg';
        $project->setImage('some.jpg');

        // Act
        $result = $project->getImage();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
}
