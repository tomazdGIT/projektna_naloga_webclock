<?php
include_once 'header.php';
include_once 'db.php';
?>
    <form action="employee_insert.php" method="post">
        <h1 class="h3 mb-3 fw-normal">Registracija</h1>
        <div class="form-floating">
            <input type="text" id="floatingInput1" class="form-control" name="first_name" placeholder="Vnesi ime" required="required" /><br />
            <label for="floatingInput1">Vnesi ime</label>
        </div>
        <div class="form-floating">
            <input type="text" id="floatingInput2" class="form-control" name="last_name" placeholder="Vnesi priimek" required="required" /><br />
            <label for="floatingInput2">Vnesi priimek</label>
        </div>
        <div class="form-floating">
            <input type="email" id="floatingInput3" class="form-control" name="email" placeholder="Vnesi e-pošto" required="required" /><br />
            <label for="floatingInput4">Vnesi e-pošto</label>
        </div>
        <div class="form-floating">
            <input type="password" id="floatingInput4" class="form-control" name="pass" placeholder="Vnesi svoje geslo" required="required" /><br />
            <label for="floatingInput5">Vnesi geslo</label>
        </div>
        <div class="form-floating">
            <input type="text" id="floatingInput5" class="form-control" name="address" placeholder="Vnesi naslov" required="required" /><br />
            <label for="floatingInput4">Vnesi naslov</label>
        </div>
        <div class="form-floating">
            <select name="city_id" required="required" id="floatingSelect6" class="form-select">
                <?php
                include_once 'db.php';
                $query = "SELECT * FROM cities";
                $stmt = $pdo->prepare($query);
                $stmt->execute();

                while($row = $stmt->fetch()) {
                    echo '<option value="'.$row['id'].'">'.$row['city_name'].'</option>';
                }
                ?>
            </select><br />
            <label for="floatingSelect">Izberi kraj</label>
        </div>
        <div class="form-floating">
            <input type="text" id="floatingInput7" class="form-control" name="telephone" placeholder="Vnesi telefon" /><br />
            <label for="floatingInput3">Vnesi telefon</label>
        </div>
        <div class="form-floating">
            <select name="status_id" required="required" id="floatingSelect8" class="form-select">
                <?php
                include_once 'db.php';
                $query = "SELECT * FROM status";
                $stmt = $pdo->prepare($query);
                $stmt->execute();

                while($row = $stmt->fetch()) {
                    echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
                }
                ?>
            </select><br />
            <label for="floatingSelect">Izberi status</label>
        </div>

        <!admin status >
        <div class="checkbox">
            <input type="checkbox" id="statusadmin" name="admin" value= 1 >
            <label for="admin"> Administrator </label>
        </div></br>

        <input type="submit" class="btn btn-primary w-100 py-2" value="Registriraj zaposlenega" />
        <input type="button" class="btn btn-primary w-100 py-2" value="Nazaj" onclick="history.back()"/>
    </form>

<?php
include_once 'footer.php';
?>