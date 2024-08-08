{{-- <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name <span class="text-danger">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name', $user->name)}}">
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
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="user_type">User Type</label>
            <div class="col-md-6 col-sm-6">
                <select class="form-control @error('user_type') is-invalid @enderror" name="user_type" id="user_type" value="{{old('user_type', $user->user_type)}}">
                    <option value="" selected>-------- Select a category --------</option>
                    <option value="admin" {{ $user->user_type === 'admin' }}>Admin</option>
                    <option value=" moderator" {{ $user->user_type === 'moderator' }}>Moderator</option>
                </select>
                @error('user_type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>

</div> --}}
{{-- <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name <span class="text-danger">*</span></label>
            <div class="col-md-9 col-sm-9">
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}">
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
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email <span class="text-danger">*</span></label>
            <div class="col-md-9 col-sm-9">
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password <span class="text-danger">*</span></label>
            <div class="col-md-9 col-sm-9">
                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
            <div class="col-md-9 col-sm-9">
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="user_type">User Type <span class="text-danger">*</span></label>
            <div class="col-md-9 col-sm-9">
                <select class="form-control @error('user_type') is-invalid @enderror" name="user_type" id="user_type">
                    <option value="" selected>-------- Select a category --------</option>
                    <option value="admin" {{ old('user_type', $user->user_type) === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="moderator" {{ old('user_type', $user->user_type) === 'moderator' ? 'selected' : '' }}>Moderator</option>
                </select>
                @error('user_type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
</div> --}}

<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name <span class="text-danger">*</span></label>
            <div class="col-md-9 col-sm-9">
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}">
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
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email <span class="text-danger">*</span></label>
            <div class="col-md-9 col-sm-9">
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password <span class="text-danger">*</span></label>
            <div class="col-md-9 col-sm-9">
                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
            <div class="col-md-9 col-sm-9">
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="user_type">User Type <span class="text-danger">*</span></label>
            <div class="col-md-9 col-sm-9">
                <select class="form-control @error('user_type') is-invalid @enderror" name="user_type" id="user_type">
                    <option value="" selected>-------- Select a category --------</option>
                    <option value="admin" {{ old('user_type', $user->user_type) === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="moderator" {{ old('user_type', $user->user_type) === 'moderator' ? 'selected' : '' }}>Moderator</option>
                </select>
                @error('user_type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
</div>
