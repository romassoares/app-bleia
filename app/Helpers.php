<?php

function toCurrency($value)
{
    $value = preg_replace('/[^0-9,.-]/', '', $value);

    if (strpos($value, ',') !== false && strpos($value, '.') === false) {
        $value = str_replace(',', '.', $value);
    }

    if (!is_numeric($value)) {
        return "R$ 0,00";
    }

    return "R$ " . number_format(floatval($value), 2, ',', '.');
}
