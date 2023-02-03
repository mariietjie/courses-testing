@if( is_front_page() )
<header class="bg-white relative z-50 w-full">
    <div class="w-full p-2 items-center flex justify-center md:justify-between mx-auto max-w-pageWidth">
        <img class="md:h-10 h-6 no-lazyload md:flex hidden" src="{{$logoColor}}"></img>
        @include('partials.salespages-info')
    </div>
</header>
@else 
    @if($phoneNumber)
    <header class="bg-white top-0 z-50">
        <div class="w-full p-2 items-center flex justify-center md:justify-between mx-auto max-w-pageWidth">
            <img class="md:h-10 h-6 no-lazyload md:flex hidden" src="{{$logoColor}}"></img>
            @include('partials.salespages-info')
        </div>
    </header>
    @endif
@endif