<?php

namespace DiffCalculator\Functions;

use Docopt;

function myFunction1()
{
  $doc = <<<'DOC'
  gendiff -h

  Generate diff
  
  Usage:
    gendiff (-h|--help)
    gendiff (-v|--version)
  
  Options:
    -h --help                     Show this screen
    -v --version                  Show version
DOC;

  $args = Docopt::handle($doc, array('version'=>'Gendiff'));
  foreach ($args as $k=>$v)
    echo $k.': '.json_encode($v).PHP_EOL;
}