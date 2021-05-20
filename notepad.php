<script>
    document.addEventListener("DOMContentLoaded", notepadItemChanged);
    window.setInterval(periodicSave, 3000);

    function periodicSave() {
        if (document.getElementById("cmbNotepad") != null && document.getElementById("txtContents") != null) {
            saveNotepadText();
        }
    }

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

    function saveNotepadText() {
        var saveIndicatorElement = document.getElementById("saveIndicator");
        var selectedValue = document.getElementById("cmbNotepad").value
        var text = window.document.getElementById("txtContents").value;

        saveIndicatorElement.classList.remove("invisible");

        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                saveIndicatorElement.classList.add("invisible");
            }
        };

        xmlhttp.open("POST", "notepadContent.php?ID=" + selectedValue, true);
        xmlhttp.setRequestHeader("Content-type", "text/html");
        xmlhttp.send(text);

    }
</script>

<div class="Row">
    <select class="Column" name="cmbNotepad" id="cmbNotepad" onchange="notepadItemChanged()">
        <?php
        include_once('database.php');
        database::getNotepadCombo();
        ?>
    </select>

    <div id="saveIndicator" class="Column invisible">Saving</div>
</div>

<div id="contentHolder">

</div>