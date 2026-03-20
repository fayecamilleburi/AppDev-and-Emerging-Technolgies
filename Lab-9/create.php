<?php 
    include('database.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        $name = htmlspecialchars($_POST['name'] ?? '');
        $species = htmlspecialchars($_POST['species'] ?? '');
        $breed = htmlspecialchars($_POST['breed'] ?? '');
        $age = htmlspecialchars($_POST['age'] ?? '');
        $owner_name = htmlspecialchars($_POST['owner_name'] ?? '');
        $status = htmlspecialchars($_POST['status'] ?? '');

        // Check if a file was uploaded
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            $imageDir = 'image/';  // Define where to save the file
            $photoName = basename($_FILES['photo']['name']);  // Get the filename
            $imageFilePath = $imageDir . $photoName;  // Full path

            // Move the uploaded file to the designated directory
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $imageFilePath)) {
                $photo = $photoName;  // Store only the filename in the database
            } else {
                $photo = '';  // Handle error case
            }
        } else {
            $photo = '';  // No file uploaded
        }

        // INSERT statement
        $sql = 'INSERT INTO pets(name, species, breed, age, owner_name, photo, status) 
                VALUES(:name, :species, :breed, :age, :owner_name, :photo, :status)';

        // Prepare the statement
        $stmt = $pdo->prepare($sql);

        // Params for prepared statement
        $params = [
            'name' => $name,
            'species' => $species,
            'breed' => $breed,
            'age' => $age,
            'owner_name' => $owner_name,
            'photo' => $photo,  // Store filename only
            'status' => $status
        ];

        // Execute the statement
        $stmt->execute($params);
        
        header('Location: record.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Grandstander" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New | Fur-st Aid</title>

    <style>
        body {
            font-family: "Grandstander", cursive;
            font-optical-sizing: auto;
            font-style: normal;
            padding-top: 70px;
        }
        .navbar {
            background-color: #DAA520; /* Goldenrod */
        }
        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .navbar-brand img {
            height: 28px;
            width: auto;
        }
        .navbar-brand span {
            font-size: 20px;
            font-weight: bold;
            color: white;
        }
    </style>
</head>
<body data-spy="scroll" data-target=".navbar">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    <img src="image/home.gif" alt="Fur-st Aid Logo">
                    <span>Fur-st Aid</span>
                </a>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <h1 class="text-center"><strong>Paw-print Entry</strong></h1>
        <p class="text-center fst-italic">
            Start fresh with a dedicated record for your pet's health and history.
            Whether it's tracking vaccinations, vet visits, or special milestones,
            Paw-print Entry ensures every important detail is securely documented
            for your furry friend's well-being!
        </p>
        <hr/>

        <!-- Form Card -->
        <center>
        <div class="card mx-auto shadow-lg p-4 rounded-3" style="max-width: 600px;">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="name" id="name" class="form-control" 
                        placeholder="Enter name" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="species" id="species" class="form-control" 
                        placeholder="Enter species" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="breed" id="breed" class="form-control" 
                        placeholder="Enter breed" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="age" id="age" class="form-control" 
                        placeholder="Enter age" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="owner_name" id="owner_name" class="form-control" 
                        placeholder="Enter fur parent's name" required>
                    </div>
                    <div class="form-group">
                        <textarea name="status" id="status" class="form-control" placeholder="Is it a new fur-end?" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="photo" class="form-label">Upload Photo</label>
                        <input type="file" name="photo" id="photo" class="form-control" accept="image/*" required>
                    </div>
                    <div class="text-center">
                        <a href="record.php?>" class="btn btn-secondary">Cancel</a>
                        <button type="submit" name="submit" class="btn btn-success">Paw-ceed!</button>
                    </div>
                </form>
            </div>
        </div>
    </center>
    </div>
</body>
</html>