<?php

namespace DiffDeterminant\Parsers;

use Symfony\Component\Yaml\Yaml;

function parse(string $file): array
{
    $extension = pathinfo($file, PATHINFO_EXTENSION);
    $content = file_get_contents($file);

    if ($extension === 'yaml' || $extension === 'yml') {
        return Yaml::parse($content);
    } else {
        return json_decode($content, true);
    }
}