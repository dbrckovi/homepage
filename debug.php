<style>
    .red {
        background-color: red;
    }

    .green {
        background-color: green;
    }
</style>

<p class="workArea">Neki text placeholder za debugaa</p>

<div id="indicator" class="green" style="width:32px">A</div>
<button onclick="timer();">bla</button>

<script>
    
    window.setInterval(timer, 3000);

    function timer() {
        var indicatorElement = window.document.getElementById("indicator");
        if (indicatorElement.classList.contains("red")) indicatorElement.classList.replace("red", "green");
        else indicatorElement.classList.replace("green", "red");
    }
</script>