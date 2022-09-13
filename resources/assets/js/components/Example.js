import React, { Component } from 'react';
import ReactDOM from 'react-dom';


function Example() {
    return (
            <div>
                <li class='list-group-item d-flex justify-content-between align-items-center'>
                                    <h5>Training</h5>
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
                                                    <label>Training</label>
                                                    <div class='input-group mb-3'>
                                                        <input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='row'>
                                                <div class='col'>
                                                    <label for=''>Etablissement</label>
                                                    <div class='input-group mb-3'>
                                                        <input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'/>
                                                    </div>
                                                </div>
                                                <div class='col'>

                                                    <label for=''>City</label>
                                                    <div class='input-group mb-3'>
                                                        <input type='text' class='form-control' aria-label='Username' aria-describedby='basic-addon1'/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='row'>
                                                <div class='col'>
                                                    <label for=''>st</label>
                                                    <div class='row'>
                                                        <div class='col'>
                                                            <select class='custom-select' id='inputGroupSelect01'>
                                                                <option selected>zt</option>
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
                                                                <option selected>de</option>


                                                              </select>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class='col'>

                                                    <label for=''></label>
                                                    <div class='row mb-3'>
                                                        <div class='col'>
                                                            <select class='custom-select' id='inputGroupSelect01'>
                                                                <option selected></option>
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
                                                                <option selected></option>

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
                                                <div class='col-lg-3'><button class='btn btn-danger'><i class='fa fa-trash'></i></button></div>
                                            </div>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class='d-flex justify-content-center'>
                                        <div class='mb-3'>
                                            <button class='btn btn-danger' > </button>

                                        </div>
                                    </div>

                                </div>
                </div>

        );
    }

export default Example;

// We only want to try to render our component on pages that have a div with an ID
// of "example"; otherwise, we will see an error in our console
if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
