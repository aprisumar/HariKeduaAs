<?php

require_once('./vendor/autoload.php');
use lib\word;

$call = new word();

$a = 'ini ada ayam goyeng special ^_^ masuk sini';

print $call->find_badword($a)? 'not found':'found';

print "\n";