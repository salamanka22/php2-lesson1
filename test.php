<?php

class First
{
    public static $test = 1;
    public static function test()
    {
        echo static::$test;
    }
}
class Second extends First
{
    public static $test = 2;
}

//echo Second::$test;
Second::test();