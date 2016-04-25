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

  function testReturnsOne() {
    $actual = $this->romanNumeralConverter->convertToRoman(1);

    $this->assertEquals($actual, 'I');
  }

  function testReturnsThree() {
    $actual = $this->romanNumeralConverter->convertToRoman(3);

    $this->assertEquals($actual, 'III');
  }

  function testReturnsNine() {
    $actual = $this->romanNumeralConverter->convertToRoman(9);

    $this->assertEquals($actual, 'IX');
  }

  function testReturnsOneZeroSixSix() {
    $actual = $this->romanNumeralConverter->convertToRoman(1066);

    $this->assertEquals($actual, 'MLXVI');
  }

  function testReturnsNineteenEightyNine() {
    $actual = $this->romanNumeralConverter->convertToRoman(1989);

    $this->assertEquals($actual, 'MCMLXXXIX');
  }
}
?>
