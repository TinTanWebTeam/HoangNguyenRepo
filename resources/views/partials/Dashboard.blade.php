<div class="row">
    <div class="col-md-6">
        <div id="chart1"></div>
    </div>
    <div class="col-md-6">
        <div id="chart2"></div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div id="chart3"></div>
    </div>
</div>

<script>
    $(function () {
        if (typeof dashboardView === 'undefined') {
            dashboardView = {
                loadChart1: function () {
                    $('#chart1').highcharts({
                        title: {
                            text: 'Lượt vận chuyển',
                            x: -20 //center
                        },
                        xAxis: {
                            categories: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',
                                'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12']
                        },
                        yAxis: {
                            title: {
                                text: 'Lượt'
                            },
                            plotLines: [{
                                value: 0,
                                width: 1,
                                color: '#808080'
                            }]
                        },
                        tooltip: {
                            valueSuffix: ' Lượt'
                        },
                        legend: {
                            layout: 'vertical',
                            align: 'right',
                            verticalAlign: 'middle',
                            borderWidth: 0
                        },
                        series: [{
                            name: '2016',
                            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
                        }]
                    });
                },
                loadChart2: function () {
                    $('#chart2').highcharts({
                        chart: {
                            type: 'column'
                        },

                        title: {
                            text: 'Doanh thu và lợi nhuận'
                        },

                        xAxis: {
                            categories: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',
                                'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12']
                        },

                        yAxis: {
                            allowDecimals: false,
                            min: 0,
                            title: {
                                text: ' Triệu đồng'
                            }
                        },
                        tooltip: {
                            valueSuffix: ' Triệu đồng'
                        },
                        plotOptions: {
                        },

                        series: [
                            {
                                name: 'Doanh thu',
                                data: [5, 3, 4, 7, 2,5, 3, 4, 7, 2,4,5],
                            }, {
                                name: 'Lợi nhuận',
                                data: [3, 4, 4, 2, 5,3, 4, 4, 2, 5,4,9],
                            }
                        ]
                    });
                },
                loadChart3: function () {
                    $('#chart3').highcharts({
                        title: {
                            text: 'Lợi nhuận',
                            x: -20 //center
                        },
                        xAxis: {
                            categories: [
                                'Tháng 1', 
                                'Tháng 2', 
                                'Tháng 3', 
                                'Tháng 4', 
                                'Tháng 5', 
                                'Tháng 6',
                                'Tháng 7', 
                                'Tháng 8', 
                                'Tháng 9', 
                                'Tháng 10', 
                                'Tháng 11', 
                                'Tháng 12'
                            ]
                        },
                        yAxis: {
                            title: {
                                text: 'Triệu đồng'
                            },
                            plotLines: [
                                {
                                    value: 0,
                                    width: 1,
                                    color: '#808080'
                                }
                            ]
                        },
                        tooltip: {
                            valueSuffix: ' triệu đồng'
                        },
                        legend: {
                            layout: 'vertical',
                            align: 'right',
                            verticalAlign: 'middle',
                            borderWidth: 0
                        },
                        series: [
                            {
                                name: 'Năm 2015',
                                data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
                            }, 
                            {
                                name: 'Năm 2016',
                                data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
                            }
                        ]
                    });
                }
            };
            dashboardView.loadChart1();
            dashboardView.loadChart2();
            dashboardView.loadChart3();
        } else {
            dashboardView.loadChart1();
            dashboardView.loadChart2();
            dashboardView.loadChart3();
        }
    });
</script>