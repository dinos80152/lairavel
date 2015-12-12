<?php

require_once '../src/App/Config.php';
\App\Config::setDirectory('../config');

$config = \App\Config::get('autoload');
require_once $config['class_path'].'/App/Autoloader.php';

use App\TopicData;

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo 'You did not pass in an ID.';
    exit;
}

$data = new TopicData();
$topic = $data->getTopic($_GET['id']);

if ($topic === false) {
    echo 'Topic not found!';
    exit;
}

if ($data->delete($_GET['id'])) {
    header('Location: /index.php');
    exit;
} else {
    echo 'An error occurred';
}
