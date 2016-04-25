<?php

class romanNumeralConverter {
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

    $oneLess = true;
    foreach ($lastFourNumerals as $value) {
      if ($value !== $lastFourNumerals[0]) {
        $oneLess = false;
        break;
      }
    }

    if ($oneLess === true) {
      $firstNumeralInInstance = substr($romanNumeralsString, -5, 1);
      $pos = array_search($firstNumeralInInstance, $this->romanPosition);

      if ($pos > 0) {
        $romanNumeralsString = $this->replaceString($romanNumeralsString, -5, 5, $lastFourNumerals, $pos);
      } else {
        $firstNumeralInInstance = substr($romanNumeralsString, -4, 1);
        $pos = array_search($firstNumeralInInstance, $this->romanPosition);
        if ($pos > 0) {
          $romanNumeralsString = $this->replaceString($romanNumeralsString, -4, 4, $lastFourNumerals, $pos);
        }
      }
    }

    return $romanNumeralsString;
  }

  private function replaceString($romanNumeralsString, $beginningString, $stringLength, $lastFourNumerals, $pos) {
    $numeralsToReplace = substr($romanNumeralsString, $beginningString, $stringLength);
    $numeralsToAdd = $lastFourNumerals[0] . $this->romanPosition[$pos-1];
    return str_replace($numeralsToReplace, $numeralsToAdd, $romanNumeralsString);
  }
}
?>
