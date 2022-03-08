<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ asset('assets/img/snack-booth.svg') }}" class="logo" alt="Kelontong.ID Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
