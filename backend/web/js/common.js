
var current = null;
var years = [];

var generateYears = function(action = '', step = 5) {
  var both = Math.floor(step / 2);
  if(action == '') {
    for(var j = both; j > 0; j--) {
      years.push(current - j);
    }
    years.push(current);
    for(var i = 1; i <= both; i++) {
      years.push(current + i);
    }
  }
  if(action == 'next') {
    var max = Math.max.apply(Math, years);
    years = [];
    var i = 1;
    while(i <= step) {
      years.push(max + i);
      i++;
    }

  }
  if(action == 'prev') {
    var min = Math.min.apply(Math, years);
    years = [];
    var i = step;
    while(i > 0) {
      years.push(min - i);
      i--;
    }

  }
  var html = '';
  var active;
  for(var i in years) {
    active = '';
    if(years[i] == current) {
      active = 'active';
    }
    html += '<a onclick="moveToYear()" class="btn btn-primary '+active+' year-item">'+years[i]+'</a>';
  }
  $('.year-area').html(html);
};


var moveToYear = function() {
  config.data.datasets.forEach(function(dataset) {
    dataset.data = dataset.data.map(function() {
      return randomScalingFactor();
    });
  });
    window.myLine.update();
}

var findGetParameter = function(parameterName) {
  var result = 0,
  tmp = [];
  location.search
      .substr(1)
      .split("&")
      .forEach(function (item) {
        tmp = item.split("=");
        if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
      });
  return Number(result);
}

$(document).ready(function() {
  current = findGetParameter('year');
  if(!current) {
    current = new Date().getFullYear();
  }
  generateYears();
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