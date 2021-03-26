<?php
$host = "192.168.1.100";
$user = "wecode";
$pass = "wecode2020";
$dbName = "DBProva";
$port = "3307";

$conn = "mysql:host=$host;dbname=$dbName;port=$port";
$pdo = new PDO($conn, $user, $pass);

if (!$pdo) {
    die('Error: ' . mysql_error());
}

if (isset($_GET["newName"])) {
    $query = $pdo->prepare("UPDATE Studenti SET Nominativo = :name WHERE IdStudente = :id;");
    $query->execute(['name' => $_GET["newName"], 'id' => $_GET["id"]]);

    header("Location: /studenti/");
}

if (isset($_GET["deleteId"])) {
    $query = $pdo->prepare("DELETE FROM Studenti WHERE IdStudente = :id;");
    $query->execute(['id' => $_GET["deleteId"]]);

    header("Location: /studenti/");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: #061d4c
        }

        h2 {
            text-align: center;
            padding: 1rem 0;
            color: #f0d472;
        }

        table {
            width: 100%;
            background-color: #f0d472;
            border: solid #7b6540;
        }

        tr {
            background-color: #ae3530;
            height: 30px;
        }

        tr:nth-child(odd) {
            background-color: #5976ad;
        }

        th {
            font-size: 1.25rem;
        }

        td {
            width: 400px;
            font-size: 1rem;
            font-weight: 500;
        }

        input {
            height: 30px;
            width: inherit;
        }

        button {
            height: 20px;
            color: white;
            background-color: #1f2c46;
            width: 100%;
        }

        #delete {
            height: 50px;
            background-color: #a21818;
        }
    </style>
</head>

<body>

    <h2>Studenti</h2>
    <table>
        <tr>
            <th>Nominativo</th>
            <th>Eta</th>
            <th>NatoIl</th>
            <th>Classe</th>
            <th>Ripetente</th>
            <th>Sesso</th>
            <th>MediaVoti</th>
            <th>Edit Nome</th>
            <th>Delete Studente</th>
        </tr>
        <?php
        $query = $pdo->prepare("SELECT IdStudente, Nominativo, Eta, NatoIl, Classe, Ripetente, Sesso, MediaVoti FROM Studenti");
        $query->execute([]);
        $x = $query->fetchAll();

        foreach ($x as $key => $value) {
            echo "<tr>";
            echo "<td>" . $value["Nominativo"] . "</td>";
            echo "<td>" . $value["Eta"] . "</td>";
            echo "<td>" . $value["NatoIl"] . "</td>";
            echo "<td>" . $value["Classe"] . "</td>";
            echo "<td>" . $value["Ripetente"] . "</td>";
            echo "<td>" . $value["Sesso"] . "</td>";
            echo "<td>" . $value["MediaVoti"] . "</td>";
            echo "<td><input type='text' id='newName'><button onclick='editStudent(" . $value["IdStudente"] . ")'>Submit</button></td>";
            echo "<td><button id='delete' onclick='deleteStudent(" . $value["IdStudente"] . ")'>Delete</button></td>";
            echo "</tr>";
        }
        ?>
    </table>


    <h2>Studenti Audit</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>ID Studente</th>
            <th>Data e Ora</th>
            <th>Vechchio Nome</th>
            <th>Nuovo Nome</th>
            <th>Azione</th>
        </tr>
        <?php
        $query = $pdo->prepare("SELECT IdAudit, IdStudente, CambiatoIl, OldNominativo, NewNominativo, Azione FROM Studenti_Audit");
        $query->execute([]);
        $x = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($x as $key => $value) {
            echo "<tr>";
            foreach ($value as $key => $data) {
                echo "<td>$data</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>

    <script src="./main.js"></script>
</body>

</html>