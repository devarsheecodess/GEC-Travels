<?php 
$server = "localhost";
$username = "root";
$password = "";
$dbname = "GEC";

$con = mysqli_connect($server, $username, $password, $dbname);

if (!$con) {
    die("Connection to this database failed due to " . mysqli_connect_error());
}

$sql = "SELECT * FROM tourists";
$result = mysqli_query($con, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($con)); 
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="image.png" type="image/png">
    <title>Tourist List</title>
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
        <div style="display: flex; justify-content: center; margin-top: 20px;">
            <h2>Submitted Tourists</h2>
        </div>
        <table border="1" style="width:100%; text-align:left; margin-top:20px;">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Department</th>
                    <th>Year</th>
                    <th>Roll No</th>
                    <th>Phone</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo htmlspecialchars($row['age']); ?></td>
                            <td><?php echo htmlspecialchars($row['dept']); ?></td>
                            <td><?php echo htmlspecialchars($row['year']); ?></td>
                            <td><?php echo htmlspecialchars($row['rollNo']); ?></td>
                            <td><?php echo htmlspecialchars($row['phone']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" style="text-align:center;">No records found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
</body>
</html>
