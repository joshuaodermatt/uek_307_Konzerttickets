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
    <input type="text" id="lastName" name="lastName" value="<?= $lastname ?? '' ?>"><br>
    <label for="firstName">Vorname*</label><br>
    <input type="text" id="firstName" name="firstName" value="<?= $firstname ?? '' ?>"><br>
    <label for="email">Email*</label><br>
    <input type="email" id="email" name="email" value="<?= $email ?? '' ?>"><br>
    <label for="phone">Telefon</label><br>
    <input type="tel" id="phone" name="phone" value="<?= $phone ?? '' ?>"><br><br>
    <label for="concert">Konzert*</label><br>
    <select name="concert" id="concert">
        <?php if (isset($selectedConcert)) : ?>
            <option value="<?= $selectedConcert['id'] ?>"><?=$selectedConcert['artist']?></option>
        <?php endif; ?>
        <?php foreach ($allConcerts as $concert) : ?>
        <option value="<?= $concert['id']?>"><?= $concert['artist']?></option>
        <?php endforeach; ?>
    </select> <br><br>
    <label>Treuerabatt*</label> <br>

    <?php if (!isset($discount) || $discount === "0") : ?>
        <input type="radio" id="noDiscount" value="0" name="discount" checked>
    <?php else: ?>
        <input type="radio" id="noDiscount" value="0" name="discount">
    <?php endif; ?>
    <label for="noDiscount">Kein Rabatt</label><br>
    <?php if (isset($discount) && $discount === "5") : ?>
    <input type="radio" id="fivePercentDiscount" value="5" name="discount" checked>
    <?php else: ?>
        <input type="radio" id="fivePercentDiscount" value="5" name="discount">
    <?php endif; ?>
    <label for="fivePercentDiscount">5% Rabatt</label><br>
    <?php if (isset($discount) && $discount === "10") : ?>
    <input type="radio" id="tenPercentDiscount" value="10" name="discount" checked>
    <?php else: ?>
    <input type="radio" id="tenPercentDiscount" value="10" name="discount">
    <?php endif; ?>
    <label for="tenPercentDiscount">10% Rabatt</label><br>
    <?php if (isset($discount) && $discount === "15") : ?>
    <input type="radio" id="fifteenPercentDiscount" value="15" name="discount" checked>
    <?php else: ?>
    <input type="radio" id="fifteenPercentDiscount" value="15" name="discount">
    <?php endif; ?>
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