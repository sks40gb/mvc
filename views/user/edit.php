<h1>User: Edit</h1>

<?php
print_r($this->user);


?>

<form method="post" action="<?php echo URL;?>user/editSave/<?php echo $this->user->getId(); ?>">
    <label>Login</label><input type="text" name="login" value="<?php echo $this->user->getLogin(); ?>" /><br />
    <label>Password</label><input type="text" name="password" /><br />
    <label>Role</label>
        <select name="role">
            <option value="admin" <?php if($this->user->getRole() == 'admin') echo 'selected'; ?>>Admin</option>
            <option value="owner" <?php if($this->user->getRole() == 'owner') echo 'selected'; ?>>Owner</option>
        </select><br />
    <label>&nbsp;</label><input type="submit" />
</form>