@extends('dashboard.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header font-weight-bold text-primary">
                    Edit Criteria
                </div>
                <div class="card-body">
                <form action="{{route('criteria.update',['id' => $criteria->id])}}" method="POST">
                @csrf
                @method('PUT')
                <form>
                    <div class="form-group">
                      <label for="criteria_code">Criteria Code</label>
                    <input type="text" class="form-control" name="criteria_code" id="criteria_code" aria-describedby="criteria_codeHelp" value="{{$criteria->criteria_code}}">
                    </div>
                    <div class="form-group">
                      <label for="name">Criteria Name</label>
                    <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp" value="{{$criteria->name}}">
                    </div>
                    <div class="form-group">
                      <label for="type">Criteria Type</label>
                      <select name="type" class="form-control" id="type">
                        <option value='Benefit' {{($criteria->type=='benefit')?'selected':''}}>Benefit</option>
                        <option value='Cost' {{($criteria->type=='cost')?'selected':''}}>Cost</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="weight">Criteria Weight</label>
                      <select name="weight" class="form-control" id="weight">
                        <option value='1' {{($criteria->weight=='1')?'selected':''}}>(1) Tidak Penting</option>
                        <option value='2' {{($criteria->weight=='2')?'selected':''}}>(2) Lumayan Penting</option>
                        <option value='3' {{($criteria->weight=='3')?'selected':''}}>(3) Penting</option>
                        <option value='4' {{($criteria->weight=='4')?'selected':''}}>(4) Sangat Penting</option>
                        <option value='5' {{($criteria->weight=='5')?'selected':''}}>(5) Sangat Penting Sekali</option>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
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