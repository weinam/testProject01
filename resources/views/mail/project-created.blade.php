@component('mail::message')
# {{ $project->title }}

{{ $project->description }}

@component('mail::button', ['url' => url('/projects/'.$project->id)])
View
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
