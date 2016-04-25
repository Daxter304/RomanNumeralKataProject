<?php
// $rnc = new romanNumeralConverter();
// $numToConvert = readline("Enter an Arabic number: ");
// $romanNumeral = $rnc->convertToRoman($numToConvert);
// echo 'Roman Numeral: ' . $romanNumber;

class romanNumeralConverter {
  private $romanNumerals = [
    1000 => 'M',
    500 => 'D',
    100 => 'C',
    50 => 'L',
    10 => 'X',
    5 => 'V',
    1 => 'I'
  ];

  public function __construct() {
  }

  public function convertToRoman($arabicNumber) {
    $romanNumeral = "";

    while ($arabicNumber > 0) {
      foreach ($this->romanNumerals as $key => $value) {
        if ($arabicNumber >= $key) {
          $arabicNumber = $arabicNumber - $key;
          $romanNumeral .= $value;
          break;
        } else if ($arabicNumber <= 0) {
          break;
        }
      }
    }

    return $romanNumeral;
  }
}
?>
