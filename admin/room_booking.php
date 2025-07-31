<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>
    <?php
    include 'sidebar.php';
    ?>

    <div class="main-content">
        <header>
            <h1>Users</h1>
        </header>



        <section class="recent">
            <h2>Recent Bookings</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Guest Name</th>
                        <th>Room Type</th>
                        <th>Arrival Date</th>
                        <th>Deprature Date</th>
                        <th>no. of rooms</th>
                        <th>no. of guests</th>
                        <th>contact no.</th>
                        <th>Email</th>
                        <th>Requets</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Khushali Tank</td>
                        <td>standard queen room</td>
                        <td>2025-07-10</td>
                        <td>2025-07-12</td>
                        <td>1</td>
                        <td>2</td>
                        <td>89678 08765</td>
                        <td>tankkhusi@gmail.com</td>
                        <td>thank you !</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Mauli bhanderi</td>
                        <td>studio room</td>
                        <td>2025-07-13</td>
                        <td>2025-07-14</td>
                        <td>2</td>
                        <td>4</td>
                        <td>45672 34562</td>
                        <td>bhanderi@gmail.com</td>
                        <td>thank you for the service!</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>
</body>

</html>