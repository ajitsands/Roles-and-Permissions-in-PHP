<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
$_SESSION['USERROLLID'] =  isset($_GET['userid']) ? $_GET['userid'] : null;
//$_SESSION['USERROLLID']= $_GET['userid']; // For V1 you have to Pass RoleId from the User Table , for V2 You have to pass User ID to this Session

include_once('permission_class/class_permission.php');
?>

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" type="text/css" href="css/datagrid.css">
<link rel="stylesheet" type="text/css" href="css/dropdown.css">
<div class="container">
<button class="addAction">Add</button>
<button class="editAction">Edit</button>
<button class="deleteAction">Delete</button>
<button class="listAction">List</button>
<button class="saveAction">Save</button>
<button class="uploadAction">Upload</button>
<button class="printAction">Print</button>
<button class="exportToExcelAction">ExportToExcel</button>
<button class="exportToPDFAction">ExportToPDF</button>
<a class="classBalancesheet" href="">Balance Sheet </a>
<a class="classBOQModule" href="">P and L </a>
</div>
<div id="dropdownContent" style="text-align:center;">
  <!-- Content of your dropdown -->
</div>
<div class="container" style="padding-top:20px;">
    
      <pre>
        &lt;?php
        
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        // For V1 you have to Pass RoleId from the User Table, 
        //for V2 You have to pass User ID from User Table to this Session
       
        $_SESSION['USERROLLID'] =  isset($_GET['userid']) ? $_GET['userid'] : null;
        include_once('permission_class/class_permission.php');
        
        ?&gt;
        <b style="color:red;">Please copy Paste above code to the all Pages or create a page to include </b>
        
        for texting please use below link format 
        https://sandslab.com/permission/?<b>userid=2</b>
    </pre>

<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-6">
                <label for="" class="form-label">Enter Control / Module Name <span style="color:red">*</span></label>
                <input type="text" id="moduleOrControlName" class="form-control moduleOrControlName" id="exampleFormControlInput1" placeholder="Enter Control / Module Name">
            </div>
             <div class="col-6">
                 <label for="" class="form-label">Create a Permission</label><br>
                <button class="addNewEventstoJS">Add Actions</button>
            </div>
        </div>
    </div>
    <div class="col-12" style="padding-top:20px;">
        <table id="dataTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Module / Control Name</th>
                    <th>Class</th>
                   
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    
</div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- DataTables JavaScript -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<!-- User Permission Script -->
<script  src="js/settings.js?timestamp=<?php echo time(); ?>"></script>
<script  src="js/permission.js?timestamp=<?php echo time(); ?>"></script>
<script  src="js/validations.js?timestamp=<?php echo time(); ?>"></script>
<script type="text/javascript" src="js/messagedropdown.js?timestamp=<?php echo time(); ?>"></script>








