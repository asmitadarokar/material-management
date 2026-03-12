@include('common.header')

<div class="container mt-5">
    <div class="row">
        <div class="col-sm-12">
        <div class="container mt-3">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif
            <h2>Add Material Inward - Outward</h2>
            <form  action="{{ route('inward.store') }}" method="POST">
            @csrf
            <!-- Input For Category start-->
            <div class="mb-3 mt-3">
                 <label for="category">Select Category:</label>
                 <select class="form-select option_class" name="category_id">
                    <option selected value="">--Select Category--</option>
                    @foreach($categories as $cat)
                    <option value="{{$cat->id}}" {{ old('category_id') == $cat->id ? 'selected' : '' }} >{{$cat->name}}</option>
                    @endforeach
                </select>
                @error('category_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror               
            </div>
            <!-- Input For Category end-->

            <!-- Input For Material start-->
            <div class="mb-3 mt-3">
                 <label for="category">Material Name:</label>
                 <select class="form-select option_class" name="material_id">
                    <option selected value="">--Select Material Name--</option>
                    @foreach($materials as $mate)
                    <option value="{{$mate->id}}" {{ old('material_id') == $mate->id ? 'selected' : '' }} >{{$mate->name}}</option>
                    @endforeach
                </select>
                @error('material_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror               
            </div>
            <!-- Input For Material end-->

            <!-- Input For Quantity start-->
            <div class="mb-3 mt-3">
                <label for="email">Quantity:</label>
                <input type="number" class="form-control input_class" id="quantity" placeholder="Enter Quantity" name="quantity" step="0.01" value="{{ old('quantity') }}" >
                 @error('quantity')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!-- Input For Quantity end -->

             <!-- Input For Date start-->
            <div class="mb-3 mt-3">
                <label for="email">Date:</label>
                <input type="date" class="form-control input_class" id="date" placeholder="Enter Opeing Balanace" name="date" value="{{ old('date') }}">
                 @error('date')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!-- Input For Date end-->

            <button type="submit" class="btn btn-primary">Save</button>
            </form>

            </div>
        </div>
    </div>
</div>
 @include('common.footer')

