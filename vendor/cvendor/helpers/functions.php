<?php

function debug($data, bool $die = false)
{
    echo sprintf('<pre>%s</pre>', print_r($data, 1));
    if ($die) {
        die;
    }
}


function formatString(string $initialString, string $format = 'PascalCase'): string
{
    $separators = ['-', '_', ' '];

    $separator = null;
    foreach ($separators as $sep) {
        if (strpos($initialString, $sep) !== false) {
            $separator = $sep;
            break;
        }
    }

    if ($separator === null) {
       return $initialString;
    }

    $parts = explode($separator, $initialString);

    $formattedParts = array_map('ucfirst', $parts);

    switch ($format) {
        case 'camelCase':
            $formattedParts[0] = lcfirst($formattedParts[0]);
            return implode('', $formattedParts);

        case 'PascalCase':
            return implode('', $formattedParts);

        case 'snake_case':
            return strtolower(implode('_', $parts));

        default:
            throw new InvalidArgumentException('Invalid format specified.');
    }
}

