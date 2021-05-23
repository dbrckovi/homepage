<script>
    var _somethingChanged = false;

    setInterval(saveIfNeeded, 3000);

    function loadCombo() {
        addComboItem("1", "Prvi item");
        addComboItem("2", "Drugi item");
    }

    function addComboItem(value, name) {
        var cmbNotepad = document.getElementById("cmbNotepad");
        var item = document.createElement("option");
        item.text = name;
        item.value = value;
        cmbNotepad.add(item);
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
        document.getElementById("notSavedIndicator").classList.add("invisible");
    }
</script>

<h3>Notepad</h3>

<div class="Row">

    <button class="greenButton" onclick="newItem()">New</button>

    Item:

    <select id="cmbNotepad" class="Column">
    </select>
    <script>
        loadCombo();
    </script>

    Name:

    <input id="txtName" class="Column"></input>
    <div class="Column" style="color: grey">
        <div id="notSavedIndicator" class="invisible grayText">not saved</div>
    </div>
</div>

<textarea id="txtContent" style="width:100%; height:70vh" onkeyup="txtContent_KeyUp();" onchange="saveIfNeeded();"></textarea>