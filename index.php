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
        <input type="color" name="blue" id="blue" value="#0000ff">
        <input type="color" name="pink" id="pink" value="#ffc0cb">
        <input type="color" name="purple" id="purple" value="#A020F0">
        <input type="color" name="red" id="red" value="#ff0000">
        <br>
        <p>Uw telefoonnummer:</p>
        <input type="tel" name="tel" id="tel" pattern="nl" placeholder="+31 6 30694820" required>
        <br>
        <p>Uw e-mailadres:</p>
        <input type="email" name="email" id="email" placeholder="randomperson@example.com" required>
        <br>
        <p>Afspraak datum:</p>
        <input type="datetime-local" name="date" id="date" required>
        <br>
        <p></p>
            <input id="submit" type="submit" value="Sla op">
        </fieldset>
    </form>
    <script src="js/test.js"></script>
</body>
</html>