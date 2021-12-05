<div class="card-datatable table-responsive">
    <table id="technicians" class="datatables-demo table table-striped table-bordered">
        <tbody>
        <tr>
            <td>Name</td>
            <td>{{$user->user_name}}</td>
        </tr>
        <tr>
            <td>Sponser Id</td>
            <td>{{$user->sponser_id}}</td>
        </tr>
        <tr>
            <td>First Name</td>
            <td>{{$user->first_name}}</td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td>{{$user->last_name}}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{$user->email}}</td>
        </tr>
        <tr>
            <td>Phone Number</td>
            <td>{{$user->phone_number}}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>
                @if($user->active)
                    <span class="btn btn-sm btn-success">Active</span>
                @else
                    <span class="btn btn-sm btn-warning">Inactive</span>
                @endif
            </td>
        </tr>
        <tr>
            <td>Created at</td>
            <td>{{$user->created_at}}</td>
        </tr>

        </tbody>
    </table>
</div>
