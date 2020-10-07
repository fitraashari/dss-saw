@extends('dashboard.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
            <div class="card-header font-weight-bold text-primary">
            <a href="{{route('criteria')}}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i></a> Sub Criteria {{$criteria->name}} [{{$criteria->type}}]</div>

                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered" id="data" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Weight</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($criteria->sub_criteria as $index => $sub_criteria)
                                <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$sub_criteria->name}}</td>
                                <td>{{$sub_criteria->weight}}</td>
                                <td>
                                <a href="{{route('sub_criteria.edit',['id'=>$sub_criteria->id])}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                <form action="{{route('sub_criteria.delete',['sub_criteria'=>$sub_criteria->id])}}" method="post" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" class="form-control" name="criteria_id" id="criteria_id" aria-describedby="criteria_idHelp" value="{{$criteria->id}}">
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
            <div class="card shadow mb-4">
                <div class="card-header font-weight-bold bg-primary text-light">
                    Add New Sub Criteria
                </div>
                <div class="card-body">
                <form action="{{route('sub_criteria.store')}}" method="POST">
                @csrf
                    <input type="hidden" class="form-control" name="criteria_id" id="criteria_id" aria-describedby="criteria_idHelp" value="{{$criteria->id}}">
                    <div class="form-group">
                      <label for="name">Sub Criteria Name</label>
                      <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp">
                    </div>
                    <div class="form-group">
                      <label for="weight">Sub Criteria Weight</label>
                      <input type="number" min="1" max="5" name="weight" class="form-control" id="weight" aria-describedby="weightHelp" placeholder="Min 1, Max 5">
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