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
    <title>Detail</title>
</head>
<body>
    <?php require 'app/Views/nav.view.php'?>
    <div>
        <h2><?= $ticket->lastname . ' ' . $ticket->firstname ?></h2>
        <p>Email: <?= $ticket->email ?></p>
        <?php if (!$ticket->phone == '') : ?>
            <p>Telefon: <?= $ticket->phone ?></p>
        <?php endif; ?>
            <p>Konzert: <?= $concert ?></p>
            <p>Rabatt: <?= $ticket->discount ?>%</p>
        <?php if ($ticket->status === false) : ?>
            <p>Status: Nicht bezahlt</p>
        <?php else: ?>
            <p>Status: bezahlt</p>
        <?php endif; ?>
        <?php $dateTimeStamp = strtotime($ticket->created); ?>
            <p>Erstellt am: <?= str_replace('-', '.' , date('d-m-Y', $dateTimeStamp)) ?></p>
        <?php $dateTimeStamp = strtotime($ticket->due); ?>
            <p>Zahlungsfrist: <?= str_replace('-', '.' , date('d-m-Y', $dateTimeStamp)) ?></p>
    </div>



</body>
</html>
