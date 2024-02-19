<?php
include_once 'header.php';
?>
    <form action="worktime_insert.php" method="post">
        <h1>Registracija časa</h1>
        <h2>Izberite ustrezen dogodek!</h2>

        <h1 style="text-align:right">Ura:
            <?php
            date_default_timezone_set('Europe/Ljubljana');
            echo $timestamp = date('H:i:s');
            ?>
        </h1><br />

        <div class="form-floating">
        <select name="event_id" required="required" id="floatingSelect" class="form-select">
            <?php
            include_once 'db.php';
            $query = "SELECT * FROM events";
            $stmt = $pdo->prepare($query);
            $stmt->execute();

            while($row = $stmt->fetch()) {
                echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
            }
        ?>
        </select><br />
        <label for="floatingSelect">Izberi dogodek</label>
        <input type="submit" class="btn btn-primary w-100 py-2" value="Potrdi" />
    </form>
<?php
include_once 'footer.php';
?>