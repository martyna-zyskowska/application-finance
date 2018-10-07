<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "payment";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, creationDate, payDate, doneDate, price, status, notes FROM creditOne";
$result = $conn->query($sql);
$conn->close();
?>

<!doctype html>
<html>

    <head>
        <meta charset="utf-8">
        <!-- <title>Finance application</title> -->
        <link rel="stylesheet" type="text/css" href="creditone.css">
    </head>

    <body>
        <header>
            Kredyt I
        </header>

        <section>

            <div id="buttons">
                <button class="press" onclick="addRow()">+</button>
                <button class="press" onclick="deleteRow()">-</button>
            </div>

            <?php if ($result->num_rows > 0) {?>
            <table id="table">
                <tr>
                    <th>NR Faktury</th>
                    <th>Data wystawienia</th>
                    <th>Termin płatności</th>
                    <th>Zrealizowane dnia</th>
                    <th>Cena</th>
                    <th>Status</th>
                    <th>Notatki</th>
                </tr>
            <?php 
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>".$row["id"]."</td>
                        <td>".$row["creationDate"]."</td>
                        <td>".$row["payDate"]."</td>
                        <td>".$row["doneDate"]."</td>
                        <td>".$row["price"]."</td>
                        <td>".$row["status"]."</td>
                        <td>".$row["notes"]."</td>
                    </tr>";
                }
                    echo "</table>";
                } 
            ?>

        </section>


        <script>

            function addRow() {
                var table = document.getElementById("table");
                var row = table.insertRow(1);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(1);
                var cell4 = row.insertCell(1);
                var cell5 = row.insertCell(1);
                var cell6 = row.insertCell(1);
                var cell7 = row.insertCell(1);
                
                cell1.innerHTML = "N/A";
                cell2.innerHTML = "N/A";
                cell3.innerHTML = "N/A";
                cell4.innerHTML = "N/A";
                cell5.innerHTML = "N/A";
                cell6.innerHTML = "N/A";
                cell7.innerHTML = "N/A";
            }

            function deleteRow() {
                document.getElementById("table").deleteRow(1);
            }

        </script>

    </body>
</html>