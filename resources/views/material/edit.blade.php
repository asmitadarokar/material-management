@include('common.header')

<div class="container mt-5">
    <div class="row">
        <div class="col-sm-12">
        <div class="container mt-3">
            <h2>Edit Material</h2>
            <form  action="{{ route('material.update',$material->id) }}" method="POST">
                @csrf
            <!-- Input For Material Name start-->
            <div class="mb-3 mt-3">
                <label for="email">Material Name:</label>
                <input type="text" class="form-control input_class" id="name" placeholder="Enter Material Name" name="material_name" value="{{ old('material_name',$material->name) }}">
                 @error('material_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!-- Input For Material Name end-->

            <!-- Input For Category start-->
            <div class="mb-3 mt-3">
                 <label for="category">Select Category:</label>
                 <select class="form-select option_class" name="category_id" aria-label="Default select example">
                    <option selected value="">--Select Category--</option>
                    @foreach($categories as $cat)
                    <option value="{{$cat->id}}" {{ (old('category_id',$material->category_id) == $cat->id) ? 'selected' : ''}} >{{$cat->name}}</option>
                    @endforeach
                </select>
                @error('category_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
               
            </div>
            <!-- Input For Category end-->

            <!-- Input For Opening Balance start-->
            <div class="mb-3 mt-3">
                <label for="email">Opening Balance:</label>
                <input type="number" class="form-control input_class" id="opening_balance" placeholder="Enter Opeing Balanace" name="opening_balance" step="0.01" value="{{ old('opening_balance',$material->opening_balance) }}" min="0">
                 @error('opening_balance')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!-- Input For Opening Balance end-->

            <button type="submit" class="btn btn-primary">Save</button>
            </form>
            </div>


        </div>
    </div>
</div>
 @include('common.footer')

