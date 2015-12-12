<?php

require_once '../src/App/Config.php';
\App\Config::setDirectory('../config');

$config = \App\Config::get('autoload');
require_once $config['class_path'].'/App/Autoloader.php';

$data = new \App\TopicData();

$topics = $data->getAllTopics();

$template = new \App\Template('../views/base.phtml');
$template->render('../views/index/index.phtml', ['topics' => $topics]);
