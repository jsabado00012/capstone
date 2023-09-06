
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

<div wire:ignore.self class="modal fade" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="resetModalLabel" aria-hidden="true">
    <div class="modal-dialog col-md-10" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resetModalLabel">Reset Password</h5>
            </div>
            <form action="/reset_password/{{$id}}" method="POST" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Full Name *</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{$name}}" readonly/>
                    </div>
                    <div class="form-group">
                        <label for="username">Email *</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{$email}}" readonly/>
                    </div>
                    <div class="form-group">
                        <label for="newPassword">New Password *</label>
                        <input type="password" class="form-control" name="newPassword" id="newPassword" required/>
                    </div>
                    <div class="form-group">
                        <label for="adminConfirmPassword">Admin Password to Confirm *</label>
                        <input type="password" class="form-control" name="adminConfirmPassword" id="adminConfirmPassword" required/>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="/users" title="Edit">
                        <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                    </a>
                    <button type="submit" class="btn btn-primary close-modal">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#resetModal').modal('show');
    });
</script>

@endsection

