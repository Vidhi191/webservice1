<!DOCTYPE html>
<html>
<head>
    <title>Insert User Data</title>
</head>
<body>
    <h1>Insert User Data</h1>
    <form action="create.php" method="post">
        <label for="username">name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="text" id="password" name="password" required><br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>