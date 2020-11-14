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
        @foreach($accounts as $account)
            <tr class="featch_user_table_row" data-name="{{ $account->name }}" data-user-id="{{ $account->id }}"
                style="cursor: pointer" data-dismiss="modal">
                <td>{{ $account->id }}</td>
                <td>{{ $account->name }}</td>
                <td>{{ $account->email }}</td>
                <td>{{ $account->mobile }}</td>
                <td>@include('GeneralComponents.user_type',['id'=>$account->membertype_id])</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="text-center">
        {{ $accounts->appends(request()->input())->links() }}
    </div>
    Records {{ $accounts->firstItem() }} -> {{ $accounts->lastItem() }} of {{ $accounts->total() }}
    (for page {{ $accounts->currentPage() }} )
</div>
