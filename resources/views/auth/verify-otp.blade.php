<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/x-icon" href="{{asset('Frontend/assets/img/header/favicon_io/android-chrome-192x192.png')}}">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300&family=Manrope:wght@300&display=swap" rel="stylesheet">

    <link rel="icon" type="image/x-icon" href="{{asset('Frontend/assets/img/header/TOLETX-LOGO-2.ai')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--Custom CSS for header  -->

    <link rel="stylesheet" href="{{asset('Frontend/assets/css/icon.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/assets/css/dark.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/assets/css/lite.css')}}">

    <link rel="stylesheet" href="{{asset('Frontend/assets/css/responsive.css')}}">
    <!-- jQuery CDN -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
        // Render blocking JS:
        if (localStorage.theme) document.documentElement.setAttribute("data-theme", localStorage.theme);
    </script>

    <title>ToletX</title>
</head>

<body>
    @include('frontend.include.header')

    <section class="mt-3">
        <div class="container center-container">
            <div class="row row1 ">

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">{{ __('Login') }}</div>


                                <div class="card-body otp_card_body">
                                    <form class="row" method="POST" action="{{ route('login.Otp') }}">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>

                                            <div class="col-md-6">
                                                <input id="phone" type="number" value="{{request('phone')}}" class="form-control" name="phone"  required autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group row otp">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">OTP</label>

                                            <div class="col-md-6">

                                                <input id="otp" type="number" class="form-control" name="otp">
                                            </div>
                                        </div>
                                        <div class="form-group row send-otp">
                                            <div class="col-md-6 offset-md-4">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <button class="verify btn btn-primary" type="submit">Verify OTP</button>
                                                    @include('auth.time_counter')
                                                </div>
                                            </div>

                                        </div>
                                    </form>

                                    <form method="POST" action="{{ route('send.otp') }}">
                                        @csrf

                                        <input id="phone" type="hidden" value="{{request('phone')}}" name="phone" required autofocus>
                                        <div class="form-group row send-otp">
                                            <div class="col-md-6 offset-md-4 text-center">
                                                <a href=""><button class="text-white" type="submit">Didn't get otp ?? click here</button></a>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br><br>
    @include('frontend.include.footer')
</body>

</html>
