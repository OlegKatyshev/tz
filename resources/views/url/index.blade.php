@extends('layout')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{route('url.save')}}" method="POST" class="mt-5" id="urlSave">
                    @csrf
                    <div class="row">
                        <div class="col-8 col-md-6">
                            <input type="text" name="url" class="form-control" >
                         </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <a href="{{route('url.reset')}}" class="btn btn-danger">Очистить список</a>
            </div>
        </div>
        <div class="row mt-3 mb-5">
            <div class="col-8 col-md-6" id="urls_list_container">
                @if(!empty($urls) && is_array($urls))
                    @include('url.url_list')
                @endif
            </div>
        </div>
        <script>
           const form = document.getElementById('urlSave');
           const listContainer = document.getElementById('urls_list_container');

           form.addEventListener('submit',function (e){

               e.preventDefault();
               removeErrors();

               axios({
                   method: this.method,
                   url: this.action,
                   data: new FormData(this)
               }).then(function (response) {
                   let {data} = response;
                   if(data.success){
                       listContainer.innerHTML = data.html;
                   }
               })
               .catch(function (error) {
                   let {response} = error;
                   showError(response.data.message);
                 });
           });

           function removeErrors(){
               let errors = form.querySelectorAll(".invalid-feedback");
               if(errors.length) errors.forEach(e=>e.remove());
           }

           function showError(error){
               form.querySelector("[name='url']")
                   .insertAdjacentHTML('afterend', `<div class="invalid-feedback d-inline">${error}</div>`);
           }
        </script>
    </div>
@endsection
