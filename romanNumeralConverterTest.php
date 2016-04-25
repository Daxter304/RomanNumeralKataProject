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

  function testConvertsOne() {
    $actual = $this->romanNumeralConverter->convertToRoman(1);

    $this->assertEquals('I', $actual);
  }

  function testConvertsThree() {
    $actual = $this->romanNumeralConverter->convertToRoman(3);

    $this->assertEquals('III', $actual);
  }

  function testConvertsNine() {
    $actual = $this->romanNumeralConverter->convertToRoman(9);

    $this->assertEquals('IX', $actual);
  }

  function testConvertsOneZeroSixSix() {
    $actual = $this->romanNumeralConverter->convertToRoman(1066);

    $this->assertEquals('MLXVI', $actual);
  }

  function testConvertsNineteenEightyNine() {
    $actual = $this->romanNumeralConverter->convertToRoman(1989);

    $this->assertEquals('MCMLXXXIX', $actual);
  }

  function testConvertsThreeThousandFourtyNine() {
    $actual = $this->romanNumeralConverter->convertToRoman(3049);

    $this->assertEquals('MMMXLIX', $actual);
  }

  function testConvertsFourThousandNinetyNine() {
    $actual = $this->romanNumeralConverter->convertToRoman(4999);

    $this->assertEquals('MMMMCMXCIX', $actual);
  }
}
?>
