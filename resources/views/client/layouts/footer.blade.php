<footer class="page-footer font-small font-weight-bolder pt-4 footer">
    <div class="container text-center">
        <div class="row">
            @forelse($menus as $menu)
                <div class="col-md-2">
                    <a class="font-small font-weight-bolder first-special-text" href="{{ url($menu->slug ?? '') }}">
                        {{ $menu->tr_name ?? '' }}
                    </a>
                </div>
            @empty
            @endforelse
        </div>
    </div>
    <hr>
    <div class="container text-center text-md-left">
        <div class="row">
            <hr class="clearfix w-100 d-md-none">
            <div class="col-md-6 mx-auto d-inline-block">
                <div class="row">
                    <div  class="col-md-4 d-inline-block">
                        <img src="http://www.tourismtoday.net/d/news/23540.jpg" class="img-fluid mt-md-2 ml-md-5 d-inline-block" style="height: 75px; width: 125px" />
                    </div>
                    <div class="col-md-8 d-inline-block">
                        <label class="d-inline-block mt-md-1 text-white pt-2 pt-md-0">
                            <strong>Telif hakkı © 2009–2019 OtelRezerv®.</strong><br>
                            @if(Helper::custom_check_empty($general) !== false)
                                {{ $general->textTrans('description') }}
                            @endif
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mx-auto d-inline-block">
                <div class="text-center">
                    <button type="button" class="btn nine-special-button col-md-8 mt-3 pt-3 pb-2" style="border-radius: 2px !important;"><h6><i class="fa fa-phone pr-2" aria-hidden="true"></i>0850 466 39 87 </h6></button>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-md-12 pt-0 pb-2">
                <div class="mb-5 flex-center">
                    @forelse($socials as $social)
                    <a target="_blank" href="{{ url($social->url) }}">
                        <i class="{{ $social->icon ?? '' }} fa-lg mr-md-5 text-white mr-3 fa-2x"> </i>
                    </a>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright text-center third-text-color py-3">© 2019 Copyright:
        <a href="{{url('/')}}"> HalalHotelCheck.com</a>
    </div>
</footer>
