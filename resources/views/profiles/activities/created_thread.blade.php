@component('profiles.activities.activity')
	@slot('topic')
		<a href="/threads/{{ $activity->subject->channel->name }}/{{ $activity->subject->slug }}">{{ $activity->subject->title }}</a>
	@endslot

	@slot('category')
		{{ $activity->subject->channel->name }}
	@endslot

	@slot('body')
		{{ $activity->subject->created_at->format('D M Y') }}
	@endslot

	@slot('image')
		{{ $activity->subject->thread_img }}
	@endslot

@endcomponent