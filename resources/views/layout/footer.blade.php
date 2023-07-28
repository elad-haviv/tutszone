<footer class="sticky-footer page-footer">
    <div class="uk-container uk-container-center uk-text-center">
        @section('footer')
            <img title="Icon" src="{{ url('images/logo.svg') }}" width="16" alt="Icon" />
            {{ trans('nav.copyrights') }}
            TutsZone <span class="fa fa-copyright"></span> {{ date('Y') }}
        @show
    </div>
</footer>
