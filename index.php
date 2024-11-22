<?php
$db = new mysqli('localhost','root','','bnsh_biuro_podrozy');

$sql = "SELECT * FROM wycieczki";

$result = $db->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Zadanie</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>Dostępne wycieczki:</h1>
        <div class="container">
            <table>
                <tr>
                    <th>Data wyjazdu</th>
                    <th>Cel</th>
                    <th>Cena</th>
                </tr>
                <?php
                while ($row = $result->fetch_assoc()) {
                    if ($row['dostepna'] == 0) continue;
                    echo "<tr>";
                    echo "<th>" . $row['dataWyjazdu'] . "</th>";
                    echo "<th>" . $row['cel'] . "</th>";
                    echo "<th>" . $row['cena'] . "zł</th>";
                    echo "<tr>";
                }
                ?>
            </table>
        </div>
    </body>
</html>

<?php
$db->close();
?>