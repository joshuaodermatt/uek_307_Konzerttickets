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
    <form>
        <label for="lastName">Nachname*</label> <br>
        <input type="text" id="lastName" name="lastName" value="<?= $ticket->lastname?>"><br>

        <label for="firstName">Vorname*</label><br>
        <input type="text" id="firstName" name="firstName" value="<?= $ticket->firstname?>"><br>

        <label for="email">Email*</label><br>
        <input type="email" id="email" name="email" value="<?= $ticket->email?>"><br>

        <label for="phone">Telefon</label><br>
        <input type="tel" id="phone" name="phone" value="<?= $ticket->phone?>"><br><br>

        <label for="concert">Konzert*</label><br>
        <select name="concert" id="concert" >
            <option value="test">Test</option>
            <option value="test2">Test2</option>
        </select> <br><br>

        <label>Treuerabatt*</label> <br>
        <input type="radio" id="noDiscount" value="Kein Rabatt" name="discount" >

        <label for="noDiscount">Kein Rabatt</label><br>
        <input type="radio" id="fivePercentDiscount" value="5% Rabatt" name="discount">

        <label for="fivePercentDiscount">5% Rabatt</label><br>
        <input type="radio" id="tenPercentDiscount" value="10% Rabatt" name="discount">

        <label for="tenPercentDiscount">10% Rabatt</label><br>
        <input type="radio" id="fifteenPercentDiscount" value="15% Rabatt" name="discount">

        <label for="fifteenPercentDiscount">15% Rabatt</label><br><br>
        <input type="submit" value="Ticket erstellen">

        <input type="checkbox" id="status" name="status">
        <label for="status">Betrag erhalten</label>
    </form>
</body>
</html>
