<?php

require '../src/App/Autoloader.php';

if (isset($_POST) && sizeof($_POST) > 0) {
    $data = new \App\TopicData();
    $data->add($_POST);
    header('Location: /');
    exit;
}

$template = new \App\Template('../views/base.phtml');
$template->render('../views/index/add.phtml');
