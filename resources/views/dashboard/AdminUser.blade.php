@extends('dashboard.index')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Management User
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">
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
                <th colspan="2">
                    Aksi
                </th>
            </tr>

            
            @foreach($usr as $i=>$us)
            
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
                                <input type="text" name="name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Role</label>
                                <select class="form-control" name="access">
                                    <option value="admin">Admin</option>
                                    <option value="reporter">Reporter</option>
                                    <option value="teknisi">Teknisi</option>
                                </select>
                            </div>

                            <button type="reset" class="btn btn-danger" >Reset</button>
                            <button type="submit" class="btn btn-primary">Submit</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection