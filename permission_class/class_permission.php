<?php 
include('db_variables.php');
class UserPermisssion
{
            
			function __construct($roll_id_from_user_table)
			{
				if ($roll_id_from_user_table != null) {
					//$arr =  json_encode($this->getUserPermissions($roll_id_from_user_table)); // V1 Function Call 
				    $arr =  json_encode($this->getUserPermissionsByUserID($roll_id_from_user_table)); //V2 Function Call
					echo "<script>var permissions = $arr;</script>";
				}
			}
            function DatabaseConnection()
            {
                global  $servername ,$username ,$password ,	$database ;
				$conn = new mysqli($servername, $username, $password, $database);
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
				return $conn;
            }
            
            function getUserPermissionsByUserID($userId) { // This function for V2 Application
			
                $connection = $this->DatabaseConnection();
				// Prepare SQL statement to fetch permissions based on role ID
				$sql = "SELECT DISTINCT p.name
                            FROM permissions p
                            INNER JOIN role_permissions rp ON p.id = rp.permission_id
                            INNER JOIN user_roles ur ON rp.role_id = ur.role_id
                            WHERE ur.user_id = ?";

				// Prepare and execute the query
				$stmt = $connection->prepare($sql);
				$stmt->bind_param("i", $userId);
				$stmt->execute();

				// Fetch the permissions
				$permissions = [];
				$result = $stmt->get_result();
				while ($row = $result->fetch_assoc()) {
					$permissions[] = $row['name'];
				}
				// Close the statement and database connection
				$stmt->close();
				$connection->close();

				// Return the permissions
				
				return $permissions;
			}// Close of Function
            
            
			function getUserPermissions($roleId) { // This function Works only in V1 Application 
			
                $connection = $this->DatabaseConnection();
				// Prepare SQL statement to fetch permissions based on role ID
				$sql = "SELECT p.name
						FROM permissions p
						INNER JOIN role_permissions rp ON p.id = rp.permission_id
						WHERE rp.role_id = ?";

				// Prepare and execute the query
				$stmt = $connection->prepare($sql);
				$stmt->bind_param("i", $roleId);
				$stmt->execute();

				// Fetch the permissions
				$permissions = [];
				$result = $stmt->get_result();
				while ($row = $result->fetch_assoc()) {
					$permissions[] = $row['name'];
				}
				// Close the statement and database connection
				$stmt->close();
				$connection->close();

				// Return the permissions
				
				return $permissions;
			}// Close of Function
			
			function ActionRequest($action)
			{
				switch($action)
				{
					case 'AddNewPermission':
						$this->addNewEventToJS($_POST['dbValue']);
					break;
					case 'listData':
						$this->getAllControlNameAndClass();
					break;
					case 'listOfRolls':
						$this->getListOfRolls();
					break;
					case 'listOfPermissionBasedOnRolls':
						$this->getListOfRollsBasedonRolls($_POST['rollId']);
					break;
					case 'save_privilages':
					    $this->SavePrivilages($_POST['privilage_data'],$_POST['rollId']);
					break;
					case 'listOfUsers':
					    $this->getListOfUsers();
					break;
					case 'update_user_privilages':
					    $this->updateUserPrivilage($_POST['privilage_id'],$_POST['userId']);
					break;
					case 'updateUserPrivilageByUserID':
					    $this->updateUserPrivilageByUserID($_POST['privilage_id'],$_POST['userId']);
					break;
					
					case 'addRolesOrGroups':
					    $this->addRolesOrGroups($_POST['add_RolesOrGroups']);
					break;
					case 'deletePermissionss':
					    $this->deletePermissionss($_POST['rowIDValue'],$_POST['moduleName']);
					break;
					case 'listOfSelectedUserRolls':
					    $this->listOfSelectedUserRolls($_POST['userId']);
					break;
					
					
					
				}
			}
			
			function getAllControlNameAndClass()
			{
			    $connection = $this->DatabaseConnection();
				$sql = "select * from permissions";
			    $stmt = $connection->prepare($sql);
			    $stmt->execute();
                $result = $stmt->get_result();
                
                // Fetch data as associative array
                $data = [];
                while ($row = $result->fetch_assoc()) {
                    $data['data'][] = $row;
                }
                
                // Return data as JSON
                echo json_encode($data);
                
                // Close connection
                $stmt->close();
                $connection->close();
			}
			function listOfSelectedUserRolls($UserID)
			{
			    $connection = $this->DatabaseConnection();
				$sql = "SELECT r.name FROM users u JOIN user_roles ur ON u.id = ur.user_id JOIN roles r ON ur.role_id = r.id WHERE u.id =".$UserID;
			    $stmt = $connection->prepare($sql);
			    $stmt->execute();
                $result = $stmt->get_result();
                
                // Fetch data as associative array
                $data = [];
                while ($row = $result->fetch_assoc()) {
                    $data['data'][] = $row;
                }
                
                // Return data as JSON
                echo json_encode($data);
                
                // Close connection
                $stmt->close();
                $connection->close();
			}
			
			
			
			function getListOfRolls()
			{
			    $connection = $this->DatabaseConnection();
				$sql = "select * from  roles";
			    $stmt = $connection->prepare($sql);
			    $stmt->execute();
                $result = $stmt->get_result();
                
                // Fetch data as associative array
                $data = [];
                while ($row = $result->fetch_assoc()) {
                    $data['data'][] = $row;
                }
                
                // Return data as JSON
                echo json_encode($data);
                
                // Close connection
                $stmt->close();
                $connection->close();
			}
			function getListOfRollsBasedonRolls($rollID)
			{
			    $connection = $this->DatabaseConnection();
				$sql = "SELECT * FROM `permissions` WHERE id in(select permission_id from role_permissions where role_id = $rollID)";
			    $stmt = $connection->prepare($sql);
			    $stmt->execute();
                $result = $stmt->get_result();
                
                // Fetch data as associative array
                $data = [];
                while ($row = $result->fetch_assoc()) {
                    $data['data'][] = $row;
                }
                
                // Return data as JSON
                echo json_encode($data);
                
                // Close connection
                $stmt->close();
                $connection->close();
			}
			
			function getListOfUsers()
			{
			    $connection = $this->DatabaseConnection();
				$sql = "SELECT users.id, users.username, roles.name as role_name FROM users LEFT JOIN roles ON roles.id = users.role_id;";
			    $stmt = $connection->prepare($sql);
			    $stmt->execute();
                $result = $stmt->get_result();
                
                // Fetch data as associative array
                $data = [];
                while ($row = $result->fetch_assoc()) {
                    $data['data'][] = $row;
                }
                
                // Return data as JSON
                echo json_encode($data);
                
                // Close connection
                $stmt->close();
                $connection->close();
			}
			function updateUserPrivilageByUserID($privilageID,$userID) // For V1 Application
			{
			        //echo var_dump($privilageID).'---'.$userID;
			    // User ID
			        $roleIds = $privilageID;
                    $userId = $userID;
                    
                    // Initialize the SQL query string
                    $sqlQuery = "INSERT INTO user_roles (role_id,user_id ) VALUES ";
                    
                    // Iterate over the role IDs array
                    foreach ($roleIds as $roleId) {
                        // Append each pair of user ID and role ID to the query string
                        $sqlQuery .= "($roleId, $userId),";
                    }
                    
                    // Remove the trailing comma
                    $sqlQuery = rtrim($sqlQuery, ',');
                    
                    // Now $sqlQuery contains the generated SQL query string
                   
                    
			        $connection = $this->DatabaseConnection();
			        
			        
				// Prepare SQL statement to fetch permissions based on role ID
				$sql = "delete from user_roles where user_id=".$userId;

				// Prepare and execute the query
				if ($connection->query($sql) === TRUE) {
                  echo "Roll revoked successfully & ";
                } else {
                  echo "Error: " . $sql . "<br>" . $connection->error;
                }
                
                
				// Prepare and execute the query
				if ($connection->query($sqlQuery) === TRUE) {
                  echo "Roll Added successfully";
                } else {
                  echo "Error: " . $sql . "<br>" . $connection->error;
                }
                
                $connection->close();
			}
			function updateUserPrivilage($privilageID,$userID) // For V1 Application
			{
			     $connection = $this->DatabaseConnection();
				// Prepare SQL statement to fetch permissions based on role ID
				$sql = "update users set role_id=".$privilageID." where id=".$userID;

				// Prepare and execute the query
				if ($connection->query($sql) === TRUE) {
                  echo "Roll Changed successfully";
                } else {
                  echo "Error: " . $sql . "<br>" . $connection->error;
                }
                $connection->close();
			}
			
			function addRolesOrGroups($rollName) 
			{
			    $connection = $this->DatabaseConnection();
				// Prepare SQL statement to fetch permissions based on role ID
				$sql = "insert into roles(name) values('".$rollName."')";

				// Prepare and execute the query
				if ($connection->query($sql) === TRUE) {
                  echo "New record created successfully";
                } else {
                  echo "Error: " . $sql . "<br>" . $connection->error;
                }
                
                $connection->close();
			}
			function deletePermissionss($ids,$moduleName) 
			{
			    $connection = $this->DatabaseConnection();
				// Prepare SQL statement to fetch permissions based on role ID
				$sql = "delete from permissions where id=".$ids;

				// Prepare and execute the query
				if ($connection->query($sql) === TRUE) {
				$this->deleteALineFromTheFile($moduleName);
                  echo "Permission removed successfully";
                  
                } else {
                  echo "Error: " . $sql . "<br>" . $connection->error;
                }
                
                $connection->close();
                
                
			}
			
			function deleteALineFromTheFile($modulename)
			{
                    
                    // File path
                    $filename = '../js/permission.js';
                    
                    // Text to search for
                    $textToRemove = $modulename;
                    
                    // Read the file line by line into an array
                    $lines = file($filename);
                    
                    // Initialize an array to store lines without the text
                    $linesWithoutText = [];
                    
                    // Iterate through each line
                    foreach ($lines as $line) {
                        // Check if the line contains the text to remove
                        if (strpos($line, $textToRemove) === false) {
                            // If the text is not found, add the line to the array
                            $linesWithoutText[] = $line;
                        }
                    }
                    
                    // Write the modified lines back to the file
                    file_put_contents($filename, implode('', $linesWithoutText));
                    
                    echo "Lines containing '$textToRemove' removed from the file.";
			}
			
			function addNewEventToJS($dbValue)
			{
			     $connection = $this->DatabaseConnection();
				// Prepare SQL statement to fetch permissions based on role ID
				$sql = "insert into permissions(name,class_name) values('".$dbValue."','class".$dbValue."')";

				// Prepare and execute the query
				if ($connection->query($sql) === TRUE) {
                  echo "New record created successfully";
                } else {
                  echo "Error: " . $sql . "<br>" . $connection->error;
                }
                
                $connection->close();
			    
					// Specify the path to your file
					$filename = '../js/permission.js';

					// Read the file into an array of lines
					$fileContent = file($filename);

					// Loop through each line to find and replace the line containing "// add_new_var"
					foreach ($fileContent as $key => $line) {
						if (strpos($line, '// add_new_var') !== false) {
							// Replace the line with new content
							$newLineToAdd = "\n\t"; // New line content with a newline character
							$fileContent[$key] = $newLineToAdd.'var event'.$dbValue.' = document.querySelectorAll(".class'.$dbValue.'");'; // Replace "new line to add" with your new content
							$fileContent[$key] .= $newLineToAdd."// add_new_var\n"; 
							break; // Stop searching after the line is replaced
						}
					}

					// Write the updated content back to the file
					file_put_contents($filename, implode('', $fileContent));
					
					
					// Loop through each line to find and replace the line containing "// adding_new_permission"
					foreach ($fileContent as $key => $line) {
						if (strpos($line, '// adding_new_permission') !== false) {
							// Replace the line with new content
							$newLineToAdd = "\n\t"; // New line content with a newline character
							$fileContent[$key] = $newLineToAdd.'event'.$dbValue.'.forEach(function(obj) {if (!hasPermission("'.$dbValue.'")) {obj.style.display = "none";}});'; // Replace "new line to add" with your new content
							$fileContent[$key] .= $newLineToAdd."// adding_new_permission\n"; 
							break; // Stop searching after the line is replaced
						}
					}

					// Write the updated content back to the file
					file_put_contents($filename, implode('', $fileContent));
					

					// Optionally, you can return a response to the client
					echo "Main Permission Parameter Added";


			}
			
			function SavePrivilages($permissionIds,$roleId)
			{
			       // Initialize an empty string to store the values part of the query
                    $values = "";
                    
                    // Iterate through the permission IDs
                    foreach ($permissionIds as $permissionId) {
                        // Concatenate each permission ID with the role ID into the values string
                        $values .= "($roleId, $permissionId),";
                    }
                    
                    // Remove the trailing comma from the values string
                    $values = rtrim($values, ",");
                    
                    // Construct the insert query
                    $insertQuery = "INSERT INTO role_permissions (role_id, permission_id) VALUES $values;";
                    
                    $deleteQuery = "delete from role_permissions where role_id=".$roleId;
                    
                    $connection = $this->DatabaseConnection();
    				
    				// Prepare and execute the query
    				if ($connection->query($deleteQuery) === TRUE) {
                          if($connection->query($insertQuery) === TRUE) {
                              echo "Privilage Added";
                          }
                          else {
                              echo "Error: " . "<br>" . $connection->error;
                          }
                          
                    } else {
                      echo "Error: " . "<br>" . $connection->error;
                    }
                
                    $connection->close();
                    
                    // Output the insert query
                    //echo $insertQuery;
			    
			}
}// Close of Class
//isset($_SESSION['USERROLLID']) ? $_SESSION['USERROLLID'] : 'null'
//$obj = new UserPermisssion($_SESSION['USERROLLID'] ?? null); // PHP 7 and Above
$userRollId = isset($_SESSION['USERROLLID']) ? $_SESSION['USERROLLID'] : null;
$obj = new UserPermisssion($userRollId);

//$obj->ActionRequest($_POST['action'] ?? null);
$postAction = isset($_POST['action']) ? $_POST['action'] : null;
$obj->ActionRequest($postAction);
?>