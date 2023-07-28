@extends("layout.master")

@section("title")
    @parent - {{ $category->title }}
@endsection

@section("content")
    <div id="category-view">
        <div class="uk-grid uk-grid-collapse">
            <aside class="uk-width-medium-1-3" id="side-nav">
                <div class="uk-panel uk-panel-box">
                    @if ($parent !== null)
                        <a href="{{ route("category:show", ["name" => $parent->name]) }}">
                            <span class="fa fa-chevron-right fa-fw"></span>
                            {{ $parent->title }}
                        </a>
                    @else
                        <a href="{{ route("category:home") }}">
                            <span class="fa fa-chevron-right fa-fw"></span>
                            {{ trans("nav.back-to-categories") }}
                        </a>
                    @endif
                    <h1 class="uk-margin-large-top uk-text-center">{{ $category->title }}</h1>
                    <p>{{ $category->description }}</p>
                    @if(count($subCategories) > 0)
                        <h2 class="uk-margin-large-top">{{ trans("nav.subcategories") }}</h2>
                        <ul class="uk-list uk-list-line uk-list-space">
                            @foreach($subCategories as $subCategory)
                                <li>
                                    <a href="{{ route("category:show", ["name" => $subCategory->name]) }}"
                                       data-uk-tooltip=""
                                       title="{{ $subCategory->description }}">
                                        {{ $subCategory->title }}
                                    </a>
                                    @if(Auth::check())
                                        @if(Auth::user()->group == 1)
                                            <div class="uk-float-right">
                                                <a href="#" data-delete-category="{{ $subCategory->id }}"><span class="fa fa-trash"></span></a>
                                                <a href="{{route('admin:category:edit',['id'=>$subCategory->id])}}"><span class="fa fa-pencil"></span></a>
                                            </div>
                                        @endif
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    @if(Auth::check())
                        @if(Auth::user()->group == 1)
                         <ul class="uk-list uk-list-line uk-list-space">
                            <li>
                                <a href="#add-category-form" data-uk-modal="{center:true}">
                                    <span class="fa fa-plus-circle"></span> {{ trans('admin.category.add') }}
                                </a>
                            </li>
                         </ul>
                        @endif
                    @endif
                </div>
            </aside>
            <div class="uk-width-medium-2-3" id="main-content">
                @if(count($courses) > 0)
                    <ul class="uk-list uk-list-line uk-list-space">
                        @foreach($courses as $course)
                            <li>
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-5 uk-text-center padded">
                                        <a href="{{ route("course:show", ["name" => $course->name]) }}">
                                            <img class="uk-border-circle" alt="course thumbnail" src="{{ url($course->picture ? $course->picture : "resources/assets/images/icons/icon-128.png") }}" />
                                        </a>
                                    </div>
                                    <div class="uk-width-medium-4-5 uk-text-center uk-margin">
                                        <h2>
                                            <a href="{{ route("course:show", ["name" => $course->name]) }}">{{ $course->title }}</a>
                                            @if(Auth::check())
                                                @if(Auth::user()->group == 1)
                                                    <span class="uk-float-right">
                                                        <a href="#" data-delete-course="{{ $course->id }}"><span class="fa fa-trash"></span></a>
                                                        <a href="{{route('admin:course:edit',['id'=>$course->id])}}"><span class="fa fa-pencil"></span></a>
                                                    </span>
                                                @endif
                                            @endif
                                        </h2>
                                        <p class="uk-text-justify">{{ $course->description }}</p>
                                    </div>
                                    <div class="uk-width-medium-1-1 uk-text-right uk-text-bold">
                                        <a href="{{ route("course:show", ["name" => $course->name]) }}">
                                            {{ trans("nav.see-course") }}
                                            <span class="fa fa-angle-double-left"></span>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    {!! $courses->render(new \TutsZone\Pagination\UiKitPresenter($courses)) !!}
                @else
                    <div class="uk-alert uk-alert-warning padded">
                        <p>{{ trans("category.message-no-courses") }}</p>
                    </div>
                    @if(count($subCategories) > 0)
                        <h2 class="uk-margin-large-top">{{ trans("category.message-try-sub") }}</h2>
                        <div class="uk-grid" data-uk-grid-match="{target:'.uk-panel'}">
                            @foreach($subCategories as $subCategory)
                                <div class="uk-width-medium-1-3 uk-margin-top">
                                    <a href="{{ route("category:show", ["name" => $subCategory->name]) }}">
                                        <div class="uk-panel uk-panel-box tz-category-card">
                                            <div class="uk-margin-bottom">
                                                <img src="{{ url($subCategory->picture !== null ? $subCategory->picture : "resources/assets/images/default-category.png") }}" alt="thumbnail" title="thumbnail" class="uk-border-circle" />
                                            </div>
                                            <h1 class="uk-panel-title uk-text-center">{{ $subCategory->title }}</h1>
                                            <p class="uk-text-justify">{{ $subCategory->description }}</p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endif
                @if(Auth::check())
                    @if(Auth::user()->group == 1)
                        <a href="{{route('admin:course:add',['data' => $category->id])}}" title="{{trans('admin.course.add')}}" class="uk-button uk-button-large uk-button-success" style="width:100%">{{trans('admin.course.add')}}</a>
                    @endif
                @endif
            </div>
        </div>
    </div>
    @if(Auth::check())
        @if(Auth::user()->group == 1)
            @include("admin.add_category",["show"=>"modal", "id" => "add-category-form", "parent" => $category->id, "defaultPicture" => $category->picture])
        @endif
    @endif
@endsection

@section("scripts")
    @parent

    @if(Auth::check())
        @if(Auth::user()->group === 1)
            @include("admin.add_category",["show"=>"script"])
            <script>
                $(document).ready(function(){
                    $('[data-delete-category]').click(function(){
                        if(confirm("{{trans("admin.category.delete-confirm")}}") == true) {
                            window.location = "{{route('admin:category:delete',['id'=>null])}}/" + $(this).attr('data-delete-category');
                        }
                    });
                    $('[data-delete-course]').click(function(){
                        if(confirm("{{trans("admin.course.delete-confirm")}}") == true) {
                            window.location = "{{route('admin:course:delete',['id'=>null])}}/" + $(this).attr('data-delete-course');
                        }
                    });
                });
            </script>
        @endif
    @endif
@endsection