
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">User Management</div>
                <div class="card-body">
                    @if(Session::has('flash_message_success'))
                        <div class="alert alert-success" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fas fa-times"></i></a>
                            {{Session::get('flash_message_success')}}
                        </div>
                    @elseif(Session::has('flash_message_warning'))
                        <div class="alert alert-warning" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fas fa-times"></i></a>
                            {{Session::get('flash_message_warning')}}
                        </div>
                    @else
                    @endif
                    <div class="form-group text-right">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                            Create User
                        </button>
                    </div>
                    <div class="form-group">
                        <livewire:users-table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
            </div>
            <form action="/users" method="POST" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Full Name *</label>
                        <input type="text" class="form-control" name="name" id="name" required/>
                    </div>
                    <div class="form-group">
                        <label for="username">Email *</label>
                        <input type="email" class="form-control" name="email" id="email" required/>
                    </div>
                    <div class="form-group">
                        <label for="password">Password *</label>
                        <input type="password" class="form-control" name="password" id="password" required/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary close-modal">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
    
@endsection

