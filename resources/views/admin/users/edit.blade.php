@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Manage {{ $user->name }}</div>

                <div class="card-body">
                    <form action="{{ route('admin.users.update', $user->id) }}" method="post">
                      
                      @csrf
                      @method('put')
                      
                      @foreach($roles as $role)

                        <div class="form-check">
                          <input type="checkbox" name="roles[]" value="{{ $role->id }}" {{ $user->hasAnyRole($role->name) ? 'checked' : ''}}>
                          <label>{{ $role->name }}</label>
                        </div>

                      @endforeach
                      <button class="btn btn-primary" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
