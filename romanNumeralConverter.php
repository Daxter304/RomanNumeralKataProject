<?php

class romanNumeralConverter {
  private $lastDigit = null;
  private $romanNumerals = [
    'M' => 1000,
    'D' => 500,
    'C' => 100,
    'L' => 50,
    'X' => 10,
    'V' => 5,
    'I' => 1
  ];

  private $romanPosition = [
      'M',
      'D',
      'C',
      'L',
      'X',
      'V',
      'I'
  ];

  public function convertToRoman($arabicNumber) {
    $romanNumeralsString = "";
    if ($arabicNumber > 4999 || $arabicNumber < 1) {
      throw new Exception("Numbers less than 1 and greater than 4999 aren't supported");
    }
    $arabicNumberArray = str_split($arabicNumber);
    $this->lastDigit = $arabicNumberArray[strlen($arabicNumber)-1];

    while ($arabicNumber > 0) {
      foreach ($this->romanNumerals as $key => $value) {
        if ($arabicNumber >= $value) {
          $arabicNumber -= $value;
          $romanNumeralsString .= $key;
          break;
        }
      }

      if (strlen($romanNumeralsString) >= 4) {
        $romanNumeralsString = $this->reverseRomanNumeral($romanNumeralsString);
      }
    }

    return $romanNumeralsString;
  }

  private function reverseRomanNumeral($romanNumeralsString) {
    $lastFourNumerals = str_split(substr($romanNumeralsString, -4, 4));

    $sameNumerals = true;
    foreach ($lastFourNumerals as $value) {
      if ($value !== $lastFourNumerals[0] || $value === 'M') {
        $sameNumerals = false;
        break;
      }
    }

    if ($sameNumerals === true) {
      $numeralsToReplace = substr($romanNumeralsString, -5, 5);
      if ($numeralsToReplace === 'VIIII') {
        $numeralsToAdd = 'IX';
      } else {
        $numeralsToReplace = substr($romanNumeralsString, -4, 4);
        if ($numeralsToReplace === "IIII") {
          $numeralsToAdd = 'IV';
        } else {
          $numeralsToReplace = substr($romanNumeralsString, -5, 5);
          $firstNumeralInInstance = substr($romanNumeralsString, -5, 1);
          $numeralPosition = array_search($firstNumeralInInstance, $this->romanPosition);
          if ($numeralPosition === 0) {
            $numeralsToReplace = substr($romanNumeralsString, -4, 4);
            $firstNumeralInInstance = substr($romanNumeralsString, -4, 1);
            $numeralPosition = array_search($firstNumeralInInstance, $this->romanPosition);
          }
          $numeralsToAdd = $lastFourNumerals[0] . $this->romanPosition[$numeralPosition-1];
        }
      }
      $romanNumeralsString = str_replace($numeralsToReplace, $numeralsToAdd, $romanNumeralsString);
    }

    return $romanNumeralsString;
  }
}
?>
