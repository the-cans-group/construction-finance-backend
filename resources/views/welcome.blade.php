{{-- resources/views/index.blade.php --}}
@php
    use Carbon\Carbon;

    // Sahte veriler
    $activeProjects = 12;
    $contractorsCount = 8;
    $materialsCost = 15000; // TL
    $pendingPayments = 5000; // TL

    $projectProgressData = [
        'labels' => ['Project A','Project B','Project C'],
        'datasets' => [[
            'label' => 'Completion %',
            'data' => [70,50,90],
            'backgroundColor' => ['rgba(54, 162, 235, 0.6)'],
        ]]
    ];

    $paymentScheduleData = [
        'labels' => ['Jan','Feb','Mar','Apr'],
        'datasets' => [[
            'label' => 'Paid',
            'data' => [4000,6000,5500,7000],
            'borderWidth' => 2,
            'fill' => false
        ],[
            'label' => 'Pending',
            'data' => [2000,1500,1800,1200],
            'borderWidth' => 2,
            'fill' => false
        ]]
    ];

    $recentProjects = collect([
        (object) [
            'name' => 'Site Construction',
            'client' => 'ABC Inşaat',
            'status' => 'ongoing',
            'status_badge_class' => 'info',
            'start_date' => Carbon::now()->subDays(60),
            'end_date' => null
        ],
        (object) [
            'name' => 'Road Expansion',
            'client' => 'XYZ Holding',
            'status' => 'completed',
            'status_badge_class' => 'success',
            'start_date' => Carbon::now()->subMonths(5),
            'end_date' => Carbon::now()->subMonth()
        ],
    ]);
@endphp

@extends('layouts')

@section('content')
    <!-- KPI Cards -->
    <div class="row">
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card card-tale">
                <div class="card-body">
                    <p class="card-title text-white">Active Projects</p>
                    <h3 class="text-white">{{ $activeProjects }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card card-dark-blue">
                <div class="card-body">
                    <p class="card-title text-white">Total Contractors</p>
                    <h3 class="text-white">{{ $contractorsCount }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card card-light-blue">
                <div class="card-body">
                    <p class="card-title text-white">Materials Cost (This Month)</p>
                    <h3 class="text-white">{{ number_format($materialsCost, 0, ',', '.') }} TL</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card card-light-danger">
                <div class="card-body">
                    <p class="card-title text-white">Pending Payments</p>
                    <h3 class="text-white">{{ number_format($pendingPayments, 0, ',', '.') }} TL</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Project Progress</p>
                    <div style="position: relative; width: 100%; height: 300px;">
                        <canvas id="projectProgressChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Payment Schedule</p>
                    <div style="position: relative; width: 100%; height: 300px;">
                        <canvas id="paymentScheduleChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Projects Table -->
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Recent Projects</p>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Project Name</th>
                                <th>Client</th>
                                <th>Status</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($recentProjects as $project)
                                <tr>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->client }}</td>
                                    <td><span class="badge badge-{{ $project->status_badge_class }}">{{ ucfirst($project->status) }}</span></td>
                                    <td>{{ $project->start_date->format('d M Y') }}</td>
                                    <td>{{ $project->end_date ? $project->end_date->format('d M Y') : '-' }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // Chart.js defaults
            Chart.defaults.scale.ticks.beginAtZero = true;

            // Project Progress Chart
            const projCtx = document.getElementById('projectProgressChart').getContext('2d');
            new Chart(projCtx, {
                type: 'bar',
                data: @json($projectProgressData),
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });

            // Payment Schedule Chart
            const payCtx = document.getElementById('paymentScheduleChart').getContext('2d');
            new Chart(payCtx, {
                type: 'line',
                data: @json($paymentScheduleData),
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });
        </script>
    @endpush
@endsection
