<?php

namespace DiffDeterminant\DisplayHelp;

use Docopt;

function display()
{
  $doc = <<<'DOC'
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

  $args = Docopt::handle($doc, array('version'=>'Gendiff'));
  foreach ($args as $k=>$v)
    echo $k.': '.json_encode($v).PHP_EOL;
}