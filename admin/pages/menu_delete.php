<?php
render_header([
    'is_home' => true
]);
$id = (int) ($_GET['id'] ?? 0);
$action = $_GET['action'] ?? false;
if($action == 'delete')
{
	 $handler = 'index.php?page=menu_item_form&id='.$id.'&action=delete';
    $sql = "
    DELETE FROM `menu_items`
    WHERE `id` = '{$id}'
    ";
    $result = mysqli_query($db, $sql);
    printf("Запись: %d удалена", $id);
    ?>
    <a href="index.php?page=menu_items">К списку записей</a>
    <?
}


render_footer();
?>














