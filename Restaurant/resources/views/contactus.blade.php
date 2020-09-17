@extends('master')
@section('body')

<div class="container">
    <div class="text-center mt-5"><h3>For Suggestions and Complaints </h3></div>
    <div class="row">
        <div class="col-lg-8 col-sm-12">
            <div class="row d-flex justify-content-center ">
                <div class="col-md-6 col-sm-8 col-xs-12 col-md-offset-3 col-sm-offset-2 solganImg">
                    <div class="contact-form sloganImg">
                    <form action="{{'/addmsg'}}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            <h2 class="text-center">Contact Us</h2>
                            <div class="row">
                                <div class="col-md-12 col-xs-12">
                                    <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Name*" required="required"  @auth value="{{Auth::user()->name}}" @endauth/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Your Email*" required="required" @auth value="{{Auth::user()->email}} @endauth"/>
                            </div>
                            <div class="form-group">
                                <input type="text" name="subject" class="form-control" placeholder="Subject" />
                            </div>
                            
                            <div class="form-group">
                                <textarea name="message" rows="8" class="form-control" placeholder="Your Message*" required="Your Message"></textarea>
                            </div>


                            <button type="submit" class="btn btn-primary btn-block">Send</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        <div class="col-lg-4 col-sm-12 mt-5 pt-5 ">
            
            <div class="display-4  d-flex justify-content-center">Social Media</div>
            <br>
            <div class="row  text-center ">
                
                <div class="col-4 mx-auto onHover" ><a href=""><i class="fab fa-facebook-square fa-3x" style="color: #3b5998;"></a></i></div>
                <div class="col-4 mx-auto onHover"><a href=""><i class="fab fa-instagram fa-3x"  style="color: #ff3700;"></a></i></div>
                
              
            </div>
            <hr>
              <div class="d-flex justify-content-center">
               <img class="img-responsive mb-4" src="{{asset('img/contactusfood.jpg')}}" alt="contact us" style="width: 100%;">
</div>
            
        </div>
    </div>
</div>
    
@endsection