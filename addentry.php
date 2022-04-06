<?php

global $wpdb;

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $tablename = $wpdb->prefix."contactform";

    if($name != '' && $email != '' && $phone != ''){
        $check_data = $wpdb->get_results("SELECT * FROM ".$tablename." WHERE email='".$email."' ");
        if(count($check_data) == 0){
            $insert_sql = "INSERT INTO ".$tablename."(name,email,phone,dates) values('".$name."','".$email."','".$phone."','".$date."') ";
            $wpdb->query($insert_sql);
            echo "Email added!";
        }
    }
}


add_shortcode( 'search-form-test', 'wpc_shortcode_search_form' );
function wpc_shortcode_search_form() {
    return '<h1>Add request</h1>
		<form method="post" action="">
		    <table>
		        <tr>
		            <td>Name</td>
		            <td><input type="text" name="name"></td>
		        </tr>
		        <tr>
		            <td>Email</td>
		            <td><input type="text" name="email"></td>
		        </tr>
		        <tr>
		            <td>Phone</td>
		            <td><input type="text" name="phone"></td>
		        </tr>
		        <input type="hidden" name="date" value="'.date("d-m-y h:i:s").'">
		        <tr>
		            <td>&nbsp;</td>
		            <td><input type="submit" name="submit" value="Add"></td>
		        </tr>
		    </table>
		</form>';
	}
?>