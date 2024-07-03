<?php

namespace App\Classes;

use function App\Console\Commands\convertToComparable;

class CodeValidation
{
    public string $start;
    public string $end;
    public string $code;

    public function validate() {
        if (!preg_match('/^\d{4}[A-Za-z]$/', $this->code) ||
            !preg_match('/^\d{4}[A-Za-z]$/', $this->start) ||
            !preg_match('/^\d{4}[A-Za-z]$/', $this->end)) {
            return false;
        }
        $codeValue = $this->convert($this->code);
        $startValue = $this->convert($this->start);
        $endValue = $this->convert($this->end);
        return $codeValue >= $startValue && $codeValue <= $endValue;
    }

    private function convert($code) {
        $digits = substr($code, 0, 4);
        $letter = strtoupper(substr($code, 4, 1));
        return $digits . '_' . ord($letter);
    }
}
