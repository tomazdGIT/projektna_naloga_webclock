<?php
include_once 'session.php';
include_once 'header.php';
isAdmin();

echo '<a class="btn btn-primary" href="work_time_add.php" role="button">Dodaj dogodek zaposlenega</a>';
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
                    ORDER BY w.time";
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
                    <a href="work_time_edit.php?id='.$result['id'].'"><i class="bi bi-pencil"></i></a>  
                    <a href="work_time_delete.php?id='.$result['id'].'" onclick="return confirm(\'Prepričani?\');"><i class="bi bi-trash"></i></a>                 
                   </td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
    <input type="button" class="btn btn-primary w-100 py-2" value="Nazaj" onclick="history.back()"/>
<?php
include_once 'footer.php';
?>
