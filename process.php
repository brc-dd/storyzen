<?php
include_once("config.php");
header("Content-Type: application/json; charset=UTF-8");

$sql = mysqli_connect($config["MySQL_host"], $config["MySQL_user"], $config["MySQL_pass"], $config["MySQL_db"]);
if (mysqli_connect_errno()) {
  header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
  die("Failed to connect to MySQL: " . mysqli_connect_error());
}

if (!empty($_POST)) {

  $obj = json_decode($_POST["x"], false);

  $stmt = $sql->prepare("INSERT INTO stories (title, url_title, content) VALUES (?, ?, ?)");
  $title = $sql->real_escape_string($obj->title);
  $title = !empty($title) ? $title : "Untitled";

  $ut_recipe = strlen($title) > 30 ? substr($title, 0, 30) . "-" . date("m-d") : $title . "-" . date("m-d");

  $ut_result = $sql->query("SELECT url_title FROM stories WHERE url_title LIKE '" . $ut_recipe . "%'");
  if ($ut_result->num_rows > 0) {
    $url_title = strlen($title) > 30 ? substr($title, 0, 30) . "-" . date("m-d") . $ut_result->num_rows : $title . "-" . date("m-d") . "-" . $ut_result->num_rows;
  } else {
    $url_title = $ut_recipe;
  }

  $stmt->bind_param("sss", $title, $url_title, $obj->content);
  if ($stmt->execute()) {
    echo $url_title;
    die();
  }
  $stmt->close();
} else {
  echo "new";
  die();
}
mysqli_close($sql);
