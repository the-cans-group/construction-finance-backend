@php
    use Carbon\Carbon;
    $projects = collect([
        (object) [
            'id' => 1,
            'name' => 'Site Construction',
            'client' => 'ABC İnşaat',
            'start_date' => Carbon::now()->subMonths(2),
            'end_date' => null,
            'status' => 'ongoing',
            'status_badge_class' => 'info',
            'budget' => 250000
        ],
        (object) [
            'id' => 2,
            'name' => 'Road Expansion',
            'client' => 'XYZ Holding',
            'start_date' => Carbon::now()->subMonths(6),
            'end_date' => Carbon::now()->subMonth(),
            'status' => 'completed',
            'status_badge_class' => 'success',
            'budget' => 500000
        ],
        (object) [
            'id' => 3,
            'name' => 'Bridge Repair',
            'client' => 'DEF Group',
            'start_date' => Carbon::now()->subMonths(1),
            'end_date' => null,
            'status' => 'pending',
            'status_badge_class' => 'warning',
            'budget' => 150000
        ],
    ]);
@endphp

@extends('layouts')

@section('title', 'Projects')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Projects</h4>
                    <div class="table-responsive">
                        <table id="projects-table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Client</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                                <th>Budget</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($projects as $project)
                                <tr>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->client }}</td>
                                    <td>{{ $project->start_date->format('d M Y') }}</td>
                                    <td>{{ $project->end_date ? $project->end_date->format('d M Y') : '-' }}</td>
                                    <td>
                      <span class="badge badge-{{ $project->status_badge_class }}">
                        {{ ucfirst($project->status) }}
                      </span>
                                    </td>
                                    <td>{{ number_format($project->budget, 0, ',', '.') }} TL</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                        <button class="btn btn-sm btn-danger" disabled>Delete</button>
                                    </td>
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
            $(document).ready(function() {
                $('#projects-table').DataTable({
                    responsive: true,
                    pageLength: 10,
                    lengthMenu: [10, 25, 50]
                });
            });
        </script>
    @endpush
@endsection

