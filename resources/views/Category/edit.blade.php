@include('common.header')

<div class="container mt-5">
    <div class="row">
        <div class="col-sm-12">
        <div class="container mt-3">
            <h2>Edit Category</h2>
            <form  action="{{ route('category.update', $category->id) }}" method="POST">
            @csrf
            <!-- Input For Category start-->
            <div class="mb-3 mt-3">
                <label for="email">Category Name:</label>
                <input type="text" class="form-control input_class" id="name" placeholder="Enter email" name="name" value="{{ $category->name }}">
            </div>
            <!-- Input For Category end-->

            <button type="submit" class="btn btn-primary">Save</button>
            </form>
            </div>


        </div>
    </div>
</div>
 @include('common.footer')

