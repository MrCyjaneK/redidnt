<?php
if (!REDIDNT) die();

if (isset($_POST['username'])) {
    $query = $db->prepare("SELECT * FROM `users` WHERE username=:username AND password=:password");
    $query->bindParam(":username", $_POST['username']);
    $query->bindParam(":password",hash("sha512", $_POST['password']));
    $query->execute();
    $query = $query->fetchAll();
    if ($query == []) {
        sorry("Failed to login", "Oups! You have provided invalid login or password.");
    } else {
        $_SESSION['username'] = $query[0]['username'];
        sorry("Logged in", "You have logged in as ".htmlspecialchars($_POST['username'])."!");
    }
} else {
?>
<form action="/" method="POST">
    <div class="container">
        <h1>Login</h1>
        <p>Please fill in this form to login.</p>
        <hr>

        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" id="username" required>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" id="password" required>

        <img id="captcha" src="/securimage/securimage_show.php" alt="CAPTCHA Image" /><br />
        <label for="captcha"><b>Beep boop?</b><a href="#" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false">[ Unreadable? ]</a></label>
        <input type="text" name="captcha_code" size="10" maxlength="6" /><br />
        <hr>
        <button type="submit" class="registerbtn">Login</button>
    </div>
</form>
<?php
}
?>