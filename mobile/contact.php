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
						//print('<option value="' . $row['semester'] . '">' . substr($row['semester'], 0, -4) . ' ' . substr($row['semester'],-4) . '</option>');
					}
				?>
				
                    <li>
                        <a href="mailto:mitch@edgemontgeek.com">
                                <h3>Mitchell Ludwig</h3>
                                <p><strong>403-479-2369</strong></p>
                                <p>mitch@edgemontgeek.com</p>
                                
                        </a>
                    </li>
                    <li>
                        <a href="index.html">
                            <h3>jQuery Team</h3>
                            <p><strong>Boston Conference Planning</strong></p>
                            <p>In preparation for the upcoming conference in Boston, we need to start gathering a list of sponsors and speakers.</p>
                            <p class="ui-li-aside"><strong>9:18</strong>AM</p>
                        </a>
                    </li>
                </ul>
            </div>
            
        </div>
    </body>
</html>
<?php 
	/*function insertContact( $name, $phone, $email){
	print("<li>");
	print('<a href="mailto:' . $email . '">');
    print("<h3>'$name'</h3>");
                                <p><strong>403-479-2369</strong></p>
                                <p>mitch@edgemontgeek.com</p>
                                
                        </a>
                    </li>
	}*/
?>