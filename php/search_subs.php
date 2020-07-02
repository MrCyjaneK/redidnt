<?php
if (!REDIDNT) die();
if (isset($_POST['name'])) {
    if (in_array($_POST['sub'], ['n','d','nd'])) {
        $_POST['name'] = $_POST['name'].'%';
        switch ($_POST['sub']) {
            case 'n':
                $q = $db->prepare("SELECT * FROM `subs` WHERE `name` LIKE :name");
                $q->bindParam(":name", $_POST['name']);
                break;
            case 'd':
                $q = $db->prepare("SELECT * FROM `subs` WHERE `description` LIKE :description");
                $q->bindParam(":description", $_POST['name']);
                break;
            case 'nd':
                $q = $db->prepare("SELECT * FROM `subs` WHERE `name` LIKE :name OR `description` LIKE :description");
                $q->bindParam(":name", $_POST['name']);
                $q->bindParam(":description", $_POST['name']);
                break;
        }
        $q->execute();
        $subs = $q->fetchAll();
        if ($subs == []) {
            sorry(":(","Nothing was found");
        } else {
            foreach ($subs as $sub) {
                ?>
                <div class="container">
                    <h2><?= $sub['name']; ?></h2>
                    <span><?= $sub['description']; ?></span>
                    <span><a href="/?place=sub&sub=<?= $sub['name']; ?>">Open</a></span>
                </div>
                <hr />
                <?php
            }
        }
    } else {
        sorry("Oups!", "Something was wrong with your request");
    }
} else {
?>
<div class="container">
    <form method="POST" action="/">
        <label for="name">Search query</label>
        <input type="text" id="name" name="name" placeholder="r/meta">

        <label for="sub">Search in...</label>
        <select id="sub" name="sub">
            <option value="n" selected>Name</option>
            <option value="d">Description</option>
            <option value="nd">Name and description</option>
        </select>

        <input type="submit" value="Submit">
    </form>
    <a href="/?place=new_sub">Create new sub</a>
</div>
<?php } ?>