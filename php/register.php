<?php
if (isset($_POST['username'])) {
    $username = strtolower($_POST['username']);
    $goalname = preg_replace("/[^a-z0-9]+/", "", $username);
    $password = hash('sha512', $_POST['password']);
    function e($e) {
        echo "<p style=\"color: red;\">".htmlspecialchars($e)."</p><br />";
        die('<a onclick="window.history.back()">Try Again</a>');
    }
    include './securimage/securimage.php';
    $securimage = new Securimage();
    if ($securimage->check($_POST['captcha_code']) == false) e("Incorrect captcha");
    if ($username !== $goalname) e("Your username doesn't match our standards. Your name, '".htmlspecialchars($username)."', should be '".$goalname."'.");
    if ($_POST['password'] != $_POST['password2']) e("Passwords didn't match");
    if (strlen($_POST['username']) <= 6 || strlen($_POST['username']) >= 16) e("Incorrect username, use 6 to 16 chars.");
    if (strlen($_POST['password']) <= 8 || strlen($_POST['password']) >= 128) e("Incorrect password, use 8 to 128 chars.");
    // Check if user with provided username exist:
    $c = $db->prepare("SELECT * FROM `users` WHERE `username`=:username");
    $c->bindParam(":username", $username);
    $c->execute();
    $c = $c->fetchAll();
    if ($c !== []) e("User with given username already exist.");
    // All ok, make account.
    $q = $db->prepare("INSERT INTO `users`(`username`, `password`, `status`) VALUES (:username, :password, 'USER')");
    $q->bindParam(":username", $username);
    $q->bindParam(":password", $password);
    $q->execute();
    sorry("Account created!", "Your account have been created! Now login");
} else {
?>
<form action="/" method="POST">
    <div class="container">
        <h1>Register</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>

        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" id="username" required>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" id="password" required>

        <label for="password"><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" name="password2" id="password2" required>
    
        <img id="captcha" src="/securimage/securimage_show.php" alt="CAPTCHA Image" /><br />
        <label for="captcha"><b>Beep boop?</b><a href="#" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false">[ Unreadable? ]</a></label>
        <input type="text" name="captcha_code" size="10" maxlength="6" /><br />
        <hr>
        <button type="submit" class="registerbtn">Register</button>
    </div>
</form>
<?php
}
?>