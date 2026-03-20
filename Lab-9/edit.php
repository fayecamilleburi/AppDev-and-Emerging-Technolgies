<?php
include('database.php');

// Get ID from query string
$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: record.php');
    exit;
}

// Select statement with placeholder for id
$sql = 'SELECT * FROM pets WHERE id = :id';

// Prepare the SELECT statement
$stmt = $pdo->prepare($sql);

// Params for prepared statement
$params = ['id' => $id];

// Execute the statement
$stmt->execute($params);

// Fetch the pet data from the database
$pet = $stmt->fetch();

// If no pet is found, redirect
if (!$pet) {
    header('Location: record.php');
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $species = $_POST['species'] ?? '';
    $breed = $_POST['breed'] ?? '';
    $age = $_POST['age'] ?? '';
    $owner_name = $_POST['owner_name'] ?? '';
    $status = $_POST['status'] ?? '';
    $photo = $_POST['photo'] ?? ''; // Consider handling file uploads properly

    // Update statement with placeholders
    $sql = 'UPDATE pets SET name = :name, species = :species, breed = :breed, age = :age, owner_name = :owner_name, status = :status WHERE id = :id';

    // Prepare the UPDATE statement
    $stmt = $pdo->prepare($sql);

    // Params for prepared statement
    $params = [
        'id' => $id,
        'name' => $name,
        'species' => $species,
        'breed' => $breed,
        'age' => $age,
        'owner_name' => $owner_name,
        'status' => $status,
    ];

    // Execute the statement
    if ($stmt->execute($params)) {
        header('Location: selected.php?id=' . $id); // Redirect to the updated pet's view page
        exit;
    } else {
        // Handle update error
        $error = "Error updating pet information.";
    }
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
    <title>Edit <?= htmlspecialchars($pet['name']) ?> | Fur-st Aid</title>

    <style>
        body {
            font-family: "Grandstander", cursive;
            font-optical-sizing: auto;
            font-weight: <weight>;
            font-style: normal;
            padding-top: 70px;
        }
        .navbar {
            background-color: #DAA520; /* Goldenrod */
        }
        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 10px; /* Adjust space between the logo and text */
        }
        .navbar-brand img {
            height: 28px; /* Adjust size as needed */
            width: auto;
        }
        .navbar-brand span {
            font-size: 20px; /* Customize text size */
            font-weight: bold;
            color: white; /* Change to match navbar color */
        }
        .form-group {
            margin-bottom: 15px;
        }
    </style>
</head>
<body data-spy="scroll" data-target=".navbar">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="record.php">
                    <img src="image/home.gif" alt="Fur-st Aid Logo">
                    <span>Fur-st Aid</span>
                </a>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <h1 class="text-center"><strong>Edit Fur-sonal Paw-file</strong></h1>
        <hr/>

        <!-- Form Card -->
        <center>
        <div class="card mx-auto shadow-lg p-4 rounded-3" style="max-width: 600px;">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <img src="image/<?= htmlspecialchars($pet['photo']) ?>" alt="Pet Photo" width="150">
                    </div>
                    <div class="form-group">
                        <input type="text" name="name" id="name" class="form-control" 
                        placeholder="Enter name" value="<?= htmlspecialchars($pet['name']) ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="species" id="species" class="form-control" 
                        placeholder="Enter species" value="<?= htmlspecialchars($pet['species']) ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" name="breed" id="breed" class="form-control" 
                        placeholder="Enter breed" value="<?= htmlspecialchars($pet['breed']) ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" name="age" id="age" class="form-control" 
                        placeholder="Enter age" value="<?= htmlspecialchars($pet['age']) ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" name="owner_name" id="owner_name" class="form-control" 
                        placeholder="Enter fur parent's name" value="<?= htmlspecialchars($pet['owner_name']) ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" name="status" id="status" class="form-control" 
                        placeholder="Enter status" value="<?= htmlspecialchars($pet['status']) ?>">
                    </div>
                    <div class="text-center">
                        <a href="record.php?>" class="btn btn-secondary">Cancel</a>
                        <button type="submit" name="submit" class="btn btn-success">Paw-ceed Update</button>
                    </div>
                </form>
            </div>
        </div>
    </center>
</body>
</html>