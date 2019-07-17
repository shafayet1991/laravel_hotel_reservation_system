@extends('admin.templates.admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{ Helper::custom_where_am_i($names) }} adlı ikonu düzenliyorsunuz şu anda</h2>
                        <a href="{{ route('homepage_icon.index') }}" class="btn btn-info btn-md pull-right">
                            <i class="fa fa-undo"></i> Geri Dön
                        </a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="col-md-12">
                            <form action="{{ route('homepage_icon.update',$icon->id) }}" method="post">
                                @csrf
                                @method("PUT")
                                <div class="form-group col-md-3">
                                    <label class="control-label" for="icon">İkon<span
                                                class="required">*</span>
                                    </label>
                                    <input type="text" class="form-control"
                                           value="{{ $icon->icon ?? old('icon') }}" name="icon">
{{--                                    <select name="icon" class="form-control"--}}
{{--                                            style="font-family: 'FontAwesome', 'Helvetica'">--}}
{{--                                        <option value="fa fa-adjust">&#xf042; adjust</option>--}}
{{--                                        <option value="fa fa-adn">&#xf170; adn</option>--}}
{{--                                        <option value="fa fa-align-center">&#xf037; align-center</option>--}}
{{--                                        <option value="fa fa-align-justify">&#xf039; align-justify</option>--}}
{{--                                        <option value="fa fa-align-left">&#xf036; align-left</option>--}}
{{--                                        <option value="fa fa-align-right">&#xf038; align-right</option>--}}
{{--                                        <option value="fa fa-ambulance">&#xf0f9; ambulance</option>--}}
{{--                                        <option value="fa fa-anchor">&#xf13d; anchor</option>--}}
{{--                                        <option value="fa fa-android">&#xf17b; android</option>--}}
{{--                                        <option value="fa fa-angle-double-down">&#xf103; angle-double-down</option>--}}
{{--                                        <option value="fa fa-angle-double-left">&#xf100; angle-double-left</option>--}}
{{--                                        <option value="fa fa-angle-double-right">&#xf101; angle-double-right</option>--}}
{{--                                        <option value="fa fa-angle-double-up">&#xf102; angle-double-up</option>--}}
{{--                                        <option value="fa fa-angle-down">&#xf107; angle-down</option>--}}
{{--                                        <option value="fa fa-angle-left">&#xf104; angle-left</option>--}}
{{--                                        <option value="fa fa-angle-right">&#xf105; angle-right</option>--}}
{{--                                        <option value="fa fa-angle-up">&#xf106; angle-up</option>--}}
{{--                                        <option value="fa fa-apple">&#xf179; apple</option>--}}
{{--                                        <option value="fa fa-archive">&#xf187; archive</option>--}}
{{--                                        <option value="fa fa-arrow-circle-down">&#xf0ab; arrow-circle-down</option>--}}
{{--                                        <option value="fa fa-arrow-circle-left">&#xf0a8; arrow-circle-left</option>--}}
{{--                                        <option value="fa fa-arrow-circle-o-down">&#xf01a; arrow-circle-o-down</option>--}}
{{--                                        <option value="fa fa-arrow-circle-o-left">&#xf190; arrow-circle-o-left</option>--}}
{{--                                        <option value="fa fa-arrow-circle-o-right">&#xf18e; arrow-circle-o-right</option>--}}
{{--                                        <option value="fa fa-arrow-circle-o-up">&#xf01b; arrow-circle-o-up</option>--}}
{{--                                        <option value="fa fa-arrow-circle-right">&#xf0a9; arrow-circle-right</option>--}}
{{--                                        <option value="fa fa-arrow-circle-up">&#xf0aa; arrow-circle-up</option>--}}
{{--                                        <option value="fa fa-arrow-down">&#xf063; arrow-down</option>--}}
{{--                                        <option value="fa fa-arrow-left">&#xf060; arrow-left</option>--}}
{{--                                        <option value="fa fa-arrow-right">&#xf061; arrow-right</option>--}}
{{--                                        <option value="fa fa-arrow-up">&#xf062; arrow-up</option>--}}
{{--                                        <option value="fa fa-arrows">&#xf047; arrows</option>--}}
{{--                                        <option value="fa fa-arrows-alt">&#xf0b2; arrows-alt</option>--}}
{{--                                        <option value="fa fa-arrows-h">&#xf07e; arrows-h</option>--}}
{{--                                        <option value="fa fa-arrows-v">&#xf07d; arrows-v</option>--}}
{{--                                        <option value="fa fa-asterisk">&#xf069; asterisk</option>--}}
{{--                                        <option value="fa fa-backward">&#xf04a; backward</option>--}}
{{--                                        <option value="fa fa-ban">&#xf05e; ban</option>--}}
{{--                                        <option value="fa fa-bar-chart-o">&#xf080; bar-chart-o</option>--}}
{{--                                        <option value="fa fa-barcode">&#xf02a; barcode</option>--}}
{{--                                        <option value="fa fa-bars">&#xf0c9; bars</option>--}}
{{--                                        <option value="fa fa-beer">&#xf0fc; beer</option>--}}
{{--                                        <option value="fa fa-bell">&#xf0f3; bell</option>--}}
{{--                                        <option value="fa fa-bell-o">&#xf0a2; bell-o</option>--}}
{{--                                        <option value="fa fa-bitbucket">&#xf171; bitbucket</option>--}}
{{--                                        <option value="fa fa-bitbucket-square">&#xf172; bitbucket-square</option>--}}
{{--                                        <option value="fa fa-bold">&#xf032; bold</option>--}}
{{--                                        <option value="fa fa-bolt">&#xf0e7; bolt</option>--}}
{{--                                        <option value="fa fa-book">&#xf02d; book</option>--}}
{{--                                        <option value="fa fa-bookmark">&#xf02e; bookmark</option>--}}
{{--                                        <option value="fa fa-bookmark-o">&#xf097; bookmark-o</option>--}}
{{--                                        <option value="fa fa-briefcase">&#xf0b1; briefcase</option>--}}
{{--                                        <option value="fa fa-btc">&#xf15a; btc</option>--}}
{{--                                        <option value="fa fa-bug">&#xf188; bug</option>--}}
{{--                                        <option value="fa fa-building-o">&#xf0f7; building-o</option>--}}
{{--                                        <option value="fa fa-bullhorn">&#xf0a1; bullhorn</option>--}}
{{--                                        <option value="fa fa-bullseye">&#xf140; bullseye</option>--}}
{{--                                        <option value="fa fa-calendar">&#xf073; calendar</option>--}}
{{--                                        <option value="fa fa-calendar-o">&#xf133; calendar-o</option>--}}
{{--                                        <option value="fa fa-camera">&#xf030; camera</option>--}}
{{--                                        <option value="fa fa-camera-retro">&#xf083; camera-retro</option>--}}
{{--                                        <option value="fa fa-caret-down">&#xf0d7; caret-down</option>--}}
{{--                                        <option value="fa fa-caret-left">&#xf0d9; caret-left</option>--}}
{{--                                        <option value="fa fa-caret-right">&#xf0da; caret-right</option>--}}
{{--                                        <option value="fa fa-caret-square-o-down">&#xf150; caret-square-o-down</option>--}}
{{--                                        <option value="fa fa-caret-square-o-left">&#xf191; caret-square-o-left</option>--}}
{{--                                        <option value="fa fa-caret-square-o-right">&#xf152; caret-square-o-right</option>--}}
{{--                                        <option value="fa fa-caret-square-o-up">&#xf151; caret-square-o-up</option>--}}
{{--                                        <option value="fa fa-caret-up">&#xf0d8; caret-up</option>--}}
{{--                                        <option value="fa fa-certificate">&#xf0a3; certificate</option>--}}
{{--                                        <option value="fa fa-chain-broken">&#xf127; chain-broken</option>--}}
{{--                                        <option value="fa fa-check">&#xf00c; check</option>--}}
{{--                                        <option value="fa fa-check-circle">&#xf058; check-circle</option>--}}
{{--                                        <option value="fa fa-check-circle-o">&#xf05d; check-circle-o</option>--}}
{{--                                        <option value="fa fa-check-square">&#xf14a; check-square</option>--}}
{{--                                        <option value="fa fa-check-square-o">&#xf046; check-square-o</option>--}}
{{--                                        <option value="fa fa-chevron-circle-down">&#xf13a; chevron-circle-down</option>--}}
{{--                                        <option value="fa fa-chevron-circle-left">&#xf137; chevron-circle-left</option>--}}
{{--                                        <option value="fa fa-chevron-circle-right">&#xf138; chevron-circle-right</option>--}}
{{--                                        <option value="fa fa-chevron-circle-up">&#xf139; chevron-circle-up</option>--}}
{{--                                        <option value="fa fa-chevron-down">&#xf078; chevron-down</option>--}}
{{--                                        <option value="fa fa-chevron-left">&#xf053; chevron-left</option>--}}
{{--                                        <option value="fa fa-chevron-right">&#xf054; chevron-right</option>--}}
{{--                                        <option value="fa fa-chevron-up">&#xf077; chevron-up</option>--}}
{{--                                        <option value="fa fa-circle-o">&#xf10c; circle-o</option>--}}
{{--                                        <option value="fa fa-clipboard">&#xf0ea; clipboard</option>--}}
{{--                                        <option value="fa fa-clock-o">&#xf017; clock-o</option>--}}
{{--                                        <option value="fa fa-cloud">&#xf0c2; cloud</option>--}}
{{--                                        <option value="fa fa-cloud-download">&#xf0ed; cloud-download</option>--}}
{{--                                        <option value="fa fa-cloud-upload">&#xf0ee; cloud-upload</option>--}}
{{--                                        <option value="fa fa-code">&#xf121; code</option>--}}
{{--                                        <option value="fa fa-code-fork">&#xf126; code-fork</option>--}}
{{--                                        <option value="fa fa-coffee">&#xf0f4; coffee</option>--}}
{{--                                        <option value="fa fa-cog">&#xf013; cog</option>--}}
{{--                                        <option value="fa fa-cogs">&#xf085; cogs</option>--}}
{{--                                        <option value="fa fa-columns">&#xf0db; columns</option>--}}
{{--                                        <option value="fa fa-comment">&#xf075; comment</option>--}}
{{--                                        <option value="fa fa-comment-o">&#xf0e5; comment-o</option>--}}
{{--                                        <option value="fa fa-comments">&#xf086; comments</option>--}}
{{--                                        <option value="fa fa-comments-o">&#xf0e6; comments-o</option>--}}
{{--                                        <option value="fa fa-compass">&#xf14e; compass</option>--}}
{{--                                        <option value="fa fa-compress">&#xf066; compress</option>--}}
{{--                                        <option value="fa fa-credit-card">&#xf09d; credit-card</option>--}}
{{--                                        <option value="fa fa-crop">&#xf125; crop</option>--}}
{{--                                        <option value="fa fa-crosshairs">&#xf05b; crosshairs</option>--}}
{{--                                        <option value="fa fa-css3">&#xf13c; css3</option>--}}
{{--                                        <option value="fa fa-cutlery">&#xf0f5; cutlery</option>--}}
{{--                                        <option value="fa fa-desktop">&#xf108; desktop</option>--}}
{{--                                        <option value="fa fa-dot-circle-o">&#xf192; dot-circle-o</option>--}}
{{--                                        <option value="fa fa-download">&#xf019; download</option>--}}
{{--                                        <option value="fa fa-dribbble">&#xf17d; dribbble</option>--}}
{{--                                        <option value="fa fa-dropbox">&#xf16b; dropbox</option>--}}
{{--                                        <option value="fa fa-eject">&#xf052; eject</option>--}}
{{--                                        <option value="fa fa-ellipsis-h">&#xf141; ellipsis-h</option>--}}
{{--                                        <option value="fa fa-ellipsis-v">&#xf142; ellipsis-v</option>--}}
{{--                                        <option value="fa fa-envelope">&#xf0e0; envelope</option>--}}
{{--                                        <option value="fa fa-envelope-o">&#xf003; envelope-o</option>--}}
{{--                                        <option value="fa fa-eraser">&#xf12d; eraser</option>--}}
{{--                                        <option value="fa fa-eur">&#xf153; eur</option>--}}
{{--                                        <option value="fa fa-exchange">&#xf0ec; exchange</option>--}}
{{--                                        <option value="fa fa-exclamation">&#xf12a; exclamation</option>--}}
{{--                                        <option value="fa fa-exclamation-circle">&#xf06a; exclamation-circle</option>--}}
{{--                                        <option value="fa fa-exclamation-triangle">&#xf071; exclamation-triangle</option>--}}
{{--                                        <option value="fa fa-expand">&#xf065; expand</option>--}}
{{--                                        <option value="fa fa-external-link">&#xf08e; external-link</option>--}}
{{--                                        <option value="fa fa-external-link-square">&#xf14c; external-link-square</option>--}}
{{--                                        <option value="fa fa-eye">&#xf06e; eye</option>--}}
{{--                                        <option value="fa fa-eye-slash">&#xf070; eye-slash</option>--}}
{{--                                        <option value="fa fa-facebook">&#xf09a; facebook</option>--}}
{{--                                        <option value="fa fa-facebook-square">&#xf082; facebook-square</option>--}}
{{--                                        <option value="fa fa-fast-backward">&#xf049; fast-backward</option>--}}
{{--                                        <option value="fa fa-fast-forward">&#xf050; fast-forward</option>--}}
{{--                                        <option value="fa fa-female">&#xf182; female</option>--}}
{{--                                        <option value="fa fa-fighter-jet">&#xf0fb; fighter-jet</option>--}}
{{--                                        <option value="fa fa-file">&#xf15b; file</option>--}}
{{--                                        <option value="fa fa-file-o">&#xf016; file-o</option>--}}
{{--                                        <option value="fa fa-file-text">&#xf15c; file-text</option>--}}
{{--                                        <option value="fa fa-file-text-o">&#xf0f6; file-text-o</option>--}}
{{--                                        <option value="fa fa-files-o">&#xf0c5; files-o</option>--}}
{{--                                        <option value="fa fa-film">&#xf008; film</option>--}}
{{--                                        <option value="fa fa-filter">&#xf0b0; filter</option>--}}
{{--                                        <option value="fa fa-fire">&#xf06d; fire</option>--}}
{{--                                        <option value="fa fa-fire-extinguisher">&#xf134; fire-extinguisher</option>--}}
{{--                                        <option value="fa fa-flag">&#xf024; flag</option>--}}
{{--                                        <option value="fa fa-flag-checkered">&#xf11e; flag-checkered</option>--}}
{{--                                        <option value="fa fa-flag-o">&#xf11d; flag-o</option>--}}
{{--                                        <option value="fa fa-flask">&#xf0c3; flask</option>--}}
{{--                                        <option value="fa fa-flickr">&#xf16e; flickr</option>--}}
{{--                                        <option value="fa fa-floppy-o">&#xf0c7; floppy-o</option>--}}
{{--                                        <option value="fa fa-folder">&#xf07b; folder</option>--}}
{{--                                        <option value="fa fa-folder-o">&#xf114; folder-o</option>--}}
{{--                                        <option value="fa fa-folder-open">&#xf07c; folder-open</option>--}}
{{--                                        <option value="fa fa-folder-open-o">&#xf115; folder-open-o</option>--}}
{{--                                        <option value="fa fa-font">&#xf031; font</option>--}}
{{--                                        <option value="fa fa-forward">&#xf04e; forward</option>--}}
{{--                                        <option value="fa fa-foursquare">&#xf180; foursquare</option>--}}
{{--                                        <option value="fa fa-frown-o">&#xf119; frown-o</option>--}}
{{--                                        <option value="fa fa-gamepad">&#xf11b; gamepad</option>--}}
{{--                                        <option value="fa fa-gavel">&#xf0e3; gavel</option>--}}
{{--                                        <option value="fa fa-gbp">&#xf154; gbp</option>--}}
{{--                                        <option value="fa fa-gift">&#xf06b; gift</option>--}}
{{--                                        <option value="fa fa-github">&#xf09b; github</option>--}}
{{--                                        <option value="fa fa-github-alt">&#xf113; github-alt</option>--}}
{{--                                        <option value="fa fa-github-square">&#xf092; github-square</option>--}}
{{--                                        <option value="fa fa-gittip">&#xf184; gittip</option>--}}
{{--                                        <option value="fa fa-glass">&#xf000; glass</option>--}}
{{--                                        <option value="fa fa-globe">&#xf0ac; globe</option>--}}
{{--                                        <option value="fa fa-google-plus">&#xf0d5; google-plus</option>--}}
{{--                                        <option value="fa fa-google-plus-square">&#xf0d4; google-plus-square</option>--}}
{{--                                        <option value="fa fa-h-square">&#xf0fd; h-square</option>--}}
{{--                                        <option value="fa fa-hand-o-down">&#xf0a7; hand-o-down</option>--}}
{{--                                        <option value="fa fa-hand-o-left">&#xf0a5; hand-o-left</option>--}}
{{--                                        <option value="fa fa-hand-o-right">&#xf0a4; hand-o-right</option>--}}
{{--                                        <option value="fa fa-hand-o-up">&#xf0a6; hand-o-up</option>--}}
{{--                                        <option value="fa fa-hdd-o">&#xf0a0; hdd-o</option>--}}
{{--                                        <option value="fa fa-headphones">&#xf025; headphones</option>--}}
{{--                                        <option value="fa fa-heart">&#xf004; heart</option>--}}
{{--                                        <option value="fa fa-heart-o">&#xf08a; heart-o</option>--}}
{{--                                        <option value="fa fa-home">&#xf015; home</option>--}}
{{--                                        <option value="fa fa-hospital-o">&#xf0f8; hospital-o</option>--}}
{{--                                        <option value="fa fa-html5">&#xf13b; html5</option>--}}
{{--                                        <option value="fa fa-inbox">&#xf01c; inbox</option>--}}
{{--                                        <option value="fa fa-indent">&#xf03c; indent</option>--}}
{{--                                        <option value="fa fa-info">&#xf129; info</option>--}}
{{--                                        <option value="fa fa-info-circle">&#xf05a; info-circle</option>--}}
{{--                                        <option value="fa fa-inr">&#xf156; inr</option>--}}
{{--                                        <option value="fa fa-instagram">&#xf16d; instagram</option>--}}
{{--                                        <option value="fa fa-italic">&#xf033; italic</option>--}}
{{--                                        <option value="fa fa-jpy">&#xf157; jpy</option>--}}
{{--                                        <option value="fa fa-key">&#xf084; key</option>--}}
{{--                                        <option value="fa fa-keyboard-o">&#xf11c; keyboard-o</option>--}}
{{--                                        <option value="fa fa-krw">&#xf159; krw</option>--}}
{{--                                        <option value="fa fa-laptop">&#xf109; laptop</option>--}}
{{--                                        <option value="fa fa-leaf">&#xf06c; leaf</option>--}}
{{--                                        <option value="fa fa-lemon-o">&#xf094; lemon-o</option>--}}
{{--                                        <option value="fa fa-level-down">&#xf149; level-down</option>--}}
{{--                                        <option value="fa fa-level-up">&#xf148; level-up</option>--}}
{{--                                        <option value="fa fa-lightbulb-o">&#xf0eb; lightbulb-o</option>--}}
{{--                                        <option value="fa fa-link">&#xf0c1; link</option>--}}
{{--                                        <option value="fa fa-linkedin">&#xf0e1; linkedin</option>--}}
{{--                                        <option value="fa fa-linkedin-square">&#xf08c; linkedin-square</option>--}}
{{--                                        <option value="fa fa-linux">&#xf17c; linux</option>--}}
{{--                                        <option value="fa fa-list">&#xf03a; list</option>--}}
{{--                                        <option value="fa fa-list-alt">&#xf022; list-alt</option>--}}
{{--                                        <option value="fa fa-list-ol">&#xf0cb; list-ol</option>--}}
{{--                                        <option value="fa fa-list-ul">&#xf0ca; list-ul</option>--}}
{{--                                        <option value="fa fa-location-arrow">&#xf124; location-arrow</option>--}}
{{--                                        <option value="fa fa-lock">&#xf023; lock</option>--}}
{{--                                        <option value="fa fa-long-arrow-down">&#xf175; long-arrow-down</option>--}}
{{--                                        <option value="fa fa-long-arrow-left">&#xf177; long-arrow-left</option>--}}
{{--                                        <option value="fa fa-long-arrow-right">&#xf178; long-arrow-right</option>--}}
{{--                                        <option value="fa fa-long-arrow-up">&#xf176; long-arrow-up</option>--}}
{{--                                        <option value="fa fa-magic">&#xf0d0; magic</option>--}}
{{--                                        <option value="fa fa-magnet">&#xf076; magnet</option>--}}
{{--                                        <option value="fa fa-mail-reply-all">&#xf122; mail-reply-all</option>--}}
{{--                                        <option value="fa fa-male">&#xf183; male</option>--}}
{{--                                        <option value="fa fa-map-marker">&#xf041; map-marker</option>--}}
{{--                                        <option value="fa fa-maxcdn">&#xf136; maxcdn</option>--}}
{{--                                        <option value="fa fa-medkit">&#xf0fa; medkit</option>--}}
{{--                                        <option value="fa fa-meh-o">&#xf11a; meh-o</option>--}}
{{--                                        <option value="fa fa-microphone">&#xf130; microphone</option>--}}
{{--                                        <option value="fa fa-microphone-slash">&#xf131; microphone-slash</option>--}}
{{--                                        <option value="fa fa-minus">&#xf068; minus</option>--}}
{{--                                        <option value="fa fa-minus-circle">&#xf056; minus-circle</option>--}}
{{--                                        <option value="fa fa-minus-square">&#xf146; minus-square</option>--}}
{{--                                        <option value="fa fa-minus-square-o">&#xf147; minus-square-o</option>--}}
{{--                                        <option value="fa fa-mobile">&#xf10b; mobile</option>--}}
{{--                                        <option value="fa fa-money">&#xf0d6; money</option>--}}
{{--                                        <option value="fa fa-moon-o">&#xf186; moon-o</option>--}}
{{--                                        <option value="fa fa-music">&#xf001; music</option>--}}
{{--                                        <option value="fa fa-outdent">&#xf03b; outdent</option>--}}
{{--                                        <option value="fa fa-pagelines">&#xf18c; pagelines</option>--}}
{{--                                        <option value="fa fa-paperclip">&#xf0c6; paperclip</option>--}}
{{--                                        <option value="fa fa-pause">&#xf04c; pause</option>--}}
{{--                                        <option value="fa fa-pencil">&#xf040; pencil</option>--}}
{{--                                        <option value="fa fa-pencil-square">&#xf14b; pencil-square</option>--}}
{{--                                        <option value="fa fa-pencil-square-o">&#xf044; pencil-square-o</option>--}}
{{--                                        <option value="fa fa-phone">&#xf095; phone</option>--}}
{{--                                        <option value="fa fa-phone-square">&#xf098; phone-square</option>--}}
{{--                                        <option value="fa fa-picture-o">&#xf03e; picture-o</option>--}}
{{--                                        <option value="fa fa-pinterest">&#xf0d2; pinterest</option>--}}
{{--                                        <option value="fa fa-pinterest-square">&#xf0d3; pinterest-square</option>--}}
{{--                                        <option value="fa fa-plane">&#xf072; plane</option>--}}
{{--                                        <option value="fa fa-play">&#xf04b; play</option>--}}
{{--                                        <option value="fa fa-play-circle">&#xf144; play-circle</option>--}}
{{--                                        <option value="fa fa-play-circle-o">&#xf01d; play-circle-o</option>--}}
{{--                                        <option value="fa fa-plus">&#xf067; plus</option>--}}
{{--                                        <option value="fa fa-plus-circle">&#xf055; plus-circle</option>--}}
{{--                                        <option value="fa fa-plus-square">&#xf0fe; plus-square</option>--}}
{{--                                        <option value="fa fa-plus-square-o">&#xf196; plus-square-o</option>--}}
{{--                                        <option value="fa fa-power-off">&#xf011; power-off</option>--}}
{{--                                        <option value="fa fa-print">&#xf02f; print</option>--}}
{{--                                        <option value="fa fa-puzzle-piece">&#xf12e; puzzle-piece</option>--}}
{{--                                        <option value="fa fa-qrcode">&#xf029; qrcode</option>--}}
{{--                                        <option value="fa fa-question">&#xf128; question</option>--}}
{{--                                        <option value="fa fa-question-circle">&#xf059; question-circle</option>--}}
{{--                                        <option value="fa fa-quote-left">&#xf10d; quote-left</option>--}}
{{--                                        <option value="fa fa-quote-right">&#xf10e; quote-right</option>--}}
{{--                                        <option value="fa fa-random">&#xf074; random</option>--}}
{{--                                        <option value="fa fa-refresh">&#xf021; refresh</option>--}}
{{--                                        <option value="fa fa-renren">&#xf18b; renren</option>--}}
{{--                                        <option value="fa fa-repeat">&#xf01e; repeat</option>--}}
{{--                                        <option value="fa fa-reply">&#xf112; reply</option>--}}
{{--                                        <option value="fa fa-reply-all">&#xf122; reply-all</option>--}}
{{--                                        <option value="fa fa-retweet">&#xf079; retweet</option>--}}
{{--                                        <option value="fa fa-road">&#xf018; road</option>--}}
{{--                                        <option value="fa fa-rocket">&#xf135; rocket</option>--}}
{{--                                        <option value="fa fa-rss">&#xf09e; rss</option>--}}
{{--                                        <option value="fa fa-rss-square">&#xf143; rss-square</option>--}}
{{--                                        <option value="fa fa-rub">&#xf158; rub</option>--}}
{{--                                        <option value="fa fa-scissors">&#xf0c4; scissors</option>--}}
{{--                                        <option value="fa fa-search">&#xf002; search</option>--}}
{{--                                        <option value="fa fa-search-minus">&#xf010; search-minus</option>--}}
{{--                                        <option value="fa fa-search-plus">&#xf00e; search-plus</option>--}}
{{--                                        <option value="fa fa-share">&#xf064; share</option>--}}
{{--                                        <option value="fa fa-share-square">&#xf14d; share-square</option>--}}
{{--                                        <option value="fa fa-share-square-o">&#xf045; share-square-o</option>--}}
{{--                                        <option value="fa fa-shield">&#xf132; shield</option>--}}
{{--                                        <option value="fa fa-shopping-cart">&#xf07a; shopping-cart</option>--}}
{{--                                        <option value="fa fa-sign-in">&#xf090; sign-in</option>--}}
{{--                                        <option value="fa fa-sign-out">&#xf08b; sign-out</option>--}}
{{--                                        <option value="fa fa-signal">&#xf012; signal</option>--}}
{{--                                        <option value="fa fa-sitemap">&#xf0e8; sitemap</option>--}}
{{--                                        <option value="fa fa-skype">&#xf17e; skype</option>--}}
{{--                                        <option value="fa fa-smile-o">&#xf118; smile-o</option>--}}
{{--                                        <option value="fa fa-sort">&#xf0dc; sort</option>--}}
{{--                                        <option value="fa fa-sort-alpha-asc">&#xf15d; sort-alpha-asc</option>--}}
{{--                                        <option value="fa fa-sort-alpha-desc">&#xf15e; sort-alpha-desc</option>--}}
{{--                                        <option value="fa fa-sort-amount-asc">&#xf160; sort-amount-asc</option>--}}
{{--                                        <option value="fa fa-sort-amount-desc">&#xf161; sort-amount-desc</option>--}}
{{--                                        <option value="fa fa-sort-asc">&#xf0dd; sort-asc</option>--}}
{{--                                        <option value="fa fa-sort-desc">&#xf0de; sort-desc</option>--}}
{{--                                        <option value="fa fa-sort-numeric-asc">&#xf162; sort-numeric-asc</option>--}}
{{--                                        <option value="fa fa-sort-numeric-desc">&#xf163; sort-numeric-desc</option>--}}
{{--                                        <option value="fa fa-spinner">&#xf110; spinner</option>--}}
{{--                                        <option value="fa fa-square">&#xf0c8; square</option>--}}
{{--                                        <option value="fa fa-square-o">&#xf096; square-o</option>--}}
{{--                                        <option value="fa fa-stack-exchange">&#xf18d; stack-exchange</option>--}}
{{--                                        <option value="fa fa-stack-overflow">&#xf16c; stack-overflow</option>--}}
{{--                                        <option value="fa fa-star">&#xf005; star</option>--}}
{{--                                        <option value="fa fa-star-half">&#xf089; star-half</option>--}}
{{--                                        <option value="fa fa-star-half-o">&#xf123; star-half-o</option>--}}
{{--                                        <option value="fa fa-star-o">&#xf006; star-o</option>--}}
{{--                                        <option value="fa fa-step-backward">&#xf048; step-backward</option>--}}
{{--                                        <option value="fa fa-step-forward">&#xf051; step-forward</option>--}}
{{--                                        <option value="fa fa-stethoscope">&#xf0f1; stethoscope</option>--}}
{{--                                        <option value="fa fa-stop">&#xf04d; stop</option>--}}
{{--                                        <option value="fa fa-strikethrough">&#xf0cc; strikethrough</option>--}}
{{--                                        <option value="fa fa-subscript">&#xf12c; subscript</option>--}}
{{--                                        <option value="fa fa-suitcase">&#xf0f2; suitcase</option>--}}
{{--                                        <option value="fa fa-sun-o">&#xf185; sun-o</option>--}}
{{--                                        <option value="fa fa-superscript">&#xf12b; superscript</option>--}}
{{--                                        <option value="fa fa-table">&#xf0ce; table</option>--}}
{{--                                        <option value="fa fa-tablet">&#xf10a; tablet</option>--}}
{{--                                        <option value="fa fa-tachometer">&#xf0e4; tachometer</option>--}}
{{--                                        <option value="fa fa-tag">&#xf02b; tag</option>--}}
{{--                                        <option value="fa fa-tags">&#xf02c; tags</option>--}}
{{--                                        <option value="fa fa-tasks">&#xf0ae; tasks</option>--}}
{{--                                        <option value="fa fa-terminal">&#xf120; terminal</option>--}}
{{--                                        <option value="fa fa-text-height">&#xf034; text-height</option>--}}
{{--                                        <option value="fa fa-text-width">&#xf035; text-width</option>--}}
{{--                                        <option value="fa fa-th">&#xf00a; th</option>--}}
{{--                                        <option value="fa fa-th-large">&#xf009; th-large</option>--}}
{{--                                        <option value="fa fa-th-list">&#xf00b; th-list</option>--}}
{{--                                        <option value="fa fa-thumb-tack">&#xf08d; thumb-tack</option>--}}
{{--                                        <option value="fa fa-thumbs-down">&#xf165; thumbs-down</option>--}}
{{--                                        <option value="fa fa-thumbs-o-down">&#xf088; thumbs-o-down</option>--}}
{{--                                        <option value="fa fa-thumbs-o-up">&#xf087; thumbs-o-up</option>--}}
{{--                                        <option value="fa fa-thumbs-up">&#xf164; thumbs-up</option>--}}
{{--                                        <option value="fa fa-ticket">&#xf145; ticket</option>--}}
{{--                                        <option value="fa fa-times">&#xf00d; times</option>--}}
{{--                                        <option value="fa fa-times-circle">&#xf057; times-circle</option>--}}
{{--                                        <option value="fa fa-times-circle-o">&#xf05c; times-circle-o</option>--}}
{{--                                        <option value="fa fa-tint">&#xf043; tint</option>--}}
{{--                                        <option value="fa fa-trash-o">&#xf014; trash-o</option>--}}
{{--                                        <option value="fa fa-trello">&#xf181; trello</option>--}}
{{--                                        <option value="fa fa-trophy">&#xf091; trophy</option>--}}
{{--                                        <option value="fa fa-truck">&#xf0d1; truck</option>--}}
{{--                                        <option value="fa fa-try">&#xf195; try</option>--}}
{{--                                        <option value="fa fa-tumblr">&#xf173; tumblr</option>--}}
{{--                                        <option value="fa fa-tumblr-square">&#xf174; tumblr-square</option>--}}
{{--                                        <option value="fa fa-twitter">&#xf099; twitter</option>--}}
{{--                                        <option value="fa fa-twitter-square">&#xf081; twitter-square</option>--}}
{{--                                        <option value="fa fa-umbrella">&#xf0e9; umbrella</option>--}}
{{--                                        <option value="fa fa-underline">&#xf0cd; underline</option>--}}
{{--                                        <option value="fa fa-undo">&#xf0e2; undo</option>--}}
{{--                                        <option value="fa fa-unlock">&#xf09c; unlock</option>--}}
{{--                                        <option value="fa fa-unlock-alt">&#xf13e; unlock-alt</option>--}}
{{--                                        <option value="fa fa-upload">&#xf093; upload</option>--}}
{{--                                        <option value="fa fa-usd">&#xf155; usd</option>--}}
{{--                                        <option value="fa fa-user">&#xf007; user</option>--}}
{{--                                        <option value="fa fa-user-md">&#xf0f0; user-md</option>--}}
{{--                                        <option value="fa fa-users">&#xf0c0; users</option>--}}
{{--                                        <option value="fa fa-video-camera">&#xf03d; video-camera</option>--}}
{{--                                        <option value="fa fa-vimeo-square">&#xf194; vimeo-square</option>--}}
{{--                                        <option value="fa fa-vk">&#xf189; vk</option>--}}
{{--                                        <option value="fa fa-volume-down">&#xf027; volume-down</option>--}}
{{--                                        <option value="fa fa-volume-off">&#xf026; volume-off</option>--}}
{{--                                        <option value="fa fa-volume-up">&#xf028; volume-up</option>--}}
{{--                                        <option value="fa fa-weibo">&#xf18a; weibo</option>--}}
{{--                                        <option value="fa fa-wheelchair">&#xf193; wheelchair</option>--}}
{{--                                        <option value="fa fa-windows">&#xf17a; windows</option>--}}
{{--                                        <option value="fa fa-wrench">&#xf0ad; wrench</option>--}}
{{--                                        <option value="fa fa-xing">&#xf168; xing</option>--}}
{{--                                        <option value="fa fa-xing-square">&#xf169; xing-square</option>--}}
{{--                                        <option value="fa fa-youtube">&#xf167; youtube</option>--}}
{{--                                        <option value="fa fa-youtube-play">&#xf16a; youtube-play</option>--}}
{{--                                        <option value="fa fa-youtube-square">&#xf166; youtube-square</option>--}}
{{--                                    </select>--}}
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label" for="title">İkon Başlığı<span
                                                class="required">*</span>
                                    </label>
                                    <input type="text" class="form-control"
                                           value="{{ $icon->title ?? old('title') }}" name="title">
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label" for="description">Açıklama<span
                                                class="required">*</span>
                                    </label>
                                    <textarea name="description" id="description"
                                              rows="5">{{ $icon->description ?? old('description') }}</textarea>
                                </div>
                                <br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Kaydet</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('admin/ckeditor/my_plugins/autogrow.min.js') }}"></script>
    <script>
        $(function () {
            var options = {
                uiColor: "#f4645f",
                language: "tr",
                extraPlugins: "autogrow",
                autoGrow_minHeight: 250,
                autoGrow_maxHeight: 600,
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
            };
            CKEDITOR.replace("description", options);
        });
    </script>
@endsection