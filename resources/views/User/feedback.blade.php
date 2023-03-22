@include("User.header");


<link rel="stylesheet" href="assets/css/feedback.css">

<div class="page-content">


                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 p-0">
                                <div class="card">
                                    <div class="card-body getHeight">
                                        <h4 class="card-title">Feedback</h4>
                                        <p class="card-title-desc">Fill the Form Given Below to Submit Feedback Directly Via Message.</p>

                                        <form class="custom-validation" action="#" novalidate="">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label">Full Name</label>
                                                <input type="text" class="form-control" id="fullname" name="fullname" required="" placeholder="Enter Full Name">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Email Addresss</label>
                                                <div>
                                                    <input type="email" id="email" class="form-control" name="email" required="" parsley-type="email" placeholder="Enter a valid e-mail">
                                                </div>
                                            </div>


                                            <div class="mb-3">
                                                <label class="form-label">Feedback</label>
                                                <div>
                                                    <textarea required="" name="feedback" id="feedback" class="form-control" rows="5" placeholder="Your Feedback..."></textarea>
                                                </div>
                                            </div>

                                            <div>
                                                <div>
                                                    <button type="button" id="sendMsg" class="btn btn-primary waves-effect waves-light me-1">
                                                        Submit Feedback
                                                    </button>
                                                </div>
                                            </div>



                                            <div class="alert mt-4" id="alertMsg2" style="display:none" role="alert">

                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                            <div class="col-xl-5 p-0 feedbackimg">
                                <img src="{{asset('assets/images/small/feedback.jpg')}}" class="feedback-img">
                            </div>


                        </div>
                    </div>





</div>

@include("User.footer");

<script src="assets/js/feedback.js"></script>
