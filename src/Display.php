<?php

namespace DiffDeterminant\Display;

use Docopt;

use function DiffDeterminant\Differ\genDiff;

function display()
{
    $doc = <<<DOC
    gendiff -h

    Generate diff

    Usage:
      gendiff (-h|--help)
      gendiff (-v|--version)
      gendiff [--format <fmt>] <firstFile> <secondFile>

    Options:
      -h --help                     Show this screen
      -v --version                  Show version
      --format <fmt>                Report format [default: stylish]
    DOC;

    $args = Docopt::handle($doc, array('version' => 'Gendiff'));

    $file1 = $args['<firstFile>'];
    $file2 = $args['<secondFile>'];
    $format = $args['--format'];

    $diff = genDiff($file1, $file2, $format);
    print_r($diff);
}
