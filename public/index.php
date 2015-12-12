<?php

require '../src/Suggestotron/Autoloader.php';

$data = new \App\TopicData();

$topics = $data->getAllTopics();

$template = new \App\Template('../views/base.phtml');
$template->render('../views/index/index.phtml', ['topics' => $topics]);
