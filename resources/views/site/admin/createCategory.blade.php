@extends('site.layouts.admin')
@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-xl-6">
            <div class="row">
                <!-- HTML5 Inputs -->
                <form action="/dashboard/storeCategory" method="POST">
                    @csrf
                    <div class="card mb-4">
                        <h5 class="card-header">HTML5 Inputs</h5>

                        <div class="card-body">
                            <div class="mb-3 row">
                                <label for="html5-text-input" class="col-md-2 col-form-label">Text</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" value="Sneat" id="html5-text-input" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="html5-search-input" class="col-md-2 col-form-label">Search</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="search" value="Search ..." id="html5-search-input" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="html5-email-input" class="col-md-2 col-form-label">Email</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="email" value="john@example.com" id="html5-email-input" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="html5-url-input" class="col-md-2 col-form-label">URL</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="url" value="https://themeselection.com" id="html5-url-input" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="html5-tel-input" class="col-md-2 col-form-label">Phone</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="tel" value="90-(164)-188-556" id="html5-tel-input" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="html5-password-input" class="col-md-2 col-form-label">Password</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="password" value="password" id="html5-password-input" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="html5-number-input" class="col-md-2 col-form-label">Number</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="number" value="18" id="html5-number-input" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="html5-datetime-local-input" class="col-md-2 col-form-label">Datetime</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="datetime-local" value="2021-06-18T12:30:00" id="html5-datetime-local-input" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="html5-date-input" class="col-md-2 col-form-label">Date</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="date" value="2021-06-18" id="html5-date-input" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="html5-month-input" class="col-md-2 col-form-label">Month</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="month" value="2021-06" id="html5-month-input" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="html5-week-input" class="col-md-2 col-form-label">Week</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="week" value="2021-W25" id="html5-week-input" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="html5-time-input" class="col-md-2 col-form-label">Time</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="time" value="12:30:00" id="html5-time-input" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="html5-color-input" class="col-md-2 col-form-label">Color</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="color" value="#666EE8" id="html5-color-input" />
                                </div>
                            </div>
                            <div class="row">
                                <label for="html5-range" class="col-md-2 col-form-label">Range</label>
                                <div class="col-md-10">
                                    <input type="range" class="form-range mt-3" id="html5-range" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop