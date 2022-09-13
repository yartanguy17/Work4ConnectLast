<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Work4connect</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    @include('website.partials.header')

    <!-- Bootstrap core CSS -->

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

    </style>


    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
</head>

<body class="bg-light">
    <style>
       .container-small{
            padding-left: 20%;
            padding-right: 20%;
            margin-bottom: 50px;
        }

    </style>
    @include('website.clients.partials.header')
    <div class="container-small">
          <div class="row">
               @include("website.partials.routes")
                      <div class="card col-lg-8">
           
            <div class="container-fluid d-flex align-items-center">
                <main class="col-lg-12">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">{{ __('welcome.menu.announce_create') }}</h1>
                    </div>
                    <div>
                        <div>
                            <div class="row job_main">
                                <!---/ Side menu -->
                                <div class=" job_main_right">
                                    <div class="row job_section">
                                        <div class="col-sm-12">

                                            <div class="section-divider">
                                            </div>
                                            @include('website.inc.messages')
                                            <form action="{{ route('client.offers.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="big_form_group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <label> {{ __('welcome.form.title') }} <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" value="{{ old('title_offer') }}" name="title_offer">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <label class="form-label">{{ __('welcome.menu.country') }}
                                                                    <span class="text-danger">*</span></label>
                                                                <select class="form-control select" name="country">
                                                                    <option value="">{{ __('welcome.form.selectCity') }}
                                                                    </option>
                                                                    @foreach ($countries as $country)
                                                                    <option value="{{ $country }}"  {{ old('country') == $country ? 'selected' : '' }}>
                                                                        {{ $country }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="big_form_group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <label>{{ __('welcome.menu.cities') }} <span class="text-danger">*</span> </label>
                                                                <input type="text" class="form-control" placeholder="" name="city" min="0" value="{{ old('city') }}">
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>{{ __('welcome.menu.area') }}<span class="text-danger">*</span></label>
                                                                <select class="form-control select" name="secteur_activite_id" id="ddlViewBy">
                                                                    <option value="">{{ __('welcome.form.selectArea') }}
                                                                    </option>
                                                                    @foreach ($secteurs as $item)
                                                                    <option value="{{ $item->id }}" {{ old('secteur_activite_id') == $item->id ? 'selected' : '' }}>
                                                                        {{ $item->title_secteur }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>{{ __('welcome.form.salary') }} (€)</label>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <input type="number" class="form-control" placeholder="" value="{{ old('expected_salary_min') }}" name="expected_salary_min" min="0" oninput="validity.valid||(value='');">
                                                                        <span style="color:red;">salary min</span>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="number" class="form-control" placeholder="" value="{{ old('expected_salary_max') }}" name="expected_salary_max" min="0" oninput="validity.valid||(value='');">
                                                                        <span style="color:red;">salary max</span>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <label>{{ __('welcome.form.weburl') }}</label>
                                                                <input type="text" class="form-control" placeholder="" value="{{ old('web_site') }}" name="web_site" min="0" oninput="validity.valid||(value='');" id="url">
                                                                 <span style="color:red;">https://www.xxxx.yyy</span>
                                                            </div>
                                                             <small class="text-danger" id="msg"></small>
                                                        <small class="text-success" id="msg3"></small>
                                                        </div>
                                                       
                                                 
                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <label>{{ __('welcome.form.datebegin') }}<span class="text-danger">*</span></label>
                                                                <input type="date" class="form-control" placeholder="" name="start_date" id="start_date" required value="{{ old('start_date') ?? date('Y-m-d', strtotime('+' . $date . ' days')) }}" required>

                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        
                                                   
                                                        

                                                      <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <label>{{ __('welcome.form.logo') }} (PNG / JPEG)</label>
                                                                <input type="file" class="form-control" placeholder="" value="{{ old('logo') }}" name="photo" min="0" oninput="validity.valid||(value='');">
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="big_form_group">
                                                    <div class="row">




                                                <div class="col-md-12">
                                                    <div class="form-group ">
                                                        <label>{{ __('welcome.form.description') }} </label>
                                                        <textarea class="form-control" name="description_offer">{{ old('description_offer') }}</textarea>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                                <div class="col-md-12">
                                                 <div class="form-group">
                                            <button type="submit" class="btn btn-danger col-md-12" id="create_btn" >{{ __('welcome.form.add') }}</button>
                                    </div>
                                                </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
          </div>

    </div>
    @include('website.partials.footer')
    
     <script>
     
                                        msg = document.getElementById("msg");
                                     
                                        msg3 = document.getElementById("msg3");

                                        pwd = document.getElementById("url");
                                        
                                        
                                        // pwd.addEventListener("click",()=>{
                                            
                                        //     document.getElementById("create_btn").disabled = true;
                                        //      var val =pwd.value;
                                        //      var res = val.match(/https:\/\/?[(www\.)]?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g);
                                             
                                        //           if(res)
                                        //         {
                                        //             msg3.innerHTML = "Good";
                                        //             msg.innerHTML = "";
                                        //             document.getElementById("create_btn").disabled = false;

                                        //       } else {
                                        //         msg.innerHTML = "Enter the url starting by https://"
                                        //         msg3.innerHTML = ""
                                        //          document.getElementById("create_btn").disabled = true;
                                        //         }
                                            
                                        // })
                                            
                                        
                                        pwd.addEventListener("input", ()=>{
                                        
                                        
                                        let url;
                                        var val =pwd.value;
                                        var res = val.match(/https:\/\/?[(www\.)]?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g);
                                         
                                        if(res){
                                                msg3.innerHTML = "Good";
                                                msg.innerHTML = "";
                                                 document.getElementById("create_btn").disabled = false;

                                            } else {
                                                msg.innerHTML = "Enter the url starting by https://"
                                                msg3.innerHTML = ""
                                                 document.getElementById("create_btn").disabled = true;
                                            }
                                   
                                        })
                                       
                                    </script>
                                    <script>
                                        
                                             
                                             var start_date = getElementById("start_date").val();
                                             
                                             console.log("start",start_date);
                                             
                                        
                                    </script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
    </script>
    <script src="dashboard.js"></script>
    
                                   
   
</body>

</html>
