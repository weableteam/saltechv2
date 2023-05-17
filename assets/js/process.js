

jQuery(function ($) {
        $(".link-prj").click(function(event) {
            var id = $(this).attr('project-id')
            var t = $(this);
			event.preventDefault();
            $.ajax({
            type: "POST",
            url: zing.ajax_url,
            dataType: "json",
            data: t.serialize() + "&action=z_do_ajax&_action=info&_id=" + id,
            beforeSend: function () {
            },
            success: function (res) {
                console.log(res)
                $(".pj .modal-content").html(res)
                $('.pj').modal('show')

            }
        });
    });
		  

        
        // Gửi thông tin bước cuối


  });
