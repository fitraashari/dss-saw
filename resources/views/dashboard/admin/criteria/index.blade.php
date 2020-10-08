@extends('dashboard.master')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Criteria</h1>
  </div>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm mb-4">
                <div class="card-header font-weight-bold text-primary">List Criteria</div>

                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered" id="data" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Criteria Code</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Weight</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $index => $criteria)
                                <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$criteria->criteria_code}}</td>
                                <td>{{$criteria->name}}</td>
                                <td>{{$criteria->type}}</td>
                                <td>{{$criteria->weight}}</td>
                                <td>
                                <a href="{{route('criteria.show',['id'=>$criteria->id])}}" class="btn btn-sm btn-primary"><i class="fas fa-code-branch"></i></a>
                                    <a href="/dashboard/criteria/{{$criteria->id}}/edit" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                    <form action="/dashboard/criteria/{{$criteria->id}}/delete" method="post" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger float" onclick="return confirm('Yakin?')"><i class="fas fa-trash"></i></button>
                                      </form>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow-sm mb-4">
                <div class="card-header font-weight-bold text-light bg-primary">
                    Add New Criteria
                </div>
                <div class="card-body">
                <form action="{{route('criteria.store')}}" method="POST">
                @csrf
                    <div class="form-group">
                      <label for="criteria_code">Criteria Code</label>
                      <input type="text" class="form-control" name="criteria_code" id="criteria_code" aria-describedby="criteria_codeHelp">
                      <small id="criteria_codeHelp" class="form-text text-muted">Unique</small>
                    </div>
                    <div class="form-group">
                      <label for="name">Criteria Name</label>
                      <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp">
                    </div>
                    <div class="form-group">
                      <label for="type">Criteria Type</label>
                      <select name="type" class="form-control" id="type">
                        <option value='Benefit'>Benefit</option>
                        <option value='Cost'>Cost</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="weight">Criteria Weight</label>
                      <select name="weight" class="form-control" id="weight">
                        <option value='1'>(1) Tidak Penting</option>
                        <option value='2'>(2) Lumayan Penting</option>
                        <option value='3'>(3) Penting</option>
                        <option value='4'>(4) Sangat Penting</option>
                        <option value='5'>(5) Sangat Penting Sekali</option>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
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
} );
</script>
@endpush