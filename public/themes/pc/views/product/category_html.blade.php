<div class="container w1400">
@foreach($lists as $list_key => $list)
    <ul class="{!! num_to_eng_tab($list_key) !!} clearfix category-tab" style="display: block">
        @foreach($list as $key => $category)
            <li category_id="{{ $category['id'] }}" type="child" @if($category['active']) class="active" @endif>{{ $category['name'] }}</li>
        @endforeach
    </ul>
@endforeach
</div>