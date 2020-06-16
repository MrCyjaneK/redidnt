<?php
if (!REDIDNT) die();

if (!isset($_GET['id'])) {
    sorry("Oups!", "No ID provided!");
} else {
    $post = getPostById($_GET['id']);

    ?>
<div class="row">
    <div class="column-left">
        <div class="post">
            <div class="post-text post-column-left">
                <span style="font-size: 150%;"><?php echo htmlspecialchars($post->title) ?></span><br />
                <span><?php echo htmlspecialchars($post->content); ?></span><br />
                <a href="">#42069 Comments</a> |
                <a href="">#Share</a> |
                <a href="">#Report</a>
            </div>
            <div class="post-column-right">
                <center><a rel="nofollow" onclick="vote('+',<?php echo $post->ID; ?>)" class="votebtn"><b>+</b></a></center>
                <center><span>+69</span></center>
                <center><a rel="nofollow" onclick="vote('-',<?php echo $post->ID; ?>)" class="votebtn"><b>-</b></a></center>
            </div>
        </div>
        <hr />
        <div class="comments">
            <!--- #TODO: Add comments --->
        </div>
    </div>
    <div class="column-right">
        <p>Right menu</p>
        <p>With some sub info or idk</p>
    </div>
</div>
    <?php
}
?>