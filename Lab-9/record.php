<?php 
    include('database.php');
    // require_once 'database.php';

    // Prepare a SELECT statement
    $state = $pdo->prepare('SELECT * FROM pets');

    // Execute the statement
    $state->execute();

    // Fetch the result
    $pets = $state->fetchAll();

    // var_dump($posts);
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
    <title>Records | Fur-st Aid</title>

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
        <h1 class="text-center"><strong>Paw-tient History</strong></h1>
        <p class="text-center">
            A comprehensive record of your furry companion's medical checkups, 
            treatments, and health milestones. Keep track of vaccinations, vet visits, 
            and any special care notes to ensure your pet stays happy and healthy!
        </p>
        <hr/>

            <div class="container-fluid">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Picture</th>
                            <th>Name</th>
                            <th>Species</th>
                            <th>Breed</th>
                            <th>Age</th>
                            <th>Owner</th>
                            <th><a href="create.php" class="btn btn-primary">+ Create new record</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pets as $pet): ?>
                        <tr>
                            <td><?= $pet['id'] ?></td>
                            <td><img src="image/<?= htmlspecialchars($pet['photo']) ?>" alt="Pet Photo" width="100"></td>
                            <td><a href="selected.php?id=<?= $pet['id'] ?>" class="btn btn-link"><?= $pet['name'] ?></a></td>
                            <td><?= $pet['species'] ?></td>
                            <td><?= $pet['breed'] ?></td>
                            <td><?= $pet['age'] ?></td>
                            <td><?= $pet['owner_name'] ?></td>
                            <td>
                                <a href="edit.php?id=<?= htmlspecialchars($pet['id']) ?>" class="btn btn-success">Edit</a>
                                <form action="delete.php" method="POST" style="display:inline;">
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($pet['id']) ?>">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
    </div>
</body>
</html>