<?php
$conn = new mysqli("localhost", "root", "", "hotel");
$sql = "SELECT * FROM login_detail";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <<?php
        include 'sidebar.php'
    ?>

    <div class="main-content">
        <header>
            <h1>Login Details</h1>
        </header>


        <section class="recent">
            <h2>Total Users</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>UserName</th>
                        <th>password</th>
                    </tr>
                </thead>
                <?php while($row = $result->fetch_assoc()) { ?>
                <tbody>
                   <tr>
                        <td> <? = ($row['id'] ?? 'N/A') ?></td>
                        <td><?= $row['username'] ?></td>
                        <td><?= $row['password'] ?></td>
                    </tr>
                    <?php } ?> 
                </tbody>
            </table>
        </section>
    </div>
</body>

</html>

<?php $conn->close(); ?>