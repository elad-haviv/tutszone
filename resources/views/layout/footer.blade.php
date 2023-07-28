<footer class="sticky-footer page-footer">
    <div class="uk-container uk-container-center uk-text-center">
        @section("footer")
            <img title="Icon" src="{{ url("resources/assets/images/icons/icon-16.png") }}" alt="Icon" />
            {{ trans("nav.copyrights") }}
            TutsZone <span class="fa fa-copyright"></span> {{ date("Y") }}
        @show
    </div>
</footer>