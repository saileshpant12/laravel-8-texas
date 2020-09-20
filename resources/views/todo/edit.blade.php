@extends('template')

@section('content')
<div class="row d-flex justify-content-center container">
	<div class="col-md-8">
		<div class="card-hover-shadow-2x mb-3 card">
			<div class="card-header-tab card-header">
				<div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="fa fa-tasks"></i>&nbsp;Edit Task</div>
			</div>

			<div class="scroll">
				<form class="form-horizontal" action="/todo/{{$todo->id}}" method="post" style="margin-left: 50px; margin-top: 10px;">
					@csrf
					@method('put')
					<div class="form-group">
						<label class="control-label col-sm-2" for="email">Task Name:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="email" placeholder="Enter Task Name" name="name" value="{{ $todo->name }}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="pwd">Due Date:</label>
						<div class="col-sm-10">          
							<input type="date" class="form-control" id="pwd" placeholder="Select Due Date" name="due_date" value="{{ $todo->due_date }}">
						</div>
					</div>
					<div class="form-group">        
						<div class="col-sm-offset-2 col-sm-10">
							<a role="button" href="/" class="btn btn-warning">Cancel</a>&nbsp;<button class="btn btn-primary">Save</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection