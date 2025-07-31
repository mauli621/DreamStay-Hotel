<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", sans-serif;
        }

        body {
            /* background: linear-gradient(to right, #dbeafe, #eff6ff); */
            color: #0f172a;
            padding: 50px 20px;
        }

        .main-content {
            max-width: 1000px;
            margin: 0 auto;
            background: #ffffff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 50, 0.1);
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .profile-header {
            display: flex;
            gap: 30px;
            align-items: center;
            margin-bottom: 40px;
        }

        .profile-pic {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            overflow: hidden;
            border: 4px solid linear-gradient(135deg, #003580, #0057b7);
            ;
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.3);
            transition: transform 0.4s;
        }

        .profile-pic:hover {
            transform: scale(1.05);
        }

        .profile-pic img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .user-info h1 {
            font-size: 32px;
            color: #1e3a8a;
        }

        .user-info p {
            margin-top: 5px;
            color: #475569;
        }

        .action-btn {
            display: inline-block;
            margin-top: 15px;
            margin-right: 10px;
            padding: 10px 20px;
            background: linear-gradient(135deg, #003580);
            ;
            color: #fff;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 500;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
            transition: 0.3s ease-in-out;
        }

        .action-btn:hover {
            background: #2563eb;
            transform: translateY(-2px);
        }



        .logout-btn {
            background: #ef4444;
            padding: 10px 25px;
            border: none;
            color: white;
            font-weight: bold;
            border-radius: 30px;
            cursor: pointer;
            transition: 0.3s ease;
            margin-top: 20px;
            box-shadow: 0 4px 10px rgba(239, 68, 68, 0.3);
        }

        .logout-btn:hover {
            background: #dc2626;
            transform: scale(1.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(59, 130, 246, 0.1);
        }

        th,
        td {
            padding: 14px 16px;
            text-align: left;
        }

        th {
            background: linear-gradient(135deg, #003580);
            color: #ffffff;
            font-size: 16px;
        }

        tr:nth-child(even) {
            background: #f1f5f9;
        }

        tr:hover {
            background: #dbeafe;
            transition: 0.3s;
        }
    </style>
</head>

<body>
    <div class="main-content">
        <div class="profile-header">
            <div class="profile-pic">
                <img src="https://i.pravatar.cc/150?img=5" alt="User Picture" />
            </div>
            <div class="user-info">
                <h1>Khushali Tank</h1>
                <p>Welcome to your DreamStay profile dashboard.</p>
                <a href="#" class="action-btn">Edit Profile</a>
                <a href="#" class="action-btn">Change Password</a>
                <button class="logout-btn">Logout</button>
            </div>
        </div>


        <div class="booking-history">
            <h3>Booking History</h3>
            <table>
                <thead>
                    <tr>
                        <th>Service</th>
                        <th>Date</th>
                        <th>Duration</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Deluxe Room</td>
                        <td>20 July 2025</td>
                        <td>2 Nights</td>
                        <td>Confirmed</td>
                    </tr>
                    <tr>
                        <td>Event Hall</td>
                        <td>10 July 2025</td>
                        <td>1 Day</td>
                        <td>Completed</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>