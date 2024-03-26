<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magazin Online</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column; /* Arrange items in a column */
            align-items: center; /* Center items horizontally */
        }

        h1 {
            color: #333;
            text-align: center;
            width: 100%;
            margin-bottom: 20px; /* Add some space below the heading */
        }

        .container {
            display: flex;
            flex-direction: row; /* Arrange items in a row */
            justify-content: space-between; /* Add space between form and table */
            width: 100%;
            max-width: 800px; /* Limit the width for better readability */
        }

        #table-container,#form-container {
            width: 48%; /* Set width for both containers */
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px; /* Add space between containers */
        }

        form {
            margin: 20px 15px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        select,
        input {
            width: calc(100% - 16px);
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .success-message {
            color: green;
        }

        .error-message {
            color: red;
        }
    </style>
</head>

<body>

    <h1>Bine ați venit la Magazinul Nostru!</h1>

 <div id="table-selection-container">
        <!-- Formular pentru alegerea tabelului -->
        <form method="post" action="">
            <label for="tabelAfisare">Alege tabelul:</label>
            <select name="tabelAfisare" id="tabelAfisare">
                <option value="raft1">Raft 1</option>
                <option value="raft2">Raft 2</option>
                <option value="raft3">Raft 3</option>
                <option value="raft4">Raft 4</option>
				<option value="inventar">Inventar</option>
            </select>
            <button type='submit' name='afiseazaContinut'>Afișează Conținut</button>
        </form>
    </div>
	
    <!-- Container pentru afișarea tabelului -->
    <div id="table-container">
        <?php
	
        session_start();

        // Conectare la baza de date
        $conn = new mysqli('localhost', 'root', '', 'magazin');
        $db = mysqli_select_db($conn, 'magazin');

        global $selectedTableDelete; // Variabilă globală pentru a memora tabelul pentru ștergere
        global $selectedTable; // Variabilă globală pentru a memora tabelul pentru afișare

        if (!$conn) {
            echo '<p class="error-message">Could not connect to the database.</p>';
        } else {
            // Setează implicit $selectedTable la 'raft1' dacă nu este setată în POST sau în sesiune
            $selectedTable = isset($_POST['tabelAfisare']) ? $_POST['tabelAfisare'] : (isset($_SESSION['selectedTable']) ? $_SESSION['selectedTable'] : 'raft1');
            $_SESSION['selectedTable'] = $selectedTable; // Păstrează valoarea în sesiune
            $selectedTableDelete = $selectedTable;
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Procesează ștergerea când formularul de ștergere este trimis
                if (isset($_POST['delete_row'])) {
                    $deleteId = $_POST['delete_id'];

                    $deleteQuery = "DELETE FROM $selectedTableDelete WHERE Id = $deleteId";
                    $deleteResult = mysqli_query($conn, $deleteQuery);

                    if ($deleteResult) {
                        echo '<p class="success-message">Elementul a fost șters cu succes.</p>';
                    } else {
                        echo '<p class="error-message">Eroare la ștergerea elementului.</p>';
                    }
                }
            }
			
			
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['insereazaElement'])) {
			if(!$selectedTable)
			{
				$selectedTable='raft1';
			}
            // Obțineți valorile introduse de utilizator
            $tabel = isset($_POST['tabel']) ? $_POST['tabel'] : '';
            $Nume = isset($_POST['Nume']) ? $_POST['Nume'] : '';
            $Nume_producator = isset($_POST['Nume_Producator']) ? $_POST['Nume_Producator'] : '';
            $Pret_achizitie = isset($_POST['Pret_Achizitie']) ? $_POST['Pret_Achizitie'] : '';
            $Nume_vanzare = isset($_POST['Pret_Vanzare']) ? $_POST['Pret_Vanzare'] : '';
            $Data_expirare = isset($_POST['Data_expirare']) ? $_POST['Data_expirare'] : '';
            $Nr_lot = isset($_POST['Nr_lot']) ? $_POST['Nr_lot'] : '';

            // Verifică dacă toate câmpurile de inserare sunt completate
            if ($Nume !== '' && $Nume_producator !== '' && $Pret_achizitie !== '' && $Nume_vanzare !== '' && $Data_expirare !== '' && $Nr_lot !== '') {
                // Construiește și execută comanda SQL de inserare
                $s = "INSERT INTO $tabel (`Nume`, `Nume_Producator`, `Pret_Achizitie`, `Pret_Vanzare`, `Data_Expirare`, `Nr_lot`) VALUES ('$Nume', '$Nume_producator', '$Pret_achizitie', '$Nume_vanzare', '$Data_expirare', '$Nr_lot')";
                $result = mysqli_query($conn, $s);

                if ($result) {
                    // Afișează mesajul de inserare cu succes
                    echo '<p class="success-message">Elementul a fost inserat cu succes.</p>';
                } else {
                    // Afișează mesajul de eroare la inserare
                    echo '<p class="error-message">Eroare la inserarea elementului. Verificați datele introduse.</p>';
                }
            } else {
                // Afișează mesajul de eroare dacă nu sunt completate toate câmpurile
                echo '<p class="error-message">Toate câmpurile de inserare trebuie completate.</p>';
            }
        }}


            // Afișează tabelul
            $query = "SELECT * FROM $selectedTable";
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo '<h2>Tabelul: ' . $selectedTable . '</h2>';
                echo '<p class="success-message">Afișarea conținutului a fost realizată cu succes.</p>';
                // Afișează antetul tabelului
                echo '<table>';
                echo '<tr><th>ID</th><th>Nume</th><th>Nume Producator</th><th>Pret Achizitie</th><th>Pret Vanzare</th><th>Data Expirare</th><th>Numar Lot</th>';
				 if ($selectedTable == 'inventar') {
							echo '<th>Raft_Id</th>';
						}
				echo '<th>Acțiuni</th></tr>';
                // Afișează rândurile tabelului
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['Id'] . '</td>';
                    echo '<td>' . $row['Nume'] . '</td>';
                    echo '<td>' . $row['Nume_Producator'] . '</td>';
                    echo '<td>' . $row['Pret_Achizitie'] . '</td>';
                    echo '<td>' . $row['Pret_Vanzare'] . '</td>';
                    echo '<td>' . $row['Data_Expirare'] . '</td>';
                    echo '<td>' . $row['Nr_lot'] . '</td>';
					if ($selectedTable == 'inventar') {
							echo '<th>' . $row['Raft_Id'] . '</th>';
						}
 

					echo '<td>
						<form method="post" action="">
							<input type="hidden" name="edit_id" value="' . $row['Id'] . '">
							<button type="submit" name="edit_row">Edit</button>
						</form>
					</td>';
		  
                    echo '<td>
                    <form method="post" action="">
                        <input type="hidden" name="delete_id" value="' . $row['Id'] . '">
                        <button type="submit" name="delete_row">X</button>
                    </form>
                  </td>';
                    echo '</tr>';
                }

                echo '</table>';
            } else {
                echo '<p class="error-message">Eroare la extragerea conținutului tabelului.</p>';
            }
			if (isset($_POST['edit_row'])) {
    $editId = $_POST['edit_id'];

    // Obțineți datele elementului pentru editare
    $editQuery = "SELECT * FROM $selectedTable WHERE Id = $editId";
    $editResult = mysqli_query($conn, $editQuery);

    if ($editResult && mysqli_num_rows($editResult) > 0) {
        $editRow = mysqli_fetch_assoc($editResult);

        // Afișați un formular de editare cu datele existente
        echo '<h2>Editare element:</h2>';
        echo '<form method="post" action="">';
        echo '<input type="hidden" name="edit_id" value="' . $editRow['Id'] . '">';
        
        // Adăugați câmpurile pentru editare
        echo '<label for="edit_Nume">Nume:</label>';
        echo '<input type="text" name="edit_Nume" value="' . $editRow['Nume'] . '" required>';
        echo '<br>';

        echo '<label for="edit_Nume_Producator">Nume Producator:</label>';
        echo '<input type="text" name="edit_Nume_Producator" value="' . $editRow['Nume_Producator'] . '" required>';
        echo '<br>';

        echo '<label for="edit_Pret_Achizitie">Pret Achizitie:</label>';
        echo '<input type="text" name="edit_Pret_Achizitie" value="' . $editRow['Pret_Achizitie'] . '" required>';
        echo '<br>';

        echo '<label for="edit_Pret_Vanzare">Pret Vanzare:</label>';
        echo '<input type="text" name="edit_Pret_Vanzare" value="' . $editRow['Pret_Vanzare'] . '" required>';
        echo '<br>';

        echo '<label for="edit_Data_Expirare">Data Expirare:</label>';
        echo '<input type="date" name="edit_Data_Expirare" value="' . $editRow['Data_Expirare'] . '" required>';
        echo '<br>';

        echo '<label for="edit_Nr_lot">Numar Lot:</label>';
        echo '<input type="text" name="edit_Nr_lot" value="' . $editRow['Nr_lot'] . '" required>';
        echo '<br>';

        echo '<button type="submit" name="update_row">Actualizează</button>';
        echo '</form>';
    } else {
        echo '<p class="error-message">Eroare la obținerea datelor pentru editare.</p>';
    }
}

// Verificați dacă formularul de actualizare a fost trimis
if (isset($_POST['update_row'])) {
    $updateId = $_POST['edit_id'];

    // Obțineți valorile actualizate introduse de utilizator
    $edit_Nume = isset($_POST['edit_Nume']) ? $_POST['edit_Nume'] : '';
    $edit_Nume_Producator = isset($_POST['edit_Nume_Producator']) ? $_POST['edit_Nume_Producator'] : '';
    $edit_Pret_Achizitie = isset($_POST['edit_Pret_Achizitie']) ? $_POST['edit_Pret_Achizitie'] : '';
    $edit_Pret_Vanzare = isset($_POST['edit_Pret_Vanzare']) ? $_POST['edit_Pret_Vanzare'] : '';
    $edit_Data_Expirare = isset($_POST['edit_Data_Expirare']) ? $_POST['edit_Data_Expirare'] : '';
    $edit_Nr_lot = isset($_POST['edit_Nr_lot']) ? $_POST['edit_Nr_lot'] : '';

    // Construiți și executați comanda SQL de actualizare
    $updateQuery = "UPDATE $selectedTable SET Nume='$edit_Nume', Nume_Producator='$edit_Nume_Producator', Pret_Achizitie='$edit_Pret_Achizitie', Pret_Vanzare='$edit_Pret_Vanzare', Data_Expirare='$edit_Data_Expirare', Nr_lot='$edit_Nr_lot' WHERE Id=$updateId";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        echo '<p class="success-message">Elementul a fost actualizat cu succes.</p>';
    } else {
        echo '<p class="error-message">Eroare la actualizarea elementului.</p>';
    }
}
        }
        ?>
    </div>

    <!-- Container pentru formularul de inserare -->
    <div id="form-container">
        <!-- Form for selecting the table and inserting elements -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="tabel">Selectați Tabelul:</label>
            <select name="tabel" id="tabel" required>
                <option value="raft1">Raft1</option>
                <option value="raft2">Raft2</option>
                <option value="raft3">Raft3</option>
                <option value="raft4">Raft4</option>
            </select>

            <label for='Nume'>Nume:</label>
            <input type='text' name='Nume' required>

            <label for='Nume_Producator'>Nume Producator:</label>
            <input type='text' name='Nume_Producator' required>

            <label for='Pret_Achizitie'>Pret Achizitie:</label>
            <input type='text' name='Pret_Achizitie' required>

            <label for='Pret_Vanzare'>Pret Vanzare:</label>
            <input type='text' name='Pret_Vanzare' required>

            <label for='Data_expirare'>Data Expirare:</label>
            <input type='date' name='Data_expirare' required>

            <label for='Nr_lot'>Numar Lot:</label>
            <input type='text' name='Nr_lot' required>

            <button type='submit' name='insereazaElement'>Inserează Element</button>
        </form>
    </div>
</body>

</html>
