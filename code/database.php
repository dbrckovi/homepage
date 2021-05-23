<?php

include_once("config.php");

class database
{
    private static function connectToDatabase()
    {
        $conn = new mysqli(config::SQL_SERVER, config::SQL_USER, config::SQL_PASSWORD, config::SQL_DATABASE);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    /**
     * Gets combobox options for all records in the Notepad table
     */
    public static function getNotepadCombo()
    {
        $sql = "SELECT ID, Name from Notepad";

        $conn = self::connectToDatabase();
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value=" . $row["ID"] . ">" . $row["Name"] . "</option>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    public static function SaveNotepadContent($id, $contents)
    {
        $sql = "UPDATE Notepad SET Contents = '" . $contents  . "' WHERE ID = ". $id;
        $conn = self::connectToDatabase();
        $conn->query($sql);
        $conn->close();
    }

    /**
     * Gets Contents value for specified Notepad.ID
     */
    public static function getNotepadContent($id)
    {
        $sql = "SELECT Contents from Notepad where ID = " . $id;
        $conn = self::connectToDatabase();
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row["Contents"];
        } else {
            return null;
        }
        $conn->close();
    }
}

?>