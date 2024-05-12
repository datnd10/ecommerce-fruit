<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <?php include '../../partials/navbarAdmin.php' ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php include '../../partials/sideBar.php' ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card bg-gradient-danger card-img-holder text-white">
                                <div class="card-body">
                                    <img src="../../assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                    <h4 class="font-weight-normal mb-3">Tổng Doanh Thu <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                                    </h4>
                                    <h2 class="mb-5 revenue">$ 15,0000</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card bg-gradient-info card-img-holder text-white">
                                <div class="card-body">
                                    <img src="../../assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                    <h4 class="font-weight-normal mb-3">Tổng Đơn Hàng <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                                    </h4>
                                    <h2 class="mb-5 total_order">45,6334</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card bg-gradient-success card-img-holder text-white">
                                <div class="card-body">
                                    <img src="../../assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                    <h4 class="font-weight-normal mb-3">Tổng Số Khách Hàng<i class="mdi mdi-diamond mdi-24px float-right"></i>
                                    </h4>
                                    <h2 class="mb-5 total_user">95,5741</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="clearfix d-flex justify-content-between align-items-top">
                                        <div>
                                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="mySelect">
                                                <option value="day">Doanh Thu Theo Ngày</option>
                                                <option value="month">Doanh Thu Theo Tháng</option>
                                                <option value="year" selected>Doanh Thu Theo Năm</option>
                                            </select>
                                        </div>
                                        <div class="form-group d-flex gap-5 justify-content-between align-items-center d-none filterDay">
                                            <input type="date" class="form-control" id="startDate" name="trip-start" style="height: 20px;"/>
                                            <input type="date" class="form-control" id="endDate" name="trip-start" style="height: 20px;" />
                                        </div>
                                        <div>
                                            <button class="btn btn-primary searchBtn">Tìm Kiếm</button>
                                        </div>
                                    </div>
                                    <div id="spanChart">
                                        <canvas id="barChart" class="mt-4"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Trạng thái đơn hàng</h4>
                                    <div id="trafficChart">
                                        <canvas id="traffic-chart"></canvas>
                                    </div>
                                    <div id="traffic-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../../assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../assets/js/dashboard.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- End custom js for this page -->

    <script>
        function formatVietnameseCurrency(amount) {
            try {
                // Đảm bảo amount là một số
                amount = parseFloat(amount);

                // Sử dụng hàm toLocaleString để định dạng số và thêm dấu phẩy
                formattedAmount = amount.toLocaleString('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                });

                return formattedAmount;
            } catch (error) {
                return "Số tiền không hợp lệ";
            }
        }

        function init(action) {
            $.ajax({
                url: 'http://localhost:3000/database/controller/dashBoardController.php',
                type: 'GET',
                data : {
                    startDate: $('#startDate').val(),
                    endDate: $('#endDate').val()
                },
                success: (response) => {
                    let data = JSON.parse(response)
                    console.log(data);
                    $('.revenue').html(formatVietnameseCurrency(data.revenue))
                    $('.total_order').html(data.total_order)
                    $('.total_user').html(data.total_user)

                    const labelYear = ["2024", "2025", "2026", "2027", "2028", "2029", "2030"];
                    const labelMonth = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

                    const startDate = $('#startDate').val();
                    const endDate = $('#endDate').val();
                    let label;
                    let dataMoney;

                    if (action === 'day') {
                        label = data.totalOfDay.map(item => item.order_date);
                        dataMoney = data.totalOfDay.map(item => item.total_revenue);
                    }

                    if (action === 'month') {
                        label = data.totalOfMonth.map(item => item.order_month);
                        dataMoney = data.totalOfMonth.map(item => item.total_revenue);
                    }

                    if (action === 'year') {
                        label = data.totalOfYear.map(item => item.order_year);
                        dataMoney = data.totalOfYear.map(item => item.total_revenue);
                    }


                    const backgroundColor = 'rgba(54, 162, 235, 0.2)';
                    const borderColor = 'rgb(54, 162, 235)';
                    const dataChart = {
                        labels: label,
                        datasets: [{
                            label: 'Doanh Thu',
                            data: dataMoney,
                            backgroundColor: backgroundColor,
                            borderColor: borderColor,
                            borderWidth: 1
                        }]
                    };
                    var optionsChart = {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        },
                        legend: {
                            display: false
                        },
                        elements: {
                            point: {
                                radius: 0
                            }
                        }
                    };

                    $('#spanChart').empty();
                    $('#spanChart').append('<canvas id="barChart" class="mt-4"></canvas>');
                    if ($("#barChart").length) {
                        var barChartCanvas = $("#barChart").get(0).getContext("2d");
                        // This will get the first returned node in the jQuery collection.
                        var barChart = new Chart(barChartCanvas, {
                            type: 'bar',
                            data: dataChart,
                            options: optionsChart
                        });
                    }
                    $("#barChart").html(barChart.generateLegend());


                    $('#trafficChart').empty();
                    $('#trafficChart').append('<canvas id="traffic-chart"></canvas>');

                    if ($("#traffic-chart").length) {
                        var ctx = document.getElementById('traffic-chart').getContext("2d");
                        var gradientStrokeBlue = ctx.createLinearGradient(0, 0, 0, 181);
                        gradientStrokeBlue.addColorStop(0, 'rgba(54, 215, 232, 1)');
                        gradientStrokeBlue.addColorStop(1, 'rgba(177, 148, 250, 1)');
                        var gradientLegendBlue = 'linear-gradient(to right, rgba(54, 215, 232, 1), rgba(177, 148, 250, 1))';

                        var gradientStrokeRed = ctx.createLinearGradient(0, 0, 0, 50);
                        gradientStrokeRed.addColorStop(0, 'rgba(255, 191, 150, 1)');
                        gradientStrokeRed.addColorStop(1, 'rgba(254, 112, 150, 1)');
                        var gradientLegendRed = 'linear-gradient(to right, rgba(255, 191, 150, 1), rgba(254, 112, 150, 1))';

                        var gradientStrokeGreen = ctx.createLinearGradient(0, 0, 0, 300);
                        gradientStrokeGreen.addColorStop(0, 'rgba(6, 185, 157, 1)');
                        gradientStrokeGreen.addColorStop(1, 'rgba(132, 217, 210, 1)');
                        var gradientLegendGreen = 'linear-gradient(to right, rgba(6, 185, 157, 1), rgba(132, 217, 210, 1))';


                        var gradientStrokeViolet = ctx.createLinearGradient(0, 0, 0, 181);
                        gradientStrokeViolet.addColorStop(0, 'rgba(218, 140, 255, 1)');
                        gradientStrokeViolet.addColorStop(1, 'rgba(154, 85, 255, 1)');
                        var gradientLegendViolet = 'linear-gradient(to right, rgba(218, 140, 255, 1), rgba(154, 85, 255, 1))';

                        var gradientStrokeTemp = ctx.createLinearGradient(0, 0, 0, 181);
                        gradientStrokeTemp.addColorStop(0, 'rgba(54, 215, 232, 1)'); // Màu xanh lá cây
                        gradientStrokeTemp.addColorStop(1, 'rgba(255, 165, 0, 1)'); // Màu cam
                        var gradientLegendTemp = 'linear-gradient(to right, rgba(54, 215, 232, 1), rgba(255, 165, 0, 1))';

                        var trafficChartData = {
                            datasets: [{
                                data: data.total_report.map(item => item.report),
                                backgroundColor: [
                                    gradientStrokeBlue,
                                    gradientStrokeGreen,
                                    gradientStrokeRed,
                                    gradientStrokeViolet,
                                    gradientStrokeTemp
                                ],
                                hoverBackgroundColor: [
                                    gradientStrokeBlue,
                                    gradientStrokeGreen,
                                    gradientStrokeRed,
                                    gradientStrokeViolet,
                                    gradientStrokeTemp
                                ],
                                borderColor: [
                                    gradientStrokeBlue,
                                    gradientStrokeGreen,
                                    gradientStrokeRed,
                                    gradientStrokeViolet,
                                    gradientStrokeTemp
                                ],
                                legendColor: [
                                    gradientLegendBlue,
                                    gradientLegendGreen,
                                    gradientLegendRed,
                                    gradientLegendViolet,
                                    gradientLegendTemp
                                ]
                            }],

                            // These labels appear in the legend and in the tooltips when hovering different arcs
                            labels: data.total_report.map(item => {
                                if (item.status == 'pending') {
                                    return 'Đang duyệt'
                                }
                                if (item.status == 'approved') {
                                    return 'Xác nhận'
                                }
                                if (item.status == 'shipping') {
                                    return 'Đang vận chuyển'
                                }
                                if (item.status == 'received') {
                                    return 'Nhận hàng'
                                }
                                if (item.status == 'canceled') {
                                    return 'Đã hủy'
                                }
                            })
                        };
                        var trafficChartOptions = {
                            responsive: true,
                            animation: {
                                animateScale: true,
                                animateRotate: true
                            },
                            legend: false,
                            legendCallback: function(chart) {
                                var text = [];
                                text.push('<ul>');
                                for (var i = 0; i < trafficChartData.datasets[0].data.length; i++) {
                                    text.push('<li><span class="legend-dots" style="background:' +
                                        trafficChartData.datasets[0].legendColor[i] +
                                        '"></span>');
                                    if (trafficChartData.labels[i]) {
                                        text.push(trafficChartData.labels[i]);
                                    }
                                    text.push('</li>');
                                }
                                text.push('</ul>');
                                return text.join('');
                            }
                        };
                        var trafficChartCanvas = $("#traffic-chart").get(0).getContext("2d");
                        var trafficChart = new Chart(trafficChartCanvas, {
                            type: 'doughnut',
                            data: trafficChartData,
                            options: trafficChartOptions
                        });
                        $("#traffic-chart-legend").html(trafficChart.generateLegend());
                    }
                }
            })
        }
        init($('#mySelect').val());

        $(document).ready(function() {
            $('#mySelect').change(function() {
                var selectedValue = $(this).val();
                if (selectedValue === 'day') {
                    $('.filterDay').removeClass('d-none');
                } else {
                    $('.filterDay').addClass('d-none');
                }
            });
        });
        $('.searchBtn').click(function() {
            init($('#mySelect').val());
        })
    </script>
</body>

</html>