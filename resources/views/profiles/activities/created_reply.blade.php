@component('profiles.activities.activity')
	@slot('topic')
		{{-- @if($activity->subject) --}}
		<a href="{{ $activity->subject->thread->path() }}">"{{$activity->subject->thread->title }}"</a>
	@endslot

	@slot('category')
		{{ $activity->subject->thread->channel->name }}
	@endslot

	@slot('body')
		{{ $activity->subject->created_at->format('D M Y') }}
	@endslot
	@slot('image')
		{{ $activity->subject->thread->thread_img }}
	@endslot
@endcomponent