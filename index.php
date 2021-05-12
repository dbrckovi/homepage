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

<body>
    <?php
    include_once('common.php');
    generateMainButtons();
    generatePageContent();
    ?>
</body>

</html>

<?php 


function generateMainButtons()
{
    echo "<div>";
    generateButton(PAGE_NOTEPAD, TITLE_NOTEPAD);
    generateButton(PAGE_SHOPPING, TITLE_SHOPPING);
    generateButton(PAGE_LISTS, TITLE_LISTS);
    generateButton(PAGE_DEBUG, TITLE_DEBUG);
    generateButton(PAGE_INFO, TITLE_INFO);
    echo "</div>";
}

function generateButton($pageID, $text)
{
    $currentPageID = common::getCurrentPageID();
    $className = ($currentPageID == $pageID) ? "greenButton" : "blueButton";
    echo "<a class='" . $className . "' href='?pageID=" . $pageID . "'>" . $text . "</a>";
}       

function generatePageContent()
{
    $pageID = common::getCurrentPageID();

    $pageTitle = null;
    $pageSource = null;

    switch ($pageID) {
        case PAGE_NOTEPAD:
            $pageTitle = TITLE_NOTEPAD;
            $pageSource = 'notepad.php';
            break;
        case PAGE_SHOPPING:
            $pageTitle = TITLE_SHOPPING;
            $pageSource = 'shopping.php';
            break;
        case PAGE_LISTS:
            $pageTitle = TITLE_LISTS;
            $pageSource = 'lists.php';
            break;
        case PAGE_INFO:
            $pageTitle = TITLE_INFO;
            $pageSource = 'info.php';
            break;
        case PAGE_DEBUG:
            $pageTitle = TITLE_DEBUG;
            $pageSource = 'debug.php';
            break;
    }

    echo "<div>
            <h3>" . $pageTitle . "</h3>
          </div>";

    include($pageSource);
}


?>