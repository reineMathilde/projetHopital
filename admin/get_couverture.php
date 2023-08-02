<?php
// get_couverture.php

$conn = mysqli_connect('localhost', 'root', '', 'gestion') or die('connection failed');

if (isset($_POST['patient'])) {
    $selectedPatient = mysqli_real_escape_string($conn, $_POST['patient']);

    // Récupérer le taux de couverture du patient sélectionné dans la base de données
    $query = "SELECT taux_couverture FROM ajoutpatient WHERE idPatient = '$selectedPatient'";
    $result = mysqli_query($conn, $query);

    // Construire les options de la liste déroulante des taux de couverture
    $options = '<option value="">Selectionnez Taux de Couverture</option>';

    while ($row = mysqli_fetch_array($result)) {
        $options .= '<option value="' . $row['taux_couverture'] . '">' . $row['taux_couverture'] . '</option>';
    }

    echo $options;
}
?>








