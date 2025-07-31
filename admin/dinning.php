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
            <h1>Dinning Booking</h1>
        </header>


        <section class="recent">

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Guest Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>No. of Guest</th>
                        <th>Dinning Area</th>
                        <th>Requests</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Khushali Tank</td>
                        <td>2025-07-10</td>
                        <td>8:00 PM</td>
                        <td>15</td>
                        <td>Indoor</td>
                        <td>Thank you!</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Mauli bhanderi</td>
                        <td>2025-07-11</td>
                        <td>8 : 30 PM</td>
                        <td>30</td>
                        <td>Outdoor</td>
                        <td>Thank you !</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>
</body>

</html>