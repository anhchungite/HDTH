$(function(){
    $(document).on('change', '.container-items select[name^=TasksDetail]', function(){
        var self = this;
        $.ajax({
            url: url_get_accessories_info,
            type: 'post',
            data: {
                    id: $(this).val() , 
                    _csrf : yii.getCsrfToken()
                  },
            success: function (data) {
                var parent = self.closest('.detail-item');
                $(parent).find('input[id$=accessories_price]').val(data.result.price);
                $(parent).find('input[id$=accessories_charge]').val(data.result.charge);
            }
       });
    });

});