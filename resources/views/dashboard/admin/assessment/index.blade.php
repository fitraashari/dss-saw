@extends('dashboard.master')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Assessment</h1>
    <a href="{{route('assessment.export')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> SAW Rank</a>
  </div>
    <div class="row justify-content-center">
        <div class="col-lg-12">
              <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home">Assessment</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu1">Assessment Weight</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu2">Result</a>
                </li>
            </ul>
            <div class="tab-content shadow-sm">
            
                <div id="home" class="tab-pane active">
                    @include('dashboard.admin.assessment.create')
                </div>
                <div id="menu1" class="tab-pane fade">
                    @include('dashboard.admin.assessment.weight')
                </div>
                <div id="menu2" class="tab-pane fade">
                    @include('dashboard.admin.assessment.rank')
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script src="{{asset('sbadmin2\vendor\datatables\jquery.dataTables.js')}}"></script>
<script src="{{asset('sbadmin2\vendor\datatables\dataTables.bootstrap4.js')}}"></script>
<script>
    $(document).ready(function() {
    $('#data').DataTable();
    $('#weight').DataTable();
} );
</script>
@endpush