<div class="card border-0 mb-4 mt-2">
    <div class="card-header font-weight-bold text-primary">
        Rank
    </div>

        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" border="1" id="weight" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Rank.</th>
                            <th>Employe Name</th>
                            @foreach ($criteria_filtered as $criteria)
                        <th>{{$criteria->criteria_code}}<br>
                        ({{$criteria->name}})</th>
                            @endforeach
                            <th>Score</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($arr as $index => $result)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$result['full_name']}}</td>
                            @foreach ($result['criteria'] as $key => $criteria)
                            <td>
                                {{$criteria['result']}}
                            </td>
                            @endforeach
                            <td>
                                {{$result['score']}}
                            </td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>