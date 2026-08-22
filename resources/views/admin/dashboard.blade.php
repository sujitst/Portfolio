@extends('admin.layouts.master')

@section('admin_content')
    <div class="app-main__outer">
        <div class="app-main__inner">

            <!--=====|| START:- PAGE TITE ||=====-->
            <div class="page_title_heading">
                @if(!empty($siteseting->logo))
                    <img src="{{ asset('upload/site-setting/'.$siteseting->logo) }}" alt="Logo">
                @else
                    <img src="{{ asset('assets/images/jpg/no-photo.jpg') }}" alt="Logo">
                @endif
                <div class="page_title_text">
                    <h3>{{ $siteseting->title ?? '' }}</h3>
                    <p>{{ $siteseting->sub_title ?? '' }}</p>
                </div>
            </div>
            <!--=====|| END:- PAGE TITE ||=====-->

            <!--=====|| START:- DASHBOARD CARDS ||=====-->
            <div class="row">
                <div class="col-6 col-md-6 col-lg-3 col-xl-3">
                    <div class="dashboard_card">
                        <div>
                            <h3>{{ __('common.total_projects') }}</h3>
                            <p>{{ __('common.total_completed_projects') }}</p>
                        </div>
                        <div>
                            <h1>{{ $totalProject }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-lg-3 col-xl-3">
                    <div class="dashboard_card">
                        <div>
                            <h3>{{ __('common.total_services') }}</h3>
                            <p>{{ __('common.total_services_completed') }}</p>
                        </div>
                        <div>
                            <h1>{{ $totalService }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-lg-3 col-xl-3">
                    <div class="dashboard_card">
                        <div>
                            <h3>{{ __('common.total_skills') }}</h3>
                            <p>{{ __('common.overview_abilities') }}</p>
                        </div>
                        <div>
                            <h1>{{ $totalTotal }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-lg-3 col-xl-3">
                    <div class="dashboard_card">
                        <div>
                            <h3>{{ __('common.total_testimonials') }}</h3>
                            <p>{{ __('common.clients_say') }}</p>
                        </div>
                        <div>
                            <h1>{{ $totalTestimonial }}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!--=====|| END:- DASHBOARD CARDS ||=====-->


            <!-- Charts -->
            <div class="row">
                <!-- Line Chart -->
                <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                    <div class="cart_cart">
                        <h5>{{ __('common.projects_trend') }}</h5>
                        <canvas id="dashboardChart"></canvas>
                    </div>
                </div>

                <!-- Pie Chart -->
                <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                    <div class="cart_cart">
                        <h5>{{ __('common.top_5_testimonials') }}</h5>
                        <canvas id="ordersPieChart"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection



@section('script')
    <script>
        //=====|| LINE CHART (Projects per month)
        const ctxLine = document.getElementById('dashboardChart').getContext('2d');
        const gradientLine = ctxLine.createLinearGradient(0, 0, 0, 200);
        gradientLine.addColorStop(0, 'rgba(23, 198, 170, 0.4)');
        gradientLine.addColorStop(1, 'rgba(23, 198, 170, 0)');

        const dashboardChart = new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: @json($months),
                datasets: [{
                    label: 'Projects Completed',
                    data: @json($projectsPerMonth),
                    borderColor: '#17c6aa',
                    backgroundColor: gradientLine,
                    borderWidth: 3,
                    tension: 0.4,
                    pointStyle: 'rectRot',
                    pointRadius: 7,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#17c6aa',
                    pointBorderWidth: 2,
                    pointHoverRadius: 10,
                    pointHoverBackgroundColor: '#17c6aa',
                    pointHoverBorderColor: '#000'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: true, labels: { color: '#495057', font: { size: 14, weight: '500' } } },
                    tooltip: { mode: 'index', intersect: false, backgroundColor: '#343a40', titleColor: '#fff', bodyColor: '#fff', cornerRadius: 6 }
                },
                scales: {
                    x: { grid: { display: false }, ticks: { color: '#495057', font: { size: 12 } } },
                    y: { beginAtZero: true, grid: { color: 'rgba(0,0,0,0.05)', borderDash: [5,5] }, ticks: { color: '#495057', font: { size: 12 } } }
                }
            }
        });

        //=====|| PIE CHART (Top Testimonials)
        const ctxPie = document.getElementById('ordersPieChart').getContext('2d');
        const ordersPieChart = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: @json($topCustomers),
                datasets: [{
                    label: 'Customer Ratings',
                    data: @json($topCustomersData),
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'],
                    borderColor: '#fff',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'right', labels: { color: '#495057', font: { size: 13 } } },
                    tooltip: { backgroundColor: '#343a40', titleColor: '#fff', bodyColor: '#fff', cornerRadius: 6 }
                }
            }
        });
    </script>
@endsection