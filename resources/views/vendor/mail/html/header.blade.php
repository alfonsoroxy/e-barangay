@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot))
<img src="https://iconape.com/wp-content/png_logo_vector/barangay-logo.png" class="logo" alt="Barangay 264 Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
