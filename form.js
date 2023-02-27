$(document).ready(function(){
    $("#contactForm").submit(function(e){
        e.preventDefault();
        
            $.ajax({
                method:"POST",
                url:"index.php",
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(data,one,two){
                    
                    
                    $('#mydiv').html(data);
                    // if(data==1){
                        
                    //     alert('save successfully'); 
                        
                    // }
                    // else if(data==10){
                        
                    //     alert('This user already exist');

                    // }
                        
                        
                }

                
            });
            
    });
});


