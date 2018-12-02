<div class='my-image-column'>
    <a href='/all/{{$bunny->id}}'>{{$bunny->name}}</a><br>
    <img class='bunny' src='{{ $bunny->photo_url }}' alt='Photo of the bunny'><br>
    <a href='/all/{{$bunny->id}}/edit'>Modify {{$bunny->name}}'s profile</a><br>
</div>