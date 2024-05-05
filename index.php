<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/hosting.png" type="image/x-icon">
    <title>Homepage</title>
</head>

<body>
    <div class="banner">
        <div class="navbar">
            <img src="img/hosting.png" class="logo">
            <ul>
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Contact us</a>
                </li>
            </ul>
        </div>
        <div class="content">
            <h1>Welcome!</h1>
            <div>
                <button type="button" class="Data"><span></span>Display Data</button>
                <div class="data"></div>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('.Data').addEventListener('click', function() {
            window.location.href = 'display.php';
        });
    </script>
</body>

</html>
