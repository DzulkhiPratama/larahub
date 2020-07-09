@extends("layout.master")

@section("content")
<div class="container">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="card">
        <button type="button" class="btn btn-primary"><a href="/pertanyaan/create" style="color:white;">Buat Pertanyann</a></button>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{$ask->judul}}</h3>
            <div class="card-tools">
                <form action=<?= "/pertanyaan/" . $ask->id . "/vote/up" ?> method="POST" style="display:inline">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <button type="submit" class="btn btn-success">UP</button>
                </form>
                <form action=<?= "/pertanyaan/" . $ask->id . "/vote/down" ?> method="POST" style="display:inline">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <button type="submit" class="btn btn-danger">DOWN</button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <p>{{ $ask->isi }}</p>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <p>{{ count($listKomentarPertanyaan) }} Komentar</p>
            @foreach($listKomentarPertanyaan as $komentarPertanyaan)
            <span class="text-primary">{{ $komentarPertanyaan->user->name }}</span>
            <p>{{ $komentarPertanyaan->isi }}</p>
            @endforeach
        </div>
        <!-- /.card-footer-->
    </div>

    <h3>Jawaban</h3>
    @foreach($ans as $data)
    <div class="card">
        <div class="card-body">
            <!-- <h5 class="card-title">AnsID: {{ $data->id }}</h5> -->
            <p class="card-text">{{ $data->isi }}</p>
        </div>
    </div>
    @endforeach

</div>

@endsection
