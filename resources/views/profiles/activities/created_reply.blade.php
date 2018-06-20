@component('profiles.activities.activity')
	@slot('topic')
		<a href="{{ $activity->subject->thread->path() }}">"{{$activity->subject->thread->title }}"</a>
	@endslot

	@slot('category')
		{{ $activity->subject->thread->channel->name }}
	@endslot

	@slot('body')
		{{ $activity->subject->body }}
	@endslot
@endcomponent