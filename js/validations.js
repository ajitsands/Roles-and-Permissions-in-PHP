   $(document).ready(function() {
       //let UrlPostclassPath = 'permission_class/class_permission.php';
       let UrlPostclassPath = PermissionClassNamespace.varUrlPostclassPath;
        var dataTable = $('#dataTable').DataTable({
                "ajax": {
                    'type': 'POST',
                    'url': UrlPostclassPath,
                    'data': {
                        action: 'listData'
                    }
                },
                "columns": [
                   
                    { "data": "id"},
                    { "data": "name"},
                    { "data": "class_name"}
                ]
                
        });      
        
        $('#dataTable tbody').on('dblclick', 'tr', function() {
            // Get data from the row (for example, the id)
            var row_id = $(this).find('td:first').text();
            var secondColumnValue = $(this).find('td:eq(1)').text();
            // Display an alert with the name (you can perform any action here)
           
            $.ajax({
                    url: UrlPostclassPath, // URL to the server-side script
                    type: 'POST',
                    data: {action: 'deletePermissionss',rowIDValue: row_id,moduleName:secondColumnValue},
                    success: function(response) {
                        
                      setupDropdown('dropdownContent','info',svgInfo+response,'click');
                      dataTable.row($('#dataTable')).remove().draw(false); // Use preserveState option
                        //dataTable.ajax.reload();
                    },
                    error: function(xhr, status, error) {
                        setupDropdown('dropdownContent','error',svgError+error,'click');
                        console.error("Error appending to file:", error);
                        //alert("Error appending to file. Please try again later.");
                    }
                });
           
        });
           
         function checkColumnValue(columnIndex, value) {
            var rows = dataTable.rows().data(); // Get all rows data
            console.log(rows);
            for (var i = 0; i < rows.length; i++) {
                var rowData = rows[i];
                var cellValue = rowData['name'];
                //console.log(cellValue);
                if (cellValue == value) {
                    // Value found in the column
                    setupDropdown('dropdownContent','error',svgError+"Value exists in column " + columnIndex + " in row " + i,'click');
                    console.log("Value exists in column " + columnIndex + " in row " + i);
                    return false;
                }
            }
    
            // Value not found in the column
            console.log("Value does not exist in column " + columnIndex);
            return true;
        }
        function capitalizeFirstLetter(str) {
            return str.charAt(0).toUpperCase() + str.slice(1);
        }
        function isAlphabetic(str) {
            // Regular expression to match only alphabetic characters
            const regex = /^[A-Za-z]+$/;
            return regex.test(str);
        }
        
        function commonValidations(controlValue)
        {
            if($.trim(controlValue)==='')
            {
                return 'Module/Control Name cannot be blank';
            }
            //var columnIndexToCheck = 2; // Index of the column to check (0-based index)
            //var valueToCheck = "Print"; // Value to check
            var valueToCheck =  $.trim(controlValue);
            
            if (valueToCheck.indexOf(" ") !== -1 || valueToCheck.indexOf("'") !== -1) {
                return 'Please check your Module/Control Name';
            }
            
            if(!isAlphabetic(valueToCheck))
            {
                return 'Please check your Module/Control Name only Alphabets';
            }
            return true;
        }
        
        $(".addNewEventstoJS").click(function() {
            
            var validationStatus = commonValidations($('#moduleOrControlName').val());
            if(validationStatus!==true)
            {
              
                setupDropdown('dropdownContent','info',svgInfo+validationStatus,'click');
                return false;
            }
            
            var status = checkColumnValue(2, $('#moduleOrControlName').val()); // FirstParameter to check Which Column Second one is the value to check : String from textbox
            
            if(status===true)
            {
                
                var moduleOrControlName = capitalizeFirstLetter($('#moduleOrControlName').val());
                // Send the additional content to the server using AJAX
                $.ajax({
                    url: UrlPostclassPath, // URL to the server-side script
                    type: 'POST',
                    data: {action: 'AddNewPermission',dbValue: moduleOrControlName},
                    success: function(response) {
                       
                        setupDropdown('dropdownContent','info',svgInfo+response,'click');
                        dataTable.ajax.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error("Error appending to file:", error);
                        //alert("Error appending to file. Please try again later.");
                    }
                });
            }
            else
            {
                
                setupDropdown('dropdownContent','error','Module/Control Name already Exist..!','click');
              
            }
            
            
        });
    });