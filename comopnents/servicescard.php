<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .services-section {
            text-align: center;
            padding: 60px 20px;
        }

        .section-title {
            font-size: 40px;
            width: 350px;
            padding: 10px;
            margin: 50px auto;
            color: #003580;
            text-align: center;
            transition: all 0.3s ease;
        }

        .section-title:hover {
            cursor: pointer;
            border-bottom: 3px solid #003580;
            transform: scale(1.05);
        }

        .services-cards {
            width: 100%;
            height: auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 70px;
            padding: 20px;
            background-color: #f8f9fa;
        }

        .service-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            max-width: 350px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .service-card:hover {
            transform: translateY(-8px);
        }

        .service-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .service-card h3 {
            margin: 25px 0 15px;
            color: #34495e;
            font-size: 1.5rem;
        }

        .service-card p {
            padding: 0 15px 15px;
            color: #555;
            font-size: 1rem;
            margin: 25px 0 15px;
        }

        .read-more {
            color: white;
            font-weight: 500;
            padding: 12px 40px;
            border-radius: 9999px;
            border: none;
            cursor: pointer;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #003580, #0057b7);
            text-decoration: none;
            margin-bottom: 20px;
        }

        .read-more a {
            color: white;
            text-decoration: none;
        }

        .read-more:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 87, 183, 0.4);
        }
    </style>
</head>

<body>
    <section class="services-section">
        <h2 class="section-title">Our Services</h2>
        <div class="services-cards">

            <div class="service-card">
                <img src="./assets/marriage.jpg" alt="Events">
                <h3>Events</h3>
                <p>Celebrate weddings, birthdays, and engagements with elegance and style.</p>
                <button class="read-more">
                    <a href="./event.php">Explore Events</a>
                </button>
            </div>

            <div class="service-card">
                <img src="./assets/dinning_bg.jpg" alt="Dining">
                <h3>Dining</h3>
                <p>Experience fine dining with a variety of cuisines to please every palate.</p>
                <button class="read-more">
                    <a href="./dinning.php">Explore Dining</a>
                </button>
            </div>

            <div class="service-card">
                <img src="./assets/meeting_bg.png" alt="Meetings">
                <h3>Meetings</h3>
                <p>Host professional meetings in banquet, boardroom, or theater-style setups.</p>
                <button class="read-more">
                    <a href="./meeting.php">Explore Meetings</a>
                </button>
            </div>

        </div>
    </section>
</body>
</html>