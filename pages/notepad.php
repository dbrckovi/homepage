<script>
    var _somethingChanged = false;

    setInterval(saveIfNeeded, 3000);

    function loadCombo() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                var items = this.responseText.split("|");

                for (const item of items) {
                    var parts = item.split("=")
                    addComboItem(parts[0], parts[1]);
                }

                cmbNotepad_SelectionChanged();
            }
        };
        xmlhttp.open("GET", "bll/notepadCRUD.php", true);
        xmlhttp.send();
    }

    function addComboItem(value, name) {
        var cmbNotepad = document.getElementById("cmbNotepad");
        var item = document.createElement("option");
        item.text = name;
        item.value = value;
        cmbNotepad.add(item);
    }

    function cmbNotepad_SelectionChanged() {
        var cmbNotepad = document.getElementById("cmbNotepad");
        var txtContent = document.getElementById("txtContent");
        var txtName = document.getElementById("txtName");
        var selectedValue = cmbNotepad.value;
        var selectedName = cmbNotepad.options[cmbNotepad.selectedIndex].text

        txtContent.value = "";
        txtName.value = selectedName;

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                txtContent.value = this.responseText;


            }
        };
        xmlhttp.open("GET", "bll/notepadCRUD.php?ID=" + selectedValue, true);
        xmlhttp.send();
    }

    function newItem() {
        alert("new Item");
    }

    function txtContent_KeyUp() {
        _somethingChanged = true;
        document.getElementById("notSavedIndicator").classList.remove("invisible");
    }

    function saveIfNeeded() {
        if (_somethingChanged) saveContent();
    }

    function saveContent() {
        _somethingChanged = false;

        var selectedValue = document.getElementById("cmbNotepad").value
        var text = window.document.getElementById("txtContent").value;

        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("notSavedIndicator").classList.add("invisible");
            }
        };

        xmlhttp.open("POST", "bll/notepadCRUD.php?ID=" + selectedValue, true);
        xmlhttp.setRequestHeader("Content-type", "text/html");
        xmlhttp.send(text);
    }
</script>

<h3>Notepad</h3>

<div class="Row">

    <button class="greenButton" onclick="newItem()">New</button>

    Item:

    <select id="cmbNotepad" class="Column" onchange="cmbNotepad_SelectionChanged()">
    </select>
    <script>
        loadCombo();
    </script>

    Name:

    <input id="txtName" class="Column"></input>
    <div class="Column" style="color: grey">
        <div id="notSavedIndicator" class="invisible grayText">*</div>
    </div>
</div>

<textarea id="txtContent" style="width:100%; height:70vh" onkeyup="txtContent_KeyUp();" onchange="saveIfNeeded();"></textarea>