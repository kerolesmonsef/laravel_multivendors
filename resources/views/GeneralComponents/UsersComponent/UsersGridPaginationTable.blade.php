<div class="table-responsive">
    <table class="table table-sm table-striped table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Type</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr class="featch_user_table_row" data-name="{{ $user->name }}" data-user-id="{{ $user->id }}"
                style="cursor: pointer" data-dismiss="modal">
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->mobile }}</td>
                <td>@include('GeneralComponents.user_type',['id'=>$user->membertype_id])</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="text-center">
        {{ $users->appends(request()->input())->links() }}
    </div>
    Records {{ $users->firstItem() }} -> {{ $users->lastItem() }} of {{ $users->total() }}
    (for page {{ $users->currentPage() }} )
</div>
