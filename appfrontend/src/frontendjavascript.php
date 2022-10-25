<?php
global $proxyURL;
header("Access-Control-Allow-Origin: *");

$getProxyContents = file_get_contents('proxyservice.json');
$proxyarray = json_decode($getProxyContents, true);

// For each proxy link, get the headers and if the response code is suitable, proceed.
foreach ($proxyarray['proxies'] as $link) {
    $proxyURL = $link;
    $header_check = get_headers("$proxyURL");
    $response = $header_check[0];
    //set url from list of working links
    if ($response == 'HTTP/1.1 200 OK') {
        break;
    }
}

?>

<script type="text/javascript">
    <?php echo "var proxyURL= '$proxyURL';"; ?>

    let result = 0;
    let paragraph = '';
    let word = '';
    let service = 0;

    function Clear() {
        document.getElementById('paragraph').value = '';
        document.getElementById('word').value = '';
        document.getElementById('display-1').value = '';
        document.getElementById('display-2').value = '';
        document.getElementById('display-3').value = '';

    }

    function totalWordCountDisplay() {
        if (result > 0)
            result = 'Total word count = ' + result;

        else
            result = "Empty paragraph - try again.";

        document.getElementById('display-1').value = result;
    }

    function keyWordCheckDisplay() {
        if (result == 1)
            result = 'Keyword exists!';
        else
            result = 'Keyword does not exist!';
        document.getElementById('display-2').value = result;
    }

    function keyWordAppearanceNumberDisplay() {
        if (result > 0)
            result = 'Total Keyword appearances = ' + result;
        else
            result = "Nothing detected";
        document.getElementById('display-3').value = result;
    }

    function totalWordCount() {
        service = 1;
        paragraph = document.getElementById('paragraph').value.toLowerCase();
        word = document.getElementById('word').value.toLowerCase();

        if (paragraph == '' || word == '') {
            alert("Try again - no paragraph or keyword detected.");
            return;
        } else if (word.includes(" ") == true) {
            alert("Space detected in keyword - you cannot include multiple keywords or spaces.");
            return;

        } else {
            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var j = JSON.parse(this.response);
                    result = j.answer;
                    totalWordCountDisplay();
                }
            };
            xhttp.open("GET", proxyURL + "?paragraph=" + paragraph + "&word=" + word + "&service=" + service);
            xhttp.send();
            return;
        }
    }

    function keyWordCheck() {
        service = 2;
        paragraph = document.getElementById('paragraph').value.toLowerCase();
        word = document.getElementById('word').value.toLowerCase();

        if (paragraph == '' || word == '') {
            alert("Try again - no paragraph or keyword detected.");
            return;
        } else if (word.includes(" ") == true) {
            alert("Space detected in keyword - you cannot include multiple keywords or spaces.");
            return;

        } else {
            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var j = JSON.parse(this.response);
                    result = j.answer;
                    keyWordCheckDisplay();
                }
            };
            xhttp.open("GET", proxyURL + "?paragraph=" + paragraph + "&word=" + word + "&service=" + service);
            xhttp.send();
            return;
        }
    }

    function keyWordAppearanceNumber() {
        service = 3;
        paragraph = document.getElementById('paragraph').value.toLowerCase();
        word = document.getElementById('word').value.toLowerCase();

        if (paragraph == '' || word == '') {
            alert("Try again - no paragraph or keyword detected.");
            return;
        } else if (word.includes(" ") == true) {
            alert("Space detected in keyword - you cannot include multiple keywords or spaces.");
            return;
        } else {
            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var j = JSON.parse(this.response);
                    result = j.answer;
                    keyWordAppearanceNumberDisplay();
                }
            };
            xhttp.open("GET", proxyURL + "?paragraph=" + paragraph + "&word=" + word + "&service=" + service);
            xhttp.send();
            return;
        }
    }
</script>