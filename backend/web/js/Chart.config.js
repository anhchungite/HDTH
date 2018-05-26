window.chartColors = {
    red: 'rgb(255, 99, 132)',
    orange: 'rgb(255, 159, 64)',
    yellow: 'rgb(255, 205, 86)',
    green: 'rgb(75, 192, 192)',
    blue: 'rgb(54, 162, 235)',
    purple: 'rgb(153, 102, 255)',
    grey: 'rgb(201, 203, 207)'
};

var randomScalingFactor = function () {
    return Math.ceil(Math.random() * 100.0) * Math.pow(10, Math.ceil(Math.random() * 5));
};

var numberFormat = function(value, suffix = '') {
    value = value.toString();
    value = value.split(/(?=(?:...)*$)/);
    value = value.join(',');
    if(suffix != '') {
        return value + ' ' + suffix;
    }
    return value;
};

var config = {
    type: 'line',
    data: {
        labels: chartConfig.labels,
        datasets: [{
            label: chartConfig.label[0],
            backgroundColor: window.chartColors.red,
            borderColor: window.chartColors.red,
            fill: false,
            data: [
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
            ],
        }, {
            label: chartConfig.label[1],
            backgroundColor: window.chartColors.orange,
            borderColor: window.chartColors.orange,
            fill: false,
            data: [
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
            ],
        },
        {
            label: chartConfig.label[2],
            backgroundColor: window.chartColors.blue,
            borderColor: window.chartColors.blue,
            fill: false,
            data: [
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
            ],
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        tooltips: {
            callbacks: {
                  label: function(tooltipItem, data) {
                      var value = data.datasets[0].data[tooltipItem.index];
                      return numberFormat(value, 'VNĐ');
                  }
            } // end callbacks:
          }, //end tooltips
        scales: {
            xAxes: [{
                display: true,
            }],
            yAxes: [{
                display: true,
                ticks: {
                    beginAtZero:true,
                    userCallback: function(value, index, values) {
                        // Convert the number to a string and splite the string every 3 charaters from the end
                        return numberFormat(value);
                    }
                }
            }]
        }
    }
};