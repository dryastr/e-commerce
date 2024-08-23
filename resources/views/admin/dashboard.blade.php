@extends('layouts.main')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="row">

        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Testimonial</h5>
                    <p class="card-text display-4">{{ $totalTestimonials }}</p>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total 5-Star Testimonial</h5>
                    <p class="card-text display-4">{{ $totalFiveStarTestimonials }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Testimoni per Hari</h5>
                    <div id="testimonialsChart" style="min-height: 314px;"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var options = {
                chart: {
                    type: 'line',
                    height: 300,
                    zoom: {
                        enabled: false
                    },
                    toolbar: {
                        show: true
                    }
                },
                stroke: {
                    curve: 'smooth',
                    width: 2
                },
                series: [{
                    name: 'Testimoni per Hari',
                    data: @json($counts)
                }],
                xaxis: {
                    categories: @json($dates),
                    title: {
                        text: 'Date'
                    },
                    labels: {
                        style: {
                            colors: '#9aa0ac',
                            fontSize: '12px'
                        }
                    }
                },
                yaxis: {
                    title: {
                        text: 'Number of Testimonials'
                    },
                    labels: {
                        style: {
                            colors: '#9aa0ac',
                            fontSize: '12px'
                        }
                    }
                },
                tooltip: {
                    shared: true,
                    intersect: false
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'left'
                },
                colors: ['#008ffb'],
                grid: {
                    borderColor: '#e7e7e7',
                    strokeDashArray: 4
                }
            };

            var chart = new ApexCharts(document.querySelector("#testimonialsChart"), options);
            chart.render();
        });
    </script>
@endpush
