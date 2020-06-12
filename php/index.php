<?php
if (!REDIDNT) die();
include "php/header.php";
// Actually content
if (empty($_SESSION['place'])) {$_SESSION['place'] = 'home'; }
if (isset($_GET['place'])) { $_SESSION['place'] = $_GET['place']; }
?>
<body>
    <div class="top-navigation">
<?php
include 'php/menu_elements.php';
foreach ($menu_elements as $element) {
    if ($_SESSION['place'] == $element['place']) {
        echo '<a class="active" href="?place='.$element['place'].'">'.$element['name'].'</a>';
    } else {
        echo '<a href="?place='.$element['place'].'">'.$element['name'].'</a>';
    }
}
?>
    </div>
<?php
// TODO: Add subredidnt element to menu
$place = preg_replace("/[^A-Za-z0-9_]/", '', $_SESSION['place']);
if (file_exists('php/'.$place.'.php')) {
    include 'php/'.$place.'.php';
} else {
    sorry("404 - Not found", "Oups! We were unable to find this place. Probably the link is wrong, try using our search engine (//todo). Requested place: ".$_SESSION['place']);
}
?>
</body>