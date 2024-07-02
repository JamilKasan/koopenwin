<?php

namespace App\Classes;

use function App\Console\Commands\convertToComparable;

class CodeValidation
{
    public string $start;
    public string $end;
    public string $code;

    public function validate() {
        // Check if the code matches the pattern: 4 digits followed by a letter
        if (!preg_match('/^\d{4}[A-Za-z]$/', $this->code)) {
            return false;
        }
        $codeValue = $this->convert($this->code);
        $startValue = $this->convert($this->start);
        $endValue = $this->convert($this->end);
        return $codeValue >= $startValue && $codeValue <= $endValue;
    }

    private function convert($code) {
        $digits = substr($code, 0, 4);
        $letter = substr($code, 4, 1);
        $letter = strtoupper($letter);
        return $digits . '_' . ord($letter);
    }
}
