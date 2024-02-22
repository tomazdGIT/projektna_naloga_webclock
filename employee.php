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
            <th scope="col">Naslov</th>
            <th scope="col">Kraj</th>
            <th scope="col">Poštna številka</th>
            <th scope="col">Status</th>
            <th scope="col">Akcija</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include_once 'db.php';
        $query = "SELECT e.*, c.city_name, c.post_number, s.title FROM employees e 
                    INNER JOIN cities c ON c.id=e.city_id
                    INNER JOIN status s ON s.id=e.status_id 
                    ORDER BY last_name";
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
            echo '<td>'.$result['address'].'</td>';
            echo '<td>'.$result['city_name'].'</td>';
            echo '<td>'.$result['post_number'].'</td>';
            echo '<td>'.$result['title'].'</td>';
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