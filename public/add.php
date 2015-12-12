<?php

require_once '../src/App/Config.php';
\App\Config::setDirectory('../config');

$config = \App\Config::get('autoload');
require_once $config['class_path'].'/App/Autoloader.php';

if (isset($_POST) && sizeof($_POST) > 0) {
    $data = new \App\TopicData();
    $data->add($_POST);
    header('Location: /');
    exit;
}

$template = new \App\Template('../views/base.phtml');
$template->render('../views/index/add.phtml');
