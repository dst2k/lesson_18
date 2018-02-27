<?php
render_header([
    'is_home' => true
]);
$id = (int) ($_GET['id'] ?? 0);
$action = $_GET['action'] ?? false;
if($action == 'save')
{
    $id = (int) $_POST['id'];
    $icon = (string) $_POST['icon'];
    $title_en = (string) $_POST['title_en'];
    $title_ru = (string) $_POST['title_ru'];
    $text_en = (string) $_POST['text_en'];
    $text_ru = (string) $_POST['text_ru'];

    if(strlen($icon) > 500)
        die('Too long value of Icon');
    else
    {
        if($id)
        {
            $sql = "
            UPDATE `features`
            SET
            `id` = '{$id}',
            `icon` = '{$icon}',
            `title_en` = '{$title_en}',
            `title_ru` = '{$title_ru}',
            `text_en` = '{$text_en}',
            `text_ru` = '{$text_ru}'
            WHERE `id` = '{$id}'
            ";
            $result = mysqli_query($db, $sql);
        }
        else
        {
            $sql = "
            INSERT INTO `features`
            (`id`, `icon`, `title_en`, `title_ru`, `text_en`, `text_ru`)
            VALUES ('{$id}', '{$icon}', '{$title_en}', '{$title_ru}', '{$text_en}', '{$text_ru}')
            ";
            $result = mysqli_query($db, $sql);
           // header('Location: index.php?page=menu_items');
           // exit;
        }

    }

}

if($id)
{
    $handler = 'index.php?page=features_form&id='.$id.'&action=save';
        $sql = "
    SELECT * FROM `features`
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
    $handler = 'index.php?page=features_form&action=save';
    $row = [
    'id' => '',
    'icon' => '',
    'title_en' => '',
    'title_ru' => '',
    'text_en' => '',
    'text_ru' => ''
    ];
}





?>
<form method="post" action="<?=$handler ?>">
    <input type="number" name="id" value="<?=$row['id'] ?>" placeholder="ID">
    <input type="text" name="icon" value="<?=$row['icon'] ?>" placeholder="Icon">
    <input type="text" name="title_en" value="<?=$row['title_en'] ?>" placeholder="Title_en">
    <input type="text" name="title_ru" value="<?=$row['title_ru'] ?>" placeholder="Title_ru">
    <input type="text" name="text_en" value="<?=$row['text_en'] ?>" placeholder="Text_en">
    <input type="text" name="text_ru" value="<?=$row['text_ru'] ?>" placeholder="Text_ru">
    <button type="submit">Сохранить</button>
</form>
<?php
render_footer();
?>