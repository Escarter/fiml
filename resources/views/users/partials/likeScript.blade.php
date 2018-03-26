<script>
//Linking a item/
$(document).ready(function(){
    $('.like').on('click',function(event){
        event.preventDefault();
        var data_url = $(this).attr('href');
        console.log(data_url);
        $.ajax({
            dataType: 'JSON',
            method: 'GET',
            url : data_url,
            success:function(response){
                if(response.status ==='success'){
                    location.reload();
                }
            }
        })
    })
})
</script>
