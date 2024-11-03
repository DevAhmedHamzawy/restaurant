@if ($email_verified_at == null)
<span class="badge bg-warning">Blocked</span>
@else
<span class="badge bg-primary">Active</span>
@endif
