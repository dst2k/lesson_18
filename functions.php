<?php

function render_header($user_params = [])
{
	$params = [
		'title' => PROJECT_TITLE,
		'is_home' => false,
		'menu_active_item' => 'home'
	];
	$params = array_merge($params, $user_params);

	include PATH_PARTIALS . 'header.php';
}

function render_footer()
{
	include PATH_PARTIALS . 'footer.php';
}

function render_feature()
{
	global $db;
	$sql = '
	SELECT `id`, `icon`, `title_en`, `text_en`
	FROM `features`
	ORDER BY `id` ASC
	';
	$result = mysqli_query($db, $sql);
	$count = 1;

		while($row = mysqli_fetch_assoc($result))
			{
				?>
				<section>
					<span class="icon major <?=$row['icon']?>"></span>
					<h3><?=$row['title_en']?></h3>
					<p><?=$row['text_en']?></p>
				</section>
				<? if($count % 2 == 0 AND $count != count($row)) { ?>
             	</div>
            	<div class="features-row">
         	<? } 
    $count++;
   	}

	//include 'pages/home.php';

	
}
	



function render_menu()
{
	global $db;
	ini_set('display_errors', '1');
	error_reporting(E_ALL);

	$sql = '
		SELECT * 
		FROM `menu_items`
		ORDER BY `ord` ASC
	';	
	$result = mysqli_query($db, $sql);

	$items = [];
	while($row = mysqli_fetch_assoc($result))
	{
		$items[$row['id']] = $row;
	}
	$result = build_menu_items($items);
	//include PATH_PARTIALS . 'menu.php';
	
}

function build_menu_items($items, $parent_id = 0)
{
	$return = [];

	foreach($items as $id => $item)
	{
		if($item['parent_id'] == $parent_id)
		{
			$has_children = false;
			foreach($items as $child_item)
			{
				if($id == (int)$child_item['parent_id'])
				{
					$has_children = true;
					break;
				}
			}

			if($has_children)
				$item['children'] = build_menu_items($items, $id);

			$return[] = $item;
		}
	}

	return $return;
}

render_menu();