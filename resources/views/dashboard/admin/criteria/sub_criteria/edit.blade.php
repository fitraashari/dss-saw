@extends('dashboard.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header font-weight-bold bg-primary text-light">
                    Edit Sub Criteria
                </div>
                <div class="card-body">
                <form action="{{route('sub_criteria.update',['id'=>$sub_criteria->id])}}" method="POST">
                @csrf
                @method('PUT')
                    <input type="hidden" class="form-control" name="criteria_id" id="criteria_id" aria-describedby="criteria_idHelp" value="{{$sub_criteria->criteria_id}}">
                    <div class="form-group">
                      <label for="name">Sub Criteria Name</label>
                      <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp" value="{{$sub_criteria->name}}">
                    </div>
                    <div class="form-group">
                      <label for="weight">Sub Criteria Weight</label>
                      <input type="number" min="1" max="5" name="weight" class="form-control" id="weight" aria-describedby="weightHelp" placeholder="Min 1, Max 5" value="{{$sub_criteria->weight}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
@endsection
