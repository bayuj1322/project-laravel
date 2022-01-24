@extends('dashboard.index')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Aplikasi
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <i class="fa fa-dashboard"></i>
                    Home
                </a>
            </li>
            <li class="active">
                Data Aplikasi
            </li>
        </ol>
    </section>

    <section class="content container-fluid">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalAdminLTE">
            <i class="fa fa-plus">
            </i> Tambah Data Aplikasi
        </button>
        <table class="table">
            <tr>
                <th>
                    NO
                </th>
                <th>
                    Nama Aplikasi
                </th>
                <th>
                    Link Visit
                </th>
                <th>
                    Deskripsi
                </th>
                <th colspan="2">
                    Aksi
                </th>
            </tr>
        </table>
        <!-- Modal -->
        <div class="modal fade" id="ModalAdminLTE" tabindex="-1" aria-labelledby="ModalAdminLTELabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="ModalAdminLTELabel">Input Data Aplikasi</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form method="post" action="">

                            <div class="form-group">
                                <label for="">Nama Aplikasi</label>
                                <input type="text" name="nama_aplikasi" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Link Visit Aplikasi</label>
                                <input type="text" name="visit" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <input type="text" name="deskripsi" class="form-control">
                            </div>

                            <button type="reset" class="btn btn-danger">Reset</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection