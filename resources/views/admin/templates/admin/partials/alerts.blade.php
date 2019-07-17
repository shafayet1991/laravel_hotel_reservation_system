@if (session()->has('info'))
<div class="clearfix"></div>
<div class="alert alert-info" role="alert">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{ session('info') }}

</div>
@endif

@if (session()->has('success'))
<div class="clearfix"></div>
<div class="alert alert-success" role="alert">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{ session('success') }}

</div>
@endif

@if (session()->has('warning'))
<div class="clearfix"></div>
<div class="alert alert-warning" role="alert">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{ session('warning') }}

</div>
@endif

@if (session()->has('error'))
<div class="clearfix"></div>
<div class="alert alert-danger" role="alert">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{ session('error') }}

</div>
@endif