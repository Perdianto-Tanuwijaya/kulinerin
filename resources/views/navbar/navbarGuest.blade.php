<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<style>
    * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: system-ui, -apple-system, sans-serif;
        }

        .navbar {
            display: flex;
            align-items: center;
            padding: 1rem 2rem;
            background-color: #D67B47ff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .logo {
            width: 60px;
            height: 60px;
        }

        .search-container {
            flex: 1;
            margin: 0 2rem;
        }

        .search-bar {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            background-color: white;
            background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>');
            background-repeat: no-repeat;
            background-position: 10px center;
            padding-left: 40px;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
        }

        .nav-link {
            text-decoration: none;
            color: #333;
        }
</style>
<body>
    <nav class="navbar">
        <img src="{{ asset('asset/kulinerinLogo.png') }}" alt="Kulinerin Logo" class="logo">
        <div class="search-container">
            <input type="text" class="search-bar" placeholder="Search Any Restaurant Here">
        </div>
        <div class="nav-links">
            <a href="/" class="nav-link">Dashboard</a>
            <a href="{{ route('login') }}" class="nav-link">Login</a>
            <a href="{{ route('register') }}" class="nav-link">Register</a>
        </div>

    </nav>
    
</body>
</html>