@extends('template')

@section('content')

<div class="row d-flex justify-content-center container">
  <div class="col-md-8">

    @if (session()->has('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> {{ session()->get('status')}}.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    <div class="card-hover-shadow-2x mb-3 card">
      <div class="card-header-tab card-header">
        <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="fa fa-tasks"></i>&nbsp;Available Task Lists</div>
      </div>
      <div class="scroll-area-sm">
        <perfect-scrollbar class="ps-show-limits">
          <div style="position: static;" class="ps ps--active-y">
            <div class="ps-content">
              <ul class=" list-group list-group-flush">

                @foreach ($todos as $todo)
                <li class="list-group-item">
                  <div class="todo-indicator bg-success"></div>
                  <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                      <div class="widget-content-left">
                        <div class="widget-heading">{{ $todo->name}} 
                          @if ($todo->status)
                          <div class="badge badge-success ml-2">Completed</div>
                          @else
                          <div class="badge badge-danger ml-2">Not Completed</div>
                          @endif
                          
                        </div>
                        <div class="widget-subheading"><i>Due Date : {{ $todo->due_date}}</i></div>
                      </div>
                      <div class="widget-content-right"> 
                        @if(!$todo->status)
                          <button class="border-0 btn-transition btn btn-outline-success" data-toggle="modal" data-target="#completeModal" data-id="{{$todo->id}}" id="complete_modal"> <i class="fa fa-check"></i></button> 
                        @endif
                        <a role="button" href="todo/{{$todo->id}}/edit" class="border-0 btn-transition btn btn-outline-primary"> <i class="fa fa-edit"></i></a> 
                        <button class="border-0 btn-transition btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{$todo->id}}" id="delete_modal"> <i class="fa fa-trash"></i> </button> </div>
                    </div>
                  </div>
                </li>

                @endforeach
              </ul>
  </div>
</div>
</perfect-scrollbar>
</div>
<div class="d-block text-right card-footer"><a role="button" href="/todo/create" class="btn btn-primary">Add New Task</a></div>
</div>
</div>
</div>

<!-- DELETE MODAL -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form id="delete_form" method="post">
    @csrf
    @method('delete')
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">CONFIRMATION</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;
            </span>
          </button>
        </div>
        <div class="modal-body">
         Are you sure to delete ?
       </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-primary">Yes</button>
      </div>
    </div>
  </div>
</form>
</div>

<!-- COMPLETE MODAL -->
<div class="modal fade" id="completeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form id="complete_form" method="post">
    @csrf
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">CONFIRMATION</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure to mark as completed ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">No</button>
          <button type="submit" class="btn btn-primary">Yes</button>
        </div>
      </div>
    </div>
  </form>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
  $(document).on("click", "#delete_modal", function () {
   var id = $(this).data('id');
   $('#delete_form').attr('action', 'todo/' + id);
 });

  $(document).on("click", "#complete_modal", function () {
   var id = $(this).data('id');
   $('#complete_form').attr('action', 'todo/complete/' + id);
 });
</script>

@endsection