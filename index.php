<?php
include_once("code/common.php");
$pageID = common::getUrlValue("pageID");

if ($pageID === null || common::isPageIDValid($pageID) === false) $pageID = common::PAGE_NOTEPAD;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/buttons.css">
    <link rel="stylesheet" href="css/general.css">
    <title>Document</title>
</head>

<body>

    <div id="pnlButtons" class="row buttonPanel">
        <?php generateButtons(); ?>
    </div>

    <div class="titleBar"><?php echo getPageTitle($pageID); ?></div>

    <div id="pnlContent">
        <?php renderPageContent($pageID); ?>
    </div>

</body>

</html>

<?php
function generateButtons()
{
    global $pageID;
    renderButton($pageID === common::PAGE_NOTEPAD ? "greenButton" : "blueButton", "index.php?pageID=" . common::PAGE_NOTEPAD, getpageTitle(common::PAGE_NOTEPAD));
    renderButton($pageID === common::PAGE_SHOPPING ? "greenButton" : "blueButton", "index.php?pageID=" . common::PAGE_SHOPPING, getpageTitle(common::PAGE_SHOPPING));
    renderButton($pageID === common::PAGE_LISTS ? "greenButton" : "blueButton", "index.php?pageID=" . common::PAGE_LISTS, getpageTitle(common::PAGE_LISTS));
    renderButton($pageID === common::PAGE_DEBUG ? "greenButton" : "blueButton", "index.php?pageID=" . common::PAGE_DEBUG, getpageTitle(common::PAGE_DEBUG));
}

function renderButton($class, $url, $text)
{
    echo "<a class='" . $class . "' href='" . $url . "'>" . $text . "</a>";
}

function getPageTitle($pageID)
{
    switch ($pageID) {
        case common::PAGE_NOTEPAD:
            return "Notepad";
        case common::PAGE_SHOPPING:
            return "Shopping";
        case common::PAGE_LISTS:
            return "Lists";
        case common::PAGE_DEBUG:
            return "Debug";
    }
}

function renderPageContent($pageID)
{
    switch ($pageID) {
        case common::PAGE_NOTEPAD:
            include("views/vNotepad.php");
            break;
        case common::PAGE_SHOPPING:
            include("views/vShopping.php");
            break;
        case common::PAGE_LISTS:
            include("views/vLists.php");
            break;
        case common::PAGE_DEBUG:
            include("views/vDebug.php");
            break;
    }
}
?>