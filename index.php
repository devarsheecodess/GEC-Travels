<?php 
$server = "localhost";
$username = "root";
$password = "";
$dbname = "GEC";

$con = mysqli_connect($server, $username, $password, $dbname);

if (!$con) {
    die("Connection to this database failed due to " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $age = $_POST['age'];
    $dept = $_POST['dept'];
    $year = $_POST['year'];
    $rollNo = $_POST['rollNo'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $sql = "INSERT INTO `tourists` (`name`, `age`, `dept`, `year`, `rollNo`, `phone`, `email`) VALUES ('$name', '$age', '$dept', '$year', '$rollNo', '$phone', '$email')";

    if ($con->query($sql) === true) {
        $submitted = true;
    } else {
        echo "ERROR: $sql <br> $con->error";
    }
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="image.png" type="image/png">
    <title>GEC College Tour</title>
</head>
<body>
    <header>
        <h1>GEC Travels</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="list.php">List</a></li>
                <li><a href="https://www.gec.ac.in/" target="_blank">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h2>Welcome to GEC Travels</h2>
            <p>Travel with us and explore the world</p>
        </section>

        <?php if (isset($submitted) && $submitted): ?>
            <div style="display: flex; justify-content: center">
                <h4>Form Submitted Successfully!</h4>
            </div>
        <?php endif; ?>

        <form action="" method="post">
            <input type="text" name="name" placeholder="Enter your name" required>
            <input type="text" name="age" placeholder="Enter your Age" required>
            <input type="text" name="dept" placeholder="Enter your Department" required>
            <input type="text" name="year" placeholder="Enter your Year" required>
            <input type="text" name="rollNo" placeholder="Enter your Roll Number" required>
            <input type="text" name="phone" placeholder="Enter your Phone number" required>
            <input type="email" name="email" placeholder="Enter your email ID" required>
            <button type="submit" name="login-submit">Submit</button>
        </form>
    </main>
</body>
</html>
