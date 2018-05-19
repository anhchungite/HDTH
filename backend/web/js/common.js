$(function(){
    $(document).on('change', '.container-items select[name^=TasksDetail]', function(){
        var self = this;
        $.ajax({
            url: '/admin/accessories/get-info',
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

    $(document).on('click', 'ul.list-accessories button.remove-item', function(){
        var index = $(this).data('index');
        $('ul.list-accessories li.accessories-' + index).remove();
    });
});
if (typeof task === 'undefined') {
	var task = {};
}

var addAccessoriesTemplate = '<li data-index="INDEX" class="accessories-INDEX">'
+ '<div class="row">'
+ '<div class="col-md-10 col-lg-10 vcenter">'
+ '<select class="form-control" data-index="INDEX" name="MODEL[accessories][INDEX][id]">'
+ 'OPTION'
+ '</select>'
+ '<div class="row">'
+ '<div class="col-md-6 col-lg-6">'
+ '<input type="text" class="form-control accessories-charge-INDEX" name="MODEL[accessories][INDEX][charge]">'
+ '</div>'
+ '<div class="col-md-6 col-lg-6">'
+ '<input type="number" class="form-control accessories-qty-INDEX" name="MODEL[accessories][INDEX][qty]" min="1" value="1">'
+ '</div>'
+ '</div>'
+ '</div>'
+ '<div class="col-md-2 col-lg-2 vcenter">'
+ '<button type="button" class="btn btn-danger remove-item" data-index="INDEX"><span class="glyphicon glyphicon-remove"></span></button>'
+ '</div>'
+ '</div>'
+ '</li>';


task.addAccessories = function(model, list) {
    var lastIndex = $('ul.list-accessories li:last-child').data('index');
    lastIndex = lastIndex ? lastIndex : 0;
    var html = addAccessoriesTemplate;
    html = html.replace(/MODEL/g, model);
    html = html.replace('OPTION', list);
    html = html.replace(/INDEX/g, lastIndex + 1);
    $('ul.list-accessories').append(html);
}