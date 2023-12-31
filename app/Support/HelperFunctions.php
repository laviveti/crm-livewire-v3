<?php

function obfuscate_email(?string $email = null): string
{
    if (! $email) {
        return '';
    }

    $split = explode('@', $email);

    if (count($split) !== 2) {
        return '';
    }

    $firstPart = $split[0];
    $qtd = (int) floor(strlen($firstPart) * 0.75);
    $remaining = strlen($firstPart) - $qtd;
    $maskedFirstPart = substr($firstPart, 0, $remaining).str_repeat('*', $qtd);

    $secondPart = $split[1];
    $qtd = (int) floor(strlen($secondPart) * 0.75);
    $remaining = strlen($secondPart) - $qtd;
    $maskedSecondPart = str_repeat('*', $qtd).substr($secondPart, $remaining * -1, $remaining);

    return $maskedFirstPart.'@'.$maskedSecondPart;
}
