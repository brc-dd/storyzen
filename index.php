<!doctype html>
<html>

<head>

    <!-- MISC/META -->
    <title> StoryZen ~ Just Start Publishing Stories! </title>
    <meta charset="utf-8">
    <meta name="description" content="StoryZen - A one-click publishing tool combined with a minimal editor.">

    <!-- CSS -->
    <link href="//fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/fonts.css" rel="stylesheet">

</head>

<body>

    <div class="text-options">
        <div class="options">
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
        <button class="publish" title="Publish your story">
            Publish
        </button>
    </div>

    <section>

        <header contenteditable="true" class="header"></header>
        <article contenteditable="true" class="content"></article>

    </section>

    <!-- LIBS -->
    <script src="js/libs/FileSaver.min.js"></script>
    <script src="js/libs/Blob.min.js"></script>
    <script src="js/libs/screenfull.min.js"></script>

    <!-- JS -->
    <script type="text/javascript">
        var viewing = false;
    </script>
    <script src="js/default.js"></script>
    <script src="js/utils.js"></script>
    <script src="js/editor.js"></script>
    <script src="js/ui.js"></script>
    <script type="text/javascript">
        // Initiate ZenPen
        ZenPen.editor.init();
        ZenPen.ui.init();
    </script>

</body>

</html>