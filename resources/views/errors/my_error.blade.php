@if($errors->get($key))
    <div class='error'>{{ $errors->first($key) }}</div>
@endif