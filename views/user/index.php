<h1>User</h1>

<form method="post" action="<?php echo URL; ?>user/create">
    <label>Login</label><input type="text" name="login" /><br />
    <label>Password</label><input type="text" name="password" /><br />
    <label>Role</label>
    <select name="role">
        <option value="default">Default</option>
        <option value="admin">Admin</option>
    </select><br />
    <label>&nbsp;</label><input type="submit" />
</form>

<hr />

<table>
    <?php    
    foreach ($this->userList as $user) {
        echo '<tr>';
        echo '<td>' . $user->getId() . '</td>';
        echo '<td>' . $user->getLogin(). '</td>';
        echo '<td>' . $user->getRole() . '</td>';
        echo '<td>
                <a href="' . URL . 'user/edit/' . $user->getId() . '">Edit</a> 
                <a href="' . URL . 'user/delete/' . $user->getId() . '">Delete</a></td>';
        echo '</tr>';
    }
    ?>
</table>