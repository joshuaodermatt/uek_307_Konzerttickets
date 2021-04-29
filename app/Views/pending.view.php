<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/css/pending.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/global.css">
    <title>Ausstehend</title>
</head>
<body>
<?php require 'app/Views/nav.view.php'?>
<div id="content">
    <div class="section-separator">
        <div class="h-line"></div>
        <p style="width: fit-content">Abgelaufen</p>
        <div class="h-line"></div>
    </div>
    <?php foreach ($ticketsExpired as $ticket) : ?>
        <div id="entry-container">
            <p class="entry-content text"><?= $ticket['lastname'] . ' ' . $ticket['firstname'] ?></p>
            <?php
            $dateTimeStamp = strtotime($ticket['due']);
            ?>
            <div class="static-content">
                <p class="entry-content text"><?='Abgelaufen am ' . str_replace('-', ' ' , date('d-m-Y', $dateTimeStamp)) ?></p>
                <a href="/detail?id=<?=$ticket['id']?>">
                    <img class="icons" src="public/assets/search-outline.svg" alt="details" width="20px" height="20px">
                </a>
                <a href="/edit?id=<?=$ticket['id']?>">
                    <img class="icons" src="public/assets/create-outline.svg" alt="bearbeiten" width="20px" height="20px">
                </a>
                <p class="entry-content">⌛️</p>
            </div>

        </div>
    <?php endforeach;?>
    <div class="section-separator">
        <div class="h-line"></div>
        <p style="width: fit-content">Noch Ausstehend</p>
        <div class="h-line"></div>
    </div>

    <?php foreach ($ticketsNotExpired as $ticket) : ?>
        <div id="entry-container">
            <p class="entry-content text"><?= $ticket['lastname'] . ' ' . $ticket['firstname'] ?></p>
            <?php
            $dateTimeStamp = strtotime($ticket['due']);
            ?>
            <div class="static-content">
                <p class="entry-content text"><?='hat Zeit bis ' . str_replace('-', ' ' , date('d-m-Y', $dateTimeStamp)) ?></p>
                <a href="/detail?id=<?=$ticket['id']?>">
                    <img class="icons" src="public/assets/search-outline.svg" alt="details" width="20px" height="20px">
                </a>
                <a href="/edit?id=<?=$ticket['id']?>">
                    <img class="icons" src="public/assets/create-outline.svg" alt="bearbeiten" width="20px" height="20px">
                </a>
                <p class="entry-content">⏳️</p>
            </div>

        </div>
    <?php endforeach;?>
</div>

</body>
</html>
