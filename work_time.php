<?php
include_once 'session.php';
include_once 'header.php';
//spremenljivka uporabnik iz seje za izpis
$employee_id=$_SESSION['user_id'];
//preverimo če je uporabnik admin
isAdmin();
//če je se doda gumb za urejanje
echo '<a class="btn btn-primary" href="work_time_admin.php" role="button">Uredi delovni čas zaposlenega</a>';

?>
<h3>Tvoji dogodki:</h3>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Dogodek</th>
            <th scope="col">Čas</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include_once 'db.php';
        $query = "SELECT  e.title, w.* FROM events e INNER JOIN work_time w 
                    ON e.id=w.event_id
                    WHERE employee_id=? ";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$employee_id]);
        //izpis dogodkov iz baze
        $i=0;
        while ($result = $stmt->fetch()) {
            $i++;
            echo '<tr>';
            echo '<th scope="row">'.$i.'</th>';
            echo '<td>'.$result['title'].'</td>';
            echo '<td>'.$result['time'].'</td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
    <input type="button" class="btn btn-primary w-100 py-2" value="Nazaj" onclick="history.back()"/>
<?php
include_once 'footer.php';
?>