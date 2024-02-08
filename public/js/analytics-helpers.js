var analyticsAuChart = null;

function analyticsAu(selector, set_data) {
    var $selector = selector ? $(selector) : $('.analytics-au-chart');
    $selector.each(function () {
        var $self = $(this),
            _self_id = $self.attr('id'),
            _get_data = typeof set_data === 'undefined' ? eval(_self_id) : set_data;

        var selectCanvas = document.getElementById(_self_id).getContext("2d");
        var chart_data = [];

        for (var i = 0; i < _get_data.datasets.length; i++) {
            chart_data.push({
                label: _get_data.datasets[i].label,
                tension: _get_data.lineTension,
                backgroundColor: _get_data.datasets[i].background,
                borderWidth: 2,
                borderColor: _get_data.datasets[i].color,
                data: _get_data.datasets[i].data,
                barPercentage: .7,
                categoryPercentage: .7
            });
        }

        if (analyticsAuChart) {
            analyticsAuChart.destroy();
        }

        analyticsAuChart = new Chart(selectCanvas, {
            type: 'bar',
            data: {
                labels: _get_data.labels,
                datasets: chart_data
            },
            options: {
                legend: {
                    display: _get_data.legend ? _get_data.legend : false,
                    labels: {
                        boxWidth: 12,
                        padding: 20,
                        fontColor: '#6783b8'
                    }
                },
                maintainAspectRatio: false,
                tooltips: {
                    enabled: true,
                    rtl: NioApp.State.isRTL,
                    callbacks: {
                        title: function title(tooltipItem, data) {
                            return data['labels'][tooltipItem[0]['index']];
                        },
                        label: function label(tooltipItem, data) {
                            return data.datasets[tooltipItem.datasetIndex]['data'][tooltipItem['index']];
                        }
                    },
                    backgroundColor: '#eff6ff',
                    titleFontSize: 13,
                    titleFontColor: '#6783b8',
                    titleMarginBottom: 6,
                    bodyFontColor: '#9eaecf',
                    bodyFontSize: 12,
                    bodySpacing: 4,
                    yPadding: 6,
                    xPadding: 6,
                    footerMarginTop: 0,
                    displayColors: false
                },
                scales: {
                    yAxes: [{
                        display: true,
                        position: NioApp.State.isRTL ? "right" : "left",
                        ticks: {
                            beginAtZero: true,
                            fontSize: 12,
                            fontColor: '#9eaecf',
                            padding: 0,
                            display: true,
                            stepSize: 2500
                        },
                        gridLines: {
                            color: NioApp.hexRGB("#526484", .2),
                            tickMarkLength: 0,
                            zeroLineColor: NioApp.hexRGB("#526484", .2)
                        }
                    }],
                    xAxes: [{
                        display: false,
                        ticks: {
                            fontSize: 12,
                            fontColor: '#9eaecf',
                            source: 'auto',
                            padding: 0,
                            reverse: NioApp.State.isRTL
                        },
                        gridLines: {
                            color: "transparent",
                            tickMarkLength: 0,
                            zeroLineColor: 'transparent',
                            offsetGridLines: true
                        }
                    }]
                }
            }
        });

        $($self.siblings('.spinner')[0]).removeClass('d-flex').addClass('d-none').hide();
    });
}

var analyticsDoughnutChart = null;

function analyticsDoughnut(selector, set_data) {
    var $selector = selector ? $(selector) : $('.analytics-doughnut');
    $selector.each(function () {
        var $self = $(this),
            _self_id = $self.attr('id'),
            _get_data = typeof set_data === 'undefined' ? eval(_self_id) : set_data;

        var selectCanvas = document.getElementById(_self_id).getContext("2d");
        var chart_data = [];

        for (var i = 0; i < _get_data.datasets.length; i++) {
            chart_data.push({
                backgroundColor: _get_data.datasets[i].background,
                borderWidth: 2,
                borderColor: _get_data.datasets[i].borderColor,
                hoverBorderColor: _get_data.datasets[i].borderColor,
                data: _get_data.datasets[i].data
            });
        }

        if (analyticsDoughnutChart) {
            analyticsDoughnutChart.destroy();
        }

        analyticsDoughnutChart = new Chart(selectCanvas, {
            type: 'doughnut',
            data: {
                labels: _get_data.labels,
                datasets: chart_data
            },
            options: {
                legend: {
                    display: _get_data.legend ? _get_data.legend : false,
                    labels: {
                        boxWidth: 12,
                        padding: 20,
                        fontColor: '#6783b8'
                    }
                },
                rotation: -1.5,
                cutoutPercentage: 70,
                maintainAspectRatio: false,
                tooltips: {
                    enabled: true,
                    rtl: NioApp.State.isRTL,
                    callbacks: {
                        title: function title(tooltipItem, data) {
                            return data['labels'][tooltipItem[0]['index']];
                        },
                        label: function label(tooltipItem, data) {
                            return data.datasets[tooltipItem.datasetIndex]['data'][tooltipItem['index']] + ' ' + _get_data.dataUnit;
                        }
                    },
                    backgroundColor: '#fff',
                    borderColor: '#eff6ff',
                    borderWidth: 2,
                    titleFontSize: 13,
                    titleFontColor: '#6783b8',
                    titleMarginBottom: 6,
                    bodyFontColor: '#9eaecf',
                    bodyFontSize: 12,
                    bodySpacing: 4,
                    yPadding: 10,
                    xPadding: 10,
                    footerMarginTop: 0,
                    displayColors: false
                }
            }
        });

        $($self.siblings('.spinner')[0]).removeClass('d-flex').addClass('d-none').hide();
    });
}

var analyticsLineLargeChart = null;

function analyticsLineLarge(selector, set_data) {
    var $selector = selector ? $(selector) : $('.analytics-line-large');
    $selector.each(function () {
        var $self = $(this),
            _self_id = $self.attr('id'),
            _get_data = typeof set_data === 'undefined' ? eval(_self_id) : set_data;

        var selectCanvas = document.getElementById(_self_id).getContext("2d");
        var chart_data = [];

        for (var i = 0; i < _get_data.datasets.length; i++) {
            chart_data.push({
                label: _get_data.datasets[i].label,
                tension: _get_data.lineTension,
                backgroundColor: _get_data.datasets[i].background,
                borderWidth: 2,
                borderDash: _get_data.datasets[i].dash,
                borderColor: _get_data.datasets[i].color,
                pointBorderColor: 'transparent',
                pointBackgroundColor: 'transparent',
                pointHoverBackgroundColor: "#fff",
                pointHoverBorderColor: _get_data.datasets[i].color,
                pointBorderWidth: 2,
                pointHoverRadius: 4,
                pointHoverBorderWidth: 2,
                pointRadius: 4,
                pointHitRadius: 4,
                data: _get_data.datasets[i].data,
                type: _get_data.datasets[i].type
            });
        }

        if (analyticsLineLargeChart) {
            analyticsLineLargeChart.destroy();
        }

        analyticsLineLargeChart = new Chart(selectCanvas, {
            type: 'line',
            data: {
                labels: _get_data.labels,
                datasets: chart_data
            },
            options: {
                legend: {
                    display: _get_data.legend ? _get_data.legend : false,
                    labels: {
                        boxWidth: 12,
                        padding: 20,
                        fontColor: '#6783b8'
                    }
                },
                maintainAspectRatio: false,
                tooltips: {
                    enabled: true,
                    rtl: NioApp.State.isRTL,
                    callbacks: {
                        title: function title(tooltipItem, data) {
                            return data['labels'][tooltipItem[0]['index']];
                        },
                        label: function label(tooltipItem, data) {
                            return data.datasets[tooltipItem.datasetIndex]['data'][tooltipItem['index']];
                        }
                    },
                    backgroundColor: '#fff',
                    borderColor: '#eff6ff',
                    borderWidth: 2,
                    titleFontSize: 13,
                    titleFontColor: '#6783b8',
                    titleMarginBottom: 6,
                    bodyFontColor: '#9eaecf',
                    bodyFontSize: 12,
                    bodySpacing: 4,
                    yPadding: 10,
                    xPadding: 10,
                    footerMarginTop: 0,
                    displayColors: false
                },
                scales: {
                    yAxes: [{
                        display: true,
                        position: NioApp.State.isRTL ? "right" : "left",
                        ticks: {
                            beginAtZero: true,
                            fontSize: 12,
                            fontColor: '#9eaecf',
                            padding: 8,
                            stepSize: 10
                        },
                        gridLines: {
                            color: NioApp.hexRGB("#526484", .2),
                            tickMarkLength: 0,
                            zeroLineColor: NioApp.hexRGB("#526484", .2)
                        }
                    }],
                    xAxes: [{
                        display: false,
                        ticks: {
                            fontSize: 12,
                            fontColor: '#9eaecf',
                            source: 'auto',
                            padding: 0,
                            reverse: NioApp.State.isRTL
                        },
                        gridLines: {
                            color: "transparent",
                            tickMarkLength: 0,
                            zeroLineColor: 'transparent',
                            offsetGridLines: true
                        }
                    }]
                }
            }
        });

        $($self.siblings('.spinner')[0]).removeClass('d-flex').addClass('d-none').hide();
    });
}

function renderChart(url, chart, selector, data = []) {
    let canvas = $(selector);

    canvas.hide();

    $(canvas.siblings('.spinner')[0]).removeClass('d-none').addClass('d-flex').hide();

    axios({
        method: 'post',
        url: url,
        data: data,
    }).then((response) => {
        let countriesListContainer = $(selector).closest('.traffic-channel').find('.traffic-channel-group');

        if (countriesListContainer.length > 0) {
            countriesListContainer.html('');

            if (typeof response.data.labels !== 'undefined') {
                for (i = 0; i < response.data.labels.length ; i++) {
                    countriesListContainer.append(
                        `<div class="traffic-channel-data">
                            <div class="title">
                                <span class="dot dot-lg sq" style="background: ${response.data.datasets[0].background[i]};"></span>
                                <span>${response.data.labels[i]}</span>
                            </div>
                            <div class="amount">${response.data.datasets[0].data[i]}</div>
                        </div>`
                    );
                }
            }
        }

        canvas.show();
        window[chart](selector, response.data);
    }).catch((error) => {
        if (typeof error.response !== 'undefined') {
            toastMessage(error.response.data.message);
        } else {
            toastMessage(error.message);
        }
    });
}
