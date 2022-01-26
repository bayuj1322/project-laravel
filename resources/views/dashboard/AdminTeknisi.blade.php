@extends('dashboard.index')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Teknisi
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <i class="fa fa-dashboard"></i>
                    Home
                </a>
            </li>
            <li class="active">
                Data Teknisi
            </li>
        </ol>
    </section>
    <section class="content container-fluid">
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#ModalAdminLTE">
            <i class="fa fa-plus">
            </i> Tambah Data Teknisi
        </button>
        <table class="table table-bordered align-middle">
            <tr>
                <th>
                    NO
                </th>
                <th>
                    Nama Teknisi
                </th>
                <th>
                    Perusahaan
                </th>
                <th>
                    Aplikasi
                </th>
                <th>
                    Contact Person
                </th>
                <th colspan="2">
                    Aksi
                </th>
            </tr>

            @foreach($tks as $i=>$tk)
            
            <tr>
                
                <td class="text-center">
                    {{$i+1}}
                </td>
                <td >
                
                {{$tk->tk_name}}
                     
                </td>
                <td >
                    
                {{$tk->tk_prshid}}
                    
                   
                </td >
                <td>
                    
                   
                {{$tk->tk_apkid}}
                    
                </td>

                <td>
                {{ $tk->tk_cp }}
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
                        <h4 class="modal-title" id="ModalAdminLTELabel">Input Data Teknisi</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form method="post" action="{{config('app.url')}}/{{Request::segment(1)}}/{{Request::segment(2)}}/{{Request::segment(3)}}/add">
                            @csrf
                            
                            <div class="form-group">
                                <label for="">Nama Teknisi</label>
                                <select class="form-control" name="user" >
                                    @foreach($tks as $tk)
                                    <option value="{{$tk->uid}}">{{$tk->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Perusahaan</label>
                                <select class="form-control" name="prsh" >
                                    @foreach($prshs as $prsh)
                                    <option  value="{{$prsh->pr_id}}">{{$prsh->pr_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Aplikasi</label>
                                <select class="form-control" name="apk" >
                                    @foreach($apks as $apk)
                                    <option value="{{$apk->apk_id}}">{{$apk->apk_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Contact Person</label>
                                <input type="text" name="contact" class="form-control">
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