<script>
    function test() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                setDebugText(this.responseText);
            }
        };
        // xmlhttp.open("POST", "bll/notepadCRUD.php", true);
        xmlhttp.open("GET", "bll/notepadCRUD.php?ID=" + 1, true);
        xmlhttp.send();
    }

    function setDebugText(text) {
        var txtDebug = document.getElementById("txtDebug");
        txtDebug.value = text;
    }

    function addDebugLine(text) {
        var txtDebug = document.getElementById("txtDebug");
        txtDebug.value = txtDebug.value + text + "\r\n";
    }
</script>

<div class="Row">
    <button class="blueButton" onclick="test();">TEST</button>
</div>

<textarea ID="txtDebug" style="width: 100%; height:60vh"></textarea>