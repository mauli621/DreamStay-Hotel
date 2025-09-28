<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .client-reviews {
            background-color: #f7f9fc;
            padding: 60px 20px;
            text-align: center;
        }

        .review-title {
            font-size: 2.5rem;
            color: #003580;
            margin-bottom: 40px;
            font-weight: bold;
        }

        .reviews-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
        }

        .review-card {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 300px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .review-card:hover {
            transform: translateY(-10px);
        }

        .client-img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .client-name {
            font-size: 1.2rem;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .stars {
            font-size: 1.2rem;
            color: #f1c40f;
            margin-bottom: 10px;
        }

        .client-text {
            font-size: 1rem;
            color: #555;
            line-height: 1.5;
        }
    </style>
</head>

<body>
    <section class="client-reviews">
        <h2 class="review-title">What Our Guests Say</h2>
        <div class="reviews-container">

            <div class="review-card">
                <h3 class="client-name">Rahul Mehta</h3>
                <div class="stars">⭐⭐⭐⭐⭐</div>
                <p class="client-text">Amazing stay! The rooms were clean and the service was top-notch. Will definitely come back.</p>
            </div>

            <div class="review-card">
                <h3 class="client-name">Priya Shah</h3>
                <div class="stars">⭐⭐⭐⭐</div>
                <p class="client-text">Great hospitality and delicious food. Loved the spa and wellness area!</p>
            </div>

            <div class="review-card">
                <h3 class="client-name">John Fernandes</h3>
                <div class="stars">⭐⭐⭐⭐⭐</div>
                <p class="client-text">One of the best experiences! Staff were friendly and professional.</p>
            </div>

        </div>
    </section>
</body>
</html>