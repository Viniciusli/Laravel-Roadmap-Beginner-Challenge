{{-- Erros padrões do Validador --}}
@if (count($errors))
    <div class="alert alert-danger alert-dismissible">
        <h4><i class="fa fa-times-circle"></i> Erro!</h4>
        {!! implode('<br>', $errors->all()) !!}
    </div>
@endif

{{-- Mensagem personalizada --}}
@if (Session::has('msg'))
    <div class="alert alert-{{ Session::get('error') ? 'danger' : 'success' }} alert-dismissible">
        <h4><i class="icon fa fa-{{ Session::get('error') ? 'ban' : 'check' }}"></i>
            {{ Session::get('error') ? 'Error' : 'Sucess' }}!</h4>
        {{ Session::get('msg') }}
    </div>
@endif
