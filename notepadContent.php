<?php
include_once("common.php");
include_once("database.php");

$notepadID = common::getUrlValue("ID");

if (common::isGet()) {
    $contents = database::getNotepadContent($notepadID);
    echo "<textarea class='textBox' id='txtContents' name='txtContents' onchange='saveNotepadText()'>" . $contents . "</textarea>";
} else if (common::isPost()) {
    $contents = file_get_contents('php://input');
    database::SaveNotepadContent($notepadID, $contents);
}

?>