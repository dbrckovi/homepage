<?php include_once("code\common.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/buttons.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="icon" href="favicon.ico">
    <title>brc.com.hr</title>
</head>

<script>

</script>

<body>

    <div class="Row">
        <a class="Column blueButton" href="index.php?pageID=notepad">Notepad</a>
        <a class="Column blueButton" href="index.php?pageID=shopping">Shopping</a>
        <a class="Column blueButton" href="index.php?pageID=lists">Lists</a>
        <a class="Column blueButton" href="index.php?pageID=debug">Debug</a>
        <a class="Column blueButton" href="index.php?pageID=info">Info</a>
    </div>

    <div id="divContent" style="width: 100%;">
        <?php getContent(); ?>
    </div>

</body>

</html>

<?php

function getContent()
{
    $pageID = common::getUrlValue("pageID");
    
    switch ($pageID)
    {
        case "notepad": include("pages/notepad.php"); break;
        case "shopping": include("pages/shopping.php"); break;
        case "lists": include("pages/lists.php"); break;
        case "debug": include("pages/debug.php"); break;
        case "info": include("pages/info.php"); break;
    }
}
?>