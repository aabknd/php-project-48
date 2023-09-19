<?php

namespace DiffDeterminant\Differ;

use function DiffDeterminant\Parsers\parse;

function genDiff(string $file1, string $file2, string $format = 'stylish'): string
{
    $data1 = parse($file1);
    $data2 = parse($file2);

    $keys = array_unique(array_merge(array_keys($data1), array_keys($data2)));
    sort($keys);

    $diffsFile = array_map(function ($key) use ($data1, $data2) {
        if (!array_key_exists($key, $data1)) {
            return "  + {$key}: {$data2[$key]}";
        }
        if (!array_key_exists($key, $data2)) {
            return "  - {$key}: {$data1[$key]}";
        }
        if ($data1[$key] === $data2[$key]) {
            return "    {$key}: {$data1[$key]}";
        }
        return "  - {$key}: {$data1[$key]}\n  + {$key}: {$data2[$key]}";
    }, $keys);

    return "{\n" . implode("\n", $diffsFile) . "\n}";
}
