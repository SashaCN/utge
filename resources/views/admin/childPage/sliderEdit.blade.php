@extends('admin.admin')

@section('content')
    <?php
        $locale = app()->getLocale();
    ?>
    <div class="flex title-line">
        <h2>
            @if ($sliderId == 'slider1')
                slider1
            @endif

            @if ($sliderId == 'slider2')
                slider2
            @endif

            @if ($sliderId == 'slider3')
                slider3
            @endif

            @if ($sliderId == 'slider4')
                slider4
            @endif

        </h2>

        <a href="{{ route('childPage.sliderCreate') }}" class="add-button action-button">
            <img src="{{ asset('img/add.svg') }}" alt="Add">
        </a>
    </div>

    <div class="error">
        @if ($errors->any())
                @foreach ($errors->all() as $error)
                        <div class="error-item"><img class="error-icon" src="{{ asset('img/error.svg') }}" alt="error"><p class="error-desc">{{ $error }}</p></div>

                @endforeach
        @endif
    </div>

    @foreach ($sliderImages as $sliderImg)
        @php
            $title = $sliderImg->localization[0];
        @endphp

        {{-- <div>
            <p>{{ $sliderImg->id }}</p>
            <p>{{ $title->$locale }}</p>
            <span><img style="width: 200px;" src="{{ $sliderImg->getFirstMediaUrl('images') }}" alt="{{ $title->$locale }}"></span>
        </div> --}}
        <div>
            <form action="{{ route('childPage.update', $sliderImg->id) }}" method="POST" enctype="multipart/form-data" class="current-slide-wrap">
                @csrf
                @method('PUT')
        
        
                <div class="name-slide flex-col current-slide">
                    <div class="input-wrap">
                        <input type="text" name="title_uk" id="title_uk" value="{{ $title->uk }}">
                        <label class="label" for="title_uk">@lang('admin.add_uk_title')</label>
                    </div>
                    <div class="input-wrap">
                        <input type="text" name="title_ru" id="title_ru" value="{{ $title->ru }}">
                        <label class="label" for="title_ru">@lang('admin.add_ru_title')</label>
                    </div>
                    <div class="input-wrap name-box">
                        <input type="text" name="img_a_url" value="{{ $sliderImg->localization[1]->$locale }}" id="img_a_url" class="name-input-ru">
                        <label class="label" for="img_a_url">url</label>
                    </div>
                </div>
        
                <div class="image-slide flex-col current-slide">
                    <label class="image-changes" for="image-changes"><img class="old-image" src="{{ $sliderImg->getFirstMediaUrl('images') }}" alt="{{ $title->$locale }}"></label>
                    <p class="image-changes-desc">@lang('admin.update-image')</p>
                     <button class="image-changes-bt" type="submit" form="image-change" class="add-button">@lang('admin.save-new-phot')</button>    
                </div>
        
                <button type="submit" class="add-button" id="save-btn">
                    <img src="{{ asset('img/save.svg') }}" alt="Add">
                    
                </button>
            </form>

            <form  action="{{ route('childPage.destroy', $sliderImg->id) }}" method="POST">
                <label>
                    @csrf 
                    @method('DELETE')
                    <input type="submit" value="delete">
                </label>
            </form>
        
            {{-- <form id="image-change" class="image-changes-form" action="{{ route('childPage.mediaUpdate', $sliderImg->id ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
        
                <input id="image-changes" type="file" name="image">
                <input type="submit" value="img">
            </form> --}}

            <form id="image-change" class="image-changes-form" action="{{ route('childPage.mediaUpdate', $sliderImg->id ) }}" method="POST" enctype="multipart/form-data">
                {{-- @csrf --}}
                @method('POST')
        
                <input id="image-changes" type="file" name="image">
                <input type="submit" value="img">
            </form>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
        <script>

            $('#image-change').on('submit',function(event){
                


                
                $.ajax({
                    headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    beforeSend: function (xhr) {
                    xhr.setRequestHeader ("Accept", "application/json");
                        },
                        url: '/childPage/mediaUpdate/{childPage}',
                        type: "POST",
                        dataType: "JSON",
                        data: data,
                        success: function(reponseData, textStatus, jqXHR){
                        let data = $.parseJSON(responseData);
                        token = data.token;
                            console.log(responseData);
                            console.log(data);
                        },
                        error: function(jqXHR, reponseData, errorThrown){
                        console.log(errorThrown);
                        },
                        complete: function(jqXHR, data){
                        console.log(data);
                        },
                });
                //---------------------
                // event.preventDefault();
    

                // let xhr = new XMLHttpRequest();

                // function sendAjax (method, requestURL, params = null) {
                //     return new Promise ((resolve, reject) => {
                //     const xhr = new XMLHttpRequest()
                //     xhr.open(method, requestURL)
                //     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                //     //  xhr.responseType = "json"
                // xhr.onerror = () => {
                //     reject(xhr.response)
                // }
                // xhr.onreadystatechange = function (){
                //         if (xhr.readyState !== 4) return;// відповідь від сервера
                        
                //         if (xhr.status !== 200 ) {// перевірка на наявність файлу
                //             console.log(xhr.status + ' ' + xhr.statusText);
                //         } else {
                //             resolve(xhr.response)
                //         }
                //     }
                // xhr.send(params)
                // })
                // }

                // sendAjax('POST', '/admin/sliderEdit/slider4/mediaUpdate', [{{ $sliderImg->id }}])
                //     .catch(er => console.log(er))
//----
                // let img = $('#image-changes').val();
    
                // $.ajax({
                // url: "/admin/sliderEdit/slider4/mediaUpdate",
                // type:"POST",
                // data:{
                //     "_token": "{{ csrf_token() }}",
                //     request:img,
                //     childPageId:{{$sliderImg->id}}
                    
                // },
                //     success:function(response){
                //     console.log(response);
                // },
                // });
            });
        </script>
    @endforeach
   

@endsection
