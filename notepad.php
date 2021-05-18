<script>
    document.addEventListener("DOMContentLoaded", notepadItemChanged);

    function notepadItemChanged() {
        var selectedValue = document.getElementById("cmbNotepad").value;
        document.getElementById("contentHolder").innerHTML = null;

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("contentHolder").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "notepadContent.php?ID=" + selectedValue, true);
        xmlhttp.send();
    }

    function textChanged() {
        
         var text = window.document.getElementById("txtContents").value;
         alert(text);
    }

    function saveNotepadText() {

        var selectedValue = document.getElementById("cmbNotepad").value
        var text = window.document.getElementById("txtContents").value;

        var xmlhttp = new XMLHttpRequest();

        xmlhttp.open("POST", "notepadContent.php?ID=" + selectedValue, true);
        xmlhttp.setRequestHeader("Content-type", "text/html");
        xmlhttp.send(text);
    } 

</script>

<select name="cmbNotepad" id="cmbNotepad" onchange="notepadItemChanged()">
    <?php
    include_once('database.php');
    database::getNotepadCombo();
    ?>
</select>

<div id="contentHolder">

</div>