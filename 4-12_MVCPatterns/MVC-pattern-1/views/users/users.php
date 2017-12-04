<h1><?=$data['title'];?></h1>
<table>
<?php foreach ($data['users'] as $user) : ?>
<tr>
    <td>
        <?=$user->id?>
    </td>
    <td>
        <?=$user->name?>
    </td>
</tr>
<?php endforeach; ?>
</table>
