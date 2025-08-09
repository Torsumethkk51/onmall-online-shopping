<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard/Users - Onmall</title>
</head>
<body>
    <h1>Admin Actions</h1>
    <div>
        <?php if (isset($data["errors"]["invalid"])): ?>
            <p style="color: red;"><?= $data["error"] ?></p>
        <?php endif; ?>
        <form action="users/create" method="post">
            <div>
                <label for="fullname">Fullname (*)</label>
                <input type="text" name="fullname" id="fullname" placeholder="Your Fullname" required>
            </div>
            <div>
                <label for="email">Email (*)</label>
                <?php if (isset($data["errors"]["email"])): ?>
                    <p><?= htmlspecialchars($data["errors"]["email"]) ?></p>    
                <?php endif; ?>
                <input type="email" name="email" id="email" placeholder="Your E-mail" required>
            </div>
            <div>
                <label for="password">Password (*)</label>
                <?php if (isset($data["errors"]["password"])): ?>
                    <p><?= htmlspecialchars($data["errors"]["password"]) ?></p>    
                <?php endif; ?>
                <input type="password" name="password" id="password" placeholder="Your Password" required>
            </div>
            <div>
                <label for="re-password">Re-Password (*)</label>
                <?php if (isset($data["errors"]["re-password"])): ?>
                    <p><?= htmlspecialchars($data["errors"]["re-password"]) ?></p>    
                <?php endif; ?>
                <input type="password" name="re-password" id="re-password" placeholder="Please Fill Password Again" required>
            </div>
            <button type="submit" name="sign-up">Sign Up</button>
        </form>
    </div>
    <?php if (isset($data["users"])): ?>
        <h2>Users Manager</h2>
        <table>
            <thead>
                <tr>
                    <th>NO.</th>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data["users"] as $idx => $user): ?>
                    <tr>
                        <td><?= $idx ?></td>
                        <td><?= htmlspecialchars($user["fullname"]) ?></td>
                        <td><?= htmlspecialchars($user["email"]) ?></td>
                        <td><?= htmlspecialchars($user["password"]) ?></td>
                        <td>
                            <a href="users/edit?id=<?= htmlspecialchars($user["id"]) ?>">Edit</a>
                            <a href="users/delete?id=<?= htmlspecialchars($user["id"]) ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>