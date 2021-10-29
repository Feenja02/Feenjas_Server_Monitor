<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Verlauf') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Verlauf der Werte in den letzten 24 Stunden
                </div>
                <div id="chartdiv" style="width: 700px; height: 400px"></div>
                <br>
            </div>
        </div>
    </div>
    <!-- Required chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

    <!-- Chart line -->
    <script>
        <!-- Resources -->

        <!-- Chart code -->

        am4core.ready(function () {

// Themes begin
            am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
            var chart = am4core.create("chartdiv", am4charts.XYChart);

// Add data
            chart.data =  @json($graph_data);

// Create axes
            var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
            dateAxis.renderer.minGridDistance = 35;
            chart.dateFormatter.inputDateFormat = "yyyy-MM-dd HH:mm:ss";
            dateAxis.dateFormatter.dateFormat = "yyyy-MM-dd HH:mm:ss";
            valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.title.text = "Temp in °C + Hum in %";

            dateAxis.baseInterval = {
                timeUnit: "hour",
                count: 1
            };
//if not active - best scale via amCharts magic
           /* valueAxis.max = 40;
            valueAxis.min = 15;
            valueAxis.strictMinMax = true;*/

// Create series
            var series1 = chart.series.push(new am4charts.LineSeries());
            series1.dataFields.dateX = "ay";
            series1.dataFields.valueY = "ax";
            series1.strokeWidth = 3;
            series1.fillOpacity = 0.2;
            series1.tooltipText = "Temperatur: {valueY}°C"


            var series2 = chart.series.push(new am4charts.LineSeries());
            series2.dataFields.dateX = "by";
            series2.dataFields.valueY = "bx";
            series2.strokeWidth = 3;
            series2.fillOpacity = 0.2;
            series2.baseAxis = valueAxis;
            series2.tooltipText = "Luftfeuchtigkeit: {valueY}%"

// Chart Cursor
            chart.cursor= new am4charts.XYCursor();

// Scrollbars
           // chart.scrollbarX = new am4core.Scrollbar();
           // chart.scrollbarY = new am4core.Scrollbar();

        }); // end am4core.ready()
    </script>
</x-app-layout>
