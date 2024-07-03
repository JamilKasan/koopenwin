<?php

function removeCountryCode($input) {
    // Remove country code +597
    $pattern = '/(\+?597)/';
    $result = preg_replace($pattern, '', $input);

    $result = trim($result);

    return $result;
}

function ensureLastLetterUppercase($code) {
    // Check if the code matches the pattern: 4 digits followed by a letter
    if (preg_match('/^\d{4}[A-Za-z]$/', $code)) {
        // Extract the digits and the letter
        $digits = substr($code, 0, 4);
        $letter = strtoupper(substr($code, 4, 1));

        // Combine them back
        return $digits . $letter;
    } else {
        // If the format is incorrect, you can handle the error as needed
        // For this example, we will just return the original string
        return $code;
    }
}
