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
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#ModalAdminLTE">
            <i class="fa fa-plus">
            </i> Tambah Data Aplikasi
        </button>
        <table class="table table-bordered align-middle">
            <tr>
                <th>
                    NO
                </th>
                <th>
                    Icon Aplikasi
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
            @foreach($apks as $i=>$apk)
            <tr>
                <td class="text-center">
                    {{$i+1}}
                </td>
                <td>
                    <img src="/storage/aplikasi/{{$apk->apk_img}}" height="48" class="icon-apk d-block m-auto">
                </td>
                <td>
                    {{$apk->apk_name}}
                </td>
                <td>
                    {{$apk->apk_url}}
                </td>
                <td>
                    {{$apk->apk_desc}}
                </td>
                <td>
                    <form method="GET" action="{{Request::url()}}/edit">
                        <input type="hidden" value="{{$apk->apk_id}}" name="id">
                        <button class="btn btn-success d-block m-auto">
                            Ubah
                        </button>
                    </form>
                </td>
                <td>
                    <form method="POST" action="{{Request::url()}}/hapus">
                        @csrf
                        <input type="hidden" value="{{$apk->apk_id}}" name="id">
                        <button class="btn btn-danger d-block m-auto">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
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

                        <form method="post" action="{{config('app.url')}}/{{Request::segment(1)}}/{{Request::segment(2)}}/{{Request::segment(3)}}/add" autocomplete="off" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="">Icon Aplikasi</label>
                                <input type="file" name="i0" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Nama Aplikasi</label>
                                <input type="text" name="i1" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Link Visit Aplikasi</label>
                                <input type="text" name="i2" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <input type="text" name="i3" class="form-control">
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