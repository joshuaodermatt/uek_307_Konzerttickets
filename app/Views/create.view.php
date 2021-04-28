<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticketverkauf erstellen</title>
</head>
<body>
<form action="/add" method="POST">
    <label for="lastName">Nachname*</label> <br>
    <input type="text" id="lastName" name="lastName"><br>
    <label for="firstName">Vorname*</label><br>
    <input type="text" id="firstName" name="firstName"><br>
    <label for="email">Email*</label><br>
    <input type="email" id="email" name="email"><br>
    <label for="phone">Telefon</label><br>
    <input type="tel" id="phone" name="phone"><br><br>
    <label for="concert">Konzert*</label><br>
    <select name="concert" id="concert">
        <?php foreach ($result as $concert) : ?>
        <option value="<?= $concert['id']?>"><?= $concert['artist']?></option>
        <?php endforeach; ?>
    </select> <br><br>
    <label>Treuerabatt*</label> <br>

    <input type="radio" id="noDiscount" value="0" name="discount" checked>
    <label for="noDiscount">Kein Rabatt</label><br>
    <input type="radio" id="fivePercentDiscount" value="5" name="discount">
    <label for="fivePercentDiscount">5% Rabatt</label><br>
    <input type="radio" id="tenPercentDiscount" value="10" name="discount">
    <label for="tenPercentDiscount">10% Rabatt</label><br>
    <input type="radio" id="fifteenPercentDiscount" value="15" name="discount">
    <label for="fifteenPercentDiscount">15% Rabatt</label><br><br>

    <input type="submit" value="Ticket erstellen">
</form>
<ul>
    <?php if (isset($errors)) :?>
    <?php foreach ($errors as $error) : ?>
    <li><?= $error ?></li>
    <?php endforeach; ?>
    <?php endif; ?>
</ul>

</body>
</html>