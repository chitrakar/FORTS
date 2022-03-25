// snackbar function
function myFunction() {
    // Get the snackbar DIV
    let x = document.getElementById("snackbar");

    // Add the "show" class to DIV
    x.className = "show";

    // After 3 seconds, remove the show class from DIV
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 2000);
}
$(document).ready(function(){

    loadData();
    function loadData(){
        let rid = $('#rcontent').attr('data-id');
       
        $.ajax({
            url: 'action.php',
            method: 'POST',
            data: {load:1,rid:rid},
            success: function(data){
                $('#rcontent').html(data);
            }
        })
    }

    //accepting reservation
    $(document).on('click','#accept',function(){
        let rid = $(this).attr('rid');
        if(confirm('Do you want to accept this reservation?')){
            $.ajax({
                url: 'action.php',
                method: 'POST',
                data:{accept:1,rid:rid},
                success: function(data){
                    loadData();
                }
            })
        }
    })

    //rejecting reservation
    $(document).on('click','#reject',function(){
        let rid = $(this).attr('rid');
        if(confirm('Do you want to reject this reservation?')){
            $.ajax({
                url: 'action.php',
                method: 'POST',
                data:{reject:1,rid:rid},
                success: function(data){
                    loadData();
                }
            })
        }
    })
    
})