<?php

namespace DiffDeterminant\DifferTest;

use PHPUnit\Framework\TestCase;

use function DiffDeterminant\Differ\genDiff;

class DifferTest extends TestCase
{
    public function testStylishFormat(): void
    {
        $file1 = __DIR__ . '/fixtures/file1.json';
        $file2 = __DIR__ . '/fixtures/file2.json';

        $expected = file_get_contents(__DIR__ . '/fixtures/expected_stylish.txt');
        $actual = genDiff($file1, $file2);

        $this->assertEquals($expected, $actual);
    }
}