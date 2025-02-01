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

function formatCnpj($data)
{
    $data = preg_replace('/\D/', '', $data);
    $data = preg_replace('/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/', '$1.$2.$3/$4-$5', $data);
    return $data;
}

function formatContato($data)
{
    $data = preg_replace('/\D/', '', $data);
    $data = preg_replace('/(\d{2})(\d{5})(\d{4})/', '($1) $2 - $3', $data);
    return $data;
}
