$(document).ready(function(){
  
    $('.get_value').click(function(){
        var btn = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url : '/get_data_cmt/'+btn,
            type: "GET",
            success: function(data) {
                // in ra bên ngoài 
                console.log(data);
               $('#content_user').html(data.query[0].m_content);
               $('#id_user').html(data.query[0].name);
            }
        })
    })
})