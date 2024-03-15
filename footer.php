</div>
</div>

</main>

<footer class="text-body-secondary py-5">
    <div class="container">
        <p class="float-end mb-1">
            <a href="#">Back to top</a>
        </p>
        <p class="mb-1">WebClock &copy; Firma d.d.</p>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
    $(document).ready(function () {
        setTimeout(function () {
            $("#sporocilo").fadeOut("slow");
        }, 3000);
    });
</script>
<script>
    function updateClock() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();

        //dodamo vodilno 0 pred enojne številke
        hours = (hours < 10 ? "0" : "") + hours;
        minutes = (minutes < 10 ? "0" : "") + minutes;
        seconds = (seconds < 10 ? "0" : "") + seconds;

        // format izpisa ure HH:MM:SS
        var timeString = hours + ":" + minutes + ":" + seconds;

        //posodobitev ure
        document.getElementById("clock").innerHTML = timeString;

        //interval posodobitve ure vsako sekundo
        setTimeout(updateClock, 1000);
    }

    //zagon funkcije ob nalaganju strani
    window.onload = function() {
        updateClock();
    };
</script>
</body>
</html>
