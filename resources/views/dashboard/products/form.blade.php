
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name <span class="text-danger">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name', $product->name)}}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="category_id">Category <span class="text-danger">*</span></label>
            <div class="col-md-6 col-sm-6">
                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                    <option value="" selected>-------- Select a category --------</option>
                    @forelse($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @empty
                    <option value="">No categories.</option>
                    @endforelse
                </select>
                @error('category_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="quantity">Quantity <span class="text-danger">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input type="text" id="quantity" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{old('quantity', $product->quantity)}}">
                @error('quantity')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="price">Price <span class="text-danger">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input type="number" id="price" name="price" class="form-control @error('price') is-invalid @enderror" value="{{old('price', $product->price)}}">
                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Discount </label>
            <div class="col-md-6 col-sm-6">
                <select name="discount" id="discount" class="form-control">
                    <option value="" selected>-------- Select a discount --------</option>
                    @php
                        for($i = 0 ; $i <= 100 ; $i++){
                            $selected = old('discount', $product->discount) == $i ? 'selected' : '';
                            echo "<option value='$i' $selected>";
                            if($i == 0){
                                $i = 0;
                                echo "0% (No Discount)";
                            } else{
                                echo "$i%";
                            }
                            echo "</option>";
                        }
                    @endphp
                </select>
                @error('discount')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
</div>

<div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="description">Description</label>
    <div class="col-md-6 col-sm-6">
        <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $product->description) ?? ''}}</textarea>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

