<br><br>
<h3>
    Take your exam
</h3>
<form class="@error('lesson') was-validated @enderror pt-2  px-5" action="{{ route('exam.special')}}" method="POST" novalidate>
    @csrf
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="number" class="label">number</label>
            <input type="number" class="form-control" id="number" name="number" placeholder="Number Questions" value="25" required>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <input class="form-check-input m-1 p-1 position-static" checked name="words" id="words" type="checkbox"  >
            <label for="words" class="label">Words</label>
        </div>
        <div class="col-md-6 mb-3">
            <input class="form-check-input m-1 p-1 position-static" checked name="sentences" id="sentences" type="checkbox"  >
            <label for="sentences" class="label">Sentences</label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <input class="form-check-input m-1 p-1 position-static" checked name="englishToPersian" id="englishToPersian" type="checkbox"  >
            <label for="englishToPersian" class="label">English To Persian</label>
        </div>
        <div class="col-md-6 mb-3">
            <input class="form-check-input m-1 p-1 position-static" checked name="persianToEnglish" id="persianToEnglish" type="checkbox"  >
            <label for="persianToEnglish" class="label">Persian To English</label>
        </div>
        <div class="col-md-6 mb-3">
            <input class="form-check-input m-1 p-1 position-static" checked name="stateWordCheck" id="stateWordCheck" type="checkbox"  >
            <label for="stateWordCheck" class="label"><i class="fa fa-check text-muted pr-1"></i>State Word</label>
        </div>
        <div class="col-md-6 mb-3">
            <input class="form-check-input m-1 p-1 position-static" checked name="stateWordTimes" id="stateWordTimes" type="checkbox"  >
            <label for="stateWordTimes" class="label"><i class="fa fa-times text-muted pr-1"></i>State Word</label>
        </div>
        <div class="col-md-6 mb-3">
            <input class="form-check-input m-1 p-1 position-static" checked name="stateSentenceCheck" id="stateSentenceCheck" type="checkbox"  >
            <label for="stateSentenceCheck" class="label"><i class="fa fa-check text-muted pr-1"></i>State Sentence</label>
        </div>
        <div class="col-md-6 mb-3">
            <input class="form-check-input m-1 p-1 position-static" checked name="stateSentenceTimes" id="stateSentenceTimes" type="checkbox"  >
            <label for="stateSentenceTimes" class="label"><i class="fa fa-times text-muted pr-1"></i>State Sentence</label>
        </div>
    </div>
    <button class="btn btn-outline-success mt-3  btn-block" type="submit">Create Exam</button>
</form>
