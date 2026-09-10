<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Management</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        .container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            padding: 40px;
            max-width: 900px;
            width: 100%;
        }
        
        h1 {
            color: #333;
            margin-bottom: 30px;
            text-align: center;
            font-size: 2em;
            border-bottom: 3px solid #667eea;
            padding-bottom: 15px;
        }
        
        .table-wrapper {
            overflow-x: auto;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }
        
        table thead {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        
        table th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
            font-size: 0.95em;
            letter-spacing: 0.5px;
        }
        
        table td {
            padding: 12px 15px;
            border-bottom: 1px solid #e0e0e0;
            font-size: 0.9em;
        }
        
        table tbody tr {
            transition: background-color 0.3s ease;
        }
        
        table tbody tr:hover {
            background-color: #f5f5f5;
        }
        
        table tbody tr:nth-child(even) {
            background-color: #fafafa;
        }
        
        .id-cell {
            font-weight: 600;
            color: #667eea;
        }
        
        .email-cell {
            color: #555;
        }
        
        .username-cell {
            color: #764ba2;
            font-weight: 500;
        }
        
        .no-data {
            text-align: center;
            padding: 40px;
            color: #999;
            font-size: 1.1em;
        }
        
        .back-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: transform 0.2s ease;
        }
        
        .back-link:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>User Management System</h1>
        
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Username</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($users)): ?>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td class="id-cell"><?php echo htmlspecialchars($user['id'] ?? $user->id ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($user['firstname'] ?? $user->firstname ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($user['lastname'] ?? $user->lastname ?? ''); ?></td>
                                <td class="email-cell"><?php echo htmlspecialchars($user['email'] ?? $user->email ?? ''); ?></td>
                                <td class="username-cell"><?php echo htmlspecialchars($user['username'] ?? $user->username ?? ''); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="no-data">No users found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        
        <a href="/" class="back-link">Back to Home</a>
    </div>
</body>
</html>
