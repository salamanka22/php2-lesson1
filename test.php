<?php
require_once 'autoload.php';
$s = \App\Test::instance();
$s->counter = 1;
var_dump($s);

$q = \App\Test::instance();
var_dump($q);

$e = \App\Test::instance();
var_dump($e);