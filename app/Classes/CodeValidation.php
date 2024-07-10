<?php

namespace App\Classes;

use function App\Console\Commands\convertToComparable;

class CodeValidation
{
    public string $start;
    public string $end;
    public string $code;

    public function validate() {
        return $this->code >= $this->start && $this->code <= $this->end;
    }

    private function convert($code) {
        $digits = substr($code, 0, 4);
        $letter = strtoupper(substr($code, 4, 1));
        return $digits . '_' . ord($letter);
    }
}
