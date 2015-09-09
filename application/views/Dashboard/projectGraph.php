<script src="<?=base_url()?>public/dashboard_assets/plugins/charts-chartjs/Chart.min.js"></script> 
<?php 
$temp=$lastOccur[0];
$i=0;
$count=array();
$count[0]=0;
foreach($lastOccur as $value){
if($value==$temp)
{
 $count[$i]++;   
}
else
{
    $i++;
    $count[$i]=1;
    $temp=$value;
}
//array is already sorted and diff dates are indexed at:
// $index=0, $index=index+count[i]   
}    

//______________________________________________________________________________
//foreach ($count as $x)
//{
//	echo $x;
//	echo '<br>';
//}

//______________________________________________________________________________

    $index=0;
    foreach ($count as $x)
    {
        // x coordinate (date) =      $lastOccur[$index];
        $lastOccur[$index];
	$index=$index+$x;
        // y coordinate (count for a day) =      $x;

    }


?>



<div style="width:80%; height:90%; margin-top:10%; margin-left:5% ">
    <canvas id="canvas"></canvas>
</div>


<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
    <div class="header">
        <h2><strong>Financial</strong> Charts</h2>
        <p>Need graph for trading? Prices evolution? All Financial reports can easily be display with <strong>HighStock Charts</strong>: various periods, simple export tools.<br>
            You can find more infos about HighStock here: <a href="http://api.highcharts.com/highstock">HighStock API</a>.
        </p>
        <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
                <li><a href="dashboard.html">Make</a>
                </li>
                <li><a href="charts.html">Charts</a>
                </li>
                <li class="active">Finance Charts</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <h3><strong>Financial</strong> Charts</h3>
            <p>Highstock lets you create stock or general timeline charts in pure JavaScript, including sophisticated navigation options like a small navigator series, preset date ranges, date picker, scrolling and panning.</p>
            <div id="financial-chart" style="height:320px"></div>
        </div>
        <div class="col-sm-6">
            <h3><strong>Candles</strong> Charts</h3>
            <p>It works in all modern browsers including the iPhone/iPad and Internet Explorer from version 6. Standard browsers use SVG for the graphics rendering. In legacy Internet Explorer graphics are drawn using VML.</p>
            <div id="candle-chart" style="height:320px"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <h3><strong>OHLC</strong> Charts</h3>
            <p>An <strong>open-high-low-close</strong> chart is a type of chart typically used to illustrate movements in the price of a financial instrument over time. Each vertical line on the chart shows the highest and lowest prices over one unit of time.</p>
            <div id="ohlc-chart" style="height:320px"></div>
        </div>
        <div class="col-sm-6">
            <h3><strong>Range</strong> Charts</h3>
            <p>Highstock supports line, spline, area, areaspline, column, scatter, OHLC, candlestick, flags, arearange, areasplinerange and columnrange chart types. Any of these can be combined in one chart.
            </p>
            <div id="arearange-chart" style="height:320px"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <h3><strong>Real Time</strong> Charts with <strong>Navigator</strong></h3>
            <p>Highstock is very intelligent about time values. With milliseconds axis units, Highstock determines where to place the ticks so that they always mark the start of the month or the week, midnight and midday, the full hour etc.</p>
            <div id="realtime-chart" style="height:320px"></div>
        </div>
        <div class="col-sm-6">
            <h3><strong>Bar</strong> Charts</h3>
            <p>Setting the Highstock configuration options requires no special programming skills. The options are given in a JavaScript object notation structure, which is basically a set of keys and values.</p>
            <div id="bar-chart" style="height:320px"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <h3><strong>Export Tools</strong> Option</h3>
            <p>
                You can add very useful export tool option. It allow to export chart in various formats: PNG, JPEG, PDF and SVG.<br>
                You can directly print your chart too.
            </p>
            <div id="export-tools-chart" style="height:320px"></div>
        </div>
        <div class="col-sm-6">
            <h3><strong>Points</strong> Charts</h3>
            <p>In addition to controling the zooming and panning from the scroller and navigator, you have the option to set mouse and finger zooming and panning.
            </p>
            <div id="point-chart" style="height:320px"></div>
        </div>
    </div>
    <div class="footer">
        <div class="copyright">
            <p class="pull-left sm-pull-reset">
                <span>Copyright <span class="copyright">©</span> 2015 </span>
                <span>THEMES LAB</span>.
                <span>All rights reserved. </span>
            </p>
            <p class="pull-right sm-pull-reset">
                <span><a href="#" class="m-r-10">Support</a> | <a href="#" class="m-l-10 m-r-10">Terms of use</a> | <a href="#" class="m-l-10">Privacy Policy</a></span>
            </p>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT -->


<script>
    var lineChartData = {
        labels : [" 0 ", <?php 
    $index=0;
    foreach ($count as $x)
    {
        // x coordinate (date) =      $lastOccur[$index];
        echo '"'.$lastOccur[$index].'", ';
        $index=$index+$x;
        // y coordinate (count for a day) =      $x;
    } 
    ?>],

                datasets : [
                    {
                        fillColor : "rgba(49, 157, 181, 0.6)",
                        strokeColor : "black",
                        pointColor : "grey",
                        pointStrokeColor : "black",
                        pointHighlightFill: "black",
                        data : [" 0 ", <?php 
                                $index=0;
                                 foreach ($count as $x)
                                {

                                    echo '"'.$x.'", ';

                                } 
                        ?>]
                                            }
                                        ]
                                    }

                                    Chart.defaults.global.animationSteps = 300;
                                    Chart.defaults.global.tooltipYPadding = 16;
                                    Chart.defaults.global.tooltipCornerRadius = 0;
                                    Chart.defaults.global.tooltipTitleFontStyle = "normal";
                                    Chart.defaults.global.tooltipFillColor = "rgba(27, 29, 27, 0.8)";
                                    Chart.defaults.global.animationEasing = "easeOutBounce";
                                    Chart.defaults.global.responsive = true;
                                    Chart.defaults.global.scaleLineColor = "black";
                                    Chart.defaults.global.scaleFontSize = 12;

                                    var ctx = document.getElementById("canvas").getContext("2d");
                                    var LineChartDemo = new Chart(ctx).Line(lineChartData, {
                                        pointDotRadius: 2,
                                        bezierCurve: true,
                                        scaleShowGridLines : false,
                                        scaleOverride : true,
                                        scaleStepWidth : <?php 
    $x=(min($count));
    $y=(max($count));
    if($x===$y)
    {
        echo 30;
    }
    else
    {
        echo 30;
    }
    ?>,
                    scaleSteps : <?php echo (max($count) / 15)  ?>     
                });
</script>


