<div class="card border-0 mb-4 mt-2">
    <div class="card-header font-weight-bold text-primary">List Assessment
        <a href="{{route('employe.create')}}" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus-square"></i> New Employe</a></a>
        </div>

        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="data" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Employe Name</th>
                            @foreach ($criterias as $criteria)
                        <th>{{$criteria->criteria_code}}<br>
                        ({{$criteria->name}})</th>
                            @endforeach
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($employes as $index => $employe)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$employe->full_name}}</td>
                        <form action="{{route('assessment.store')}}" method="post">
                            <input type="hidden" name="employe_id" value="{{$employe->id}}">
                            @foreach ($criterias as $criteria)
                            @csrf
                            <td>
                            <input type="hidden" name="criteria_id[]" value="{{$criteria->id}}">
                                    <select name="weight[]" class="form-controll" required>
                                        <option selected disabled>--Choose--</option>
                                        @foreach ($criteria->sub_criteria as $sub_criteria)
                                        
                                        <option value="{{$sub_criteria->weight}}"
                                            @foreach ($employe->assessment as $assessment)
                                                {{($criteria->id == $assessment->criteria_id && 
                                                $sub_criteria->weight == $assessment->weight)?'selected':''}}
                                            @endforeach
                                            
                                            >{{$sub_criteria->name}}</option>

                                        @endforeach
                                    </select>
                                </td>
                            @endforeach
                                <td>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    
                                </td>
                            </form>
                        </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
            </div>