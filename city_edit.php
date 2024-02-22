<?php
include_once 'header.php';
include_once 'db.php';

$id = $_GET['id'];
//poizvedba za izpis mesta za urejenje
$query = "SELECT * FROM cities WHERE id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);
$result = $stmt->fetch();
?>
    <form action="city_update.php" method="post" >
        <h1 class="h3 mb-3 fw-normal">Uredi kraj</h1>
        <input type="hidden" name="id" value="<?php echo $result['id']; ?>" />
        <div class="form-floating">
            <input type="text" name="city_name" value="<?php echo $result['city_name']; ?>" required="required" class="form-control" id="floatingInput" placeholder="Ime kraja" />
            <label for="floatingInput">Uredi ime kraja</label>
        </div>
        <div class="form-floating">
            <input type="text" name="post_number" value="<?php echo $result['post_number']; ?>" required="required" class="form-control" id="floatingPassword" placeholder="Vnesi poštno številko" />
            <label for="floatingPassword">Uredi poštno številko</label>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">Shrani</button>
        <input type="button" class="btn btn-primary w-100 py-2" value="Nazaj" onclick="history.back()"/>
    </form>

<?php
include_once 'footer.php';
?>