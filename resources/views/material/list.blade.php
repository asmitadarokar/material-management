
 @include('common.header')
<div class="container mt-5" style="/*background-color:#d5d5d5;*/">
    <div class="row">
     
        <div class="col-sm-10">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif
                <div class="row">
                    <div class="col-sm-3"> <h2>Material List</h2></div>
                    <div class="col-sm-4 mt-2">
                    <a href="{{route('material.add')}}" class="btn btn-primary">Add Material<a>
                    </div>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Material Name</th>
                        <th>Category</th>
                        <th>Opening Balance</th>
                        <th>Current Balance</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($materials))
                        
                        @foreach ($materials as $material)
                        @php
                            $balance = $material->opening_balance +
                            $material->transactions->sum('quantity');
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $material->name }}</td>
                                <td>{{ $material->category->name}}</td>
                                <td>{{ $material->opening_balance}}</td>
                                 <td>{{ $balance }}</td>
                                <td>
                                    <a href="{{ route('material.edit', ['id'=>$material->id]) }}" class="btn btn-info">Edit</button><a>
                                    <a href="{{ route('material.delete', ['id'=>$material->id]) }}" class="btn btn-danger">Delete</button><a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                <!-- pagination links -->
                <span class="mt-3">
                    {{ $materials->links() }}
                </span>
        </div>
        
       
    </div>
</div>
 @include('common.footer')

