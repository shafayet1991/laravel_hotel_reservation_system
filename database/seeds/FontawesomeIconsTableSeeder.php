<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FontawesomeIconsTableSeeder extends Seeder
{
    public function run()
    {
        // Şu an için durduruldu daha sonra devam ettirilebilir.

        $test = '

<option value="fa-calendar">&#xf073; calendar</option>
<option value="fa-calendar-o">&#xf133; calendar-o</option>
<option value="fa-camera">&#xf030; camera</option>
<option value="fa-camera-retro">&#xf083; camera-retro</option>
<option value="fa-caret-down">&#xf0d7; caret-down</option>
<option value="fa-caret-left">&#xf0d9; caret-left</option>
<option value="fa-caret-right">&#xf0da; caret-right</option>
<option value="fa-caret-square-o-down">&#xf150; caret-square-o-down</option>
<option value="fa-caret-square-o-left">&#xf191; caret-square-o-left</option>
<option value="fa-caret-square-o-right">&#xf152; caret-square-o-right</option>
<option value="fa-caret-square-o-up">&#xf151; caret-square-o-up</option>
<option value="fa-caret-up">&#xf0d8; caret-up</option>
<option value="fa-certificate">&#xf0a3; certificate</option>
<option value="fa-chain-broken">&#xf127; chain-broken</option>
<option value="fa-check">&#xf00c; check</option>
<option value="fa-check-circle">&#xf058; check-circle</option>
<option value="fa-check-circle-o">&#xf05d; check-circle-o</option>
<option value="fa-check-square">&#xf14a; check-square</option>
<option value="fa-check-square-o">&#xf046; check-square-o</option>
<option value="fa-chevron-circle-down">&#xf13a; chevron-circle-down</option>
<option value="fa-chevron-circle-left">&#xf137; chevron-circle-left</option>
<option value="fa-chevron-circle-right">&#xf138; chevron-circle-right</option>
<option value="fa-chevron-circle-up">&#xf139; chevron-circle-up</option>
<option value="fa-chevron-down">&#xf078; chevron-down</option>
<option value="fa-chevron-left">&#xf053; chevron-left</option>
<option value="fa-chevron-right">&#xf054; chevron-right</option>
<option value="fa-chevron-up">&#xf077; chevron-up</option>
<option value="fa-circle-o">&#xf10c; circle-o</option>
<option value="fa-clipboard">&#xf0ea; clipboard</option>
<option value="fa-clock-o">&#xf017; clock-o</option>
<option value="fa-cloud">&#xf0c2; cloud</option>
<option value="fa-cloud-download">&#xf0ed; cloud-download</option>
<option value="fa-cloud-upload">&#xf0ee; cloud-upload</option>
<option value="fa-code">&#xf121; code</option>
<option value="fa-code-fork">&#xf126; code-fork</option>
<option value="fa-coffee">&#xf0f4; coffee</option>
<option value="fa-cog">&#xf013; cog</option>
<option value="fa-cogs">&#xf085; cogs</option>
<option value="fa-columns">&#xf0db; columns</option>
<option value="fa-comment">&#xf075; comment</option>
<option value="fa-comment-o">&#xf0e5; comment-o</option>
<option value="fa-comments">&#xf086; comments</option>
<option value="fa-comments-o">&#xf0e6; comments-o</option>
<option value="fa-compass">&#xf14e; compass</option>
<option value="fa-compress">&#xf066; compress</option>
<option value="fa-credit-card">&#xf09d; credit-card</option>
<option value="fa-crop">&#xf125; crop</option>
<option value="fa-crosshairs">&#xf05b; crosshairs</option>
<option value="fa-css3">&#xf13c; css3</option>
<option value="fa-cutlery">&#xf0f5; cutlery</option>
<option value="fa-desktop">&#xf108; desktop</option>
<option value="fa-dot-circle-o">&#xf192; dot-circle-o</option>
<option value="fa-download">&#xf019; download</option>
<option value="fa-dribbble">&#xf17d; dribbble</option>
<option value="fa-dropbox">&#xf16b; dropbox</option>
<option value="fa-eject">&#xf052; eject</option>
<option value="fa-ellipsis-h">&#xf141; ellipsis-h</option>
<option value="fa-ellipsis-v">&#xf142; ellipsis-v</option>
<option value="fa-envelope">&#xf0e0; envelope</option>
<option value="fa-envelope-o">&#xf003; envelope-o</option>
<option value="fa-eraser">&#xf12d; eraser</option>
<option value="fa-eur">&#xf153; eur</option>
<option value="fa-exchange">&#xf0ec; exchange</option>
<option value="fa-exclamation">&#xf12a; exclamation</option>
<option value="fa-exclamation-circle">&#xf06a; exclamation-circle</option>
<option value="fa-exclamation-triangle">&#xf071; exclamation-triangle</option>
<option value="fa-expand">&#xf065; expand</option>
<option value="fa-external-link">&#xf08e; external-link</option>
<option value="fa-external-link-square">&#xf14c; external-link-square</option>
<option value="fa-eye">&#xf06e; eye</option>
<option value="fa-eye-slash">&#xf070; eye-slash</option>
<option value="fa-facebook">&#xf09a; facebook</option>
<option value="fa-facebook-square">&#xf082; facebook-square</option>
<option value="fa-fast-backward">&#xf049; fast-backward</option>
<option value="fa-fast-forward">&#xf050; fast-forward</option>
<option value="fa-female">&#xf182; female</option>
<option value="fa-fighter-jet">&#xf0fb; fighter-jet</option>
<option value="fa-file">&#xf15b; file</option>
<option value="fa-file-o">&#xf016; file-o</option>
<option value="fa-file-text">&#xf15c; file-text</option>
<option value="fa-file-text-o">&#xf0f6; file-text-o</option>
<option value="fa-files-o">&#xf0c5; files-o</option>
<option value="fa-film">&#xf008; film</option>
<option value="fa-filter">&#xf0b0; filter</option>
<option value="fa-fire">&#xf06d; fire</option>
<option value="fa-fire-extinguisher">&#xf134; fire-extinguisher</option>
<option value="fa-flag">&#xf024; flag</option>
<option value="fa-flag-checkered">&#xf11e; flag-checkered</option>
<option value="fa-flag-o">&#xf11d; flag-o</option>
<option value="fa-flask">&#xf0c3; flask</option>
<option value="fa-flickr">&#xf16e; flickr</option>
<option value="fa-floppy-o">&#xf0c7; floppy-o</option>
<option value="fa-folder">&#xf07b; folder</option>
<option value="fa-folder-o">&#xf114; folder-o</option>
<option value="fa-folder-open">&#xf07c; folder-open</option>
<option value="fa-folder-open-o">&#xf115; folder-open-o</option>
<option value="fa-font">&#xf031; font</option>
<option value="fa-forward">&#xf04e; forward</option>
<option value="fa-foursquare">&#xf180; foursquare</option>
<option value="fa-frown-o">&#xf119; frown-o</option>
<option value="fa-gamepad">&#xf11b; gamepad</option>
<option value="fa-gavel">&#xf0e3; gavel</option>
<option value="fa-gbp">&#xf154; gbp</option>
<option value="fa-gift">&#xf06b; gift</option>
<option value="fa-github">&#xf09b; github</option>
<option value="fa-github-alt">&#xf113; github-alt</option>
<option value="fa-github-square">&#xf092; github-square</option>
<option value="fa-gittip">&#xf184; gittip</option>
<option value="fa-glass">&#xf000; glass</option>
<option value="fa-globe">&#xf0ac; globe</option>
<option value="fa-google-plus">&#xf0d5; google-plus</option>
<option value="fa-google-plus-square">&#xf0d4; google-plus-square</option>
<option value="fa-h-square">&#xf0fd; h-square</option>
<option value="fa-hand-o-down">&#xf0a7; hand-o-down</option>
<option value="fa-hand-o-left">&#xf0a5; hand-o-left</option>
<option value="fa-hand-o-right">&#xf0a4; hand-o-right</option>
<option value="fa-hand-o-up">&#xf0a6; hand-o-up</option>
<option value="fa-hdd-o">&#xf0a0; hdd-o</option>
<option value="fa-headphones">&#xf025; headphones</option>
<option value="fa-heart">&#xf004; heart</option>
<option value="fa-heart-o">&#xf08a; heart-o</option>
<option value="fa-home">&#xf015; home</option>
<option value="fa-hospital-o">&#xf0f8; hospital-o</option>
<option value="fa-html5">&#xf13b; html5</option>
<option value="fa-inbox">&#xf01c; inbox</option>
<option value="fa-indent">&#xf03c; indent</option>
<option value="fa-info">&#xf129; info</option>
<option value="fa-info-circle">&#xf05a; info-circle</option>
<option value="fa-inr">&#xf156; inr</option>
<option value="fa-instagram">&#xf16d; instagram</option>
<option value="fa-italic">&#xf033; italic</option>
<option value="fa-jpy">&#xf157; jpy</option>
<option value="fa-key">&#xf084; key</option>
<option value="fa-keyboard-o">&#xf11c; keyboard-o</option>
<option value="fa-krw">&#xf159; krw</option>
<option value="fa-laptop">&#xf109; laptop</option>
<option value="fa-leaf">&#xf06c; leaf</option>
<option value="fa-lemon-o">&#xf094; lemon-o</option>
<option value="fa-level-down">&#xf149; level-down</option>
<option value="fa-level-up">&#xf148; level-up</option>
<option value="fa-lightbulb-o">&#xf0eb; lightbulb-o</option>
<option value="fa-link">&#xf0c1; link</option>
<option value="fa-linkedin">&#xf0e1; linkedin</option>
<option value="fa-linkedin-square">&#xf08c; linkedin-square</option>
<option value="fa-linux">&#xf17c; linux</option>
<option value="fa-list">&#xf03a; list</option>
<option value="fa-list-alt">&#xf022; list-alt</option>
<option value="fa-list-ol">&#xf0cb; list-ol</option>
<option value="fa-list-ul">&#xf0ca; list-ul</option>
<option value="fa-location-arrow">&#xf124; location-arrow</option>
<option value="fa-lock">&#xf023; lock</option>
<option value="fa-long-arrow-down">&#xf175; long-arrow-down</option>
<option value="fa-long-arrow-left">&#xf177; long-arrow-left</option>
<option value="fa-long-arrow-right">&#xf178; long-arrow-right</option>
<option value="fa-long-arrow-up">&#xf176; long-arrow-up</option>
<option value="fa-magic">&#xf0d0; magic</option>
<option value="fa-magnet">&#xf076; magnet</option>
<option value="fa-mail-reply-all">&#xf122; mail-reply-all</option>
<option value="fa-male">&#xf183; male</option>
<option value="fa-map-marker">&#xf041; map-marker</option>
<option value="fa-maxcdn">&#xf136; maxcdn</option>
<option value="fa-medkit">&#xf0fa; medkit</option>
<option value="fa-meh-o">&#xf11a; meh-o</option>
<option value="fa-microphone">&#xf130; microphone</option>
<option value="fa-microphone-slash">&#xf131; microphone-slash</option>
<option value="fa-minus">&#xf068; minus</option>
<option value="fa-minus-circle">&#xf056; minus-circle</option>
<option value="fa-minus-square">&#xf146; minus-square</option>
<option value="fa-minus-square-o">&#xf147; minus-square-o</option>
<option value="fa-mobile">&#xf10b; mobile</option>
<option value="fa-money">&#xf0d6; money</option>
<option value="fa-moon-o">&#xf186; moon-o</option>
<option value="fa-music">&#xf001; music</option>
<option value="fa-outdent">&#xf03b; outdent</option>
<option value="fa-pagelines">&#xf18c; pagelines</option>
<option value="fa-paperclip">&#xf0c6; paperclip</option>
<option value="fa-pause">&#xf04c; pause</option>
<option value="fa-pencil">&#xf040; pencil</option>
<option value="fa-pencil-square">&#xf14b; pencil-square</option>
<option value="fa-pencil-square-o">&#xf044; pencil-square-o</option>
<option value="fa-phone">&#xf095; phone</option>
<option value="fa-phone-square">&#xf098; phone-square</option>
<option value="fa-picture-o">&#xf03e; picture-o</option>
<option value="fa-pinterest">&#xf0d2; pinterest</option>
<option value="fa-pinterest-square">&#xf0d3; pinterest-square</option>
<option value="fa-plane">&#xf072; plane</option>
<option value="fa-play">&#xf04b; play</option>
<option value="fa-play-circle">&#xf144; play-circle</option>
<option value="fa-play-circle-o">&#xf01d; play-circle-o</option>
<option value="fa-plus">&#xf067; plus</option>
<option value="fa-plus-circle">&#xf055; plus-circle</option>
<option value="fa-plus-square">&#xf0fe; plus-square</option>
<option value="fa-plus-square-o">&#xf196; plus-square-o</option>
<option value="fa-power-off">&#xf011; power-off</option>
<option value="fa-print">&#xf02f; print</option>
<option value="fa-puzzle-piece">&#xf12e; puzzle-piece</option>
<option value="fa-qrcode">&#xf029; qrcode</option>
<option value="fa-question">&#xf128; question</option>
<option value="fa-question-circle">&#xf059; question-circle</option>
<option value="fa-quote-left">&#xf10d; quote-left</option>
<option value="fa-quote-right">&#xf10e; quote-right</option>
<option value="fa-random">&#xf074; random</option>
<option value="fa-refresh">&#xf021; refresh</option>
<option value="fa-renren">&#xf18b; renren</option>
<option value="fa-repeat">&#xf01e; repeat</option>
<option value="fa-reply">&#xf112; reply</option>
<option value="fa-reply-all">&#xf122; reply-all</option>
<option value="fa-retweet">&#xf079; retweet</option>
<option value="fa-road">&#xf018; road</option>
<option value="fa-rocket">&#xf135; rocket</option>
<option value="fa-rss">&#xf09e; rss</option>
<option value="fa-rss-square">&#xf143; rss-square</option>
<option value="fa-rub">&#xf158; rub</option>
<option value="fa-scissors">&#xf0c4; scissors</option>
<option value="fa-search">&#xf002; search</option>
<option value="fa-search-minus">&#xf010; search-minus</option>
<option value="fa-search-plus">&#xf00e; search-plus</option>
<option value="fa-share">&#xf064; share</option>
<option value="fa-share-square">&#xf14d; share-square</option>
<option value="fa-share-square-o">&#xf045; share-square-o</option>
<option value="fa-shield">&#xf132; shield</option>
<option value="fa-shopping-cart">&#xf07a; shopping-cart</option>
<option value="fa-sign-in">&#xf090; sign-in</option>
<option value="fa-sign-out">&#xf08b; sign-out</option>
<option value="fa-signal">&#xf012; signal</option>
<option value="fa-sitemap">&#xf0e8; sitemap</option>
<option value="fa-skype">&#xf17e; skype</option>
<option value="fa-smile-o">&#xf118; smile-o</option>
<option value="fa-sort">&#xf0dc; sort</option>
<option value="fa-sort-alpha-asc">&#xf15d; sort-alpha-asc</option>
<option value="fa-sort-alpha-desc">&#xf15e; sort-alpha-desc</option>
<option value="fa-sort-amount-asc">&#xf160; sort-amount-asc</option>
<option value="fa-sort-amount-desc">&#xf161; sort-amount-desc</option>
<option value="fa-sort-asc">&#xf0dd; sort-asc</option>
<option value="fa-sort-desc">&#xf0de; sort-desc</option>
<option value="fa-sort-numeric-asc">&#xf162; sort-numeric-asc</option>
<option value="fa-sort-numeric-desc">&#xf163; sort-numeric-desc</option>
<option value="fa-spinner">&#xf110; spinner</option>
<option value="fa-square">&#xf0c8; square</option>
<option value="fa-square-o">&#xf096; square-o</option>
<option value="fa-stack-exchange">&#xf18d; stack-exchange</option>
<option value="fa-stack-overflow">&#xf16c; stack-overflow</option>
<option value="fa-star">&#xf005; star</option>
<option value="fa-star-half">&#xf089; star-half</option>
<option value="fa-star-half-o">&#xf123; star-half-o</option>
<option value="fa-star-o">&#xf006; star-o</option>
<option value="fa-step-backward">&#xf048; step-backward</option>
<option value="fa-step-forward">&#xf051; step-forward</option>
<option value="fa-stethoscope">&#xf0f1; stethoscope</option>
<option value="fa-stop">&#xf04d; stop</option>
<option value="fa-strikethrough">&#xf0cc; strikethrough</option>
<option value="fa-subscript">&#xf12c; subscript</option>
<option value="fa-suitcase">&#xf0f2; suitcase</option>
<option value="fa-sun-o">&#xf185; sun-o</option>
<option value="fa-superscript">&#xf12b; superscript</option>
<option value="fa-table">&#xf0ce; table</option>
<option value="fa-tablet">&#xf10a; tablet</option>
<option value="fa-tachometer">&#xf0e4; tachometer</option>
<option value="fa-tag">&#xf02b; tag</option>
<option value="fa-tags">&#xf02c; tags</option>
<option value="fa-tasks">&#xf0ae; tasks</option>
<option value="fa-terminal">&#xf120; terminal</option>
<option value="fa-text-height">&#xf034; text-height</option>
<option value="fa-text-width">&#xf035; text-width</option>
<option value="fa-th">&#xf00a; th</option>
<option value="fa-th-large">&#xf009; th-large</option>
<option value="fa-th-list">&#xf00b; th-list</option>
<option value="fa-thumb-tack">&#xf08d; thumb-tack</option>
<option value="fa-thumbs-down">&#xf165; thumbs-down</option>
<option value="fa-thumbs-o-down">&#xf088; thumbs-o-down</option>
<option value="fa-thumbs-o-up">&#xf087; thumbs-o-up</option>
<option value="fa-thumbs-up">&#xf164; thumbs-up</option>
<option value="fa-ticket">&#xf145; ticket</option>
<option value="fa-times">&#xf00d; times</option>
<option value="fa-times-circle">&#xf057; times-circle</option>
<option value="fa-times-circle-o">&#xf05c; times-circle-o</option>
<option value="fa-tint">&#xf043; tint</option>
<option value="fa-trash-o">&#xf014; trash-o</option>
<option value="fa-trello">&#xf181; trello</option>
<option value="fa-trophy">&#xf091; trophy</option>
<option value="fa-truck">&#xf0d1; truck</option>
<option value="fa-try">&#xf195; try</option>
<option value="fa-tumblr">&#xf173; tumblr</option>
<option value="fa-tumblr-square">&#xf174; tumblr-square</option>
<option value="fa-twitter">&#xf099; twitter</option>
<option value="fa-twitter-square">&#xf081; twitter-square</option>
<option value="fa-umbrella">&#xf0e9; umbrella</option>
<option value="fa-underline">&#xf0cd; underline</option>
<option value="fa-undo">&#xf0e2; undo</option>
<option value="fa-unlock">&#xf09c; unlock</option>
<option value="fa-unlock-alt">&#xf13e; unlock-alt</option>
<option value="fa-upload">&#xf093; upload</option>
<option value="fa-usd">&#xf155; usd</option>
<option value="fa-user">&#xf007; user</option>
<option value="fa-user-md">&#xf0f0; user-md</option>
<option value="fa-users">&#xf0c0; users</option>
<option value="fa-video-camera">&#xf03d; video-camera</option>
<option value="fa-vimeo-square">&#xf194; vimeo-square</option>
<option value="fa-vk">&#xf189; vk</option>
<option value="fa-volume-down">&#xf027; volume-down</option>
<option value="fa-volume-off">&#xf026; volume-off</option>
<option value="fa-volume-up">&#xf028; volume-up</option>
<option value="fa-weibo">&#xf18a; weibo</option>
<option value="fa-wheelchair">&#xf193; wheelchair</option>
<option value="fa-windows">&#xf17a; windows</option>
<option value="fa-wrench">&#xf0ad; wrench</option>
<option value="fa-xing">&#xf168; xing</option>
<option value="fa-xing-square">&#xf169; xing-square</option>
<option value="fa-youtube">&#xf167; youtube</option>
<option value="fa-youtube-play">&#xf16a; youtube-play</option>
<option value="fa-youtube-square">&#xf166; youtube-square</option>
</select>';

        DB::table('fontawesome_icons')->insert([
            ['font' => '&#xf042;','name' => 'adjust','category' => 'general','icon' => 'fa fa-adjust'],
            ['font' => '&#xf170;','name' => 'adn','category' => 'general','icon' => 'fa fa-adn'],
            ['font' => '&#xf037;','name' => 'align-center','category' => 'text','icon' => 'fa fa-align-center'],
            ['font' => '&#xf039;','name' => 'align-justify','category' => 'text','icon' => 'fa fa-align-justify'],
            ['font' => '&#xf036;','name' => 'align-left','category' => 'text','icon' => 'fa fa-align-left'],
            ['font' => '&#xf038;','name' => 'align-right','category' => 'text','icon' => 'fa fa-align-right'],
            ['font' => '&#xf0f9;','name' => 'ambulance','category' => 'medical','icon' => 'fa fa-ambulance'],
            ['font' => '&#xf13d;','name' => 'anchor','category' => 'general','icon' => 'fa fa-anchor'],
            ['font' => '&#xf17b;','name' => 'android','category' => 'mobile','icon' => 'fa fa-android'],
            ['font' => '&#xf103;','name' => 'angle-double-down','category' => 'direction','icon' => 'fa fa-angle-double-down'],
            ['font' => '&#xf100;','name' => 'angle-double-left','category' => 'direction','icon' => 'fa fa-angle-double-left'],
            ['font' => '&#xf101;','name' => 'angle-double-right','category' => 'direction','icon' => 'fa fa-angle-double-right'],
            ['font' => '&#xf102;','name' => 'angle-double-up','category' => 'direction','icon' => 'fa fa-angle-double-up'],
            ['font' => '&#xf107;','name' => 'angle-down','category' => 'direction','icon' => 'fa fa-angle-down'],
            ['font' => '&#xf104;','name' => 'angle-left','category' => 'direction','icon' => 'fa fa-angle-left'],
            ['font' => '&#xf105;','name' => 'angle-right','category' => 'direction','icon' => 'fa fa-angle-right'],
            ['font' => '&#xf106;','name' => 'angle-up','category' => 'direction','icon' => 'fa fa-angle-up'],
            ['font' => '&#xf179;','name' => 'apple','category' => 'general','icon' => 'fa fa-apple'],
            ['font' => '&#xf187;','name' => 'archive','category' => 'general','icon' => 'fa fa-archive'],
            ['font' => '&#xf0ab;','name' => 'arrow-circle-down','category' => 'direction','icon' => 'fa fa-arrow-circle-down'],
            ['font' => '&#xf0a8;','name' => 'arrow-circle-left','category' => 'direction','icon' => 'fa fa-arrow-circle-left'],
            ['font' => '&#xf01a;','name' => 'arrow-circle-o-down','category' => 'direction','icon' => 'fa fa-arrow-circle-o-down'],
            ['font' => '&#xf190;','name' => 'arrow-circle-o-left','category' => 'direction','icon' => 'fa fa-arrow-circle-o-left'],
            ['font' => '&#xf18e;','name' => 'arrow-circle-o-right','category' => 'direction','icon' => 'fa fa-arrow-circle-o-right'],
            ['font' => '&#xf01b;','name' => 'arrow-circle-o-up','category' => 'direction','icon' => 'fa fa-arrow-circle-o-up'],
            ['font' => '&#xf0a9;','name' => 'arrow-circle-right','category' => 'direction','icon' => 'fa fa-arrow-circle-right'],
            ['font' => '&#xf0aa;','name' => 'arrow-circle-up','category' => 'direction','icon' => 'fa fa-arrow-circle-up'],
            ['font' => '&#xf063;','name' => 'arrow-down','category' => 'direction','icon' => 'fa fa-arrow-down'],
            ['font' => '&#xf060;','name' => 'arrow-left','category' => 'direction','icon' => 'fa fa-arrow-left'],
            ['font' => '&#xf061;','name' => 'arrow-right','category' => 'direction','icon' => 'fa fa-arrow-right'],
            ['font' => '&#xf062;','name' => 'arrow-up','category' => 'direction','icon' => 'fa fa-arrow-up'],
            ['font' => '&#xf047;','name' => 'arrows','category' => 'direction','icon' => 'fa fa-arrows'],
            ['font' => '&#xf0b2;','name' => 'arrows-alt','category' => 'direction','icon' => 'fa fa-arrows-alt'],
            ['font' => '&#xf07e;','name' => 'arrows-h','category' => 'direction','icon' => 'fa fa-arrows-h'],
            ['font' => '&#xf07d;','name' => 'arrows-v','category' => 'direction','icon' => 'fa fa-arrows-v'],
            ['font' => '&#xf069;','name' => 'asterisk','category' => 'general','icon' => 'fa fa-asterisk'],
            ['font' => '&#xf04a;','name' => 'backward','category' => 'direction','icon' => 'fa fa-backward'],
            ['font' => '&#xf05e;','name' => 'ban','category' => 'general','icon' => 'fa fa-ban'],
            ['font' => '&#xf080;','name' => 'bar-chart-o','category' => 'chart','icon' => 'fa fa-bar-chart-o'],
            ['font' => '&#xf02a;','name' => 'barcode','category' => 'general','icon' => 'fa fa-barcode'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-bars'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-beer'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-bell'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-bell-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-bitbucket'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-bitbucket-square'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-bold'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-bolt'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-book'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-bookmark'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-bookmark-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-briefcase'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-btc'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-bug'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-building-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-bullhorn'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-bullseye'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-calendar'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-calendar-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-camera'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-camera-retro'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-caret-down'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-caret-left'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-caret-right'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-caret-square-o-down'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-caret-square-o-left'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-caret-square-o-right'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-caret-square-o-up'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-caret-up'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-certificate'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-chain-broken'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-check'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-check-circle'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-check-circle-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-check-square'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-check-square-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-chevron-circle-down'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-chevron-circle-left'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-chevron-circle-right'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-chevron-circle-up'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-chevron-down'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-chevron-left'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-chevron-right'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-chevron-up'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-circle-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-clipboard'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-clock-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-cloud'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-cloud-download'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-cloud-upload'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-code'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-code-fork'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-coffee'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-cog'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-cogs'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-columns'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-comment'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-comment-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-comments'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-comments-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-compass'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-compress'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-credit-card'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-crop'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-crosshairs'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-css3'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-cutlery'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-desktop'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-dot-circle-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-download'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-dribbble'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-dropbox'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-eject'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-ellipsis-h'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-ellipsis-v'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-envelope'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-envelope-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-eraser'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-eur'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-exchange'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-exclamation'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-exclamation-circle'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-exclamation-triangle'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-expand'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-external-link'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-external-link-square'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-eye'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-eye-slash'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-facebook'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-facebook-square'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-fast-backward'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-fast-forward'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-female'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-fighter-jet'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-file'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-file-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-file-text'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-file-text-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-files-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-film'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-filter'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-fire'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-fire-extinguisher'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-flag'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-flag-checkered'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-flag-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-flask'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-flickr'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-floppy-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-folder'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-folder-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-folder-open'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-folder-open-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-font'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-forward'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-foursquare'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-frown-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-gamepad'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-gavel'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-gbp'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-gift'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-github'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-github-alt'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-github-square'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-gittip'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-glass'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-globe'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-google-plus'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-google-plus-square'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-h-square'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-hand-o-down'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-hand-o-left'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-hand-o-right'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-hand-o-up'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-hdd-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-headphones'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-heart'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-heart-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-home'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-hospital-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-html5'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-inbox'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-indent'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-info'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-info-circle'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-inr'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-instagram'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-italic'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-jpy'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-key'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-keyboard-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-krw'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-laptop'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-leaf'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-lemon-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-level-down'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-level-up'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-lightbulb-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-link'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-linkedin'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-linkedin-square'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-linux'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-list'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-list-alt'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-list-ol'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-list-ul'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-location-arrow'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-lock'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-long-arrow-down'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-long-arrow-left'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-long-arrow-right'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-long-arrow-up'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-magic'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-magnet'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-mail-reply-all'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-male'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-map-marker'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-maxcdn'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-medkit'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-meh-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-microphone'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-microphone-slash'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-minus'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-minus-circle'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-minus-square'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-minus-square-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-mobile'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-money'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-moon-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-music'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-outdent'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-pagelines'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-paperclip'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-pause'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-pencil'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-pencil-square'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-pencil-square-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-phone'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-phone-square'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-picture-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-pinterest'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-pinterest-square'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-plane'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-play'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-play-circle'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-play-circle-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-plus'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-plus-circle'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-plus-square'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-plus-square-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-power-off'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-print'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-puzzle-piece'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-qrcode'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-question'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-question-circle'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-quote-left'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-quote-right'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-random'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-refresh'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-renren'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-repeat'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-reply'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-reply-all'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-retweet'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-road'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-rocket'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-rss'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-rss-square'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-rub'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-scissors'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-search'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-search-minus'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-search-plus'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-share'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-share-square'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-share-square-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-shield'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-shopping-cart'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-sign-in'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-sign-out'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-signal'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-sitemap'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-skype'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-smile-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-sort'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-sort-alpha-asc'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-sort-alpha-desc'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-sort-amount-asc'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-sort-amount-desc'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-sort-asc'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-sort-desc'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-sort-numeric-asc'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-sort-numeric-desc'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-spinner'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-square'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-square-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-stack-exchange'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-stack-overflow'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-star'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-star-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-star-half'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-star-half-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-step-backward'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-step-forward'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-stethoscope'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-stop'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-strikethrough'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-subscript'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-suitcase'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-sun-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-superscript'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-table'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-tachometer'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-tag'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-tags'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-tasks'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-terminal'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-text-width'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-text-height'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-th'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-th-large'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-th-list'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-thumb-tack'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-thumbs-down'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-thumbs-o-down'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-thumbs-o-up'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-thumbs-up'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-ticket'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-times'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-times-circle'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-times-circle-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-tint'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-trash-o'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-trello'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-trophy'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-truck'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-try'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-tumblr'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-tumblr-square'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-twitter'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-twitter-square'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-umbrella'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-underline'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-undo'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-unlock'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-unlock-alt'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-upload'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-youtube-square'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-youtube-play'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-youtube'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-xing-square'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-xing'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-wrench'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-windows'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-wheelchair'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-weibo'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-volume-up'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-volume-off'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-volume-down'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-vk'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-vimeo-square'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-video-camera'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-users'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-user-md'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-user'],
            ['font' => '','name' => '','category' => '','icon' => 'fa fa-usd'],
        ]);
    }
}
