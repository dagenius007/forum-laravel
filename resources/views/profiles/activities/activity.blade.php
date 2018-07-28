{{-- <div class="panel panel-default">
    <div class="panel-heading">
    	<div class='level'>
    		<span class='flex'>
    			{{ $heading }}
        	</span>
		</div>
    </div>

    <div class="panel-body">
        {{ $body }}
    </div>
</div> --}}
<div class="profile__activity">
    <div id="topic">
        {{ $topic }}
    </div>
    <div>
        {{ ucfirst($category) }}
    </div>
    <div>
        {{ $body }}
    </div>
    <div>
        <img src="{{ asset('img/'.$image) }}" alt="">
    </div>
</div>