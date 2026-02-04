<form class="row g-2 mb-3">
<div class="col">
<input name="disease" class="form-control" placeholder="Search disease">
</div>
<div class="col">
<select name="sort" class="form-select">
<option value="">Sort</option>
<option value="patient">Patient name</option>
<option value="disease">Disease name</option>
</select>
</div>
<div class="col">
<button class="btn btn-primary">Apply</button>
</div>
</form>


@foreach($patients as $patient)
<div class="card mb-2">
<div class="card-body">
<h5>{{ $patient->name }}</h5>
<ul>
@foreach($patient->diseases as $disease)
<li>{{ $disease->name }}</li>
@endforeach
</ul>
</div>
</div>
@endforeach