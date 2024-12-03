<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Utilisateur</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            padding: 20px;
            background-color: #f5f5f5;
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

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="number"],
        select {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="file"] {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: white;
        }

        .radio-group,
        .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            padding: 10px 0;
        }

        .radio-item,
        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .skills-section {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 10px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            display: block;
            width: 100%;
            max-width: 200px;
            margin: 30px auto 0;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        .required::after {
            content: " *";
            color: red;
        }

        .preview-image {
            max-width: 200px;
            margin-top: 10px;
            display: none;
            border-radius: 4px;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Formulaire d'inscription</h1>

        <form action="profil.php" method="POST" enctype="multipart/form-data">

            <!-- Nom et Prénom -->
            <div class="form-group">
                <label for="lastName" class="required">Nom de famille</label>
                <input type="text" id="lastName" name="lastName" required>
            </div>

            <div class="form-group">
                <label for="firstName" class="required">Prénom</label>
                <input type="text" id="firstName" name="firstName" required>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email" class="required">Adresse e-mail</label>
                <input type="email" id="email" name="email" required>
            </div>

            <!-- Mot de passe -->
            <div class="form-group">
                <label for="password" class="required">Mot de passe</label>
                <input type="password" name="password" required>
            </div>

            <!-- Sexe -->
            <div class="form-group">
                <label class="required">Sexe</label>
                <div class="radio-group">
                    <div class="radio-item">
                        <input type="radio" id="male" name="gender" value="male" required>
                        <label for="male">Homme</label>
                    </div>
                    <div class="radio-item">
                        <input type="radio" id="female" name="gender" value="female">
                        <label for="female">Femme</label>
                    </div>
                </div>
            </div>

            <!-- Pays -->
            <div class="form-group">
                <label for="country" class="required">Pays de résidence</label>
                <select id="country" name="country" required>
                    <option value="">Sélectionnez un pays</option>
                    <option value="FR">Maroc</option>
                    <option value="FR">France</option>
                    <option value="BE">Belgique</option>
                    <option value="CH">Suisse</option>
                    <option value="CA">Canada</option>
                    <option value="Other">Autre</option>
                </select>
            </div>

            <!-- Compétences -->
            <div class="form-group">
                <label>Compétences/expérience</label>
                <div class="skills-section">
                    <div class="checkbox-item">
                        <input type="checkbox" name="skills[]" value="html">
                        <label for="skill1">HTML/CSS</label>
                    </div>
                    <div class="checkbox-item">
                        <input type="checkbox" name="skills[]" value="javascript">
                        <label for="skill2">JavaScript</label>
                    </div>
                    <div class="checkbox-item">
                        <input type="checkbox" name="skills[]" value="python">
                        <label for="skill3">Python</label>
                    </div>
                    <div class="checkbox-item">
                        <input type="checkbox" name="skills[]" value="java">
                        <label for="skill4">Java</label>
                    </div>
                    <div class="checkbox-item">
                        <input type="checkbox" name="skills[]" value="php">
                        <label for="skill5">PHP</label>
                    </div>
                </div>
            </div>

            <!-- Photo de profil -->
            <div class="form-group">
                <label for="profile-photo">Photo de profil</label>
                <input type="file" name="profile-photo" id="profile-photo" accept="image/png, image/jpg, image/jpeg" required>
            </div>

            <button type="submit">S'inscrire</button>

        </form>
    </div>
</body>
</html>
