<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/anon.png" type="image/x-icon">
    <title>Nagelstudio Chantal</title>
</head>
<body>
    <h1>Bling Bling Nagelstudio Chantal</h1>
    <form action="create.php" method="post">
        <p>Kies 4 basis kleuren voor uw nagels:</p>
        <label for="blue">color1:</label>
        <input type="color" name="blue" id="blue" value="#0000ff">
        <label for="pink">color2:</label>
        <input type="color" name="pink" id="pink" value="#ffc0cb">
        <label for="purple">color3:</label>
        <input type="color" name="purple" id="purple" value="#A020F0">
        <label for="red">color4:</label>
        <input type="color" name="red" id="red" value="#ff0000">
        <br>
        <label for="tel">Uw telefoonnummer:</label>
        <input type="tel" name="tel" id="tel" pattern=".{3,16}" placeholder="+31 6 30694820" required>
        <br>
        <label for="email">Uw e-mailadres:</label>
        <input type="email" name="email" id="email" placeholder="randomperson@example.com" required>
        <br>
        <label for="datum">Afspraak datum:</label>
        <input type="datetime-local" name="datum" id="datum" required>
        <br>
        <label for="nagelbijt">Nagelbijt arrangement (termijnbetaling mogelijk) €180</label>
        <input type="checkbox" name="nagelbijt" id="nagelbijt">
        <label for="luxemanicure">Luxe manicure (massage en handpakking) €30,00</label>
        <input type="checkbox" name="luxemanicure" id="luxemanicure">
        <label for="nagelreparatie">Nagelreparatie per nagel (in eerste week gratis) €5,00</label>
        <input type="checkbox" name="nagelreparatie" id="nagelreparatie">
            <input id="submit" type="submit" value="Sla op">
            <input id="reset" type="reset" value="reset">
            <input type="hidden" name="hidden" value="datetime-local">
        </fieldset>
    </form>
</body>
</html>