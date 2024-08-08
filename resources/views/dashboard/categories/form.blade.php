
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name <span class="text-danger">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name', $category->name)}}">
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
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="category_parent">Parent Category</label>
            <div class="col-md-6 col-sm-6">
                <select class="form-control @error('category_parent_id') is-invalid @enderror" name="category_parent_id" id="category_parent">
                    <option value="" selected>-------- Select a category --------</option>
                    @forelse($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $category->category_parent_id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @empty
                    <option value="">No categories.</option>
                    @endforelse
                </select>
                @error('category_parent_id')
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
        <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" value="{{old('description', $category->description)}}"></textarea>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

