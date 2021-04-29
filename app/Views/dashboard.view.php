<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./public/css/dashboard.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./public/css/global.css">
    <title>Dashboard</title>
</head>
<body>
    <?php require 'app/Views/nav.view.php'?>
    <h1>Dashboard</h1>
    <div>
        <div>
            <h2>Ausstehend</h2>
            <p>Es sind <?= $pendingCount ?> noch nicht gezahlte Tickets vorhanden</p>
        </div>
        <div>
            <h2>Abgelaufen</h2>
            <p>Es sind/ist <?= $expiredTickets ?> Abgelaufene Tickets vorhanden</p>
        </div>
        <div>
            <h2>Heute eingetragen</h2>
                <?php foreach ($ticketsOfToday as $ticket) : ?>
                    <div id="entry-container">
                        <p class="entry-content text"><?= $ticket['lastname'] . ' ' . $ticket['firstname'] ?></p>
                        <p><?= $ticket['email']?></p>
                        <?php if (!$ticket['phone'] == '') : ?>
                        <p><?= $ticket['phone']?></p>
                        <?php else: ?>
                        <p>Keine Telefonnummer eingetragen</p>
                        <?php endif; ?>
                        <?php foreach ($concerts as $concert) : ?>
                            <?php if ($concert['id'] == $ticket['concert']) : ?>
                                <p><?= $concert['artist']?></p>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
        </div>


    </div>


</body>
</html>