<?php
include_once 'header.php';
include_once 'db.php';


$id = $_GET['id'];
//poizvedba za izpis zaposlenega za urejenje razen za izbirne menije
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
            <label for="floatingInput">Uredi ime zaposlenega</label><br />
        </div>
        <div class="form-floating">
            <input type="text" name="last_name" value="<?php echo $result['last_name']; ?>" required="required" class="form-control" id="floatingInput" placeholder="Priimek" />
            <label for="floatingInput">Uredi priimek zaposlenega</label><br />
        </div>

        <div class="form-floating">
            <select name="city_id" required="required" id="floatingSelect" class="form-select">
                <?php
                include_once 'db.php';

                $query = "SELECT * FROM cities";
                $stmt = $pdo->prepare($query);
                $stmt->execute();
                //izpis vseh mest za izbirni meni
                while($row = $stmt->fetch()) {
                    echo '<option value="'.$row['id'].'">'.$row['city_name'].'</option>';
                }
                ?>
            </select><br />
            <label for="floatingSelect"> Uredi kraj zaposlenega</label>
        </div>
        <div class="form-floating">
            <input type="email" name="email" value="<?php echo $result['email']; ?>" required="required" class="form-control" id="floatingInput" placeholder="E-mail" />
            <label for="floatingInput">Uredi e-pošto zaposlenega</label><br />
        </div>
        <div class="form-floating">
            <input type="text" name="telephone" value="<?php echo $result['telephone']; ?>"  class="form-control" id="floatingInput" placeholder="Telefon" />
            <label for="floatingInput">Uredi telefonsko številko zaposlenega</label><br />
        </div>
        <div class="form-floating">
            <select name="status_id" required="required" id="floatingSelect" class="form-select">
                <?php
                include_once 'db.php';
                $query = "SELECT * FROM status";
                $stmt = $pdo->prepare($query);
                $stmt->execute();
                //izpis vseh statusov za izbirni meni
                while($row = $stmt->fetch()) {
                    echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
                }
                ?>
            </select><br />
            <label for="floatingSelect"> Uredi status zaposlenega</label>
            <button class="btn btn-primary w-100 py-2" type="submit">Shrani spremembe</button>
        </div>
    </form>

    <!menjava gesla>
    <h1 class="h3 mb-3 fw-normal">Menjava gesla zaposlenega</h1>
    <form action="pass_update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id;?>" />
        <div class="form-floating">
            <input type="password" name="pass" class="form-control" id="floatingInput1" placeholder="Geslo" />
            <label for="floatingInput1">Vpiši novo geslo</label>
        </div>
        <div class="form-floating">
            <input type="password" name="pass2" class="form-control" id="floatingInput" placeholder="Geslo2" />
            <label for="floatingInput">Ponovi geslo</label><br />
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">Shrani geslo</button>
        <input type="button" class="btn btn-primary w-100 py-2" value="Nazaj" onclick="history.back()"/>
    </form>

    <!profilna slika z izbrisom>
    <h1 class="h3 mb-3 fw-normal">Uredi profilno sliko</h1>
    <div class="slike">
        <?php
        $query = "SELECT * FROM pictures WHERE employee_id=?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$id]);
        //izpis vseh slik zaposlenega z možnostjo izbrisa
        while ($row = $stmt->fetch()) {
            echo '<div class="slika">';
            echo '<img src="'.$row['url'].'"  class="img-thumbnail" />';
            echo '<a href="picture_delete.php?id='.$row['id'].'&employee_id='.$id.'" onclick="return confirm(\'Prepičan\');" class="delete-icon">X</a>';
            echo '</div>';
        }
        ?>
    </div>

    <!dodajanje slike>
    <form action="picture_insert.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id;?>" />
        <div class="mb-3">
            <label for="formFile" class="form-label">Naloži sliko</label>
            <input class="form-control" type="file" id="formFile" name="fileToUpload" />
        </div>
        <input type="submit" name="submit" class="btn btn-primary w-100 py-2" value="Shrani profilno sliko" />
    </form>
    <input type="button" class="btn btn-primary w-100 py-2" value="Nazaj" onclick="history.back()"/>

<?php
include_once 'footer.php';
?>