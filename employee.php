<?php
include_once 'session.php';
include_once 'header.php';
//preverimo če je uporabnik admin
isAdmin();
?>
    <a class="btn btn-primary" href="employee_add.php" role="button">Registracija novega zaposlenega</a>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Ime</th>
            <th scope="col">Priimek</th>
            <th scope="col">E-mail</th>
            <th scope="col">Akcija</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include_once 'db.php';
        $query = "SELECT * FROM employees ORDER BY last_name";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        //izpis zaposlenih iz baze z dodano možnostko brisanja in urejanja
        $i=0;
        while ($result = $stmt->fetch()) {
            $i++;
            echo '<tr>';
            echo '<th scope="row">'.$i.'</th>';
            echo '<td>'.$result['first_name'].'</td>';
            echo '<td>'.$result['last_name'].'</td>';
            echo '<td>'.$result['email'].'</td>';
            echo '<td>
                    <a href="employee_edit.php?id='.$result['id'].'"><i class="bi bi-pencil"></i></a>
                    <a href="employee_delete.php?id='.$result['id'].'" onclick="return confirm(\'Prepričani?\');"><i class="bi bi-trash"></i></a>
                   </td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>

<?php
include_once 'footer.php';
?>