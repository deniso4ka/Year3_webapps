<?php
namespace ItbTest;

use Itb\Model\Book;

class BookTest extends \PHPUnit_Framework_TestCase
{
    public function testCanCreateObject()
    {
        // Arrange
        $book = new Book(123);

        // Act

        // Assert
        $this->assertNotNull($book);
    }

    public function testGetIdAfterSetId()
    {
        // Arrange
        $book = new Book();
        $book->setId(123);
        $expectedResult = 123;

        // Act
        $result = $book->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }


}
