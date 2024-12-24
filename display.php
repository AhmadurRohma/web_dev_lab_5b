<?php include '../includes/header.php'; ?>

<div class="form-container">
    <h2>User List</h2>
    <table>
        <thead>
            <tr>
                <th>Matric</th>
                <th>Name</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include '../includes/Database.php';
            include '../includes/User.php';

            $database = new Database();
            $db = $database->getConnection();
            $user = new User($db);

            $result = $user->getUsers();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $Matric = $row['Matric'];
                    $Name = $row['Name'];
                    $Role = $row['Role'];

                    echo "<tr>
                            <td>{$Matric}</td>
                            <td>{$Name}</td>
                            <td>{$Role}</td>
                            <td>
                                <a href='../actions/delete.php?Matric={$Matric}'>Delete</a> |
                                <a href='../pages/update_form.php?Matric={$Matric}'>Update</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No Users Found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>