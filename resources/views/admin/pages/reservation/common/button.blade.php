
<a href="{{ route('reservation.index') }}" class="btn btn-success btn-xs">
    <i class = "fa fa-plus"> </i> Incoming Reservations
</a>
<a href="{{ route('reservation.completed') }}" class="btn btn-success btn-xs">
    <i class = "fa fa-check"> </i> Completed Reservations
</a>
<a href="{{ route('reservation.uncompleted') }}" class="btn btn-info btn-xs">
    <i class = "fa fa-undo"> </i> Reservations Not Yet Completed
</a>
<a href="{{ route('reservation.softDeletes') }}" class="btn btn-danger btn-xs">
    <i class = "fa fa-trash"> </i> Deleted Reservations
</a>
