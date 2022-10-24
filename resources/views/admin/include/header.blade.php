<main class="bgg   ">
     <header class="pt-3 mb-1  ">
         <div class="container-fluid ">
             <div class="row justify-content-between align-items-center pb-2">
                 <div class="col-lg-1 col-md-1 col-sm-1 col-1">
                    <button class="btn my-2" id="menu-btn"><i class="fas fa-bars"></i></button>
                 </div>

                
                 <div class=" col-lg-3 col-md-3 col-sm-6 col-6  d-flex justify-content-center align-items-center">
                   @if(Auth::user())
                                    <span id="logged-in-state" class="me-5">



                                        <div class="dropdown  ">
                                            @if(Auth::user()->image == null)


                                            <div class="border border-dark rounded-circle p-2"id="dropdownMenuButton1" data-toggle="dropdown"  >
                                                <i class="fa-solid fa-user-tie fa-2xl"></i>
                                            </div>
                                            @else
                                            <img src="{{ asset('uploads/customer/'.Auth::user()->image) }}" class="rounded-circle header-profile-img" alt="..." id="dropdownMenuButton1" data-toggle="dropdown" aria-expanded="false">
                                            @endif
                                        </div>
                                    </span>
                                    @else
                                    <button class=" border border-dark   custom-hover-1  p-1 me-5   login-register-btn"
                                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop"
                                        id="login-signup-btn">
                                        Login/Sign up
                                    </button>
                                    @endif




                 </div>



             </div>
         </div>

     </header>
     <!-- offcanvas body -->
     <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
         <div class="offcanvas-header justify-content-end">

             <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
         </div>
         <div class="offcanvas-body">
             <div class="d-flex justify-content-around">
                 <p class="fs-1 offcanvas-item">
                     <a href="">Customer Login
                         <i class="fa-solid fa-right-long"></i>
                     </a>

                 </p>
                 <p class="fs-1 offcanvas-item">
                     <a href="">Shop Login
                         <i class="fa-solid fa-right-long"></i>
                     </a>
                 </p>
             </div>
         </div>
     </div>

 </main>
