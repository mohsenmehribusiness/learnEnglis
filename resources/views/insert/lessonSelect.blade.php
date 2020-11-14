@php $lessons=\App\Lesson::all();  @endphp
<select class="my-select selectpicker" name="lesson[]"  data-live-search="true" data-size="3"  multiple>
    <option hidden >Display but don't show in list</option>
    @foreach($lessons as $lesson)
        <option value="{{$lesson->id}}" data-tokens="{{ $lesson->lesson }}">
            {{ $lesson->lesson }}
        </option>
    @endforeach
</select>
<script>
    $('.my-select') .selectpicker({dropupAuto: false});
</script>
