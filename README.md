# Application Permissions
Plug in for PHP Application Roles and Privilages

Once you install the application in your root directory, you need to create tables in your database. The table creation script is located in the folder called "db_structure". Simply execute this script in MySQL to create the tables. After creating these tables, you can update the database settings in "db_variables.php" with the connection details to start the application. Once you've completed these steps, you can access your index file from the permission folder to create modules or control permissions. Upon creating these items, you will receive a class name. This class name must be implemented in your control or link. Then, you can access "roll_and_permissions.php" to create roles and permissions for the users. Based on the assigned roles and permissions, you can access the controls / links as specified by the class.
