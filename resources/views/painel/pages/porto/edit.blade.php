@extends('layouts.painel.index')


@section('content')

    <div class="card m-5 col-md-10">
        <form action="{{ route('admin.porto.update', $porto->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="">
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1">Nome do Porto</label>
                        <input type="text" class="form-control" value="{{ $porto->nome }}" name="nome">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1">Sigla do Porto</label>
                        <input type="text" class="form-control" value="{{ $porto->sigla }}" name="sigla">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1">Foto do Porto</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"></label>
                        <input type="checkbox" name="registro" @if ($porto->registro == 'on') checked
                                  @else @endif id="registo">
                        <label class="form-check-label" for="defaultCheck1">
                            Porto de Registo
                        </label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"></label>
                        <input type="checkbox" name="veterinario" id="veterinario" @if ($porto->controle_veterinario) checked @endif>
                        <label class="form-check-label" for="defaultCheck1">
                            Controle Veterinario
                        </label>
                    </div>
                    <div id="cientifico" class="form-group @if ($porto->controle_veterinario == null) d-none @endif col-md-12">
                        <label for="exampleInputEmail1">Numero do Controle Veterinario</label>
                        <input type="text" class="form-control" name="controle_veterinario" value="{{$porto->controle_veterinario}}">
                    </div>
                    <div class=" col-md-6">
                        <label for="exampleInputEmail1"></label>
                        <input name="descarga" type="checkbox" id="descarga" @if ($porto->descarga == 'on') checked @else @endif>
                        <label class="form-check-label" for="defaultCheck1">
                            Porto de Descarga
                        </label>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="exampleInputEmail1">Espécies do Porto</label>
                        <select class="js-example-basic-multiple" name="especies[]" multiple="multiple">
                            @foreach ($especies as $especie)
                                <option value="{{ $especie->id }}" @if(isset($especieDePorto[$especie->id])) selected @endif>{{ $especie->nome_portugues }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"></label>
                        <input type="submit" class="form-control btn btn-dark" id="exampleInputEmail1"
                            aria-describedby="emailHelp" value="Cadastrar">
                    </div>
                </div>
                <div class="col-md-6 row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Código Postal</label>
                        <input type="text" class="form-control" value="{{ $porto->cep }}" id="cep" name="codigo_postal">
                    </div>
                    <div style="margin-top: 32px;" class="form-group col-md-6">
                       <button type="button" id="buscar" class="btn btn-dark">Buscar</button>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1">Rua</label>
                        <input type="text" id="rua" value="{{ $porto->rua }}" class="form-control" name="morada">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Bairro</label>
                        <input type="text" id="bairro" value="{{ $porto->bairro }}" class="form-control" name="regiao">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Cidade</label>
                        <input type="text" id="cidade" value="{{ $porto->cidade }}"  class="form-control" name="porta">
                    </div>


                    <input type="hidden" id="latitude" value="{{ $porto->latitude }}" name="latitude">
                    <input type="hidden" id="longitude" value="{{ $porto->longitude }}" name="longitude">

                </div>
            </div>
        </form>
    </div>

    <script>

    </script>
@endsection
