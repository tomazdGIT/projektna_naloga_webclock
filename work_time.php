<?php
include_once 'session.php';
$user_id = $_SESSION['user_id'];
include_once 'header.php';

if (isset($_SESSION['admin']) && $_SESSION['admin']==1) {
    echo '<a class="btn btn-primary" href="work_time_edit.php" role="button">Uredi delovni čas zaposlenega</a>';
}
?>
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
                       WHERE employee_id=?
                      ";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$user_id]);

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

<?php
include_once 'footer.php';
?>