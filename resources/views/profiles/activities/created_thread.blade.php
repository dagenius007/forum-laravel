@component('profiles.activities.activity')
	@slot('topic')
		<a href="{{ $activity->subject->path() }}">{{$activity->subject->title }}</a>
	@endslot

	@slot('category')
		{{ $activity->subject->channel->name }}
	@endslot

	@slot('body')
		{{ $activity->subject->body }}
	@endslot
@endcomponent