{{-- <div>
    <h6>COURSE</h6>
    <h3>{{ $course->title }}</h3>
    <small>{{ $course->students()->count() }} Students</small>
</div> --}}
<div class="uk-card uk-card-default uk-width-1-4@m">
    <div class="uk-card-header">
        <div class="uk-grid-small uk-flex-middle" uk-grid>
            <div class="uk-width-auto">
                <img class="uk-border-circle" width="40" height="40" src="{{ $course->image }}" alt="Avatar">
            </div>
            <div class="uk-width-expand">
                <h3 class="uk-card-title uk-margin-remove-bottom">Title</h3>
                <p class="uk-text-meta uk-margin-remove-top"><time datetime="2016-04-01T19:00">April 01, 2016</time></p>
            </div>
        </div>
    </div>
    <div class="uk-card-body">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
    </div>
    <div class="uk-card-footer">
        <a href="#" class="uk-button uk-button-text">Read more</a>
    </div>
</div>
