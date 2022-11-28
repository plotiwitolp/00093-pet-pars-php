<?php

$config = [
    'db' => [
        'host' => '127.0.0.1',
        'name' => '00093-pet-pars-php',
        'user' => 'root',
        'password' => '',
        'charset' => 'utf-8',
    ],
];
$db = new PDO('mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'], $config['db']['user'], $config['db']['password']);


$sql = $db->query('SELECT * FROM links');

$db = null;
