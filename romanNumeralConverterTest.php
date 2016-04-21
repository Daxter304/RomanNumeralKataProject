<?php
include_once("romanNumeralConverter.php");
class romanNumeralConverterTest extends PHPUnit_Framework_TestCase {
  private $romanNumeralConverter;

  function setUp() {
    $this->romanNumeralConverter = new romanNumeralConverter();
  }

  function testClassExists() {
    $this->assertNotNull($this->romanNumeralConverter);
  }

  function testReturnsNumber() {
    $expected = 1337;
    $actual = $this->romanNumeralConverter->convertToRoman($expected);

    $this->assertEquals($expected, $actual);
  }
}
?>
