<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard/Users - Onmall</title>
</head>
<body>
    <h1>All Users</h1>
    <ul>
    <?php foreach($data["users"] as $user): ?>
        <li><?= htmlspecialchars($user["fullname"]) ?></li>
    <?php endforeach; ?>
    </ul>
</body>
</html>