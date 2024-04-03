<div class="cal-container">
    <div id="dycalendar"></div>
</div>


@push('css')
    <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customize_calendar.css') }}">
@endpush


@push('js')
<script>
    dycalendar.draw({
        target: '#dycalendar',
        type: 'month',
        dayformat: 'full',
        monthformat: 'full',
        highlighttoday : true,
        highlighttargetdate: false,
        prevnextbutton: 'show',
        dayformat: 'dd'
    })
</script>
@endpush

