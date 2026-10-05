<?php
require __dir__ . "/config.php";
require __dir__ . "/helpers.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="refresh" content="300"><!-- re-check "now" every 5 min -->
  <title><?= e($event_name) ?></title>
  <link rel="stylesheet" href="/css/style.css">
  <script src="/js/htmlx.min.js"></script>
</head>

  <header>
    <h1><?= e($event_name) ?></h1>
  </header>
  <body>
    <main>
      <div class="spacer">
        <a class="btn" href="/zoom-rooms.php?day=1">Day 1</a>
      </div>
      <div class="spacer">
        <a class="btn" href="/zoom-rooms.php?day=2">Day 2</a>
      </div>
      <div class="spacer">
        <a class="btn" href="/zoom-rooms.php?day=3">Day 3</a>
      </div>
    </main>

  </body>
</html>
