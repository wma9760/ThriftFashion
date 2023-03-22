@include("User.header");


<div class="page-content">


                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 p-0">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Contact Us</h4>
                                        <p class="card-title-desc">Fill the Form Given Below to Contact Us Directly Via Message.</p>

                                        <form class="custom-validation" action="#" novalidate="">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label">Full Name</label>
                                                <input type="text" class="form-control" id="fullname" name="fullname" required="" placeholder="Enter Full Name">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Email Addresss</label>
                                                <div>
                                                    <input type="email" id="email" class="form-control"  name="email" required="" parsley-type="email" placeholder="Enter a valid e-mail">
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Subject</label>
                                                <div>
                                                    <input type="text" id="subject" name="subject" class="form-control"  placeholder="Enter Your Suject">
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Message</label>
                                                <div>
                                                    <textarea required="" id="msg" class="form-control" rows="5" placeholder="Your Message..."></textarea>
                                                </div>
                                            </div>

                                            <div>
                                                <div>
                                                    <button type="button" id="sendMsg" class="btn btn-primary waves-effect waves-light me-1">
                                                        Send Message
                                                    </button>
                                                </div>
                                            </div>



                                            <div class="alert mt-4" id="alertMsg2" style="display:none" role="alert">

                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                            <div class="col-xl-6 p-0">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14475.827047083849!2d67.12986705!3d24.89945645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33f9b16d5b787%3A0x2f83ee15b154f996!2sNueplex%20Cinemas%20-%20Askari%20IV!5e0!3m2!1sen!2s!4v1660126294008!5m2!1sen!2s" width="100%" height="97%" class="contactMap" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>


                        </div>
                    </div>





</div>

@include("User.footer");

<script src="assets/js/contact.js"></script>
