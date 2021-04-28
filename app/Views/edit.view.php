<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/update" method="post">

        <input type="hidden" name="id" value="<?=$id?>">

        <label for="lastName">Nachname*</label> <br>
        <input type="text" id="lastName" name="lastname" value="<?= $ticket->lastname?>"><br>

        <label for="firstName">Vorname*</label><br>
        <input type="text" id="firstName" name="firstname" value="<?= $ticket->firstname?>"><br>

        <label for="email">Email*</label><br>
        <input type="email" id="email" name="email" value="<?= $ticket->email?>"><br>

        <label for="phone">Telefon</label><br>
        <input type="tel" id="phone" name="phone" value="<?= $ticket->phone?>"><br><br>

        <label for="concert">Konzert*</label><br>
        <select name="concert" id="concert" >
            <option value="<?= $selectedConcert['id']?>"><?= $selectedConcert['artist']?></option>
            <?php foreach ($restOfConcerts as $concert) :?>
                <option value="<?= $concert['id']?>"><?= $concert['artist']?></option>
            <?php endforeach;?>
        </select> <br><br>

        <label>Treuerabatt</label> <br>
        <p><?=$ticket->discount?>%</p>
        <input type="hidden" id="discount-hidden" value="<?=$ticket->discount?>" name="discount">

        <input type="checkbox" id="status" name="status" value="1" <?=( $ticket->status == 1) ? 'checked' : ''?>>
        <label for="status">Betrag erhalten</label>

        <input type="submit" value="save">
    </form>

    <ul>
        <?php if(isset($errors)) :?>
            <?php foreach ($errors as $error) :?>
                <li><?=$error?></li>
        <?php endforeach; endif;?>
    </ul>
</body>
</html>
