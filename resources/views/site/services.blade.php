@extends('site.index')

<?php
    $locale = app()->getLocale();
?>

@section('content')

<div class="wrapper services">
    @foreach ($services as $service)
        @php
            $title = $service->localization[0];
             // $description = $service->localization[1];
        @endphp
        <figure class="service shadow-box">
            <h2 class="flex-aic"><span>{{ $title->$locale }}</span></h2>
            <img src="img/default_image.jpg" alt="test image">
            <figcaption>
                <p class="desc">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deleniti sequi eius aperiam, nesciunt voluptates explicabo tempora minima voluptate, tenetur vitae fugit optio sed. Temporibus deleniti, minima culpa fuga assumenda modi quidem ex sed enim aliquam nemo totam quaerat cumque corporis esse perferendis exercitationem est ab incidunt ipsum tempore quam ad nobis. Dolores delectus, architecto eos modi, quis mollitia explicabo facilis nesciunt facere porro tempora cumque quam ducimus placeat, repellendus ut quisquam aliquid cum eligendi non reprehenderit atque molestiae voluptatum? Ea, odit deleniti suscipit exercitationem voluptas perferendis! Numquam officia enim tempora minima expedita sapiente praesentium molestiae dignissimos tenetur adipisci laboriosam dolorum qui, quos officiis dolore. Ducimus placeat ut voluptates deserunt, similique eligendi harum ab, rem nostrum repellendus consequatur aspernatur! Dolorem tempore qui quae, voluptates itaque minus provident, cumque maxime error id voluptatibus deleniti porro quas ipsum eos odit, quis soluta! Vel iure possimus itaque unde quos aliquid rem odio quis, animi atque voluptatibus nostrum ducimus ea a. Suscipit placeat ducimus voluptatibus dolor sed voluptatum necessitatibus repellat possimus soluta veritatis deleniti, magni molestias tenetur cupiditate quo iure. Eius odio possimus non rem adipisci beatae obcaecati asperiores quos praesentium accusamus omnis id, similique ipsam quod itaque voluptates quo! Explicabo animi et modi dolor.
                </p>
                <div class="button-line">
                    <a href="#" class="add-to-basket">
                        @lang('utge.more')
                    </a>
                </div>
            </figcaption>
        </figure>
    @endforeach
</div>

@endsection
