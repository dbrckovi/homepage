<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/code/common.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/code/database.php");
$id = common::getUrlValue("id");

if (common::isGet()) {
    if ($id == null) {
        header("Location: index.php?id=1");
        die();
    }
} else if (common::isPost()) {
    $contents = file_get_contents('php://input');
    $id = common::getUrlValue("id");
    database::SaveNotepadContent($id, $contents);
    die();
} else die();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/buttons.css">
    <link rel="stylesheet" href="css/general.css">
    <title>brc.com.hr</title>
</head>

<script>
    var currentlySaving = false;
    var saveNeeded = false;

    window.setInterval(periodicSave, 3000);

    function periodicSave() {
        if (saveNeeded === true && currentlySaving === false) {
            saveNotepadText();
        }
    }

    function setSaveNeeded() {
        saveNeeded = true;
        var lblSaveNeeded = document.getElementById("lblSaveNeeded");
        lblSaveNeeded.classList.remove("invisible");
    }

    function saveNotepadText() {
        currentlySaving = true;
        const urlParams = new URLSearchParams(window.location.search);
        var lblSaveNeeded = document.getElementById("lblSaveNeeded");
        var text = window.document.getElementById("txtContents").value;
        var id = urlParams.get('id');
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                lblSaveNeeded.classList.add("invisible");
                currentlySaving = false;
            }
        };

        xmlhttp.open("POST", "index.php?id=" + id, true);
        xmlhttp.setRequestHeader("Content-type", "text/html");
        xmlhttp.send(text);
    }
</script>

<body>

    <div id="pnlButtons" class="row buttonPanel">
        <?php database::getNotepadButtons("blueButton", "index.php"); ?>
    </div>


    <div class="titleBar row">
        <div class="col">
            <?php echo database::getNotepadName($id); ?>
        </div>
        <div id="lblSaveNeeded" class="invisible col" style="width:20px">*</div>
    </div>

    <textarea id="txtContents" class="textBox" onpaste="setSaveNeeded();" onchange="saveNotepadText();" onkeypress="setSaveNeeded();" oninput="setSaveNeeded();"><?php echo database::getNotepadContent($id); ?></textarea>
</body>

</html>