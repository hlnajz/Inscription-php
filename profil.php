<?php
// Set error messages array
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Validate text fields
    $lastName = $_POST['lastName'] ?? '';
    $firstName = $_POST['firstName'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $country = $_POST['country'] ?? '';
    $skills = $_POST['skills'] ?? [];

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "L'adresse e-mail est invalide.");
    }

    // Validate password length
    if (strlen($password) < 6) {
        array_push($errors, "Le mot de passe doit comporter au moins 6 caractères.");
    }

    // Validate file upload
    if ($_FILES['profile-photo']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['profile-photo']['tmp_name'];
        $fileName = $_FILES['profile-photo']['name'];
        $fileSize = $_FILES['profile-photo']['size'];
        $fileType = $_FILES['profile-photo']['type'];

        $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png'];
        $maxFileSize = 5 * 1024 * 1024; // 5MB

        if (!in_array($fileType, $allowedTypes)) {
            array_push($errors, "Le format du fichier n'est pas accepté. Seuls les fichiers JPG, JPEG et PNG sont autorisés.");
        }

        if ($fileSize > $maxFileSize) {
            array_push($errors, "Le fichier est trop volumineux. La taille maximale est de 5 Mo.");
        }

        // If no errors, move the file to the 'uploads' folder
        if (empty($errors)) {
            $uploadDir = 'uploads/';
            $destinationPath = $uploadDir . $fileName;

            if (move_uploaded_file($fileTmpPath, $destinationPath)) {
                $fileUploadMessage = "Fichier téléchargé avec succès.";
            } else {
                array_push($errors, "Une erreur est survenue lors du téléchargement de la photo.");
            }
        }
    } else {
        array_push($errors, "Aucune photo téléchargée ou erreur de téléchargement.");
    }

}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Utilisateur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .errors, .success {
            background-color: #fdd;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #f00;
            border-radius: 4px;
        }

        .success {
            background-color: #dff0d8;
            border-color: #3c763d;
        }

        img.profile-image {
            max-width: 200px;
            display: block;
            margin: 20px auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Profil Utilisateur</h1>

        <?php if (empty($errors)): ?>
            <div class="success">
                <p><?php echo $fileUploadMessage ?? 'Inscription réussie !'; ?></p>
                <img src="uploads/<?php echo htmlspecialchars($fileName); ?>" alt="Photo de profil" class="profile-image">
            </div>
        <?php else: ?>
            <div class="errors">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <a href="addUser.php">Retour au formulaire</a>
    </div>
</body>
</html>
