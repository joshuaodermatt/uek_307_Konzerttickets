<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/global.css">
    <link rel="stylesheet" href="public/css/detail.css">
    <title>Detail</title>
</head>
<body>
    <?php require 'app/Views/nav.view.php'?>
    <div id="detail-content">
        <h3 id="title"><?= $ticket->lastname . ' ' . $ticket->firstname ?></h3>
        <div id="information-container">
            <div class="box">
                <h2 class="sub-headers">Email</h2>
                <p id="email"><?= $ticket->email ?></p>
            </div>
            <?php if (!$ticket->phone == '') : ?>
            <div class="box">
                <h2 class="sub-headers">Telefon:</h2>
                <p id="phone"><?= $ticket->phone ?></p>
            </div>
            <?php endif; ?>
            <div class="box">
                <h2 class="sub-headers">Konzert</h2>
                <p id="concert"><?= $concert ?></p>
            </div>
            <div class="box">
                <h2 class="sub-headers">Rabatt</h2>
                <p id="discount">Rabatt: <?= $ticket->discount ?>%</p>
            </div>
            <div class="box">
                <h2 class="sub-headers">Status</h2>

                <?php if ($ticket->status === false) : ?>
                    <p id="status">Status: Nicht bezahlt</p>
                <?php else: ?>
                    <p>Status: bezahlt</p>
                <?php endif;?>

            </div>
            <div class="box">
                <h2 class="sub-headers">Erstell / Auslaufdatum</h2>
                <div id="dates">
                    <?php $dateTimeStamp = strtotime($ticket->created); ?>
                    <p id="creation-date">Erstellt am: <?= str_replace('-', '.' , date('d-m-Y', $dateTimeStamp)) ?></p>
                    <?php $dateTimeStamp = strtotime($ticket->due); ?>
                    <p id="expiration-date">Zahlungsfrist: <?= str_replace('-', '.' , date('d-m-Y', $dateTimeStamp)) ?></p>
                </div>
            </div>
        </div>
        <button id="button"><a id="link" href="pending">Zurück</a></button>
    </div>



</body>
</html>
