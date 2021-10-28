<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Verlauf') }}
        </h2>
    </x-slot>
    @php

        @endphp
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Verlauf
                </div>
                <br>
                <div class="mr-5 ml-5">
                    <div class="shadow-lg rounded-lg overflow-hidden">
                        <div class="py-3 px-5 bg-gray-50">
                            {{date('d.m.Y', strtotime(\Carbon\Carbon::now()))}}
                        </div>
                        <canvas class="p-10 " id="chartLine"></canvas>
                    </div>


                </div>
                <div id="chartdiv"></div>
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

        const labels = [

            '00:00',
            '01:00',
            '02:00',
            '03:00',
            '04:00',
            '05:00',
            '06:00',
            '07:00',
            '08:00',
            '09:00',
            '10:00',
            '11:00',
            '12:00',
            '13:00',
            '14:00',
            '15:00',
            '16:00',
            '17:00',
            '18:00',
            '19:00',
            '20:00',
            '21:00',
            '22:00',
            '23:00',

        ];

        const data = {
            labels: labels,
            datasets: [{
                label: 'Temperatur',
                backgroundColor: 'hsl(0,39%,52%)',
                borderColor: 'hsl(0,39%,52%)',
                data: [24, 25.2, 23, 23.5, 22, 21, 22.5, 24, 25.2, 23, 23.5, 22, 21, 22.5, 24, 25.2, 23, 23.5, 22, 21, 22.5, 24, 25.2, 23, 23.5, 22, 21, 22.5],
                fill: true,
                /*mehr Werte werden nicht angezeigt - wie mehr Werte aber nur 24 labels? TODO */
            }, {
                label: 'Luftfeuchtigkeit',
                backgroundColor: 'hsl(221,54%,61%)',
                borderColor: 'hsl(221,54%,61%)',
                data: [39, 40, 41, 40.5, 41, 41.2, 45, 39, 40, 41, 40.5, 41, 41.2, 45, 41.2, 45, 39, 40, 41, 40.5, 40.5, 41, 41.2, 45, 41.2, 45, 39],
                fill: true,
            }]
        };

        const configLineChart = {
            type: 'line',
            data,
            options: {}
        };

        var chartLine = new Chart(
            document.getElementById('chartLine'),
            configLineChart
        );
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
            dateAxis.renderer.minGridDistance = 40;
            chart.dateFormatter.inputDateFormat = "yyyy-MM-dd HH:mm:ss";
            dateAxis.dateFormatter.dateFormat = "yyyy-MM-dd HH:mm:ss";
            valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.title.text = "Menge in Tonnen";

            dateAxis.baseInterval = {
                timeUnit: "hour",
                count: 1
            };


            valueAxis.max = 100;
            valueAxis.min = 0;
            valueAxis.strictMinMax = true;

// Create series
            var series1 = chart.series.push(new am4charts.LineSeries());
            series1.dataFields.dateX = "ay";
            series1.dataFields.valueY = "ax";
            series1.strokeWidth = 3;
            series1.fillOpacity = 0.2;

            var series2 = chart.series.push(new am4charts.LineSeries());
            series2.dataFields.dateX = "by";
            series2.dataFields.valueY = "bx";
            series2.strokeWidth = 3;
            series2.fillOpacity = 0.2;
            series2.baseAxis = valueAxis;

// Scrollbars
            chart.scrollbarX = new am4core.Scrollbar();
            chart.scrollbarY = new am4core.Scrollbar();

        }); // end am4core.ready()
    </script>
</x-app-layout>
