<?php
include_once("config.php");

$sql = mysqli_connect($config["MySQL_host"], $config["MySQL_user"], $config["MySQL_pass"], $config["MySQL_db"]);

if (mysqli_connect_errno()) {
  header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
  die("Failed to connect to MySQL: " . mysqli_connect_error());
}

if (!empty($_GET["url_title"])) {
  $url_title = $sql->real_escape_string(urldecode($_GET["url_title"]));
  $ut_result = $sql->query("SELECT url_title FROM stories WHERE url_title = '" . $url_title . "'");

  if ($ut_result->num_rows == 0) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found', true, 404);
    die();
  }

  $get_data = $sql->query("SELECT title, content, hits FROM stories WHERE url_title = '" . $url_title . "'")->fetch_assoc();

  $get_hits = $get_data["hits"] + 1;
  $sql->query("UPDATE stories SET hits = '" . strval($get_hits) . "' WHERE url_title = '" . $url_title . "'");
} else {
  header("Location: index.php");
  die();
}

$og_title = strlen($get_data["title"]) > 36 ? substr($get_data["title"], 0, 36) . " ..." : $get_data["title"];
$og_description = strlen($get_data["content"]) > 106 ? substr($get_data["content"], 0, 106) . " ..." : $get_data["content"];

mysqli_close($sql);
?>
<!doctype html>
<html>

<head>

  <!-- MISC/META -->
  <title><?php echo strip_tags($og_title); ?></title>
  <meta charset="utf-8">
  <meta name="description" content="<?php echo strip_tags($og_description); ?>">

  <!-- CSS -->
  <link href="//fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/fonts.css" rel="stylesheet">

</head>

<body>

  <div class="text-options">
    <div class="options" style="display: none">
      <span class="no-overflow">
        <span class="lengthen ui-inputs">
          <button class="url useicons">&#xe005;</button>
          <input class="url-input" type="text" placeholder="Type or Paste URL here" />
          <button class="bold">b</button>
          <button class="italic">i</button>
          <button class="quote">&rdquo;</button>
        </span>
      </span>
    </div>
  </div>

  <div class="buttons">
    <button class="publish" title="Publish your story" style="display: none">
      Publish
    </button>
  </div>

  <section>
    <header contenteditable="false" class="header"></header>
    <article contenteditable="false" class="content"></article>
  </section>

  <!-- LIBS -->
  <script src="js/libs/FileSaver.min.js"></script>
  <script src="js/libs/Blob.min.js"></script>
  <script src="js/libs/screenfull.min.js"></script>

  <!-- JS -->
  <script type="text/javascript">
    var defaultTitle = '<?php echo addslashes($get_data["title"]); ?>';
    var defaultContent = '<?php echo addslashes($get_data["content"]); ?>';
  </script>
  <script src="js/utils.js"></script>
  <script src="js/editor.js"></script>
  <script src="js/ui.js"></script>
  <script type="text/javascript">
    // Initiate ZenPen
    ZenPen.editor.init();
    ZenPen.ui.init();
  </script>
  <script type="text/javascript">
    let links = document.getElementsByTagName('a');
    for (let i = 0; i < links.length; i++) {
      links[i].target = '_blank';
    }
  </script>

</body>

</html>