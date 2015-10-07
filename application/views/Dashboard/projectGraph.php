<?php
    if($noprojectmessage != "No Error's have been recieved yet."){
?>


 
<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
    <div class="header">
        <h2><strong>PROJECT STATISTICS</strong></h2>
        <p>
            THE GRAPHS BELOW ARE CREATED TO NOTIFY YOU THE ERRORS FREQUENCY IN THIS PARTICULAR PROJECT. THE ERROR STATISTICS ARE REQUIRED HERE TO KEEP IN TOUCH WITH THE ERRORS COUNTS EVERY TIME YOUR PROJECT IS LOADED.
            Well, AS WE ALL KNOW ONLY AN IDOL PROJECT COULD BE FREE OF ERRORS AND IDOL CASE IS RARE AND HAPPEN IN DREAMS ONLY.
        </p>
    </div>
    <div class="row">
        <div class="col-sm-6" style="width:100%">
            <h3><strong>ERROR FREQUENCY OVER TIME</strong></h3>
            <p>The Graph Shows ERROR FREQUENCY (y-axis) over time (x-axis). This is a real-time graph working with dynamic data on run time. no need to reload this page every time you run your project.</p>
            <div id="errors_frequency" style="height:500px"></div>
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-sm-6" style="width:100%">
            <h3><strong>Errors count for last 12 days</strong></h3>
            <p>The Graph Shows ALL and different type of Error's Frequency (y-axis) for last 12 days (x-axis)</p>
            <div class="ct-chart" id="others_vs_404" style="height:500px"></div>
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-sm-6" style="width:100%">
            <h3><strong>DIFFERENT TYPE OF ERRORS</strong></h3>
            <p>THE BAR chart shows each different type of error (x-axis) and their count (y-axis). This is very useful since it get you know how bad you are in tackling a particular type of error and how often an error occurs.  </p>
            <div id="errorTypes_Bar" style="height:500px"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6" style="width:100%">
            <h3><strong>ERRORS FREQUENCY ON BROWSERS</strong></h3>
            <p>The graph shows what browser you use the most to run a specified project</p>
            <div id="browser_usage" style="height:500px"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6" style="width:100%">
            <div style="height:200px"></div>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT -->

<script type="text/javascript">
    Highcharts.setOptions({
        global : {
            useUTC : false
        }
    });
    // Create the chart
    $('#errors_frequency').highcharts('StockChart', {
        chart : {
            backgroundColor: 'transparent',
            events : {
                load : function () {
                    // set up the updating of the chart each second
                    var series = this.series[0];
                    setInterval(function () {
                        jQuery.ajax({
                            type: "POST",
                            url: "<?php echo base_url(); ?>" + "/Dashboard/geterr",
                            success: function(res) {
                                var x = (new Date()).getTime(), // current time
                                y = Math.round(res);
                                series.addPoint([x, y], true, true);
                            }
                        });
                    }, 1000);
                }
            }
        },
        rangeSelector: {
            allButtonsEnabled: true,
            buttons: [{
                    count: 1,
                    type: 'minute',
                    text: '1M'
                }, {
                    count: 5,
                    type: 'minute',
                    text: '5M'
                },{
                    count: 1,
                    type: 'hour',
                    text: '1h'
                },{
                    type: 'month',
                    count: 3,
                    text: 'Day',
                    dataGrouping: {
                        forced: true,
                        units: [['day', [1]]]
                    }
                }, {
                    type: 'year',
                    count: 1,
                    text: 'Week',
                    dataGrouping: {
                        forced: true,
                        units: [['week', [1]]]
                    }
                }, {
                    type: 'all',
                    text: 'Month',
                    dataGrouping: {
                        forced: true,
                        units: [['month', [1]]]
                    }
                }],
            inputEnabled: false,
            selected: 0
        },
        title : {
            text : 'Live random data'
        },
        exporting: {
            enabled: false
        },
        series : [{
                name : 'Random data',
                data : (function () {
                    // generate an array of random data
                    var data = [], time = (new Date()).getTime(), i;
                    for (i = -999; i <= 0; i += 1) {
                        data.push([
                            time + i * 1000,
                            Math.round(Math.random() * 100)
                        ]);
                    }
                    return data;
                }())
            }]
    });
</script>

<script type="text/javascript">
var chart = new Chartist.Line('#others_vs_404', {

  labels: [<?php foreach($last_12days as $value){
      echo "'".$value."', ";
  } ?> ],
  series: [
    [<?php foreach($count as $value){
      echo $value.", ";
  } ?>],[<?php for($i=0;$i<12;$i++){
      echo $ReferenceError_Count[$i][0].", ";
  } ?>],[<?php for($i=0;$i<12;$i++){
      echo $failedToLoadResource_Count[$i][0].", ";
  } ?>],[<?php for($i=0;$i<12;$i++){
      echo $ScriptError_Count[$i][0].", ";
  } ?>],[<?php for($i=0;$i<12;$i++){
      echo $SyntaxError_Count[$i][0].", ";
  } ?>],[<?php for($i=0;$i<12;$i++){
      echo $TypeError_Count[$i][0].", ";
  } ?>],[<?php for($i=0;$i<12;$i++){
      echo $others_Count[$i][0].", ";
  } ?>],              
  ]
}, {
  low: 0,
  showArea: false,
  showPoint: true,
  fullWidth: false
});

// Let's put a sequence number aside so we can use it in the event callbacks
var seq = 0,
  delays = 40,
  durations = 5000;

// Once the chart is fully created we reset the sequence
chart.on('created', function() {
  seq = 0;
});

// On each drawn element by Chartist we use the Chartist.Svg API to trigger SMIL animations
chart.on('draw', function(data) {
  seq++;

  if(data.type === 'line') {
    // If the drawn element is a line we do a simple opacity fade in. This could also be achieved using CSS3 animations.
    data.element.animate({
      opacity: {
        // The delay when we like to start the animation
        begin: seq * delays + 1000,
        // Duration of the animation
        dur: durations,
        // The value where the animation should start
        from: 0,
        // The value where it should end
        to: 1
      }
    });
  } else if(data.type === 'label' && data.axis === 'x') {
    data.element.animate({
      y: {
        begin: seq * delays,
        dur: durations,
        from: data.y + 100,
        to: data.y,
        // We can specify an easing function from Chartist.Svg.Easing
        easing: 'easeOutQuart'
      }
    });
  } else if(data.type === 'label' && data.axis === 'y') {
    data.element.animate({
      x: {
        begin: seq * delays,
        dur: durations,
        from: data.x - 100,
        to: data.x,
        easing: 'easeOutQuart'
      }
    });
  } else if(data.type === 'point') {
    data.element.animate({
      x1: {
        begin: seq * delays,
        dur: durations,
        from: data.x - 10,
        to: data.x,
        easing: 'easeOutQuart'
      },
      x2: {
        begin: seq * delays,
        dur: durations,
        from: data.x - 10,
        to: data.x,
        easing: 'easeOutQuart'
      },
      opacity: {
        begin: seq * delays,
        dur: durations,
        from: 0,
        to: 1,
        easing: 'easeOutQuart'
      }
    });
  } else if(data.type === 'grid') {
    // Using data.axis we get x or y which we can use to construct our animation definition objects
    var pos1Animation = {
      begin: seq * delays,
      dur: durations,
      from: data[data.axis.units.pos + '1'] - 30,
      to: data[data.axis.units.pos + '1'],
      easing: 'easeOutQuart'
    };

    var pos2Animation = {
      begin: seq * delays,
      dur: durations,
      from: data[data.axis.units.pos + '2'] - 100,
      to: data[data.axis.units.pos + '2'],
      easing: 'easeOutQuart'
    };

    var animations = {};
    animations[data.axis.units.pos + '1'] = pos1Animation;
    animations[data.axis.units.pos + '2'] = pos2Animation;
    animations.opacity = {
      begin: seq * delays,
      dur: durations,
      from: 0,
      to: 1,
      easing: 'easeOutQuart'
    };

    data.element.animate(animations);
  }
});

// For the sake of the example we update the chart every time it's created with a delay of 10 seconds
chart.on('created', function() {
  if(window.__exampleAnimateTimeout) {
    clearTimeout(window.__exampleAnimateTimeout);
    window.__exampleAnimateTimeout = null;
  }
  window.__exampleAnimateTimeout = setTimeout(chart.update.bind(chart), 15000);
});


</script>

<script type="text/javascript">
            $('#errorTypes_Bar').highcharts({
                chart: {
                    backgroundColor: 'transparent',
                    type: 'column'
                },
                exporting: {
                    enabled: false
                },
                credits: {
                    enabled: false
                },
                title: {
                    text: 'Frequency of different types of errors'
                },
                xAxis: {
                    type: 'category'
                },
                yAxis: {
                    title: {
                        text: 'Total percent ERROR share'
                    }
                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y:.1f}%'
                        }
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
                },

                series: [{
                        name: "Error Type",
                        colorByPoint: true,
                        data: [{
                                name: "ReferenceError",
                                y: <?php echo $errMessage['ReferenceError'];?>,
                                drilldown: "ReferenceError"
                            }, {
                                name: "SyntaxError",
                                y: <?php echo $errMessage['SyntaxError'];?>,
                                drilldown: "SyntaxError"
                            }, {
                                name: "failed to load resource",
                                y: <?php echo $errMessage['failedToLoadResource'];?>,
                                drilldown: "failed to load resource"
                            }, {
                                name: "TypeError",
                                y: <?php echo $errMessage['TypeError'];?>,
                                drilldown: "TypeError"
                            }, {
                                name: "Script error",
                                y: <?php echo $errMessage['ScriptError'];?>,
                                drilldown: "Script error"
                            }, {
                                name: "others",
                                y: <?php echo $errMessage['others'];?>,
                                drilldown: "others"
                            }]
                    }]

            });
</script>

<script type="text/javascript">
            $('#browser_usage').highcharts({
                chart: {
                    backgroundColor: 'transparent',
                    type: 'pie',
                    options3d: {
                        enabled: true,
                        alpha: 45,
                        beta: 0
                    }
                },
                title: {
                    text: 'Browser shares on loading this project'
                },
                exporting: {
                    enabled: false
                },
                credits: {
                    enabled: false
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        depth: 35,
                        dataLabels: {
                            enabled: true,
                            format: '{point.name}'
                        }
                    }
                },
                series: [{
                        type: 'pie',
                        name: 'Browser share',
                        data: [
                            {
                                name: 'Chrome',
                                y: <?php echo $browser_percentage['chrome']?>,
                                color:'#F5A9BC'
                            },
                            {
                                name: 'IE',
                                y: <?php echo $browser_percentage['ie']?>,
                                color:'#F7BE81'
                            },

                            {
                                name: 'Firefox',
                                y: <?php echo $browser_percentage['mozila']?>,
                                sliced: true,
                                selected: true,
                                color:'#ACFA58'
                            },
                            {
                                name: 'Safari',
                                y: <?php echo $browser_percentage['safari']?>,
                                color:'#74DF00'
                            },

                            ['Others',   <?php echo $browser_percentage['others']?>]
                        ]
                    }]
            });
</script>


<?php 
    }
    else{
?>
        <div class="page-content page-thin">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-header bg-dark">
                            <a style="text-align: center;"><h3><strong><?= $noprojectmessage; ?></strong></h3></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php 
    } 
    ?>
