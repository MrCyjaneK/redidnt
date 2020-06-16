<?php
if (!REDIDNT) die();

if (isset($_GET['sub'])) { $_SESSION['sub'] = $_GET['sub']; }
$subname = strtolower($_SESSION['sub']);
$l1 = isset($_GET['l1']) ? intval($_GET['l1']) : 0;
?>
<div class="row">
    <div class="column-left">
        <?php
        foreach (getPostsBySubName($subname, $l1) as $post) {
        ?>
        <div class="post">
            <div class="post-text post-column-left" onclick="window.location.href = '/?place=view_post&id=<?php echo $post['ID']; ?>&sub=<?php echo htmlspecialchars($subname); ?>'">
                <span style="font-size: 150%;"><?php echo htmlspecialchars($post['title']) ?></span><br />
                <span><?php echo substr(preg_replace("/[^a-zA-Z0-9 \.]+/", "", htmlspecialchars($post['content'])),0,200); ?></span><br />
                <a href="">#42069 Comments</a> |
                <a href="">#Share</a> |
                <a href="">#Report</a>
            </div>
            <div class="post-column-right">
                <center><a rel="nofollow" onclick="vote('+',<?php echo $post['ID']; ?>)" class="votebtn"><b>+</b></a></center>
                <center><span>+69</span></center>
                <center><a rel="nofollow" onclick="vote('-',<?php echo $post['ID']; ?>)" class="votebtn"><b>-</b></a></center>
            </div>
        </div>
        <?php
        }
        ?>
        <a href="/?l1=<?php echo ($l1 - 25); ?>">Prev</a>
        <a href="/?l1=<?php echo ($l1 + 25); ?>">Next</a>
    </div>
    <div class="column-right">
        <p>Right menu</p>
    </div>
</div>
