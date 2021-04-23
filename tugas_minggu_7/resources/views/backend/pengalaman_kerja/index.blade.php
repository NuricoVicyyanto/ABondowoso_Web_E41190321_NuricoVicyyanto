@extends('backend/layouts.index')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="icon-document-alt">Riwayat Hidup</i></h3>
                    <ol class="breadcumb">
                        <li><i class="fa fa-home"></i><a href="{{url('dashboard')}}">Home</a></li>
                        <li><i class="icon_document_alt"></i>Riwayat Hidup</li>
                        <li><i class="fa fa-files-o"></i>Pengalaman Kerja</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Pengalaman Kerja
                        </header>
                        <div class="panel-body">
                            @if ($massage = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{$massage}}</p>
                            </div>
                            @endif
                            <a href="{{route('pengalaman_kerja.create')}}"><button class="btn btn-primary"
                                type="button"><i class="fa fa-plus"> Tambah</i></button></a>
                        </div>
                        <br><br>
                        <table class="table table-stripped table-advance table-hover">
                            <tbody>
                                <tr>
                                    <th><i class="icon_bag"></i>Nama</th>
                                    <th><i {{-- class="icon_document" --}}>jabatan</i></th>
                                    <th><i {{-- class="icon_calendar" --}}>Tahun Masuk</i></th>
                                    <th><i {{-- class="icon_calendar" --}}>Tahun selesai</i></th>
                                    <th><i {{-- class="icon_cogs" --}}>Action</i></th>
                                </tr>
                                @foreach ($pengalaman_kerja as $item)
                                <tr>
                                    <td>{{$item->nama}}</td>
                                    <td>{{$item->jabatan}}</td>
                                    <td>{{$item->tahun_masuk}}</td>
                                    <td>{{$item->tahun_keluar}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <form action="{{route('pengalaman_kerja.destroy', $item->id)}}" method="POST">
                                                <a class="btn btn-warning" href="{{route('pengalaman_kerja.edit', $item->id)}}"><i class="fa fa-edit"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="fa fa-trash-o"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
        </section>
    </section>
@endsection