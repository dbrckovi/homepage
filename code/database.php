<?php

include_once($_SERVER['DOCUMENT_ROOT'] . "/config.php");

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

    public static function getNotepadName($id)
    {
        $sql = "SELECT Name FROM Notepad WHERE ID = " . $id;
        $conn = self::connectToDatabase();
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row["Name"];
        } else {
            return "!!Not found!!";
        }
        $conn->close();
    }

    public static function getNotepadButtons($class, $baseURL)
    {
        $sql = "SELECT ID, Name from Notepad";

        $conn = self::connectToDatabase();
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<a class='" . $class . "' href='" . $baseURL . "?id=". $row["ID"] ."'>" . $row["Name"] . "</a>";
            }
        }
        $conn->close();
    }

    public static function SaveNotepadContent($id, $contents)
    {
        $sql = "UPDATE Notepad SET Contents = '" . $contents  . "' WHERE ID = " . $id;
        $conn = self::connectToDatabase();
        $conn->query($sql);
        $conn->close();
    }

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
