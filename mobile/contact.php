<?php
    include('sqli.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('head.php'); ?>
    </head>
    <body>
        <div data-role="page" data-theme="a">
            <?php include('header.php'); ?>
            <div data-role="content">
				<ul data-role="listview">
                    <li data-role="list-divider">
                        Contacts 
                    </li>
				 <?php
					//Get the list of all available semesters
					//And store it in the string 'semesteroptions'
					$query = "SELECT name, email, phone FROM contacts";
					$result = $mysqli->query($query);
					
					//For other available semesters
					while ($row = $result->fetch_assoc()) {
						//Just append them as options to the <select> element (see below)
						insertContact($row['name'], $row['phone'], $row['email']);
						
					}
				?>                
                </ul>
            </div>           
        </div>
    </body>
</html>
<?php 
	function insertContact($name, $phone, $email){
		print("<li>");
		print('<a href="mailto:' . $email . '">');
		print("<h5>$name</h5>");
		print("<p><strong>$phone</strong></p>");
		print("<p>$email</p>");
		print("</a>");
		print("</li>");
	}
?>
