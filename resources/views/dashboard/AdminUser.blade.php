@extends('dashboard.index')


@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Management User
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{config('app.url')}}/{{Request::segment(1)}}/{{Request::segment(2)}}/">
                    <i class="fa fa-dashboard"></i>
                    Home
                </a>
            </li>
            <li class="active">
                Management User
            </li>
        </ol>
    </section>
    <section class="content container-fluid">
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#ModalAdminLTE">
            <i class="fa fa-plus">
            </i> Tambah User
        </button>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered align-middle">
            <tr>
                <th>
                    NO
                </th>
                <th>
                    Nama
                </th>
                <th>
                    Email
                </th>
                <th>
                    Role
                </th>
                <th>
                    Team
                </th>
                <th>
                    Code Company
                </th>
                <th>
                    Description
                </th>
                <th>
                    Emp Number
                </th>
                <th>
                    Phone
                </th>
                <th>
                    Status
                </th>
                <th colspan="2">
                    Aksi
                </th>
            </tr>

            
            @foreach($user as $i=>$us)
            
            <tr>
                
                <td class="text-center">
                    {{$i+1}}
                </td>
                <td>
                    {{$us->name}}
                </td>
                <td>
                    {{$us->email}}
                </td>
                <td>
                    {{$us->access}}
                </td>
                <td>
                    {{$us->team}}
                </td>
                <td>
                    {{$us->code}}
                </td>
                <td>
                    {{$us->desc}}
                </td>
                <td>
                    {{$us->emp_no}}
                </td>
                <td>
                    {{$us->phone}}
                </td>

                <td>
                    {{$us->is_active}}
                </td>

                
                <td>
                    <button class="btn btn-success d-block m-auto">
                        Ubah
                    </button>
                </td>
                <td>
                    <button class="btn btn-danger d-block m-auto">
                        Hapus
                    </button>
                </td>
            </tr>
            @endforeach
        </table>
        
        <div class="modal fade" id="ModalAdminLTE" tabindex="-1" aria-labelledby="ModalAdminLTELabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="ModalAdminLTELabel">Input Data User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form method="post" action="/register">
                            @csrf

                            <div class="form-group">
                                <label for="">Nama User</label>
                                <input type="text" name="name" class="form-control" autofocus required>
                            </div>

                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="">Role</label>
                                <select class="form-control" name="access">
                                    <option value="admin">Admin</option>
                                    <option value="reporter">Reporter</option>
                                    <option value="teknisi">Teknisi</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Team</label>
                                <input type="text" name="in1" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="">Code Company</label>
                                <input type="text" name="in2" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="">Description</label>
                                <input type="text" name="in3" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="">Emp Number</label>
                                <input type="text" name="in4" class="form-control" required>
                            </div>

                           
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text" name="in5" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="">Status</label>
                                <select class="form-control" name="is_active">
                                    <option value="Nonactive">Non Active</option>
                                    <option value="Active">Active</option>
                                    <option value="Oldteknisi">Old Teknisi</option>
                                </select>
                            </div>

                            <button type="reset" class="btn btn-danger" >Reset</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            

                        </form>
                        {{-- @if (session('success'))
                            {{session('success')}}
                        @endif --}}

                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('sweetalert::alert')
</div>
@endsection