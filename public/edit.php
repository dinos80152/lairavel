<?php
require '../src/App/TopicData.php';
require '../src/App/Template.php';

use App\TopicData;
use App\Template;

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $data = new TopicData();
    if ($data->update($_POST)) {
        header("Location: /index.php");
        exit;
    } else {
        echo "An error occurred";
        exit;
    }
}

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "You did not pass in an ID.";
    exit;
}

$data = new TopicData();
$topic = $data->getTopic($_GET['id']);

if ($topic === false) {
    echo "Topic not found!";
    exit;
}

$template = new Template("../views/base.phtml");
$template->render("../views/index/edit.phtml", ['topic' => $topic]);