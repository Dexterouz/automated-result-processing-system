@if (session($type))
    <div class="alert alert-{{ $color }}"><i class="fas fa-{{ $icon }}"></i> {{ session($type) }}</div>
@endif