
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
            <!-- <div class="container mt-3"> -->
                <div class="row">
                    <div class="col-sm-3"> <h2>Category List</h2></div>
                    <div class="col-sm-4 mt-2">
                    <a href="{{route('category.add')}}" class="btn btn-primary">Add Category<a>
                    </div>
                </div>
                <!-- <p>The .table class adds basic styling (light padding and horizontal dividers) to a table:</p> -->
                <table class="table">
                    <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($categories))
                        
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a href="{{ route('category.edit', ['id'=>$category->id]) }}" class="btn btn-info">Edit</button><a>
                                    <!-- <a href="{{ route('category.edit', ['id'=>$category->id]) }}" class="btn btn-warning">Update</button><a> -->
                                    <a href="{{ route('category.delete', ['id'=>$category->id]) }}" class="btn btn-danger">Delete</button><a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                <!-- </div> -->
        </div>
       
    </div>
</div>
 @include('common.footer')

