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
});

$(document).ready(function(){
    $('.statust').click(function(){
        var idbl =$(this).data('order_id');
        var m_status = $(this).val();
        var _token = $('input[name="_token"]').val();
        // alert(m_status);
        $.ajax({
            url:'/admintrator/update-trangthai',
            method:'post',
            data:{idbl:idbl, m_status:m_status, _token: _token},
            success: function(data) 
            {
                if(data == 'done')
                {
                    alert('bạn đã thay đổi trạng thái');
                    location.reload();
                }
                else
                {
                    alert('gặp lỗi rồi !');
                }
            }
        });
    });
});

