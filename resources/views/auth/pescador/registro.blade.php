@extends('layouts.app-pescador')

@section('content')
    <div class="header">
        <div class="container">
            <div class="pt-3 text-center">
                <img class="img-fluid " src="{{ url('app-comercial/img/logo-img.svg') }}" alt="">
            </div>
        </div>
        <div class="text-center text-white px-5 pb-3">
            <h4>REGISTRO PRODUTOR</h4>
        </div>
    </div>
    <div>
        <div class="container">
            <form id="regForm" action="{{ route('pescador.store') }}" method="POST">
                @csrf
                <div class="tab">
                    <h2 class="mt-2 mb-5 text-white"><b>VAMOS COMEÇAR O CADASTRO</b></h2>
                    <div class="text-label">SEU NOME COMPLETO</div>
                    <div class="form-group mt-3 mb-5 input-material">
                        <input type="text" placeholder="Nome e Sobrenome" name="name" oninput="this.className = ''">
                    </div>
                </div>

                {{-- <div class="tab">
                    <h2 class="mt-2 mb-5 text-white"><b>CONTINUE COM O CADASTRO</b></h2>
                    <div class="text-label">APELIDO</div>
                    <div class="form-group mt-3 mb-5 input-material">
                        <input type="text" placeholder="Seu Apelido" name="lastname" oninput="this.className = ''">
                    </div>
                </div> --}}

                <div class="tab">
                    <h2 class="mt-2 mb-5 text-white"><b>CONTINUE COM O CADASTRO</b></h2>
                    <div class="text-label">SEU CPF</div>
                    <div class="form-group mt-3 mb-5 input-material">
                        <input type="text" placeholder="Seu CPF" name="cpf" id="cpf" oninput="this.className = ''">
                    </div>
                </div>

                {{-- <div class="tab">
                    <h2 class="mt-2 mb-5 text-white"><b>CONTINUE COM O CADASTRO</b></h2>
                    <div class="text-label">SEU IBAN</div>
                    <div class="form-group mt-3 mb-5 input-material">
                        <input type="text" placeholder="Seu IBAN" name="iban" oninput="this.className = ''">
                    </div>
                </div> --}}

                <div class="tab">
                    <h2 class="mt-2 mb-5 text-white"><b>CONTINUE COM O CADASTRO</b></h2>
                    <div class="text-label">SEU TELEFONE</div>
                    <div class="form-group mt-4 mb-5 input-material input-telemovel">
                        <input type="text" placeholder="+000" name="ddd_telemovel" value="+55"
                            oninput="this.className = ''">
                        <input type="text" placeholder="(00)00000-0000" name="telemovel" oninput="this.className = ''">
                    </div>
                </div>

                <div class="tab">
                    <h2 class="mt-2 mb-5 text-white"><b>CONTINUE COM O CADASTRO</b></h2>
                    <div class="text-label">ESCOLHA A CIDADE DE REGISTRO</div>
                    <div class="form-group mt-4 mb-5 input-material">
                        <select name="cidade" class="select2" >
                            @foreach ($portos as $porto)
                                <option value="{{ $porto->id }}">{{ $porto->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="tab">
                    <h2 class="mt-2 mb-5 text-white"><b>CONTINUE COM O CADASTRO</b></h2>
                    <div class="text-label">REGISTRE SUA PROPRIEDADE</div>
                    <div class="form-group mt-3 mb-5 input-material embarcacao-1">
                        <input type="text" placeholder="Nome da sua Propriedade" name="nome_fazenda"
                            oninput="this.className = ''">
                        {{-- <i class="fas fa-plus-circle add-embarcacao" data-embarcacao="2"></i> --}}
                    </div>
                    {{-- <div class="form-group mt-3 mb-5 input-material d-none embarcacao-2">
                        <i class="fas fa-plus-circle add-embarcacao" data-embarcacao="3"></i>
                    </div> --}}
                    {{-- <div class="form-group mt-3 mb-5 input-material d-none embarcacao-3">
                    </div> --}}
                </div>

                <div class="tab">
                    <div class="text-label2">CEP</div>
                    <div class="form-group mt-3 mb-5 d-flex input-material input-especial">
                        <input type="text" id="ceping" name="cep">

                        <button type="button" id="buscaring" class="btn ml-2">Buscar</button>
                    </div>

                    <div class="text-label2">RUA</div>
                    <div class="form-group mt-3 mb-5 d-flex input-material">
                        <input type="text" id="rua" name="rua">
                    </div>

                    <div class="text-label2">NUMERO</div>
                    <div class="form-group mt-3 mb-5 d-flex input-material">
                        <input type="text" id="numero" name="numero">
                    </div>

                    <div class="text-label2">BAIRRO</div>
                    <div class="form-group mt-3 mb-5 d-flex input-material">
                        <input type="text" id="bairro" name="bairro">
                    </div>

                    <div class="text-label2">CIDADE</div>
                    <div class="form-group mt-3 mb-5 d-flex input-material">
                        <input type="text" id="cidade" name="cidade">
                    </div>

                    <div class="text-label2">ESTADO</div>
                    <div class="form-group mt-3 mb-5 d-flex input-material">
                        <input type="text" id="estado" name="estado">
                    </div>

                    <input type="hidden" id="latitude" name="latitude">
                    <input type="hidden" id="longitude" name="longitude">
                </div>


                <div class="tab">
                    <h2 class="mt-2 mb-5 text-white"><b>CONTINUE COM O CADASTRO</b></h2>
                    <div class="text-label">SEU EMAIL</div>
                    <div class="form-group mt-3 mb-5 input-material">
                        <input type="email" placeholder="Seu Email" name="email" oninput="this.className = ''">
                    </div>
                    <div class="text-label">SUA SENHA</div>
                    <div class="form-group mt-3 mb-5 input-material">
                        <input type="password" placeholder="Sua Senha" name="password" oninput="this.className = ''">
                    </div>
                </div>

                <div class="mt-3">
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-multi-step mr-2" id="prevBtn"
                            onclick="nextPrev(-1)">VOLTAR</button>
                        <button type="button" class="btn btn-multi-step ml-2" id="nextBtn"
                            onclick="nextPrev(1)">PRÓXIMO</button>
                    </div>
                </div>

                <!-- Circles which indicates the steps of the form: -->
                <div class="d-none" style="text-align:center;margin-top:40px;">
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                </div>

                <div class="text-register text-center my-3">
                    <a href="{{ route('login.pescador') }}" class="text-white"><strong>Já tenho registo?</strong></a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form ...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            // ... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "SALVAR";
            } else {
                document.getElementById("nextBtn").innerHTML = "PRÓXIMO";
            }
            // ... and run a function that displays the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            // if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form... :
            if (currentTab >= x.length) {
                //...the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        // function validateForm() {
        //     // This function deals with validation of the form fields
        //     var x, y, i, valid = true;
        //     x = document.getElementsByClassName("tab");
        //     y = x[currentTab].getElementsByTagName("input");
        //     // A loop that checks every input field in the current tab:
        //     for (i = 0; i < y.length; i++) {
        //         // If a field is empty...
        //         if (y[i].value == "") {
        //             // add an "invalid" class to the field:
        //             y[i].className += " invalid";
        //             // and set the current valid status to false:
        //             valid = false;
        //         }
        //     }
        //     // If the valid status is true, mark the step as finished and valid:
        //     if (valid) {
        //         document.getElementsByClassName("step")[currentTab].className += " finish";
        //     }
        //     return valid; // return the valid status
        // }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class to the current step:
            x[n].className += " active";
        }
        // In your Javascript (external .js resource or <script> tag)

    </script>
@endsection
