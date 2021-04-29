<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/css/forms.css">
    <title>Ticketverkauf erstellen</title>
</head>
<body>
<div id="form-container">
    <form id="form" action="/add" method="POST">
        <fieldset>
            <label for="lastname">Nachname*</label> <br>
            <input class="input is-normal" type="text" id="lastname" name="lastname" value="<?= $lastname ?? '' ?>"><br><br>

            <label for="firstname">Vorname*</label><br>
            <input class="input is-normal" type="text" id="firstname" name="firstname" value="<?= $firstname ?? '' ?>"><br><br>

            <label for="email">Email*</label><br>
            <input class="input is-normal" type="email" id="email" name="email" value="<?= $email ?? '' ?>"><br><br>

            <label for="phone">Telefon</label><br>
            <input class="input is-normal" type="tel" id="phone" name="phone" value="<?= $phone ?? '' ?>"><br><br>
        </fieldset>

        <fieldset>
            <label for="concert">Konzert*</label><br>
            <div class="select">
                <select name="concert" id="concert">
                    <?php if (isset($selectedConcert)) : ?>
                        <option value="<?= $selectedConcert['id'] ?>"><?=$selectedConcert['artist']?></option>
                    <?php endif; ?>
                    <?php foreach ($allConcerts as $concert) : ?>
                        <option value="<?= $concert['id']?>"><?= $concert['artist']?></option>
                    <?php endforeach; ?>
                </select>
            </div><br><br>


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
        </fieldset>




        <div id="buttons">
            <button class="button" >
                <a href="/dashboard" style="color: #363636">Abbrechen</a>
            </button>
            <input class="button" type="submit" value="Erstellen">
        </div>
    </form>
</div>

<div id="error-container">
    <ul id="error-list">
        <?php if (isset($errors)) :?>
            <?php foreach ($errors as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</div>

<script src="public/js/validation.js"></script>

</body>
</html>