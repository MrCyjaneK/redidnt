<?php
if (!REDIDNT) die();
if (isset($_POST['name'])) {
    $name = strtolower($_POST['name']);
    $goal = preg_replace("/[^a-z0-9]+/", "", $name);
    function e($e) {
        echo "<p style=\"color: red;\">".htmlspecialchars($e)."</p><br />";
        die('<a onclick="window.history.back()">Try Again</a>');
    }
    include './securimage/securimage.php';
    $securimage = new Securimage();
    if ($securimage->check($_POST['captcha_code']) == false) e("Incorrect captcha");
    if ($name !== $goal) e("Your sub name doesn't match our standards. Your sub name, '".htmlspecialchars($username)."', should be '".$goalname."'.");
    if (strlen($_POST['name']) <= 6 || strlen($_POST['name']) >= 16) e("Incorrect name, use 6 to 16 chars.");
    if (strlen($_POST['description']) <= 8 || strlen($_POST['description']) >= 512) e("Incorrect description, use 8 to 512 chars.");
    // Check if user with provided username exist:
    $c = $db->prepare("SELECT * FROM `subs` WHERE `name`=:name");
    $c->bindParam(":name", $goal);
    $c->execute();
    $c = $c->fetchAll();
    if($c != []) e("Sub with given name already exist!");
    $new = $db->prepare("INSERT INTO `subs`(`name`, `description`, `creator`, `mods`) 
                                    VALUES (:name, :description, :creatorid, :mods)");
    $new->bindParam(":name",$goal);
    $new->bindParam(":description", htmlspecialchars($_POST['description']));
    $new->bindParam(":creatorid", getUserByUsername($_SESSION['username'])->ID);
    $e = '';
    $new->bindParam(":mods", $e);
    $new->execute();
    sorry("Success!", "Your sub have got created");
} else {
?>
<div class="container">
    <form action="/" method="POST">
        <label for="name">Sub name</label>
        <input type="text" id="name" name="name" placeholder="Your sub name">

        <label for="description">Description</label>
        <input type="text" id="description" name="description" placeholder="It should be short">
        
        <img id="captcha" src="/securimage/securimage_show.php" alt="CAPTCHA Image" /><br />
        <label for="captcha"><b>Beep boop?</b><a href="#" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false">[ Unreadable? ]</a></label>
        <input type="text" name="captcha_code" size="10" maxlength="6" /><br />
        <hr>
        <input type="submit" value="Submit">
    </form>
</div>
<?php
}
?>