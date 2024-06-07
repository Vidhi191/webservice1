

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
</head>
<body>
    <h1>Update User</h1>
    <form id="updateUserForm">
        <label for="id">ID:</label><br>
        <input type="text" id="id" name="id"><br><br>
        
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br><br>
        
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email"><br><br>
        
        <label for="age">password:</label><br>
        <input type="text" id="password" name="password"><br><br>
        
        <input type="button" value="Update User" onclick="updateUser()">
    </form>
    
    <p id="response"></p>

    <script>
        function updateUser() {
            // Get form data
            var id = document.getElementById('id').value;
            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;

            // Create a data object
            var data = {
                id: id,
                name: name,
                email: email,
                password: password
            };

            // Send a PUT request using fetch API
            fetch('update.php', {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: new URLSearchParams(data)
            })
            .then(response => response.json())
            .then(data => {
                // Display response
                document.getElementById('response').textContent = data.message;
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('response').textContent = 'Error updating user.';
            });
        }
    </script>
</body>
</html>