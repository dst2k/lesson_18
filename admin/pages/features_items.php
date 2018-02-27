<?php
render_header([
    'is_home' => true
]);

$sql = "
    SELECT * FROM `features`
    ";
    $result = mysqli_query($db, $sql);



?>
<table border="1" style="width: 100%">
    <thead>
        <tr>
            <td>id</td>
            <td>icon</td>
            <td>title_en</td>
            <td>title_ru</td>
            <td>text_en</td>
            <td>text_ru</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
    <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?=$row['id'] ?></td>
            <td><?=$row['icon'] ?></td>
            <td><?=$row['title_en'] ?></td>
            <td><?=$row['title_ru'] ?></td>
            <td><?=$row['text_en'] ?></td>
            <td><?=$row['text_ru'] ?></td>
            <td>
                <a href="index.php?page=features_form&id=<?=$row['id'] ?>">Изменить</a>
                <a href="index.php?page=features_delete&id=<?=$row['id'] ?>&action=delete">Удалить</a>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>

<?php
render_footer();
?>