$(function(){

  // 
  var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
  var d1 = [];
  for (var i = 0; i <= 11; i += 1) {
    d1.push([i, parseInt((Math.floor(Math.random() * (1 + 20 - 10))) + 10)]);
  }
  var plot = $.plot($("#flot-color"), [{
          data: d1
      }], 
      {
        series: {
            lines: {
                show: true,
                lineWidth: 1,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 0.0
                    }, {
                        opacity: 0.2
                    }]
                }
            },
            points: {
                radius: 5,
                show: true
            },
            shadowSize: 2
        },
        grid: {
            color: "#fff",
            hoverable: true,
            clickable: true,
            tickColor: "#f0f0f0",
            borderWidth: 0
        },
        colors: ["#3fcf7f"],
        xaxis: {
            mode: "categories",
            tickDecimals: 0            
        },
        yaxis: {
            ticks: 5,
            tickDecimals: 0,            
        },
        tooltip: true,
        tooltipOpts: {
          content: "%x.1 is %y.4",
          defaultTheme: false,
          shifts: {
            x: 0,
            y: 20
          }
        }
      }
  );


  var d2 = [];
  for (var i = 0; i <= 6; i += 1) {
    d2.push([i, parseInt((Math.floor(Math.random() * (1 + 30 - 10))) + 10)]);
  }
  var d3 = [];
  for (var i = 0; i <= 6; i += 1) {
    d3.push([i, parseInt((Math.floor(Math.random() * (1 + 30 - 10))) + 10)]);
  }


  // live update
  var data = [],
  totalPoints = 300;

  function getRandomData() {

    if (data.length > 0)
      data = data.slice(1);

    // Do a random walk

    while (data.length < totalPoints) {

      var prev = data.length > 0 ? data[data.length - 1] : 50,
        y = prev + Math.random() * 10 - 5;

      if (y < 0) {
        y = 0;
      } else if (y > 100) {
        y = 100;
      }

      data.push(y);
    }

    // Zip the generated y values with the x values

    var res = [];
    for (var i = 0; i < data.length; ++i) {
      res.push([i, data[i]])
    }

    return res;
  }

  // bar
  var d1_1 = [
    [10, 120],
    [20, 70],
    [30, 100],
    [40, 60],
    [50, 35]
  ];

  var d1_2 = [
    [10, 80],
    [20, 60],
    [30, 30],
    [40, 35],
    [50, 30]
  ];

  var d1_3 = [
    [10, 80],
    [20, 40],
    [30, 30],
    [40, 20],
    [50, 10]
  ];

  var data1 = [
    {
        label: "Product 1",
        data: d1_1,
        bars: {
            show: true,
            fill: true,
            lineWidth: 1,
            order: 1,
            fillColor:  "#f4c414"
        },
        color: "#f4c414"
    },
    {
        label: "Product 2",
        data: d1_2,
        bars: {
            show: true,
            fill: true,
            lineWidth: 1,
            order: 2,
            fillColor:  "#5191d1"
        },
        color: "#5191d1"
    },
    {
        label: "Product 3",
        data: d1_3,
        bars: {
            show: true,
            fill: true,
            lineWidth: 1,
            order: 3,
            fillColor:  "#3fcf7f"
        },
        color: "#3fcf7f"
    }
  ];

  var d2_1 = [
    [90, 10],
    [70, 20],
    [50, 30]
  ];

  var d2_2 = [
    [80, 10],
    [60, 20],
    [40, 30]
  ];

  var d2_3 = [
    [120, 10],
    [50, 20],
    [30, 30]
  ];

  var data2 = [
    {
        label: "Product 1",
        data: d2_1,
        bars: {
            horizontal: true,
            show: true,
            fill: true,
            lineWidth: 1,
            order: 1,
            fillColor:  "#f4c414"
        },
        color: "#f4c414"
    },
    {
        label: "Product 2",
        data: d2_2,
        bars: {
            horizontal: true,
            show: true,
            fill: true,
            lineWidth: 1,
            order: 2,
            fillColor:  "#5191d1"
        },
        color: "#5191d1"
    },
    {
        label: "Product 3",
        data: d2_3,
        bars: {
            horizontal: true,
            show: true,
            fill: true,
            lineWidth: 1,
            order: 3,
            fillColor:  "#3fcf7f"
        },
        color: "#3fcf7f"
    }
  ];


  // pie

  var da = [], 
      da1 = [],
      series = Math.floor(Math.random() * 4) + 3;

  for (var i = 0; i < series; i++) {
    da[i] = {
      label: "Series" + (i + 1),
      data: Math.floor(Math.random() * 100) + 1
    }
  }

  for (var i = 0; i < series; i++) {
    da1[i] = {
      label: "Series" + (i + 1),
      data: Math.floor(Math.random() * 100) + 1
    }
  }

});