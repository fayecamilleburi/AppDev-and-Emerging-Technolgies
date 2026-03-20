<?php 
    include('database.php');
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
    <title>Home | Fur-st Aid</title>

    <style>
        body {
            font-family: "Grandstander", cursive;
            font-optical-sizing: auto;
            font-weight: <weight>;
            font-style: normal;
        }
        #home {
            position: relative;
            background: url('image/background.jpg') no-repeat center center;
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
        }
        #home .overlay {
            background: rgba(207, 214, 207, 0.3); 
            padding: 60px;
            border-radius: 10px;
        }
        .btn-book {
            background-color: #DAA520; /* Goldenrod */
            border: none;
            padding: 10px 20px;
            border-radius: 8px; /* Softer edges */
            color: white;
            font-weight: bold;
        }
        .btn-book:hover {
            background-color: #8B4513; /* Saddle Brown */
        }
    </style>
</head>
<body>
    <section id="home">
        <div class="overlay">
            <img src='image/home.gif' alt="Cute pet GIF">
            <h1><strong>Fur-st Aid</strong></h1>
            <h4>Vet Clinic</h4>
            <p class="lead">Quick Care for Every Whisker and Wag</p>

            <a href="record.php" class="btn btn-book">Welcome Admin!</a>
        </div>
        </section>
</body>
</html>