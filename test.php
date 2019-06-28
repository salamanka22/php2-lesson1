<?php
require_once 'autoload.php';
$s = \App\Singleton::instance();
$s->counter = 1;
var_dump($s);

$p = \App\Singleton::instance();
var_dump($p);

$g = \App\Singleton::instance();
var_dump($g);