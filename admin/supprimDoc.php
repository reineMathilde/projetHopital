<?php
// Connexion à la base de données
$conn = mysqli_connect('localhost', 'root', '', 'gestion') or die('Connection failed');

// Vérifier si l'id est présent dans l'URL et s'il est valide (numérique)
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Requête de suppression avec un prepared statement
    $query = "DELETE FROM ajoutdocteur WHERE idDocteur = $id";
    $stmt = mysqli_prepare($conn, $query);
    
    // Vérifier si la préparation de la requête a réussi
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        
        // Exécuter la requête préparée
        if (mysqli_stmt_execute($stmt)) {
            // Redirection vers la page gererDoc.php si la suppression est réussie
            header("Location: gererDoc.php");
            exit();
        } else {
            // Gestion de l'erreur en cas de problème avec l'exécution de la requête
            echo "Erreur lors de l'exécution de la requête de suppression : " . mysqli_error($conn);
        }
    } else {
        // Gestion de l'erreur en cas de problème avec la préparation de la requête
        echo "Erreur lors de la préparation de la requête de suppression : " . mysqli_error($conn);
    }
} else {
    // Gestion de l'erreur si l'id n'est pas valide ou n'est pas présent dans l'URL
    echo "Identifiant invalide";
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>
