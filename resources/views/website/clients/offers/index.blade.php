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
            padding-left: 10%;
            padding-right: 10%;
            margin-bottom: 50px;
        }

    </style>
    <!--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>-->
    
@include('website.clients.partials.header')
    <div class="container-small">
         
        <div class="card">
            <div class="container-fluid d-flex align-items-center">
                @include('website.partials.routes')
                <main class="col-lg-9">
                    <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">{{ __('welcome.menu.announce') }}</h1>
                    </div>
                    <div class="job_container">
                        <div class="container">
                            <div class="row job_main">
                                <!---Side menu  -->

                                <!---/ Side menu -->
                                <div class=" job_main_right">
                                    <div class="row job_section">
                                        <div class="col-sm-12">
                                            <div class="jm_headings">
                                                <h6>{{ __('welcome.form.textannonces') }}</h6>
                                            </div>
                                            @include('website.inc.messages')
                                            
                                              
                                              
                                            <div class="table-cont">
                                                <table class="table table table-striped table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">{{ __('welcome.form.title') }}</th>
                                                            <th class="text-center">{{ __('welcome.form.opinion') }}
                                                            </th>
                                                            <th class="text-center">{{ __('welcome.form.status') }}
                                                            </th>
                                                            <!--<th class="text-center">{{ __('welcome.form.numberof') }}-->
                                                            <!--</th>-->
                                                            <th class="text-center">{{ __('welcome.form.datebegin') }}
                                                            </th>
                                                            <th class="text-center">{{ __('welcome.form.datefin') }}
                                                            </th>
                                                            <th class="text-center">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($offers as $offer)
                                                            <tr>
                                                                <td class="text-center">
                                                                    <h6>{{ $offer->title_offer }}</h6>

                                                                </td>
                                                                <td class="text-center">
                                                                    @if ($offer->status)
                                                                        <label
                                                                            class="text-success">{{ __('welcome.form.published') }}</label>
                                                                    @else
                                                                        <label
                                                                            class="text-danger">{{ __('welcome.form.pending') }}</label>
                                                                    @endif
                                                                </td>
                                                                <td class="text-center">
                                                                    @if ($offer->is_active)
                                                                        <label
                                                                            class="text-success">{{ __('welcome.form.active') }}</label>
                                                                    @else
                                                                        <label
                                                                            class="text-danger">{{ __('welcome.form.inactive') }}</label>
                                                                    @endif
                                                                </td>
                                                                <!--<td class="text-center">-->
                                                                <!--    {{ $offer->vacancies }}-->
                                                                <!--</td>-->
                                                                <td class="text-center">
                                                                    {{ Carbon\Carbon::parse($offer->start_date)->format('d/m/Y') }}
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $offer->end_date ? Carbon\Carbon::parse($offer->end_date)->format('d/m/Y') : 'N/A' }}
                                                                </td>
                                                                <td class="text-center">
                                                                    <div class="">
                                                                        <a
                                                                            href="{{ URL::route('client.offers.show', Crypt::encrypt($offer->id)) }}">
                                                                            <i class="fa fa-eye text-primary"></i></a>
                                                                        <style>

                                                                        </style>
                                                                        @if ($offer->is_active == 0)
                                                                            <a
                                                                                href="{{ URL::route('client.offers.edit', Crypt::encrypt($offer->id)) }}"><i
                                                                                    class="fa fa-edit text-success"></i>
                                                                            </a>
                                                                            
                                                                            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal{{$offer->id}}">
                                                                                <i class="fa fa-trash text-danger" type="submit"></i></button>
                                                                              </button>
                                                                              <!-- Modal -->
                                              <div class="modal fade" id="exampleModal{{$offer->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Delete an ad</h5>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                      Are you sure to delete the ad {{ $offer->title_offer }}?
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                         <form action="{{ route('client.offers.destroy', ['offer' => Crypt::encrypt($offer->id)]) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Yes</button>
                                                        </form>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                                                                    
                                                                        @endif
                                                                        
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
    
   

    @include('website.partials.footer')
    
     <script>
       function deleteConfirmation(id) {
            swal({
                title: 'Supprimer',
                text: 'Etes-vous sûr de vouloir supprimer cette annonce ?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Oui',
                cancelButtonText: 'Non',
                closeOnConfirm: true,
            }, function() {
                $.ajax({
                    type: 'DELETE',
                    url: "{{ url('deleteoffers') }}/" + id,
                    dataType: "json",
                    success: function(data) {
                        if (data.success === true) {
                            swal("Supprimer!", data.message, "success");
                            location.reload();
                        } else {
                            swal("Erreur!", data.message, "error");
                        }
                    }
                });
            });
        }
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
