<?php
render_header([
    'is_home' => true
]);

$sql = "
    SELECT * FROM `menu_items`
    ";
    $result = mysqli_query($db, $sql);



?>
<table border="1" style="width: 100%">
    <thead>
        <tr>
            <td>id</td>
            <td>parent_id</td>
            <td>title</td>
            <td>link</td>
            <td>order</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
    <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?=$row['id'] ?></td>
            <td><?=$row['parent_id'] ?></td>
            <td><?=$row['title'] ?></td>
            <td><?=$row['link'] ?></td>
            <td><?=$row['ord'] ?></td>
            <td>
                <a href="index.php?page=menu_item_form&id=<?=$row['id'] ?>">Изменить</a>
                <a href="index.php?page=menu_delete&id=<?=$row['id'] ?>&action=delete">Удалить</a>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>

<?php
render_footer();
?>