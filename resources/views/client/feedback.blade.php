@extends('layout')

<!-- ================ start banner area ================= -->

@section('banner')
    <section class="banner-area" id="category">
        <div class="container h-100">
            <div class="blog-banner">
                <div class="text-center banner">
                    <h1>Feedback Form</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Feedback Form</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endsection

<!-- ================ end banner area ================= -->

<!--================Cart Area =================-->

@section('content')
    <section class="section-margin--small">
        <div id="container-feedback" class="container">
            <form action="{{url('/send_feedback')}}" method="post">
                @csrf
                <div id="page-body" class="page-body">
                    <div class="feedback-name">
                        <label for="">Full name:</label>
                        <input name="name" class="form-control" data-role="i123-input" type="text" @if(Auth::user()) value="{{ Auth::user()->name }}" @endif data-index="1" placeholder="" data-i18n-placeholder="textdef_30" data-size="fill">
                    </div>
                    <div class="feedback-email">
                        <label for="">Email:</label>
                        <input name="email" class="form-control" data-role="i123-input" type="text" @if(Auth::user()) value="{{ Auth::user()->email }}" @endif data-index="2" placeholder="" data-i18n-placeholder="textdef_31" data-size="half">
                    </div>
                    <div class="feedback-satisfied">
                        <label for="" >How satisfied were you with:</label>
                        <div class="satisfied-content">
                            <div class="satisfied-title">
                                <label for="" class="satisfied-name">Product</label><br>
                                <label for="" class="satisfied-name">Service</label><br>
                                <label for="" class="satisfied-name">Shipping</label>
                            </div>
                            <div class="satisfied-rate">
                                <label class="rate radio-inline"><input type="radio" value="1" name="product" checked> Very Satisfied</label>
                                <label class="rate radio-inline"><input type="radio" value="2" name="product"> Satisfied</label>
                                <label class="rate radio-inline"><input type="radio" value="3" name="product"> Unsatisfied</label>
                                <label class="rate radio-inline"><input type="radio" value="4" name="product"> Very Unsatisfied</label>
                                <br>
                                <label class="rate radio-inline"><input type="radio" value="1" name="service" checked> Very Satisfied</label>
                                <label class="rate radio-inline"><input type="radio" value="2" name="service"> Satisfied</label>
                                <label class="rate radio-inline"><input type="radio" value="3" name="service"> Unsatisfied</label>
                                <label class="rate radio-inline"><input type="radio" value="4" name="service"> Very Unsatisfied</label>
                                <br>
                                <label class="rate radio-inline"><input type="radio" value="1" name="Shipping" checked> Very Satisfied</label>
                                <label class="rate radio-inline"><input type="radio" value="2" name="Shipping"> Satisfied</label>
                                <label class="rate radio-inline"><input type="radio" value="3" name="Shipping"> Unsatisfied</label>
                                <label class="rate radio-inline"><input type="radio" value="4" name="Shipping"> Very Unsatisfied</label>
                            </div>
                        </div>
                    </div>
                    <div class="feedback-comment">
                        <label for="">Feel free to add any other comments or suggestions:</label>
                        <textarea name="content" class="form-control" data-role="i123-input" aria-labelledby="textarea-00000012-acc textarea-00000012-error-acc textarea-00000012-instr-acc" rows="4" data-size="full"></textarea>
                        <dt data-role="instructions" class="note" id="textarea-00000012-instr-acc" data-i18n-text="control_instructions_1675324">* The information given within the Feedback Form will be used for service improvement only and are strictly confidential.</dt>
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->all() as $message)
                            <div class="alert alert-danger">{{ $message }}</div>
                        @endforeach
                    @endif
                    <div class="submit">
                        <button data-role="submit">
                            <span class="normal-state" data-i18n-text="SendButton">SEND FEEDBACK</span>
                            <!-- <span class="submit-state" data-i18n-text="textdef_132">Please wait...</span> -->
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

<!--================End Cart Area =================-->