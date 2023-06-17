@extends('site.layouts.admin')
@section('content')
<div class="content-wrapper">
    <!-- Responsive Table -->
    <div class="card">
        <h5 class="card-header">Responsive Table</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr class="text-nowrap">
                        <th>Event Id</th>
                        <th>Event Name</th>
                        <th>Event Description</th>
                        <th>Event Icon</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                    <tr>
                        <th scope="row">{{$event->id}}</th>
                        <td>{{$event->name}}</td>
                        <td>{{$event->description}}</td>
                        <td><img src="{{asset('uploads/Event/images/'.$event->image)}}" alt="Avatar" class="rounded-circle" /></td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                                    <a class="dropdown-item" href="/dashboard/deleteEvent/{{$event->id}}"><i class="bx bx-trash me-2"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Responsive Table -->
</div>
<!-- / Content -->
<div class="content-backdrop fade"></div>
</div>
@stop