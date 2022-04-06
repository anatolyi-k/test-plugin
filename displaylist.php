<?php

global $wpdb;
$tablename = $wpdb->prefix."contactform";

if(isset($_GET['delete_id'])){
    $delid = $_GET['delete_id'];
    $wpdb->query("DELETE FROM ".$tablename." WHERE id=".$delid);
}

?>
<h1>All emails</h1>

<table width='100%' border='1' style='border-collapse: collapse;'>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Date</th>
        <th>&nbsp;</th>
    </tr>
    <?php
    $entriesList = $wpdb->get_results("SELECT * FROM ".$tablename." order by id desc");
        foreach($entriesList as $entry){
            $id = $entry->id;
            $name = $entry->name;
            $email = $entry->email;
            $phone = $entry->phone;
            $date = $entry->dates;
            
            echo "<tr>
		      <td>".$name."</td>
		      <td>".$email."</td>
		      <td>".$phone."</td>
		      <td>".$date."</td>
		      <td><a href='?page=allentries&delete_id=".$id."'>Удалить</a></td>
		      </tr>";
        }
    ?>
</table>