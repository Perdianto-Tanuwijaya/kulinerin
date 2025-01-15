<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Restaurant</title>
    <style>
        .rating {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .gallery {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 1rem;
            padding: 1rem;
        }
        .gallery-main {
            height: 300px;
            background: #eee;
        }
        .gallery-sidebar {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        .gallery-item {
            height: 90px;
            background: #eee;
        }
        .tabs {
            display: flex;
            gap: 2rem;
            padding: 1rem;
            border-bottom: 1px solid #eee;
        }
        .content {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
            padding: 1rem;
        }
    </style>
</head>
<body>
    @extends('master.masterCustomer')
    @section('content')

    <main>
        <div class="restaurant-header">
            <h1>Wing Heng (Gading Serpong)</h1>
            <div class="rating">
                <span>★★★★☆</span>
                <span>(100 Reviews)</span>
            </div>
        </div>

        <div class="gallery">
            <div class="gallery-main">IMAGE</div>
            <div class="gallery-sidebar">
                <div class="gallery-item">IMAGE</div>
                <div class="gallery-item">IMAGE</div>
                <div class="gallery-item">IMAGE</div>
            </div>
        </div>

        <div class="tabs">
            <a href="#overview">Overview</a>
            <a href="#review">Review</a>
            <a href="#book-table">Book Table</a>
            <a href="#menu">Menu</a>
        </div>

        <div class="content">
            <div class="info">
                <h2>About</h2>
                <div class="location">
                    <h3>Location</h3>
                    <p>Ruko Financial Blok BA 2</p>
                    <p>No.41-42 Jalan Boulevard Raya</p>
                    <p>Gading Serpong, RT.41/RW.42</p>
                </div>
                <div class="hours">
                    <h3>Opening Hours</h3>
                    <p>Mon-Sun: 6am-9pm</p>
                </div>
            </div>

            <div class="booking">
                <h2>Book Table</h2>
                <form>
                    <div class="form-group">
                        <label>People</label>
                        <input type="number" placeholder="Number of people">
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date">
                    </div>
                </form>
            </div>
        </div>
    </main>
    @endsection
</body>
</html>