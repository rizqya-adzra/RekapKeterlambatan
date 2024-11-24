@extends('template.app', ['title' => 'Dashboard'])

@section('konten-dinamis')
<section class="container p-5">
    <div class="row">
        <div class="col-xl-5 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="media">
                        <i class="icon-pencil primary font-large-2 mr-3"></i>
                        <div class="media-body text-right">
                            <h3>278</h3>
                            <span>Peserta Didik</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="media">
                        <i class="icon-speech warning font-large-2 mr-3"></i>
                        <div class="media-body text-right">
                            <h3>156</h3>
                            <span>Administrator</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="media">
                        <i class="icon-graph success font-large-2 mr-3"></i>
                        <div class="media-body text-right">
                            <h3>64.89 %</h3>
                            <span>Pembimbing Siswa</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="media">
                        <i class="icon-pointer danger font-large-2 mr-3"></i>
                        <div class="media-body text-right">
                            <h3>423</h3>
                            <span>Rombel</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-5 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="media">
                        <i class="icon-pointer danger font-large-2 mr-3"></i>
                        <div class="media-body text-right">
                            <h3>423</h3>
                            <span>Rayon</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
