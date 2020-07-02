<?php
if (!REDIDNT) die();
?>
<div class="container">
    <form action="/">
        <label for="title">Article title</label>
        <input type="text" id="title" name="title" placeholder="Article title">

        <label for="sub">Subredidn’t</label>
        <select id="sub" name="sub">
            <option value="australia">Australia</option>
            <option value="canada">Canada</option>
            <option value="usa">USA</option>
        </select>

        <label for="content">Content</label>
        <textarea id="content" name="content" placeholder="Write something.." style="height:200px"></textarea>

        <input type="submit" value="Submit">
    </form>
</div> 