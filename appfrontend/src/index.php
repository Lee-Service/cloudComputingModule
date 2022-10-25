<?php
header("Access-Control-Allow-Origin: *");
require_once("frontendjavascript.php");
?>

<!DOCTYPE html>
<html lang=en>

<head>
    <link rel="stylesheet" href="frontendcss.css">
    <title>WebWordCount</title>
</head>

<body>
    <div id="wordcount">
        <div id="logo">
            Web Word Counter
        </div>
        <div>
            <textarea id="paragraph" rows="5" cols="35" placeholder="Enter the paragraph here..." value="">Enter the paragraph here...
        </textarea>
        </div>
        <div>
            <input type="text" id="word" placeholder="Enter the keyword here..." value="">
        </div>
        <div>
            <input type="text" class="display" id="display-1" readonly=1 placeholder="Total word count = 0 " value=""><br>
            <input type="text" class="display" id="display-2" readonly=1 placeholder="Keyword does not exist!" value=""><br>
            <input type="text" class="display" id="display-3" readonly=1 placeholder="Total keyword appearances = 0" value="">
        </div>
        <div>
            <button class="wwcbutton" onclick="totalWordCount();">Check your total number of words!</button>
        </div>
        <div>
            <button class="wwcbutton" onclick="keyWordCheck();">Check if your keyword is present!</button>
        </div>
        <div>
            <button class="wwcbutton" onclick="keyWordAppearanceNumber();">Check how frequently your keyword shows up!</button>
        </div>
        <div>
            <button class="wwcbutton-clear" onclick="Clear();">Clear all!</button>
        </div>

    </div>
</body>

<script type="text/javascript">
</script>

</html>