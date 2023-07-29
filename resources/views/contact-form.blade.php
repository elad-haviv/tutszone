@extends("layout.master")

@section("title")
    @parent - {{ trans("nav.contact") }}
@endsection

@section("meta-tags")
    @parent

    @if (isset($success))
        <meta http-equiv="refresh" content="3; url={{ route("home") }}" />
        <script>
            setTimeout(function () {
                // similar behavior as an HTTP redirect
                window.location.replace("{{ route("home") }}");
            }, 3000);
        </script>
    @endif
@endsection

@section("content")
    <section id="contact" class="uk-block uk-block-muted uk-margin-large-top padded">
        <h1 class="uk-text-center uk-margin-large-top">{{ trans("nav.contact") }}</h1>
        <form class="uk-form" action="{{route("contact.post")}}" method="post">
            {!! csrf_field() !!}
            <div class="uk-block">
                @if (count($errors) > 0)
                    <ul class="uk-alert uk-alert-danger uk-list">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="uk-form-horizontal">
                    <div class="uk-form-row">
                        <label class="uk-form-label" for="name">
                            {{ trans("contact.full-name") }}
                            <p><small>{{ trans("contact.full-name-desc") }}</small></p>
                        </label>
                        <div class="uk-form-controls">
                            <input type="text"
                                   required="required"
                                   min="3" max="18"
                                   name="name"
                                   id="name"
                                   placeholder="{{ trans("contact.full-name") }}"
                                   class="uk-width-1-1"
                                    />
                        </div>
                    </div>
                    <div class="uk-form-row">
                        <label class="uk-form-label" for="email">
                            {{ trans("contact.email") }}
                            <p><small>{{ trans("contact.email-desc") }}</small></p>
                        </label>
                        <div class="uk-form-controls">
                            <input type="email"
                                   required="required"
                                   name="email"
                                   id="email"
                                   placeholder="{{ trans("contact.email") }}"
                                   class="uk-width-1-1"
                                    />
                        </div>
                    </div>
                    <div class="uk-form-row">
                        <label class="uk-form-label" for="subject">
                            {{ trans("contact.subject") }}
                            <p><small>{{ trans("contact.subject-desc") }}</small></p>
                        </label>
                        <div class="uk-form-controls">
                            <input type="text"
                                   required="required"
                                   min="3"
                                   name="subject"
                                   id="subject"
                                   placeholder="{{ trans("contact.subject") }}"
                                   class="uk-width-1-1"
                                    />
                        </div>
                    </div>
                    <div class="uk-form-row">
                        <label class="uk-form-label" for="msg">
                            {{ trans("contact.message") }}
                            <p><small>{{ trans("contact.message-desc") }}</small></p>
                        </label>
                        <div class="uk-form-controls">
                        <textarea required="required"
                                 name="msg"
                                 id="msg"
                                 placeholder="{{ trans("contact.message") }}"
                                 class="uk-width-1-1 disable-resize"
                                 style="height: 250px;"
                                 ></textarea>
                        </div>
                    </div>
                    <div class="uk-form-row ht-field">
                        <label>
                            {{ trans("auth.confirm") }}
                            <input id="ht-field"
                                   name="ht-field"
                                   class="uk-width-1-1"
                                    />
                        </label>
                    </div>
                </div>
                <div class="uk-margin-large-top">
                    <button class="uk-width-1-1 uk-button uk-button-primary">
                        {{ trans("contact.send-message") }}
                    </button>
                </div>
            </div>
        </form>
        @if (isset($success))
            <div class="uk-position-cover uk-overlay-background uk-overlay-panel uk-flex uk-flex-center uk-flex-middle uk-text-center">
                <div>
                    <p class="uk-text-large uk-text-bold">{{ trans("contact.success") }}</p>
                </div>
            </div>
        @endif
    </section>
@endsection