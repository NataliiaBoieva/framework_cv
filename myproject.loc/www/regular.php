<?php

$pattern = '/care/';
$string = 'careless';

preg_match($pattern, $string, $matches);
var_dump($matches);
