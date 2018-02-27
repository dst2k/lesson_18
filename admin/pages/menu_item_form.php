<?php
render_header([
    'is_home' => true
]);
$id = (int) ($_GET['id'] ?? 0);
$action = $_GET['action'] ?? false;
if($action == 'save')
{
    $parent_id = (int) $_POST['parent_id'];
    $title = (string) $_POST['title'];
    $link = (string) $_POST['link'];
    $ord = (int) $_POST['ord'];

    if(strlen($title) > 250)
        die('Too long value of Title');
    elseif(strlen($link) > 500)
        die('Too long value of Link');
    else
    {
        if($id)
        {
            $sql = "
            UPDATE `menu_items`
            SET
            `parent_id` = '{$parent_id}',
            `title` = '{$title}',
            `link` = '{$link}',
            `ord` = '{$ord}'
            WHERE `id` = '{$id}'
            ";
            $result = mysqli_query($db, $sql);
        }
        else
        {
            $sql = "
            INSERT INTO `menu_items`
            (`parent_id`, `title`, `link`, `ord`)
            VALUES ('{$parent_id}', '{$title}', '{$link}', '{$ord}')
            ";
            $result = mysqli_query($db, $sql);
           // header('Location: index.php?page=menu_items');
           // exit;
        }

    }

}

if($id)
{
    $handler = 'index.php?page=menu_item_form&id='.$id.'&action=save';
        $sql = "
    SELECT * FROM `menu_items`
    WHERE `id` = '{$id}'
    LIMIT 1
    ";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    if(is_null($row))
        die('Unknown ID');

}
else
{
    $handler = 'index.php?page=menu_item_form&action=save';
    $row = [
    'parent_id' => '',
    'title' => '',
    'link' => '',
    'ord' => ''
    ];
}





?>
<form method="post" action="<?=$handler ?>">
    <input type="number" name="parent_id" value="<?=$row['parent_id'] ?>" placeholder="Parent ID">
    <input type="text" name="title" value="<?=$row['title'] ?>" placeholder="Title">
    <input type="text" name="link" value="<?=$row['link'] ?>" placeholder="Link">
    <input type="number" name="ord" value="<?=$row['ord'] ?>" placeholder="Order">
    <button type="submit">Сохранить</button>
</form>
<?php
render_footer();
?>