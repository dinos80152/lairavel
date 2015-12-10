<?php
require 'TopicData.php';

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

if ($data->delete($_GET['id'])) {
    header("Location: /index.php");
    exit;
} else {
    echo "An error occurred";
}
?>

<?php
foreach ($topics as $topic) {
    echo "<h3>" .$topic['title']. " (ID: " .$topic['id']. ")</h3>";
    echo "<p>";
    echo nl2br($topic['description']);
    echo "</p>";
    echo "<p>";
    echo "<a href='/edit.php?id=" .$topic['id']. "'>Edit</a>";
    echo " | ";
    echo "<a href='/delete.php?id=" .$topic['id']. "'>Delete</a>";
    echo "</p>";
}
?>