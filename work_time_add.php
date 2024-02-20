<?php
include_once 'header.php';
include_once 'db.php';
?>

<form action="work_time_add_insert.php" method="post">
    <h1 class="h3 mb-3 fw-normal">Dodajanje dogodka zaposlenega</h1>
    <div class="form-floating">
        <select name="employee_id" required="required" id="floatingSelect1" class="form-select">
            <?php
            include_once 'db.php';
            $query = "SELECT * FROM employees";
            $stmt = $pdo->prepare($query);
            $stmt->execute();

            while($row = $stmt->fetch()) {
                echo '<option value="'.$row['id'].'">'.$row['email'].'</option>';
            }
            ?>
        </select><br />
        <label for="floatingSelect">Izberi zaposlenega</label>
    </div>
    <div class="form-floating">
        <select name="event_id" required="required" id="floatingSelect2" class="form-select">
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
    </div>
    <div class="form-floating">
        <input type="timestamp" name="time"  required="required" class="form-control" id="floatingInput" placeholder="Čas" />
        <label for="floatingInput1">Vnesi čas (YYYY-MM-DD HH:MM:SS)</label>
    </div>
        <input type="submit" class="btn btn-primary w-100 py-2" value="Dodaj dogodek" />
        <input type="button" class="btn btn-primary w-100 py-2" value="Nazaj" onclick="history.back()"/>
</form>
<?php
include_once 'footer.php';
?>