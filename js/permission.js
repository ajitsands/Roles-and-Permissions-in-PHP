$(document).ready(function() {
    // Your JavaScript code here
    function hasPermission(permission) {
        return permissions.includes(permission);
    }

    // Hide controls based on permissions
    var addActionButtons = document.querySelectorAll(".addAction");
    var editActionButtons = document.querySelectorAll(".editAction");
    var deleteActionButtons = document.querySelectorAll(".deleteAction");
    var listActionButtons = document.querySelectorAll(".listAction");
	var saveActionButtons = document.querySelectorAll(".saveAction");
	var printActionButtons = document.querySelectorAll(".printAction");
	var uploadActionButtons = document.querySelectorAll(".uploadAction");
	var exportToExcelActionButtons = document.querySelectorAll(".exportToExcelAction");
	var exportToPDFActionButtons = document.querySelectorAll(".exportToPDFAction");
	
	//New Content Adding by User will Come Here 



	var eventBOQModule = document.querySelectorAll(".classBOQModule");













	// add_new_var
	
	
		// Donot Remove The above line 
	// New Content Adding Ends Here



    addActionButtons.forEach(function(obj) {
        console.log('Checking Add Permisssion: '+hasPermission("Add"));
        if (!hasPermission("Add")) {
            obj.style.display = "none";
        }
    });

    editActionButtons.forEach(function(obj) {
        if (!hasPermission("Edit")) {
            obj.style.display = "none";
        }
    });

    deleteActionButtons.forEach(function(obj) {
        if (!hasPermission("Delete")) {
            obj.style.display = "none";
        }
    });

    listActionButtons.forEach(function(obj) {
        if (!hasPermission("List")) {
            obj.style.display = "none";
        }
    });
	
	saveActionButtons.forEach(function(obj) {
        if (!hasPermission("Save")) {
            obj.style.display = "none";
        }
    });
    
	uploadActionButtons.forEach(function(obj) {
        if (!hasPermission("Uploads")) {
            obj.style.display = "none";
        }
    });
	
	printActionButtons.forEach(function(obj) {
        if (!hasPermission("Print")) {
            obj.style.display = "none";
        }
    });
	
	exportToExcelActionButtons.forEach(function(obj) {
        if (!hasPermission("ExportToExcel")) {
            obj.style.display = "none";
        }
    });
	
	exportToPDFActionButtons.forEach(function(obj) {
        if (!hasPermission("ExportToPDF")) {
            obj.style.display = "none";
        }
    });
	
	// Adding New Permission Starts Here 



	eventBOQModule.forEach(function(obj) {if (!hasPermission("BOQModule")) {obj.style.display = "none";}});












	// adding_new_permission
	
		// Donot Remove The above line 
	//Addning New Permission Ends Here 
});

