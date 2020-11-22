@php $qas=\App\Qa::all()->pluck('title','id');  @endphp
<select id="selectQa" class="my-select selectpicker" name="lesson"  data-live-search="true" data-size="4" >
    <option value="0" data-tokens="0">
        choose
    </option>
    @foreach($qas as $key=>$value)
        <option value="{{$key}}" data-tokens="{{ $value }}">
            {{ $value }}
        </option>
    @endforeach
</select>
