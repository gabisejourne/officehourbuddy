<!DOCTYPE html>

<html>

    <head>

        <link href="/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="/css/styles.css" rel="stylesheet"/>
        <link href='http://fonts.googleapis.com/css?family=Rock+Salt' rel='stylesheet' type='text/css'>

        <?php if (isset($title)): ?>
            <title>Office Hour Buddy: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>Office Hour Buddy</title>
        <?php endif ?>

        <script src="/js/jquery-1.11.1.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/scripts.js"></script>

    </head>
    <body>
        <div class="container">
        
            <div id="top">
                <a href="/"><img alt="Office Hour Buddy" src="/img/logo.png"/></a>
            </div>

            <div id="middle">
