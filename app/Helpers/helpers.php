<?php

function removeCountryCode($input) {
    // Remove country code +597
    $pattern = '/(\+?597)/';
    $result = preg_replace($pattern, '', $input);

    $result = trim($result);

    return $result;
}
