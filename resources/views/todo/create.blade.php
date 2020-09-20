@extends('template')

@section('content')
<div class="row d-flex justify-content-center container">
	<div class="col-md-8">
		<div class="card-hover-shadow-2x mb-3 card">
			<div class="card-header-tab card-header">
				<div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="fa fa-tasks"></i>&nbsp;Create Task</div>
			</div>
			<div class="scroll">
				<form class="form-horizontal" action="/todo" method="post" style="margin-left: 50px; margin-top: 10px;">
					@csrf
					<div class="form-group">
						<label class="control-label col-sm-2 @error('name') text-danger @enderror" for="email">Task Name:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control @error('name') is-invalid @enderror" id="email" placeholder="Enter Task Name" name="name">

						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2 @error('due_date') text-danger @enderror" for="pwd">Due Date:</label>
						<div class="col-sm-10">          
							<input type="date" class="form-control @error('due_date') is-invalid @enderror" id="pwd" placeholder="Select Due Date" name="due_date">
						</div>
					</div>
					<div class="form-group">        
						<div class="col-sm-offset-2 col-sm-10">
							<a role="button" href="/" class="btn btn-warning">Cancel</a>&nbsp;<button class="btn btn-primary">Create</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection