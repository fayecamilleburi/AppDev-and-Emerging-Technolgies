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
$params = ['id'=>$id];

// Execute the statement
$stmt->execute($params);

// Fetch the post from the database
$pet = $stmt->fetch();

// var_dump($post);
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
    <title><?= htmlspecialchars($pet['name']) ?> | Fur-st Aid</title>

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
        <h1 class="text-center"><strong>Fur-sonal Paw-file</strong></h1>
        <hr/>

        <center>
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="card" style="max-width: 600px; width: 100%;">
                <div class="card-body text-center">
                    <img src="image/<?= htmlspecialchars($pet['photo']) ?>" alt="Pet Photo" class="img-fluid rounded" width="200">
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Name:</strong> <?= htmlspecialchars($pet['name']) ?></li>
                    <li class="list-group-item"><strong>Species:</strong> <?= htmlspecialchars($pet['species']) ?></li>
                    <li class="list-group-item"><strong>Breed:</strong> <?= htmlspecialchars($pet['breed']) ?></li>
                    <li class="list-group-item"><strong>Age:</strong> <?= htmlspecialchars($pet['age']) ?></li>
                    <li class="list-group-item"><strong>My Fur Mom/Dad:</strong> <?= htmlspecialchars($pet['owner_name']) ?></li>
                    <li class="list-group-item"><strong>Status:</strong><br/> <?= htmlspecialchars($pet['status']) ?></li>
                </ul>
            </div>
        </div>
        </center>

        <!-- Action Buttons --> 
        <div class="text-center mt-4">
            <!-- Edit & Delete Button Group -->
            <div class="d-flex justify-content-center gap-2 mt-4">
                <form action="delete.php" method="POST" style="display:inline;">
                    <input type="hidden" name="_method" value="delete">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($pet['id']) ?>">
                    <a href="edit.php?id=<?= htmlspecialchars($pet['id']) ?>" class="btn btn-primary">Edit</a>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>

            <!-- Back to Main Button Below -->
            <div class="mt-5">
                <a href="record.php" class="btn btn-secondary">Back to Main</a>
            </div>
        </div>
    </div>
</body>
</html>