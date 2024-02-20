<?php
include_once 'header.php';
?>

    <form action="event_insert.php" method="post" >
        <h1 class="h3 mb-3 fw-normal">Dodaj dogodek</h1>

        <div class="form-floating">
            <input type="text" name="title" required="required" class="form-control" id="floatingInput" placeholder="Ime dogodka" />
            <label for="floatingInput">Vnesi ime dogodka</label>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">Shrani</button>
        <input type="button" class="btn btn-primary w-100 py-2" value="Nazaj" onclick="history.back()"/>
    </form>

<?php
include_once 'footer.php';
?>