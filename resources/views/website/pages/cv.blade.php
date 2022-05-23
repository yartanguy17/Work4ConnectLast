<!DOCTYPE html>
<html lang='en'>


<!-- account 07:01:11 GMT -->
@include('website.partials.header')
<link href='//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css' rel='stylesheet' />
<script src='//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js'></script>
<body>
    <div class='boxed_wrapper'>
        <div class='preloader'></div>

        @include('website.partials.menu')
        <!--End Main Header-->
        <!--Start login register area-->
        <section class='login-register-area cv-container'>
            <div class='container'>
                    <h2>{{ __('cv.data.personalize') }}</h2>

                    <br/>
                    <div class='row'>
                        <div class='col overflow'>
                            <ul class='list-group'>
                                <li class='list-group-item d-flex justify-content-between align-items-center'>
                                    <h5>{{ __('cv.data.details') }}</h5>

                                    <span class='badge badge-pill'><button class='btn btn-danger' type='button' data-toggle='collapse' data-target='#collapseExample' aria-expanded='false' aria-controls='collapseExample'>+</button></span>
                                </li>
                                <!--Details personnels-->
                                <div class='collapse ' id='collapseExample'>
                                    <br/>
                                    <div class='card'>
                                        <div class='card-body'>
                                            <div id='elts'>
                                                <div class='row'>
                                                    <label for=''>{{ __('cv.data.photo_id') }}</label>
                                                <div class='input-group mb-3'>
                                                    <div class='custom-file'>
                                                      <input type='file' class='custom-file-input' id='inputGroupFile04'>
                                                      <label class='custom-file-label' for='inputGroupFile04'></label>
                                                    </div>

                                                  </div>
                                                  </div>
                                                <div class='row'>
                                                    <div class='col'>
                                                        <label for=''>{{ __('cv.data.surname') }}</label>
                                                        <div class='input-group mb-3'>
                                                            <input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'>
                                                        </div>
                                                    </div>
                                                    <div class='col'>

                                                        <label for=''>{{ __('cv.data.first_name') }}</label>
                                                        <div class='input-group mb-3'>
                                                            <input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class='row'>
                                                    <div class='col'>
                                                        <label for=''>{{ __('cv.data.email_address') }}</label>
                                                        <div class='input-group mb-3'>
                                                            <input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class='row'>
                                                    <div class='col'>
                                                        <label for=''>{{ __('cv.data.profile_title') }}</label>
                                                        <div class='input-group mb-3'>
                                                            <input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class='row'>
                                                    <div class='col'>
                                                        <label for=''>{{ __('cv.data.phone_number') }}</label>
                                                        <div class='input-group mb-3'>
                                                            <input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class='row'>
                                                    <div class='col'>
                                                        <label for=''>{{ __('cv.data.address') }}</label>
                                                        <div class='input-group mb-3'>
                                                            <input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class='row'>
                                                    <div class='col'>
                                                        <label for=''>{{ __('cv.data.country') }}</label>
                                                        <select class='custom-select mb-3' id='inputGroupSelect01'>
                                                            <option selected>{{ __('cv.data.country') }}</option>
                                                            <option value='1'>Togo</option>
                                                            <option value='2'>France</option>
                                                        </select>
                                                    </div>
                                                    <div class='col'>

                                                        <label for=''>{{ __('cv.data.city') }}</label>
                                                        <div class='input-group mb-3'>
                                                            <input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='row' id='myLast' style='display: none;'>
                                                    <div class='col'>
                                                        <label for=''>{{ __('cv.data.date_of_birth') }}</label>
                                                        <div class='input-group mb-3'>
                                                            <input type='date' class='form-control' aria-label='Username' aria-describedby='basic-addon1'>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='row' id='myNais' style='display: none;'>
                                                    <div class='col'>
                                                        <label for=''>{{ __('cv.data.place_birth')}}</label>
                                                        <div class='input-group mb-3'>
                                                            <input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='row' id='myNat' style='display: none;'>
                                                    <div class='col'>
                                                        <label for=''>{{ __('cv.data.nationality') }}</label>
                                                        <select class='custom-select mb-3' id='inputGroupSelect01'>
                                                            <option selected>{{ __('cv.data.nationality') }}</option>
                                                            <option value='1'>Lomé</option>
                                                            <option value='2'>Atakpamé</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class='row' id='mySiteInternet' style='display: none;'>
                                                    <div class='col'>
                                                        <label for=''>{{ __('cv.data.site_internet') }}</label>
                                                        <div class='input-group mb-3'>
                                                            <input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class='row' id='myLinkedin' style='display: none;'>
                                                    <div class='col'>
                                                        <label for=''>Linkedin</label>
                                                        <div class='input-group mb-3'>
                                                            <input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class='row' id='myPermis' style='display: none;'>
                                                    <div class='col'>
                                                        <label for=''>{{ __('cv.data.driving_license') }}</label>
                                                        <div class=''>
                                                        <div class='form-check'>

                                                            <input class='danger-color' type='radio' checked name='permis' />
                                                            <label class='form-check-label' for='flexRadioDefault1'>
                                                                {{ __('cv.data.oui') }}
                                                            </label>
                                                            <input class='danger-color ml-1' type='radio' name='permis'>
                                                            <label class='form-check-label ml-4' for='flexRadioDefault2'>
                                                                {{ __('cv.data.non') }}
                                                            </label>
                                                          </div>
                                                          <div class='form-check'>

                                                          </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class='row' id='mySexe' style='display: none; padding-left: 5px;'>
                                                    <div >
                                                        <label for=''>{{ __('cv.data.sex') }}</label>
                                                        <div class='row'>
                                                        <div class='form-check col'>
                                                            <input class='form-check-input' type='radio' checked name='sex'>
                                                            <label class='form-check-label'>
                                                                {{ __('cv.data.male') }}
                                                            </label>
                                                          </div>
                                                          <div class='form-check col'>
                                                            <input class='form-check-input' type='radio' name='sex'>
                                                            <label class='form-check-label'>
                                                                {{ __('cv.data.female') }}
                                                            </label>
                                                          </div>
                                                          <div class='form-check col'>
                                                            <input class='form-check-input' type='radio' name='sex'>
                                                            <label class='form-check-label'>
                                                                {{ __('cv.data.not_define') }}
                                                            </label>
                                                          </div>
                                                          </div>
                                                    </div>
                                                </div>

                                                <div class='row' id='myState' style='display: none; padding-left: 5px;'>
                                                    <div class='col'>
                                                        <label for=''>{{ __('cv.data.marital_status') }}</label>
                                                        <div class='row'>
                                                        <div class='form-check col'>
                                                            <input class='form-check-input' type='radio' name='flexRadioDefault' checked>
                                                            <label class='form-check-label' for='flexRadioDefault1'>
                                                                {{ __('cv.data.celib') }}
                                                            </label>
                                                          </div>
                                                          <div class='form-check col'>
                                                            <input class='form-check-input' type='radio' name='flexRadioDefault' >
                                                            <label class='form-check-label' for='flexRadioDefault2'>
                                                                {{ __('cv.data.mary') }}
                                                            </label>
                                                          </div>
                                                          <div class='form-check col'>
                                                            <input class='form-check-input' type='radio' name='flexRadioDefault' >
                                                            <label class='form-check-label' for='flexRadioDefault2'>
                                                                {{ __('cv.data.divorce') }}
                                                            </label>
                                                          </div>
                                                          <div class='form-check col'>
                                                            <input class='form-check-input' type='radio' name='flexRadioDefault'>
                                                            <label class='form-check-label' for='flexRadioDefault2'>
                                                                {{ __('cv.data.veuf') }}
                                                            </label>
                                                          </div>
                                                          <div class='form-check col'>
                                                            <input class='form-check-input' type='radio' name='flexRadioDefault'>
                                                            <label class='form-check-label' for='flexRadioDefault2'>
                                                                {{ __('cv.data.veuve') }}
                                                            </label>
                                                          </div>
                                                        </div>
                                                        <style>
                                                            input[type='radio']:after {
                                                                background-color: white;
                                                            }
                                                            input[type='radio']:checked:after {
                                                                background-color: red
                                                            }
                                                        </style>
                                                    </div>
                                                </div>
                                                </div>
                                            <div class='d-flex flex-row'>
                                                <div class='mr-3' id='buttonJ'>
                                                    <button class='btn btn-danger' onclick='desappear(this)'  id='myButton'> + {{ __('cv.data.date_of_birth') }}</button>
                                                </div>
                                                <script>
                                                    function desappear(){
                                                        var x
                                                        var element = document.getElementById('buttonJ');
                                                        element.remove();
                                                        var x = document.getElementById('myLast');
                                                        x.style.display = 'block';
                                                    }
                                                    function lieu_desappear(){
                                                        var x
                                                        var element = document.getElementById('buttonL');
                                                        element.remove();
                                                        var x = document.getElementById('myNais');
                                                        x.style.display = 'block';
                                                    }
                                                    function permis_desappear(){
                                                        var x
                                                        var element = document.getElementById('buttonP');
                                                        element.remove();
                                                        var x = document.getElementById('myPermis');
                                                        x.style.display = 'block';
                                                    }
                                                    function sexe_desappear(){
                                                        var x
                                                        var element = document.getElementById('buttonS');
                                                        element.remove();
                                                        var x = document.getElementById('mySexe');
                                                        x.style.display = 'block';
                                                    }

                                                    function nation_desappear(){
                                                        var x
                                                        var element = document.getElementById('buttonNat');
                                                        element.remove();
                                                        var x = document.getElementById('myNat');
                                                        x.style.display = 'block';
                                                    }

                                                    function state_desappear(){
                                                        var x
                                                        var element = document.getElementById('buttonState');
                                                        element.remove();
                                                        var x = document.getElementById('myState');
                                                        x.style.display = 'block';
                                                    }

                                                    function site_internet_desappear(){
                                                        var x
                                                        var element = document.getElementById('buttonSiteInternet');
                                                        element.remove();
                                                        var x = document.getElementById('mySiteInternet');
                                                        x.style.display = 'block';
                                                    }

                                                    function linkedin_desappear(){
                                                        var x
                                                        var element = document.getElementById('buttonLinkedin');
                                                        element.remove();
                                                        var x = document.getElementById('myLinkedin');
                                                        x.style.display = 'block';
                                                    }

                                                </script>
                                                <div class='mr-3' id='buttonL'>
                                                    <button class='btn btn-danger' onclick='lieu_desappear(this)' id='date_birth' id='myButton'> + {{ __('cv.data.place_birth') }}</button>
                                                </div>
                                                <div class='mr-3' id='buttonP'>
                                                    <button class='btn btn-danger' onclick='permis_desappear(this)' id='date_birth' id='myButton'> + {{ __('cv.data.driving_license') }}</button>
                                                </div>
                                                <div class='mr-3' id='buttonS'>
                                                    <button class='btn btn-danger' onclick='sexe_desappear(this)' id='date_birth' id='myButton'> + {{ __('cv.data.sex') }}</button>
                                                </div>



                                            </div>
                                            <br/>
                                            <div class='d-flex flex-row'>
                                                <div class='mr-3' id='buttonNat'>
                                                    <button class='btn btn-danger' onclick='nation_desappear(this)' id='date_birth' id='myButton'> + {{ __('cv.data.nationality') }}</button>
                                                </div>
                                                <div class='mr-3' id='buttonState'>
                                                    <button class='btn btn-danger' onclick='state_desappear(this)' id='date_birth' id='myButton'> + {{ __('cv.data.marital_status') }}</button>
                                                </div>

                                                <div class='mr-3' id='buttonSiteInternet'>
                                                    <button class='btn btn-danger' onclick='site_internet_desappear(this)' id='date_birth' id='myButton'> + {{ __('cv.data.site_internet') }}</button>
                                                </div>
                                                <div class='mr-3' id='buttonLinkedin'>
                                                    <button class='btn btn-danger' onclick='linkedin_desappear(this)' id='date_birth' id='myButton'> + Linkedin</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <br/>
                                </div>

                                <li class='list-group-item d-flex justify-content-between align-items-center'>
                                    <h5>{{ __('cv.data.profil') }}</h5>
                                    <span class='badge badge-pill'><button class='btn btn-danger' type='button' data-toggle='collapse' data-target='#collapse2' aria-expanded='false' aria-controls='collapseExample'>+</button></span>
                                </li>

                                <div class='collapse' id='collapse2'>
                                    <br/>
                                    <div class='card'>
                                        <div class='card-body'>
                                            <div class='form-group'>
                                                <label for='exampleFormControlTextarea1'>Description</label>
                                                <textarea class='form-control' id='exampleFormControlTextarea1' rows='3'></textarea>
                                              </div>
                                        </div>
                                    </div>
                                    <br/>
                                </div>

                                <li class='list-group-item d-flex justify-content-between align-items-center'>
                                    <h5>{{ __('cv.data.training') }}</h5>
                                    <div id='example'></div>
                                    <span class='badge badge-pill'><button class='btn btn-danger' type='button' data-toggle='collapse' data-target='#collapse3' aria-expanded='false' aria-controls='collapseExample'>+</button></span>
                                </li>

                                <div class='collapse' id='collapse3'>
                                    <br/>
                                    <div class='card' id='card_training'>
                                        <div class='card-body'>
                                            <br/>
                                            <div class='row'>
                                                <div class='col'>
                                                    <label>{{ __('cv.data.training') }}</label>
                                                    <div class='input-group mb-3'>
                                                        <input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'>
                                                    </div>
                                                </div>
                                                <div class='col'>
                                                    <label for=''>{{ __('cv.data.etab') }}</label>
                                                    <div class='input-group mb-3'>
                                                        <input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'>
                                                    </div>
                                                </div><div class='col'>

                                                    <label for=''>{{ __('cv.data.city') }}</label>
                                                    <div class='input-group mb-3'>
                                                        <input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class='row'>
                                                <div class='col'>
                                                    <label for=''>{{ __('cv.data.start_date') }}</label>
                                                    <div class='row'>
                                                        <div class='col'>
                                                            <select class='custom-select' id='inputGroupSelect01'>
                                                                <option selected>{{ __('cv.data.month') }}</option>
                                                                <option value='1'>Janvier</option>
                                                                <option value='2'>Février</option>
                                                                <option value='3'>Mars</option>
                                                                <option value='3'>Avril</option>
                                                                <option value='3'>Mai</option>
                                                                <option value='3'>Juin</option>
                                                                <option value='3'>Juillet</option>
                                                                <option value='3'>Aôut</option>
                                                                <option value='3'>Septembre</option>
                                                                <option value='3'>Octobre</option>
                                                                <option value='3'>Novembre</option>
                                                                <option value='3'>Décembre</option>
                                                              </select>
                                                        </div>
                                                        <div class='col'>
                                                            <select class='custom-select' id='inputGroupSelect01'>
                                                                <option selected>{{ __('cv.data.year') }}</option>
                                                                @for ($i=2000; $i<=now()->year; $i++)
                                                                    <option value='1'>{{ $i }}</option>
                                                                @endfor

                                                              </select>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class='col'>

                                                    <label for=''>{{ __('cv.data.end_date') }}</label>
                                                    <div class='row mb-3'>
                                                        <div class='col'>
                                                            <select class='custom-select' id='inputGroupSelect01'>
                                                                <option selected>{{ __('cv.data.month') }}</option>
                                                                <option value='1'>Janvier</option>
                                                                <option value='2'>Février</option>
                                                                <option value='3'>Mars</option>
                                                                <option value='3'>Avril</option>
                                                                <option value='3'>Mai</option>
                                                                <option value='3'>Juin</option>
                                                                <option value='3'>Juillet</option>
                                                                <option value='3'>Aôut</option>
                                                                <option value='3'>Septembre</option>
                                                                <option value='3'>Octobre</option>
                                                                <option value='3'>Novembre</option>
                                                                <option value='3'>Décembre</option>
                                                              </select>
                                                        </div>
                                                        <div class='col'>
                                                            <select class='custom-select' id='inputGroupSelect01'>
                                                                <option selected>{{ __('cv.data.year') }}</option>
                                                                @for ($i=2000; $i<=now()->year; $i++)
                                                                    <option value='1'>{{ $i }}</option>
                                                                @endfor
                                                              </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='row'>
                                                <div class='col'>
                                                    <div class='form-group mb-3'>
                                                        <label for='exampleFormControlTextarea1'>Description</label>
                                                        <textarea class='form-control' id='exampleFormControlTextarea1' rows='3'></textarea>
                                                      </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='d-flex justify-content-end mb-3 mr-3'>
                                            <div class='row'>
                                                <script>
                                                    function remove_training(){
                                                        var elem = document.getElementById("card_training");
                                                        elem.parentNode.removeChild(elem);
                                                    }

                                                </script>
                                                <div class='col-lg-3'><button class='btn btn-danger' onclick="remove_training()"><i class='fa fa-trash'></i></button></div>
                                            </div>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class='d-flex justify-content-center'>
                                        <div class='mb-3'>
                                            <button class='btn btn-danger' onclick='add_training()'> {{ __('cv.data.add_training') }}</button>
                                            <script>
                                                card_training = document.getElementById('card_training')
                                                function add_training(){

                                                    card_training.insertAdjacentHTML('afterend',
                                                       "<div class='card' id='card_training'><div class='card-body'><br/><div class='row'><div class='col'><label>{{ __('cv.data.training') }}</label><div class='input-group mb-3'><input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'></div></div><div class='col'><label for=''>{{ __('cv.data.etab') }}</label><div class='input-group mb-3'><input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'></div></div><div class='col'><label for=''>{{ __('cv.data.city') }}</label><div class='input-group mb-3'><input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'></div></div></div><div class='row'><div class='col'> <label for=''>{{ __('cv.data.start_date') }}</label><div class='row'><div class='col'> <select class='custom-select' id='inputGroupSelect01'><option selected>{{ __('cv.data.month') }}</option><option value='1'>Janvier</option></select></div><div class='col'> <select class='custom-select' id='inputGroupSelect01'><option selected>{{ __('cv.data.year') }}</option>@for ($i=2000; $i<=now()->year; $i++) <option value='1'>{{ $i }}</option> @endfor </select></div></div></div><div class='col'> <label for=''>{{ __('cv.data.end_date') }}</label><div class='row mb-3'> <div class='col'> <select class='custom-select' id='inputGroupSelect01'><option selected>{{ __('cv.data.month') }}</option><option value='1'>Janvier</option> <option value='2'>Février</option></select></div><div class='col'><select class='custom-select' id='inputGroupSelect01'><option selected>{{ __('cv.data.year') }}</option>@for ($i=2000; $i<=now()->year; $i++)<option value='1'>{{ $i }}</option>@endfor</select></div></div></div></div><div class='row'><div class='col'><div class='form-group mb-3'><label for='exampleFormControlTextarea1'>Description</label><textarea class='form-control' id='exampleFormControlTextarea1' rows='3'></textarea></div></div></div></div><div class='d-flex justify-content-end mb-3 mr-3'> <div class='row'><div class='col-lg-3'><button class='btn btn-danger' onclick='remove_training(this)'><i class='fa fa-trash'></i></button></div></div></div></div><br/>");
                                                }
                                            </script>
                                        </div>
                                    </div>

                                </div>



                                <li class='list-group-item d-flex justify-content-between align-items-center'>
                                    <h5>{{ __('cv.data.xp') }}</h5>
                                    <span class='badge badge-pill'><button class='btn btn-danger' type='button' data-toggle='collapse' data-target='#collapse4' aria-expanded='false' aria-controls='collapseExample'>+</button></span>
                                </li>

                                <div class='collapse' id='collapse4'>
                                    <br/>
                                    <p>{{ __('cv.data.add_others') }}</p>

                                    <div class='card' id='card_xp'>
                                        <div class='card-body'>
                                            <br/>
                                             <div class='row'>
                                                <div class='col'>
                                                    <label for=''>{{ __('cv.data.post') }}</label>
                                                    <div class='input-group mb-3'>
                                                        <input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='row'>
                                                <div class='col'>
                                                    <label for=''>{{ __('cv.data.emp') }}</label>
                                                    <div class='input-group mb-3'>
                                                        <input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'>
                                                    </div>
                                                </div>
                                                <div class='col'>

                                                    <label for=''>{{ __('cv.data.city') }}</label>
                                                    <div class='input-group mb-3'>
                                                        <input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='row'>
                                                <div class='col'>
                                                    <label for=''>{{ __('cv.data.start_date') }}</label>
                                                    <div class='row'>
                                                        <div class='col'>
                                                            <select class='custom-select' id='inputGroupSelect01'>
                                                                <option selected>{{ __('cv.data.month') }}</option>
                                                                <option value='1'>Janvier</option>
                                                                <option value='2'>Février</option>
                                                                <option value='3'>Mars</option>
                                                                <option value='3'>Avril</option>
                                                                <option value='3'>Mai</option>
                                                                <option value='3'>Juin</option>
                                                                <option value='3'>Juillet</option>
                                                                <option value='3'>Aôut</option>
                                                                <option value='3'>Septembre</option>
                                                                <option value='3'>Octobre</option>
                                                                <option value='3'>Novembre</option>
                                                                <option value='3'>Décembre</option>
                                                              </select>
                                                        </div>
                                                        <div class='col'>
                                                            <select class='custom-select' id='inputGroupSelect01'>
                                                                <option selected>{{ __('cv.data.year') }}</option>
                                                                @for ($i=2000; $i<=now()->year; $i++)
                                                                    <option value='1'>{{ $i }}</option>
                                                                @endfor
                                                              </select>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class='col'>

                                                    <label for=''>{{ __('cv.data.end_date') }}</label>
                                                    <div class='row mb-3'>
                                                        <div class='col'>
                                                            <select class='custom-select' id='inputGroupSelect01'>
                                                                <option selected>{{ __('cv.data.month') }}</option>
                                                                <option value='1'>Janvier</option>
                                                                <option value='2'>Février</option>
                                                                <option value='3'>Mars</option>
                                                                <option value='3'>Avril</option>
                                                                <option value='3'>Mai</option>
                                                                <option value='3'>Juin</option>
                                                                <option value='3'>Juillet</option>
                                                                <option value='3'>Aôut</option>
                                                                <option value='3'>Septembre</option>
                                                                <option value='3'>Octobre</option>
                                                                <option value='3'>Novembre</option>
                                                                <option value='3'>Décembre</option>
                                                              </select>
                                                        </div>
                                                        <div class='col'>
                                                            <select class='custom-select' id='inputGroupSelect01'>
                                                                <option selected>{{ __('cv.data.year') }}</option>
                                                                @for ($i=2000; $i<=now()->year; $i++)
                                                                    <option value='1'>{{ $i }}</option>
                                                                @endfor
                                                              </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='row'>
                                                <div class='col'>
                                                    <div class='form-group mb-3'>
                                                        <label for='exampleFormControlTextarea1'>Description</label>
                                                        <textarea class='form-control' id='exampleFormControlTextarea1' rows='3'></textarea>
                                                      </div>
                                                </div>
                                            </div>
                                            <script>
                                                function trash(){
                                                    var elem = document.getElementById("card_xp");
                                                    elem.parentNode.removeChild(elem);
                                                }

                                            </script>
                                            <div class='d-flex justify-content-end mb-3'>
                                                <div class='row'>
                                                    <div class='col-lg-3'><button class='btn btn-danger' onclick="trash()"><i class='fa fa-trash'></i></button></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <br>
                                    <div class='text-center'>
                                        <div class='mr-3'>
                                            <button class='btn btn-danger' onclick='add_card_xp()' > + {{ __('cv.data.add_exp') }}</button>
                                            <script>
                                                var card_xp = document.getElementById("card_xp");
                                                function add_card_xp(){
                                                    card_xp.insertAdjacentHTML('afterend',
                                                    "<div class='card'> <div class='card-body'><br/><div class='row'><div class='col'><label for=''>{{ __('cv.data.post') }}</label><div class='input-group mb-3'><input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'></div></div></div><div class='row'><div class='col'><label for=''>{{ __('cv.data.emp') }}</label><div class='input-group mb-3'><input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'></div> </div><div class='col'><label for=''>{{ __('cv.data.city') }}</label> <div class='input-group mb-3'><input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'></div></div></div><div class='row'><div class='col'> <label for=''>{{ __('cv.data.start_date') }}</label> <div class='row'><div class='col'><select class='custom-select' id='inputGroupSelect01'><option selected>{{ __('cv.data.month') }}</option><option value='1'>Janvier</option> <option value='2'>Février</option><option value='3'>Mars</option></select> </div><div class='col'><select class='custom-select' id='inputGroupSelect01'><option selected>{{ __('cv.data.year') }}</option> @for ($i=2000; $i<=now()->year; $i++)<option value='1'>{{ $i }}</option>@endfor</select> </div></div></div><div class='col'><label for=''>{{ __('cv.data.end_date') }}</label><div class='row mb-3'> <div class='col'><select class='custom-select' id='inputGroupSelect01'><option selected>{{ __('cv.data.month') }}</option><option value='1'>Janvier</option><option value='2'>Février</option><option value='3'>Mars</option></select> </div> <div class='col'> <select class='custom-select' id='inputGroupSelect01'><option selected>{{ __('cv.data.year') }}</option>@for ($i=2000; $i<=now()->year; $i++)<option value='1'>{{ $i }}</option>@endfor </select></div> </div> </div></div><div class='row'><div class='col'><div class='form-group mb-3'> <label for='exampleFormControlTextarea1'>Description</label><textarea class='form-control' id='exampleFormControlTextarea1' rows='3'></textarea></div></div> </div><div class='d-flex justify-content-end mb-3'><div class='row'><div class='col-lg-3'><button class='btn btn-danger'><i class='fa fa-trash' onclick='trash()'></i></button></div></div></div></div></div></div></div><br/>");
                                                }
                                                </script>

                                        </div>
                                    </div>
                                    <br>

                                </div>

                                <li class='list-group-item d-flex justify-content-between align-items-center'>
                                    <h5>{{ __('cv.data.competence') }}</h5>
                                    <span class='badge badge-pill'><button class='btn btn-danger' type='button' data-toggle='collapse' data-target='#collapse5' aria-expanded='false' aria-controls='collapseExample'>+</button></span>
                                </li>

                                <div class='collapse' id='collapse5'>
                                    <br/>
                                    <div class='card' id="card_comp">
                                        <div class='card-body'>
                                            <label for=''>{{ __('cv.data.competence') }}</label>
                                            <div class='input-group mb-3'>
                                                <input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'>
                                            </div>
                                            <select class='custom-select mb-3' id='inputGroupSelect01'>
                                                <option selected>{{ __('cv.data.make_choice') }}</option>
                                                <option value='1'>{{ __('cv.data.debutant') }}</option>
                                                <option value='2'>{{ __('cv.data.intermediaire') }}</option>
                                                <option value='2'>{{ __('cv.data.bien') }}</option>
                                                <option value='3'>{{ __('cv.data.tres_bien') }}</option>
                                                <option value=''>Excellent</option>
                                              </select>
                                        </div>
                                        <div class='d-flex justify-content-end mb-3'>
                                            <div class='row'>
                                                <script>
                                                    function trash_comp(){
                                                        var elem = document.getElementById("card_comp");
                                                        elem.parentNode.removeChild(elem);
                                                    }

                                                </script>
                                                <div class='col-lg-3'><button class='btn btn-danger' onclick="trash_comp()"><i class='fa fa-trash' ></i></button></div>
                                            </div>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class='text-center'>
                                        <div class='mb-3'>
                                            <button class='btn btn-danger' onclick="add_card_comp()"> + {{ __('cv.data.add_cpt') }}</button>
                                            <script>
                                                var card_comp = document.getElementById("card_comp");
                                                function add_card_comp(){
                                                    card_comp.insertAdjacentHTML('afterend',
                                                    "<br/><div class='card'><div class='card-body'> <label for=''>{{ __('cv.data.competence') }}</label> <div class='input-group mb-3'><input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'></div><select class='custom-select mb-3' id='inputGroupSelect01'><option selected>{{ __('cv.data.make_choice') }}</option><option value='1'>{{ __('cv.data.debutant') }}</option><option value='2'>{{ __('cv.data.intermediaire') }}</option><option value='2'>{{ __('cv.data.bien') }}</option><option value='3'>{{ __('cv.data.tres_bien') }}</option><option value=''>Excellent</option></select></div><div class='d-flex justify-content-end mb-3'><div class='row'><div class='col-lg-3'><button class='btn btn-danger' onclick='trash_comp()'><i class='fa fa-trash' ></i></button></div></div></div></div>")
                                                }
                                            </script>
                                        </div>
                                    </div>
                                </div>

                                <li class='list-group-item d-flex justify-content-between align-items-center'>
                                    <h5>{{ __('cv.data.lang') }}</h5>
                                    <span class='badge badge-pill'><button class='btn btn-danger' type='button' data-toggle='collapse' data-target='#collapse6' aria-expanded='false' aria-controls='collapseExample'>+</button></span>
                                </li>

                                <div class='collapse' id='collapse6'>
                                    <br/>
                                    <div class='card' id="lang">
                                        <div class='card-body'>
                                            <label for=''>{{ __('cv.data.lang') }}</label>
                                            <div class='input-group mb-3'>
                                                <input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'>
                                            </div>
                                            <select class='custom-select mb-3' id='inputGroupSelect01'>
                                                <option selected>{{ __('cv.data.make_choice') }}</option>

                                                <option value='1'>{{ __('cv.data.debutant') }}</option>
                                                <option value='2'>{{ __('cv.data.intermediaire') }}</option>
                                                <option value='2'>{{ __('cv.data.bien') }}</option>
                                                <option value='3'>{{ __('cv.data.tres_bien') }}</option>
                                                <option value='3'>{{ __('cv.data.current') }}</option>
                                              </select>
                                        </div>
                                        <div class='d-flex justify-content-end mb-3'>
                                            <div class='row'>
                                                <div class='col-lg-3'><button class='btn btn-danger'><i class='fa fa-trash'></i></button></div>
                                            </div>
                                        </div>

                                    </div>
                                    <br/>
                                    <div class='text-center'>
                                        <div class='mb-3'>
                                            <button class='btn btn-danger' onclick="add_card_lang()"> + {{ __('cv.data.add_lang') }}</button>
                                            <script>
                                                var car_lang = document.getElementById("lang");
                                                function add_card_lang(){
                                                    car_lang.insertAdjacentHTML('afterend',
                                                    "<br/><div class='card'><div class='card-body'> <label for=''>{{ __('cv.data.lang') }}</label> <div class='input-group mb-3'><input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'></div><select class='custom-select mb-3' id='inputGroupSelect01'><option selected>{{ __('cv.data.make_choice') }}</option><option value='1'>{{ __('cv.data.debutant') }}</option><option value='2'>{{ __('cv.data.intermediaire') }}</option><option value='2'>{{ __('cv.data.bien') }}</option><option value='3'>{{ __('cv.data.tres_bien') }}</option><option value=''>{{ __('cv.data.current') }}</option></select></div><div class='d-flex justify-content-end mb-3'><div class='row'><div class='col-lg-3'><button class='btn btn-danger'><i class='fa fa-trash'></i></button></div></div></div></div>")
                                                }
                                            </script>
                                        </div>
                                    </div>
                                </div>

                                <li class='list-group-item d-flex justify-content-between align-items-center'>
                                    <h5>{{ __('cv.data.interest') }}</h5>
                                    <span class='badge badge-pill'><button class='btn btn-danger' type='button' data-toggle='collapse' data-target='#collapse7' aria-expanded='false' aria-controls='collapseExample'>+</button></span>
                                </li>

                                <div class='collapse' id='collapse7'>
                                    <br/>
                                    <div class='card' id="card_interest">
                                        <div class='card-body'>
                                            <label for=''>{{ __('cv.data.interest') }}</label>
                                            <div class='input-group mb-3'>
                                                <input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'>
                                            </div>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class='text-center'>
                                        <div class='mb-3'>
                                            <button class='btn btn-danger' onclick="add_card_interest()"> + {{ __('cv.data.add_int') }}</button>
                                            <script>
                                                var card_lang = document.getElementById("card_interest");
                                                function add_card_interest(){
                                                    card_lang.insertAdjacentHTML('afterend', "<br/><div class='card'><div class='card-body'><label for=''>{{ __('cv.data.interest') }}</label><div class='input-group mb-3'><input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'/> </div></div></div>")}
                                                    </script>
                                        </div>
                                    </div>
                                </div>

                                <li class='list-group-item d-flex justify-content-between align-items-center'>
                                    <h5>{{ __('cv.data.extra') }}</h5>
                                    <span class='badge badge-pill'><button class='btn btn-danger' type='button' data-toggle='collapse' data-target='#collapse4' aria-expanded='false' aria-controls='collapseExample'>+</button></span>
                                </li>

                                <div class='collapse' id='collapse4'>
                                    <br/>
                                    <div class='card'>
                                        <div class='card-body'>
                                            <br/>
                                             <div class='row'>
                                                <div class='col'>
                                                    <label for=''>{{ __('cv.data.post') }}</label>
                                                    <div class='input-group mb-3'>
                                                        <input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='row'>
                                                <div class='col'>
                                                    <label for=''>{{ __('cv.data.emp') }}</label>
                                                    <div class='input-group mb-3'>
                                                        <input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'>
                                                    </div>
                                                </div>
                                                <div class='col'>

                                                    <label for=''>{{ __('cv.data.city') }}</label>
                                                    <div class='input-group mb-3'>
                                                        <input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='row'>
                                                <div class='col'>
                                                    <label for=''>{{ __('cv.data.start_date') }}</label>
                                                    <div class='row'>
                                                        <div class='col'>
                                                            <select class='custom-select' id='inputGroupSelect01'>
                                                                <option selected>{{ __('cv.data.month') }}</option>
                                                                <option value='1'>Janvier</option>
                                                                <option value='2'>Février</option>
                                                                <option value='3'>Mars</option>
                                                                <option value='3'>Avril</option>
                                                                <option value='3'>Mai</option>
                                                                <option value='3'>Juin</option>
                                                                <option value='3'>Juillet</option>
                                                                <option value='3'>Aôut</option>
                                                                <option value='3'>Septembre</option>
                                                                <option value='3'>Octobre</option>
                                                                <option value='3'>Novembre</option>
                                                                <option value='3'>Décembre</option>
                                                              </select>
                                                        </div>
                                                        <div class='col'>
                                                            <select class='custom-select' id='inputGroupSelect01'>
                                                                <option selected>{{ __('cv.data.year') }}</option>
                                                                @for ($i=2000; $i<=now()->year; $i++)
                                                                    <option value='1'>{{ $i }}</option>
                                                                @endfor
                                                              </select>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class='col'>

                                                    <label for=''>{{ __('cv.data.end_date') }}</label>
                                                    <div class='row mb-3'>
                                                        <div class='col'>
                                                            <select class='custom-select' id='inputGroupSelect01'>
                                                                <option selected>{{ __('cv.data.month') }}</option>
                                                                <option value='1'>Janvier</option>
                                                                <option value='2'>Février</option>
                                                                <option value='3'>Mars</option>
                                                                <option value='3'>Avril</option>
                                                                <option value='3'>Mai</option>
                                                                <option value='3'>Juin</option>
                                                                <option value='3'>Juillet</option>
                                                                <option value='3'>Aôut</option>
                                                                <option value='3'>Septembre</option>
                                                                <option value='3'>Octobre</option>
                                                                <option value='3'>Novembre</option>
                                                                <option value='3'>Décembre</option>
                                                              </select>
                                                        </div>
                                                        <div class='col'>
                                                            <select class='custom-select' id='inputGroupSelect01'>
                                                                <option selected>{{ __('cv.data.year') }}</option>
                                                                @for ($i=2000; $i<=now()->year; $i++)
                                                                    <option value='1'>{{ $i }}</option>
                                                                @endfor
                                                              </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='row'>
                                                <div class='col'>
                                                    <div class='form-group mb-3'>
                                                        <label for='exampleFormControlTextarea1'>Description</label>
                                                        <textarea class='form-control' id='exampleFormControlTextarea1' rows='3'></textarea>
                                                      </div>
                                                </div>
                                            </div>
                                            <div class='d-flex justify-content-end mb-3'>
                                                <div class='row'>
                                                    <div class='col-lg-3'><button class='btn btn-danger'><i class='fa fa-trash'></i></button></div>
                                                    <div class='col-lg-9'><button class='btn btn-danger'><i class='fa fa-check'></i> {{ __('cv.data.end') }}</button></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <br>
                                    <div class='text-center'>
                                        <div class='mr-3'>
                                            <button class='btn btn-danger'> + {{ __('cv.data.add_exp') }}</button>
                                        </div>
                                    </div>
                                    <br/>
                                </div>

                                <li class='list-group-item d-flex justify-content-between align-items-center'>
                                    <h5>{{ __('cv.data.quality') }}</h5>
                                    <span class='badge badge-pill'><button class='btn btn-danger' type='button' data-toggle='collapse' data-target='#collapse8' aria-expanded='false' aria-controls='collapseExample'>+</button></span>
                                </li>

                                <div class='collapse' id='collapse8'>
                                    <br/>
                                    <div class='card' id="card_quality">
                                        <div class='card-body'>
                                            <label for=''>{{ __('cv.data.quality') }}</label>
                                            <div class='input-group mb-3'>
                                                <input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'>
                                            </div>

                                        </div>
                                    </div>
                                    <br/>
                                    <div class='text-center'>
                                        <div class='mb-3'>
                                            <button class='btn btn-danger' onclick="add_card_quality()"> + {{ __('cv.data.add_qual') }}</button>
                                            <script>
                                                var card_qual = document.getElementById("card_quality");
                                                function add_card_quality(){
                                                    card_qual.insertAdjacentHTML('afterend', "<br/><div class='card'><div class='card-body'><label for=''>{{ __('cv.data.quality') }}</label><div class='input-group mb-3'><input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'/> </div></div></div>")}

                                            </script>

                                        </div>
                                    </div>
                                </div>
                                <li class='list-group-item d-flex justify-content-between align-items-center'>
                                    <h5>{{ __('cv.data.ref') }}</h5>
                                    <span class='badge badge-pill'><button class='btn btn-danger' type='button' data-toggle='collapse' data-target='#collapse9' aria-expanded='false' aria-controls='collapseExample'>+</button></span>
                                </li>

                                <div class='collapse' id='collapse9'>
                                    <br/>
                                    <div class='card' id="card_ref">
                                        <div class='card-body'>
                                            <label for=''>{{ __('cv.data.ref') }}</label>
                                            <div class='input-group mb-3'>
                                                <input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'>
                                            </div>

                                        </div>
                                    </div>
                                    <br/>
                                    <div class='text-center'>
                                        <div class='mb-3'>
                                            <button class='btn btn-danger' onclick="add_card_reference()"> + {{ __('cv.data.add_ref') }}</button>

                                                <script>
                                                var card_ref = document.getElementById("card_ref");
                                                function add_card_reference(){
                                                    card_ref.insertAdjacentHTML('afterend', "<br/><div class='card'><div class='card-body'><label for=''>{{ __('cv.data.ref') }}</label><div class='input-group mb-3'><input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'/> </div></div></div>")}

                                            </script>
                                        </div>
                                    </div>
                                </div>

                                <li class='list-group-item d-flex justify-content-between align-items-center'>
                                    <h5>{{ __('cv.data.Realization') }}</h5>
                                    <span class='badge badge-pill'><button class='btn btn-danger' type='button' data-toggle='collapse' data-target='#collapse2' aria-expanded='false' aria-controls='collapseExample'>+</button></span>
                                </li>

                                <div class='collapse' id='collapse2'>
                                    <br/>
                                    <div class='card'>
                                        <div class='card-body'>
                                            <div class='form-group'>
                                                <label for='exampleFormControlTextarea1'>{{ __('cv.data.Realization') }}</label>
                                                <textarea class='form-control' id='exampleFormControlTextarea1' rows='3'></textarea>
                                              </div>
                                        </div>
                                    </div>
                                    <br/>
                                </div>

                                <li class='list-group-item d-flex justify-content-between align-items-center'>
                                    <h5>{{ __('cv.data.cert') }}</h5>
                                    <span class='badge badge-pill'><button class='btn btn-danger' type='button' data-toggle='collapse' data-target='#collapse11' aria-expanded='false' aria-controls='collapseExample'>+</button></span>
                                </li>

                                <div class='collapse' id='collapse11'>
                                    <br/>
                                    <div class='card' id="card_cert">
                                        <div class='card-body'>
                                            <br/>
                                             <div class='row'>
                                                <div class='col'>
                                                    <label for=''>{{ __('cv.data.cert') }}</label>
                                                    <div class='input-group mb-3'>
                                                        <input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='row'>
                                                <div class='col'>
                                                    <label for=''>{{ __('cv.data.period') }}</label>
                                                    <div class='row mb-3'>
                                                        <div class='col '>
                                                            <select class='custom-select' id='inputGroupSelect01'>
                                                                <option selected>{{ __('cv.data.month') }}</option>
                                                                <option value='1'>Janvier</option>
                                                                <option value='2'>Février</option>
                                                                <option value='3'>Mars</option>
                                                                <option value='3'>Avril</option>
                                                                <option value='3'>Mai</option>
                                                                <option value='3'>Juin</option>
                                                                <option value='3'>Juillet</option>
                                                                <option value='3'>Aôut</option>
                                                                <option value='3'>Septembre</option>
                                                                <option value='3'>Octobre</option>
                                                                <option value='3'>Novembre</option>
                                                                <option value='3'>Décembre</option>
                                                              </select>
                                                        </div>
                                                        <div class='col '>
                                                            <select class='custom-select' id='inputGroupSelect01'>
                                                                <option selected>{{ __('cv.data.year') }}</option>
                                                                <option value='1'>Janvier</option>
                                                                <option value='2'>Février</option>
                                                                <option value='3'>Mars</option>
                                                                <option value='3'>Avril</option>
                                                                <option value='3'>Mai</option>
                                                                <option value='3'>Juin</option>
                                                                <option value='3'>Juillet</option>
                                                                <option value='3'>Aôut</option>
                                                                <option value='3'>Septembre</option>
                                                                <option value='3'>Octobre</option>
                                                                <option value='3'>Novembre</option>
                                                                <option value='3'>Décembre</option>
                                                              </select>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                            <div class='row'>
                                                <div class='col'>
                                                    <div class='form-group mb-3'>
                                                        <label for='exampleFormControlTextarea1'>Description</label>
                                                        <textarea class='form-control' id='exampleFormControlTextarea1' rows='3'></textarea>
                                                      </div>
                                                </div>
                                            </div>
                                            <div class='d-flex justify-content-end mb-3'>
                                                <div class='row'>
                                                    <div class='col-lg-3'><button class='btn btn-danger'><i class='fa fa-trash'></i></button></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <br>
                                    <div class='text-center'>
                                        <div class='mr-3'>
                                            <button class='btn btn-danger' onclick="add_card_cert()"> + {{ __('cv.data.add_cert') }}</button>
                                            <script>
                                                var card_cer = document.getElementById("card_cert");
                                                function add_card_cert(){
                                                    card_cer.insertAdjacentHTML('afterend', " <br/><div class='card'><div class='card-body'><br/><div class='row'><div class='col'><label for=''>{{ __('cv.data.cert') }}</label><div class='input-group mb-3'><input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'></div></div></div><div class='row'><div class='col'><label for=''>{{ __('cv.data.period') }}</label><div class='row mb-3'><div class='col '><select class='custom-select' id='inputGroupSelect01'><option selected>{{ __('cv.data.month') }}</option><option value='1'>Janvier</option><option value='2'>Février</option><option value='3'>Mars</option></select></div> <div class='col'><select class='custom-select' id='inputGroupSelect01'> <option selected>{{ __('cv.data.year') }}</option><option value='1'>Janvier</option><option value='2'>Février</option><option value='3'>Mars</option><option value='3'>Novembre</option><option value='3'>Décembre</option></select></div></div></div></div><div class='row'> <div class='col'><div class='form-group mb-3'><label for='exampleFormControlTextarea1'>Description</label><textarea class='form-control' id='exampleFormControlTextarea1' rows='3'></textarea></div></div></div><div class='d-flex justify-content-end mb-3'><div class='row'><div class='col-lg-3'><button class='btn btn-danger'><i class='fa fa-trash'></i></button></div></div></div></div></div>");}
                                            </script>
                                        </div>
                                    </div>
                                    <br/>

                                </div>
                            </ul>
                            <div class="input-group  mb-4 mt-4">
                                <div class="d-flex justify-content-center">
                                    <div class="input-field row">
                                        {!! app('captcha')->display() !!}
                                        @if ($errors->has('g-recaptcha-response'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <div class='mr-3 mt-3'>
                                    <button class='btn btn-danger'>Envoyer</button>
                                </div>
                            </div>


                        <br/>

                        <br>
                    </div>
                </div>
            </div>

        </div>
    </section>
        <!--End login register area-->

        <!--Start footer area Style4-->
        @include('website.partials.footer')

    </div>

    <div class='scroll-to-top scroll-to-target' data-target='html'><span class='fa fa-angle-up'></span></div>

    @include('website.partials.js')




</body>


<!-- account 07:01:11 GMT -->
</html>
