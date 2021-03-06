@extends('layouts.app-pescador')

@section('content')


<div class="header">
      <div class="container">
            <div class="py-4 text-center">
                  <img class="img-fluid " src="{{ url('app-comercial/img/logo-img.svg') }}" alt="">
            </div>
      </div>
</div>
<div>
      <div class="d-flex justify-content-between container voltar py-4 mb-5">
            <div>
                  <a href="javascript:history.back()"> <i class="fas fa-chevron-left"></i> Voltar</a>
            </div>
            <div>
                  <span>CADASTRO DE PRODUTO</span>
            </div>
      </div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
      <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
      </ul>
</div>
@endif

<div class="container login-py">
      <form action="{{ route('pescador.produto.store') }}" method="POST">
            @csrf
            <div class="mt-3">
                  <div class="form-group input-material">
                        <select class="form-control select2" name="especie_id" id="margem">
                              <option>Escolha o produto</option>
                              @foreach ($especies as $especie)
                              <option value="{{ $especie->id }}" data-margem="{{ $especie->margem }}">{{ $especie->nome_portugues }}</option>
                              @endforeach

                        </select>
                  </div>

                  <div class="form-group input-material">

                        <select class="form-control select2" name="cidades[]" multiple id="exampleFormControlSelect1">
                              <option>Escolha a cidade</option>
                              @foreach ($portos as $porto)
                              <option value="{{ $porto->id }}">{{ $porto->nome }}</option>
                              @endforeach

                        </select>
                  </div>

                  <div class="form-group input-material">
                        <select class="form-control" name="fazenda" id="exampleFormControlSelect1">
                              <option>Escolha a sua proprioedade</option>

                              <option value="{{ auth()->user()->fazenda }}">
                                    {{ auth()->user()->fazenda }}</option>

                        </select>
                  </div>
                  <div class="form-group input-material">
                        <select class="form-control" name="tamanho" id="exampleFormControlSelect1">
                              <option>Escolha o Tamanho</option>
                              @foreach ($tamanhos as $tamanho)
                              <option value="{{ $tamanho->name }}">{{ $tamanho->name }}</option>
                              @endforeach

                        </select>
                  </div>

                  <div class="row">
                        <div class="form-group col-6 input-material">
                              <label for="name-field">Kg</label>
                              <input id="check_kg" class="form-control" value="Kg" name="unidade" type="radio">
                        </div>
                        <div class="form-group col-6 input-material">
                              <label for="name-field">Unidade</label>
                              <input id="check_unidade" value="Unidade" class="form-control" name="unidade" type="radio">
                        </div>
                  </div>

                  <div id="kg" class="form-group d-none input-material">
                        <input type="number" class="form-control" name="quantidade_kg">
                        <label for="name-field">Quantos Kg</label>
                  </div>

                  <div id="unidade" class="form-group d-none input-material">
                        <input type="number" class="form-control" name="quantidade_unidade">
                        <label for="name-field">Quantos produtos tem</label>
                  </div>
                  <div id="kg_total" class="form-group d-none input-material">
                        <input type="number" class="form-control" name="total_kg">
                        <label for="name-field">Total de Kg</label>
                  </div>
                  <div id="price_div" class="form-group d-none input-material">
                        <input type="number" id="price" class="form-control" onkeyup="getPriceValue()" name="preco">
                        <label for="name-field">Pre??o por KG</label>
                  </div>
                  <div class="receber">

                        <input id="percent" disabled placeholder="Vai Receber" type="text" value="">
                  </div>
            </div>
            <div class="btn-box py-4"><button class="btn btn-submit" type="submit">Iniciar venda</button>

            </div>

</div>
</form>

</div>
<script>
      function getPriceValue()
            {
            var input1 = $("#price").val();
            var margem = $("#margem").find(":selected").data("margem");
            // var margem = $("#margem");
            console.log(margem);
            var valor = 0;
            var value = input1 - input1 * (margem/100);
            var input2 = $("#percent").val("Vai receber"+" "+value.toFixed(2));
            }
</script>
@endsection
