<?php
include_once 'header.php';
include_once 'db.php';


$id = $_GET['id'];
$slika_id = $id;
$query = "SELECT * FROM employees WHERE id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);
$result = $stmt->fetch();
?>
    <form action="employee_update.php" method="post" >
        <h1 class="h3 mb-3 fw-normal">Uredi zaposlenega</h1>
        <input type="hidden" name="id" value="<?php echo $result['id']; ?>" />
        <div class="form-floating">
            <input type="text" name="first_name" value="<?php echo $result['first_name']; ?>" required="required" class="form-control" id="floatingInput" placeholder="Ime" />
            <label for="floatingInput">Uredi ime zaposlenegaa</label><br />
        </div>
        <div class="form-floating">
            <input type="text" name="last_name" value="<?php echo $result['last_name']; ?>" required="required" class="form-control" id="floatingInput" placeholder="Priimek" />
            <label for="floatingInput">Uredi priimek zaposlenegaa</label><br />
        </div>

        <div class="form-floating">
            <select name="city_id" required="required" id="floatingSelect" class="form-select">
                <?php
                include_once 'db.php';
                $query = "SELECT * FROM cities";
                $stmt = $pdo->prepare($query);
                $stmt->execute();

                while($row = $stmt->fetch()) {
                    echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
                }
                ?>
            </select><br />
            <label for="floatingSelect"> Uredi kraj zaposlenega</label>
        </div>
        <div class="form-floating">
            <input type="email" name="email" value="<?php echo $result['email']; ?>" required="required" class="form-control" id="floatingInput" placeholder="E-mail" />
            <label for="floatingInput">Uredi e-pošto zaposlenegaa</label><br />
        </div>
        <div class="form-floating">
            <input type="password" name="pass" value="<?php echo $result['pass']; ?>" required="required" class="form-control" id="floatingInput" placeholder="E-mail" />
            <label for="floatingInput">Uredi geslo zaposlenegaa</label><br />
        </div>
        <div class="form-floating">
            <input type="text" name="telephone" value="<?php echo $result['telephone']; ?>"  class="form-control" id="floatingInput" placeholder="Telefon" />
            <label for="floatingInput">Uredi telefonsko številko zaposlenegaa</label><br />
        </div>
        <div class="form-floating">
            <select name="status_id" required="required" id="floatingSelect" class="form-select">
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
            <label for="floatingSelect"> Uredi status zaposlenega</label>
            <button class="btn btn-primary w-100 py-2" type="submit">Shrani spremembe</button>
            <input type="button" class="btn btn-primary w-100 py-2" value="Nazaj" onclick="history.back()"/>
    </form>

<?php
include_once 'footer.php';
