
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/datagrid.css">
<link rel="stylesheet" type="text/css" href="css/dropdown.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<div id="dropdownContent" style="text-align:center;">
   <svg id="svgIcon" width="50" height="50" viewBox="0 0 24 24">
    <!-- SVG content goes here -->
  </svg>
  <!-- Content of your dropdown -->
</div>
<div class="container" style="padding-top:5px;">
    <div class="row">
        <div class="col-6" style="padding-top:20px;">
            
        </div>
        <div class="col-3" style="padding-top:20px;text-align:right;">
            <button type="button" class="btn btn-primary" id="btn_confim_privilages">Confirm Privilages</button>
           
        </div>
    </div>
   <!--<button id="dropdownButton">Click me</button> -->
<div class="row" style="padding-top:20px;">
    <!--<div class="col-12">
        <div class="row">
            <div class="col-6">
                <label for="" class="form-label">Enter Control / Module Name <span style="color:red">*</span></label>
                <input type="text" id="moduleOrControlName" class="form-control" id="exampleFormControlInput1" placeholder="Enter Control / Module Name">
            </div>
             <div class="col-6">
                 <label for="" class="form-label">Create a Permission</label><br>
                <button class="addNewEventstoJS">Add Actions</button>
            </div>
        </div>
    </div>-->
    <div class="col-3 fixed-height-div" style="padding-top:20px;">
        <div class="row">
            <div class="col-12" >
                <table id="tlb_listOfRolls" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                           
                            <th>List of Rolls/Groups</th>
                           
                           
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
             <div class="col-12" style="padding-top:20px;">
                <div class="row" style="padding:20px;">
                  <!--<label for="" class="form-label">Rolls/Groups</label>-->
                  <input type="text" class="form-control" placeholder="Rolls/Groups" id="txt_addRolesOrGroups"><p style="padding-top:10px;"/>
                  <button type="button" class="btn btn-primary" id="btn_addRolesOrGroups" style="width:100%">Add Rolls/Groups</button>
                </div>
             </div>
        </div>
       
    </div>
     <div class="col-3 fixed-height-div" style="padding-top:20px;">
        <table id="tlb_listOfControlsAndModules" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                   
                    <th>Permissions</th>
                    <th>Class Name</th>
                   
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    
    <div class="col-3 fixed-height-div" style="padding-top:20px;">
        <table id="tlb_addedListOfControlsAndModules" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                   
                    <th>Permissions for Selected Roll</th>
                   <th>Class Name</th>
                   
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    
    
    
</div>

<div class="row" style="padding-top:20px;">
    
    <div class="col-3 fixed-height-div" style="padding-top:20px;">
          <table id="tlb_listOfUsers" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                   
                    <th>User Name</th>
                    <th>Roll</th>
                   
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <div class="col-3 fixed-height-div" style="padding-top:20px;">
           <table id="tlb_listOfRollsForUsers" class="display" style="width:100%">
             <thead>
                    <tr>
                        <th>ID</th>
                       
                        <th>List of Rolls/Groups</th>
                       
                       
                    </tr>
                </thead>
                <tbody>
                </tbody>
        </table>
    </div>
    <div class="col-3 fixed-height-div" style="padding-top:20px;">
           <table id="tlb_listOfSelectedUserRolls" class="display" style="width:100%">
             <thead>
                    <tr>
                        <th>Selected User's Rolls/Groups</th>
                       
                       
                    </tr>
                </thead>
                <tbody>
                </tbody>
        </table>
    </div>     
    
</div>

<div class="row" style="padding-top:10px;padding-bottom:10px;">
     <div class="col-6" >
         
     </div>
    <div class="col-3" style="text-align:right;">
       
       <button type="button" class="btn btn-primary" id="btn_change_user_roll">Change User Role</button>
    </div>
</div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- DataTables JavaScript -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<!-- User Permission Script -->
<script  type="text/javascript" src="js/settings.js?timestamp=<?php echo time(); ?>"></script>
<script type="text/javascript" src="js/jsfunctions.js?timestamp=<?php echo time(); ?>"></script>
<script type="text/javascript" src="js/messagedropdown.js?timestamp=<?php echo time(); ?>"></script>

<script>
    
        // Call setupDropdown function with the desired IDs
       // setupDropdown('dropdownContent','error','This is a Testing Message','load');

                      
</script>