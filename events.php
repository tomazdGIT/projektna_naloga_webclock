<?php
include_once 'session.php';
include_once 'header.php';
isAdmin();
?>
    <a class="btn btn-primary" href="event_add.php" role="button">Dodaj dogodek</a>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Ime dogodka</th>
            <th scope="col">Akcija</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include_once 'db.php';
        $query = "SELECT * FROM events ORDER BY title";
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        $i=0;
        while ($result = $stmt->fetch()) {
            $i++;
            echo '<tr>';
            echo '<th scope="row">'.$i.'</th>';
            echo '<td>'.$result['title'].'</td>';
            echo '<td>
                    <a href="event_edit.php?id='.$result['id'].'"><i class="bi bi-pencil"></i></a>
                    <a href="event_delete.php?id='.$result['id'].'" onclick="return confirm(\'Prepričani?\');"><i class="bi bi-trash"></i></a>
                   </td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>

<?php
include_once 'footer.php';
?>