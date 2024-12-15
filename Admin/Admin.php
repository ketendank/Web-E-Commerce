<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Cihuy Store</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            min-width: 100%;
            min-height: 100%;
            background-color: #f4f4f9;
            color: #333;
        
        }

        .header {
            background: linear-gradient(45deg, #e74c3c, #8e44ad);
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }

        .container {
            display: flex;
            flex: 1;
        }

        .sidebar {
            width: 250px;
            background: linear-gradient(45deg, #e74c3c, #8e44ad);
            color: white;
            height: 100%;
            padding-top: 30px;
            position: fixed;
            overflow-y: auto;
        }

        .sidebar h3 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 20px;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar ul li {
            padding: 15px 20px;
            margin: 10px 10px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .sidebar ul li:hover {
            background-color:rgb(100, 48, 189);
        }

        .sidebar ul li i {
            margin-right: 10px;
        }

        .main-content {
            margin-left: 260px;
            padding: 20px;
            flex: 1;
            height: 100vh;
        }

        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .card {
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }

        .card h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 14px;
            color: #777;
        }

        .chart-container {
            margin-top: 20px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 15px;
            border: 1px solid #ddd;
            text-align: left;
        }

        table th {
            background-color: #512da8;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        .footer {
            text-align: center;
            padding: 10px 20px;
            background-color: #f4f4f9;
            color: #777;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="header">
        Admin Cihuy Store
    </div>

    <div class="container">
        <div class="sidebar">
            <h3>Menu</h3>
            <ul>
                <li data-target="dashboard"><i>🏠</i> Dashboard</li>
                <li data-target="users"><i>👤</i> Users</li>
                <li data-target="orders"><i>🛒</i> Orders</li>
                <li data-target="products"><i>📦</i> Products</li>
                <li data-target="logout"><i>🔓</i> Logout</li>
            </ul>
        </div>

        <div class="main-content" id="main-content">
            <!-- Dynamic content area -->
        </div>
    </div>

    <div class="footer">
        &copy; 2024 Cihuy Store Admin Panel. All Rights Reserved.
    </div>

    <script>
        const mainContent = document.getElementById('main-content');
        const sidebarItems = document.querySelectorAll('.sidebar ul li');

        const dashboardCards = `
            <div class="dashboard-cards">
                <div class="card">
                    <h3>Total Users</h3>
                    
                </div>
                <div class="card">
                    <h3>New Orders</h3>
                    
                </div>
                <div class="card">
                    <h3>Products</h3>
                    
                </div>
                <div class="card">
                    <h3>Revenue</h3>
                    
                </div>
            </div>
        `;

        // Load content based on the target section
        const loadContent = async (target) => {
            if (target === 'dashboard') {
                mainContent.innerHTML = dashboardCards;
            } else if (target === 'users') {
                const response = await fetch('loadUsers.php'); // PHP endpoint
                const data = await response.text();
                mainContent.innerHTML = data;
            } else {
                mainContent.innerHTML = `
                    <div class="card">
                        <h3>${target.charAt(0).toUpperCase() + target.slice(1)}</h3>
                        <p>Dynamic content for ${target} is loaded here.</p>
                    </div>
                `;
            }
        };

        // Add click listeners to sidebar items
        sidebarItems.forEach(item => {
            item.addEventListener('click', () => {
                const target = item.getAttribute('data-target');
                loadContent(target);
            });
        });

        // Load dashboard by default on page load
        loadContent('dashboard');
    </script>
</body>
</html>
