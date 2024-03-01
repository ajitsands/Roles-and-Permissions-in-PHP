

        function setupDropdown(contentId,color,message,event) {
            if(event==='click')
            {
            //$('#' + buttonId).click(function(){
                var returnValue = color; // Just for testing, you can change this value later
                setDropdownColor(returnValue, contentId);
                $('#' + contentId).html(message);
                $('#' + contentId).slideDown();
                
                setTimeout(function() {
                    $('#' + contentId).slideUp();
                    console.log("Dropdown content slid up after 3 seconds.");
                }, 3000); // 3000 milliseconds = 3 seconds
            //});
        
                $(document).click(function(e) {
                    var target = e.target;
                    if (!$(target).is('#' + contentId) && !$(target).closest('#' + contentId).length) {
                        $('#' + contentId).slideUp();
                    }
                });
            }
        }
        
        function setDropdownColor(returnValue, contentId) {
            $('#' + contentId).removeClass('success error other'); // Remove existing classes
        
            switch(returnValue) {
                case 'success':
                    $('#' + contentId).addClass('success');
                    break;
                case 'error':
                    $('#' + contentId).addClass('error');
                    break;
                case 'info':
                    $('#' + contentId).addClass('info');
                    break;
                default:
                    $('#' + contentId).addClass('other');
            }
        }
        