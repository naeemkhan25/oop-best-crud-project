
;(function ($){
    $("#wedevs-enquire-form form").on("submit",function (e){
        e.preventDefault();
        let data=$(this).serialize();
         console.log(data);
        $.post(plugindata.ajax_url,data,function (data){
            if(data.success){
                alert(data.data.message);
            }else{
                alert(data.data.message)
            }

        })
            .fail(function (error) {
                alert(plugindata.error);
            });
    });
})(jQuery);