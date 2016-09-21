<div class="row">
    <div class="col-md-6">
        <div id="chart1"></div>
    </div>
    <div class="col-md-6">
        <div id="chart2"></div>
    </div>
</div>
<div class="row">
    <div id="chart3"></div>
</div>

<script>
    $(function(){
        if(typeof dashboardView === 'undefined') {
            dashboardView = {
                loadChart1: function(){
                    $('#chart1').highcharts({

                        chart: {
                            type: 'column'
                        },

                        title: {
                            text: 'Biểu đồ thống kê lượt vận chuyển theo tháng'
                        },

                        xAxis: {
                            categories: ['Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas']
                        },

                        yAxis: {
                            allowDecimals: false,
                            min: 0,
                            title: {
                                text: 'Số lượt trên tháng'
                            }
                        },

                        tooltip: {
                            formatter: function () {
                                return '<b>' + this.x + '</b><br/>' +
                                        this.series.name + ': ' + this.y + '<br/>' +
                                        'Total: ' + this.point.stackTotal;
                            }
                        },

                        plotOptions: {
                            column: {
                                stacking: 'normal'
                            }
                        },

                        series: [{
                            name: 'John',
                            data: [5, 3, 4, 7, 2],
                            stack: 'male'
                        }, {
                            name: 'Joe',
                            data: [3, 4, 4, 2, 5],
                            stack: 'male'
                        }, {
                            name: 'Jane',
                            data: [2, 5, 6, 2, 1],
                            stack: 'female'
                        }, {
                            name: 'Janet',
                            data: [3, 0, 4, 4, 3],
                            stack: 'female'
                        }]
                    });
                },
                loadChart2: function(){
                    $('#chart2').highcharts({
                        chart: {
                            type: 'area'
                        },
                        title: {
                            text: 'Biểu đồ thống kê chi phí theo tháng'
                        },
                        xAxis: {
                            categories: ['1750', '1800', '1850', '1900', '1950', '1999', '2050'],
                            tickmarkPlacement: 'on',
                            title: {
                                enabled: false
                            }
                        },
                        yAxis: {
                            title: {
                                text: 'Triệu đồng'
                            },
                            labels: {
                                formatter: function () {
                                    return this.value / 1000;
                                }
                            }
                        },
                        tooltip: {
                            shared: true,
                            valueSuffix: ' millions'
                        },
                        plotOptions: {
                            area: {
                                stacking: 'normal',
                                lineColor: '#666666',
                                lineWidth: 1,
                                marker: {
                                    lineWidth: 1,
                                    lineColor: '#666666'
                                }
                            }
                        },
                        series: [{
                            name: 'Asia',
                            data: [502, 635, 809, 947, 1402, 3634, 5268]
                        }, {
                            name: 'Africa',
                            data: [106, 107, 111, 133, 221, 767, 1766]
                        }, {
                            name: 'Europe',
                            data: [163, 203, 276, 408, 547, 729, 628]
                        }, {
                            name: 'America',
                            data: [18, 31, 54, 156, 339, 818, 1201]
                        }, {
                            name: 'Oceania',
                            data: [2, 2, 2, 6, 13, 30, 46]
                        }]
                    });
                },
                loadChart3: function(){
                    $('#chart3').highcharts({
                        title: {
                            text: 'Thống kê / So sánh lợi nhuận qua các năm',
                            x: -20 //center
                        },
                        xAxis: {
                            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                        },
                        yAxis: {
                            title: {
                                text: 'Triệu đồng'
                            },
                            plotLines: [{
                                value: 0,
                                width: 1,
                                color: '#808080'
                            }]
                        },
                        tooltip: {
                            valueSuffix: '°C'
                        },
                        legend: {
                            layout: 'vertical',
                            align: 'right',
                            verticalAlign: 'middle',
                            borderWidth: 0
                        },
                        series: [{
                            name: 'Tokyo',
                            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
                        }, {
                            name: 'New York',
                            data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
                        }, {
                            name: 'Berlin',
                            data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
                        }, {
                            name: 'London',
                            data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
                        }]
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