@extends('layouts.app')

@section('content')
    <main>
        <section class="blogs mt-5 pt-3">
            <div class="container">

                <div class="row secHead w-100 m-0">
                    <div class="col-12">
                        <div class="blogCardInfo blogDetails">
                            <h3>{{ $blog->title }}</h3>
                            <span>{{$blog->author_name}} {{ date('d M, Y', strtotime($blog->created_at)) }}</span>     
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 col-md-10 blogDetailsImg"><img src="{{ asset(env('UPLOADED_ASSETS').'uploads/blog/'. $blog->path) }}" class="w-100" alt=""></div>
                    <div class="col-12 mt-3">
                    
                        

                        {!! $blog->subtitle !!}
                    </div>
                </div>
            </div>
        </section>
    </main>
    
@endsection