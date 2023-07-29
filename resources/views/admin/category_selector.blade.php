<option value="0">{{trans('admin.category.no_parent')}}</option>
@foreach($categories as $category)
    @if($category['id'] != $self)
        <option value="{{$category['id']}}"{{ $category['id'] == $parent ? ' selected="selected"' : '' }}>
            {{str_repeat('-',$category['level']).' '.$category['name']}}
        </option>
    @endif
@endforeach