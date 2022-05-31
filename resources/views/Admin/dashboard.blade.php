@section('content')

    <div class="container" style="min-height: 100vh; padding-top: 7rem;">

        <h1 class="text-center">Welcome Admin</h1>

        <div class="form-row">
            <div class="my-3 col-6">
                <a class="btn btn-block btn-dark p-3" href="/admin-category">Category</a>
            </div>
            <div class="my-3 col-6">
                <a class="btn btn-block btn-dark p-3" href="/admin-products">Products</a>
            </div>
            <div class="my-3 col-6">
                <a class="btn btn-block btn-dark p-3" href="/admin-item-assigned">Item Assigned</a>
            </div>
            <div class="my-3 col-6">
                <a class="btn btn-block btn-dark p-3" href="/admin-users">Users</a>
            </div>
            <div class="my-3 col-12">
                <a class="btn btn-block btn-dark p-3" href="/admin-transactions">Transactions</a>
            </div>
        </div>

    </div>

@endsection
