<?php

namespace App\Services;

class StringValueService
{
    public function calculateMaxValue(string $stringT): int
    {
        $sizeT = strlen($stringT);
        $maxValue = 0;

        for ($sizeS = 1; $sizeS <= $sizeT; $sizeS++) {
            for ($pos = 0; $pos <= $sizeT - $sizeS; $pos++) {
                $substringS = substr($stringT, $pos, $sizeS);
                $occurrencesNumber = $this->countOcurrencesSubstring($stringT, $substringS);
                $value = $sizeS * $occurrencesNumber;
                if ($value > $maxValue) {
                    $maxValue = $value;
                }
            }
        }

        return $maxValue;
    }

    public function countOcurrencesSubstring($string, $substring) {
        $occurrences = 0;
        $pos = 0;
    
        while (($pos = strpos($string, $substring, $pos)) !== false) {
            $occurrences++;
            $pos++; 
        }
    
        return $occurrences;
    }
}
