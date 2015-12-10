<?php
require '../src/App/TopicData.php';
require '../src/App/Template.php';

$data = new \App\TopicData();

$topics = $data->getAllTopics();

$template = new \App\Template("../views/base.phtml");
$template->render("../views/index/index.phtml", ['topics' => $topics]);