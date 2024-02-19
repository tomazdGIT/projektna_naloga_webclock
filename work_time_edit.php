<?php
include_once 'session.php';
isAdmin();
$user_id = $_SESSION['user_id'];
include_once 'header.php';
?>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Zaposleni</th>
            <th scope="col">Dogodek</th>
            <th scope="col">Čas</th>
            <th scope="col">Akcija</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include_once 'db.php';
        $query = "SELECT em.email, e.title, w.* FROM events e 
                    INNER JOIN work_time w ON e.id=w.event_id
                    INNER JOIN employees em ON em.id=employee_id
                     
                      ";
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        $i=0;
        while ($result = $stmt->fetch()) {
            $i++;
            echo '<tr>';
            echo '<th scope="row">'.$i.'</th>';
            echo '<td>'.$result['email'].'</td>';
            echo '<td>'.$result['title'].'</td>';
            echo '<td>'.$result['time'].'</td>';
            echo '<td>
                    <a href="work_time_edit.phpid='.$result['id'].'"><i class="bi bi-pencil"></i></a>                   
                   </td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>

<?php
include_once 'footer.php';

