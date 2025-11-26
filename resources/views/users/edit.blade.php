@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Student') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="row">

                            {{-- Name --}}
                            <div class="col-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    <input type="text"
                                           name="name"
                                           value="{{ old('name', $user->name) }}"
                                           placeholder="Name"
                                           class="form-control"
                                           required>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Email --}}
                            <div class="col-12">
                                <div class="form-group">
                                    <strong>Email:</strong>
                                    <input type="email"
                                           name="email"
                                           value="{{ old('email', $user->email) }}"
                                           placeholder="Email"
                                           class="form-control"
                                           required>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Password (Optional) --}}
                            <div class="col-12">
                                <div class="form-group">
                                    <strong>Password: <small class="text-danger">(Leave blank to keep current password)</small></strong>
                                    <input type="password"
                                           name="password"
                                           placeholder="New Password"
                                           class="form-control">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Confirm Password --}}
                            <div class="col-12">
                                <div class="form-group">
                                    <strong>Confirm Password:</strong>
                                    <input type="password"
                                           name="confirm-password"
                                           placeholder="Confirm Password"
                                           class="form-control">
                                </div>
                            </div>

                            {{-- Roles --}}
                            <div class="col-12">
                                <div class="form-group">
                                    <strong>Role:</strong>
                                    <select name="roles[]" class="form-control"  required>
    @foreach ($roles as $role)
        <option value="{{ $role->id }}"
            {{ in_array($role->id, $userRole) ? 'selected' : '' }}>
            {{ $role->name }}
        </option>
    @endforeach
</select>
                                    <small class="text-muted">Hold Ctrl (Cmd on Mac) to select multiple roles</small>
                                    @error('roles')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Buttons --}}
                            <div class="col-12 text-center mt-2 mb-3">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa-solid fa-floppy-disk"></i> Update
                                </button>
                                <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm">
                                    Cancel
                                </a>
                            </div>

                        </div> {{-- row end --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
