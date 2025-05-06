{{-- resources/views/contractors/index.blade.php --}}
@php
    use Carbon\Carbon;

    // Sahte yükleniciler
    $contractors = collect([
        (object) [
            'id' => 1,
            'name' => 'Mehmet Yılmaz',
            'company' => 'Yılmaz İnşaat',
            'phone' => '+90 532 000 1234',
            'email' => 'mehmet.yilmaz@yilmazinsaat.com',
            'joined_at' => Carbon::now()->subYears(1),
            'status' => 'active',
            'status_badge_class' => 'success'
        ],
        (object) [
            'id' => 2,
            'name' => 'Ayşe Demir',
            'company' => 'Demir Mühendislik',
            'phone' => '+90 533 111 5678',
            'email' => 'ayse.demir@demirmuh.com',
            'joined_at' => Carbon::now()->subMonths(8),
            'status' => 'inactive',
            'status_badge_class' => 'secondary'
        ],
        (object) [
            'id' => 3,
            'name' => 'Ali Can',
            'company' => 'Can Yapı',
            'phone' => '+90 534 222 9101',
            'email' => 'ali.can@canyapi.com',
            'joined_at' => Carbon::now()->subMonths(3),
            'status' => 'active',
            'status_badge_class' => 'success'
        ],
    ]);
@endphp

@extends('layouts')

@section('title', 'Contractors')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Contractors</h4>
                    <div class="table-responsive">
                        <table id="contractors-table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Company</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Joined At</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contractors as $c)
                                <tr>
                                    <td>{{ $c->name }}</td>
                                    <td>{{ $c->company }}</td>
                                    <td>{{ $c->phone }}</td>
                                    <td>{{ $c->email }}</td>
                                    <td>{{ $c->joined_at->format('d M Y') }}</td>
                                    <td>
                      <span class="badge badge-{{ $c->status_badge_class }}">
                        {{ ucfirst($c->status) }}
                      </span>
                                    </td>
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
                $('#contractors-table').DataTable({
                    responsive: true,
                    pageLength: 10,
                    lengthMenu: [10, 25, 50]
                });
            });
        </script>
    @endpush
@endsection
