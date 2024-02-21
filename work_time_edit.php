<?php
include_once 'header.php';
include_once 'db.php';

$id = $_GET['id'];
//poizvedba za izpis dogodka zaposlenega za urejenje razen za izbirne menije
$query = "SELECT * FROM work_time WHERE id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);
$result = $stmt->fetch();
?>
    <form action="work_time_update.php" method="post" >
        <h1 class="h3 mb-3 fw-normal">Uredi dogodke</h1>
        <input type="hidden" name="id" value="<?php echo $result['id']; ?>" />
        <div class="form-floating">
            <input type="timestamp" name="time" value="<?php echo $result['time']; ?>" required="required" class="form-control" id="floatingInput" placeholder="Čas" />
            <label for="floatingInput">Uredi čas dogodka</label><br />
        </div>
        <div class="form-floating">
            <select name="event_id" required="required" id="floatingSelect" class="form-select">
                <?php
                include_once 'db.php';
                $query = "SELECT * FROM events";
                $stmt = $pdo->prepare($query);
                $stmt->execute();
                //izpis vseh dogodkov za izbirni meni
                while($row = $stmt->fetch()) {
                    echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
                }
                ?>
            </select><br />
            <label for="floatingSelect"> Uredi dogodek zaposlenega</label>
            <button class="btn btn-primary w-100 py-2" type="submit">Shrani spremembe</button>
            <input type="button" class="btn btn-primary w-100 py-2" value="Nazaj" onclick="history.back()"/>
    </form>

<?php
include_once 'footer.php';
?>
