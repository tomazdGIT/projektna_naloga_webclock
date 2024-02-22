<?php
include_once 'header.php';
include_once 'db.php';
include_once 'session.php';

$id = $_SESSION['user_id'];
?>
<!menjava gesla>
<h1 class="h3 mb-3 fw-normal">Menjava gesla</h1>
<form action="pass_user_update.php" method="post">
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
<?php
include_once 'footer.php';
?>