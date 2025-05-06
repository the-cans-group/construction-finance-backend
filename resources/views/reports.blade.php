@php
    use Carbon\Carbon;

    $monthlyExpensesData = [
        'labels' => ['Jan','Feb','Mar','Apr','May'],
        'datasets' => [[
            'label' => 'Materials Cost',
            'data' => [12000, 15000, 13000, 17000, 16000],
            'borderWidth' => 2,
            'fill' => false
        ],[
            'label' => 'Labor Cost',
            'data' => [8000, 9000, 8500, 9500, 9200],
            'borderWidth' => 2,
            'fill' => false
        ]]
    ];

    $topProjects = collect([
        (object)[ 'name' => 'Site Construction', 'cost' => 250000, 'status' => 'ongoing' ],
        (object)[ 'name' => 'Road Expansion', 'cost' => 500000, 'status' => 'completed' ],
        (object)[ 'name' => 'Bridge Repair', 'cost' => 150000, 'status' => 'pending' ],
    ]);
@endphp

@extends('layouts')

@section('title', 'Reports')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Monthly Expenses</h4>
                    <div style="position: relative; height:300px;">
                        <canvas id="monthlyExpensesChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Top Projects by Cost</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Project Name</th>
                                <th>Cost</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($topProjects as $p)
                                <tr>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ number_format($p->cost,0,',','.') }} TL</td>
                                    <td><span class="badge badge-{{ $p->status=='completed'?'success':($p->status=='ongoing'?'info':'warning') }}">{{ ucfirst($p->status) }}</span></td>
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
            Chart.defaults.scale.ticks.beginAtZero = true;

            const ctx = document.getElementById('monthlyExpensesChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: @json($monthlyExpensesData),
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
