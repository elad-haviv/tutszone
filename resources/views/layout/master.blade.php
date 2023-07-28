<!DOCTYPE html>
<html class="no-js" lang="he">
<head>
    @section("meta-tags")
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="author" content="Elad Haviv" />
    @show

    <title>
        @section("title")
            TutsZone
        @show
    </title>

    @section("stylesheets")
        <link rel="stylesheet" href="{{ url("resources/assets/css/uikit-rtl.css") }}" />
        <link rel="stylesheet" href="{{ url("resources/assets/css/font-awesome.css") }}" />
        <link rel="stylesheet" href="{{ url("resources/assets/css/main.css") }}" />
        <link rel="icon" href="{{ url("favicon.ico") }}" />
    @show

    @section("fonts")
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/earlyaccess/opensanshebrew.css" />
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans" />
    @show

    @section("header-scripts")
        <script src="{{ url("resources/assets/js/vendor/modernizr.js") }}"></script>
    @show
</head>
<body>
    <div id="wrapper">
        @include("layout.header")
        <div id="content" class="{{ !isset($disableContainer) ? "uk-container uk-container-center" : "" }}">
            @yield("content")
        </div>
        <div class="uk-container uk-container-center tz-ad" id="bottom-ad">
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- tutszone-new-ad-bottom -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-0947472241825043"
                 data-ad-slot="7910949084"
                 data-ad-format="auto"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
        <div class="push"></div>
    </div>
    @include("layout.footer")
    @section("scripts")
        <script src="{{ url("resources/assets/js/vendor/jquery.js") }}"></script>
        <script src="{{ url("resources/assets/js/uikit.js") }}"></script>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-60477589-1', 'auto');
          ga('send', 'pageview');

        </script>
    @show
</body>
</html>