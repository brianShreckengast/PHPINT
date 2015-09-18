<?php

$value = 0;

echo "<pre>";

var_dump($value);

print_r($value);

$user = new stdClass();
$user->name = 'Brian';
$user->location = 'Austin';

print_r($user);

var_dump($user);

$assoc_user = (array) $user;

print_r($assoc_user);

var_dump($assoc_user);

?>