<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bearbeiten</title>
    <link rel="stylesheet" href="public/css/forms.css">
</head>
<body>
    <div id="form-container">
        <form id="form" action="/update" method="post">

            <input  type="hidden" name="id" value="<?=$id?>">

            <fieldset id="person-info">

                <div class="control">
                    <label class="labels" for="lastname">Nachname*</label> <br>
                    <input type="text" class="input is-normal text-inputs" id="lastname" name="lastname" value="<?= $ticket->lastname?>"><br><br>
                </div>


                <label class="labels" for="firstname">Vorname*</label><br>
                <input type="text" class="input is-normal text-inputs" id="firstname" name="firstname" value="<?= $ticket->firstname?>"><br><br>



                <label class="labels" for="email">Email*</label><br>
                <input class="input is-normal text-inputs" type="email" id="email" name="email" value="<?= $ticket->email?>"><br><br>

                <label class="labels" for="phone">Telefon</label><br>
                <input class="input is-normal text-inputs" type="tel" id="phone" name="phone" value="<?= $ticket->phone?>"><br><br>

            </fieldset>

            <fieldset>
                <label for="concert">Konzert*</label><br>
                <div class="select is-normal">
                    <select name="concert" id="concert" >
                        <option value="<?= $selectedConcert['id']?>"><?= $selectedConcert['artist']?></option>
                        <?php foreach ($restOfConcerts as $concert) :?>
                            <option value="<?= $concert['id']?>"><?= $concert['artist']?></option>
                        <?php endforeach;?>
                    </select>
                </div><br><br>


                <label>Treuerabatt</label> <br>
                <p><?=$ticket->discount?>%</p>
                <input type="hidden" id="discount-hidden" value="<?=$ticket->discount?>" name="discount"><br>

                <input type="checkbox" id="status" name="status" value="1" <?=( $ticket->status == 1) ? 'checked' : ''?>>
                <label for="status">Betrag erhalten</label><br><br>
            </fieldset>

            <div id="buttons">
                <button class="button" >
                    <a href="/pending" style="color: #363636">Abbrechen</a>
                </button>
                <input class="button" type="submit" value="Speichern">
            </div>

        </form>
    </div>

    <div id="error-container">
        <ul id="error-list">
            <?php if(isset($errors)) :?>
                <?php foreach ($errors as $error) :?>
                    <li><?=$error?></li>
            <?php endforeach; endif;?>
        </ul>
    </div>


    <script src="public/js/validation.js"></script>
</body>
</html>
