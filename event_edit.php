<?php
include_once 'header.php';
include_once 'db.php';
//poizvedba za izpis dogodka za urejenje
$id = $_GET['id'];
$query = "SELECT * FROM events WHERE id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);
$result = $stmt->fetch();

?>
    <form action="event_update.php" method="post" >
        <h1 class="h3 mb-3 fw-normal">Uredi dogodek</h1>
        <input type="hidden" name="id" value="<?php echo $result['id']; ?>" />
        <div class="form-floating">
            <input type="text" name="title" value="<?php echo $result['title']; ?>" required="required" class="form-control" id="floatingInput" placeholder="Ime" />
            <label for="floatingInput">Uredi ime dogodka</label>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">Shrani</button>
        <input type="button" class="btn btn-primary w-100 py-2" value="Nazaj" onclick="history.back()"/>
    </form>

<?php
include_once 'footer.php';
?>