<?php
class romanNumeralConverter {
  private $arabicNumber;

  public function __construct(){

  }

  public function convertToRoman($number) {
    $this->arabicNumber = $number;
    return $this->arabicNumber;
  }
}
?>
