@extends('layouts.front')

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">
                    Home
                </a> /
                <a>
                    Contact
                </a>
            </h6>
        </div>
    </div>
    <section class="section wb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-wrapper">
                        <div class="row">
                            <div class="col-lg-5">
                                <h4>Who we are</h4>
                                <p>Tech Blog is a personal blog for handcrafted, cameramade photography content, fashion
                                    styles from independent creatives around the world.</p>

                                <h4>How we help?</h4>
                                <p>Etiam vulputate urna id libero auctor maximus. Nulla dignissim ligula diam, in
                                    sollicitudin ligula congue quis turpis dui urna nibhs. </p>

                                <h4>Pre-Sale Question</h4>
                                <p>Fusce dapibus nunc quis quam tempor vestibulum sit amet consequat enim. Pellentesque
                                    blandit hendrerit placerat. Integertis non.</p>
                            </div>
                            <div class="col-lg-7">
                                <form class="form-wrapper" action="{{ route('contact.store') }}" method="POST">
                                    @csrf
                                    <input type="text" name="name" class="form-control" placeholder="Your name"><br>
                                    <input type="text" name="address" class="form-control"
                                        placeholder="Email address"><br>
                                    <input type="text" name="phone" class="form-control" placeholder="Phone"><br>
                                    <input type="text" name="subject" class="form-control" placeholder="Subject"><br>
                                    <textarea class="form-control" name="message" placeholder="Your message"></textarea><br>
                                    <button type="submit" class="btn btn-primary">Send <i
                                            class="fa fa-envelope-open-o"></i></button>
                                </form>
                            </div>
                        </div>
                    </div><!-- end page-wrapper -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
@endsection
