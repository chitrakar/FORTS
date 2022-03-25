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
        let cid = $('#cid').attr('data-id');
        $.ajax({
            url: 'action_for_reservation.php',
            method: 'POST',
            data: {load:1,cid:cid},
            success: function(data){
                $('#content').html(data);
            }
        })
    }

    $(document).on('click','#cancel',function(){
        let rid = $(this).attr('rid');
        if(confirm('Do you want to cancel this reservation?')){
            $.ajax({
                url: 'action_for_reservation.php',
                method: 'POST',
                data:{cancel:1,rid:rid},
                success: function(data){
                    loadData();
                    $('#snackbar').html(data);
                    myFunction(data);
                }
            })
        }
    })
    

//     $('#confirm').on("click",function(e){    
//         e.preventDefault();
//         $.ajax({
//             url: 'reservation_action.php',
//             method: 'POST',
//             data: $('#confirm-form').serialize(),
//             success: function(data){
                
//                 $('#snackbar').html(data);
//                 myFunction(data);
//                 // window.setTimeout(window.location='index.php',10000);
//             }
//         })
//     })

//     $('#dem').on("click",function(e){
        
//         e.preventDefault();
//         $.ajax({
//             url: 'reservation_action.php',
//             method: 'POST',
//             data: {data:1},
//             success: function(data){
                
//                 $('#snackbar').html(data);
//                 myFunction(data);
//             }
//         })
//     })

})