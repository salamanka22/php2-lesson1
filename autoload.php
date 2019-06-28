<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 25.06.2019
 * Time: 21:39
 */
function my_autoload ($class)
{
    require __DIR__.'/'.$class.'.php';
}
spl_autoload_register('my_autoload');