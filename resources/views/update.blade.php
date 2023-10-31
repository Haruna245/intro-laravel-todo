<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update page</title>

    <link href="{{asset('assets/dist/css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>
    
    <div class="d-flex justify-content-center mt-2">
        <div class="w-50">
        @if(Session::get('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{Session::get('error')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
            <div class="mt-5 d-flex justify-content-center ">
                <h1>Update your Todo List</h1>
            </div>
            <hr class="mb-3">
        @foreach($list as $lst)

        
        <form action="update" method="post">
            @csrf
          <input type="text" class="d-none" value="{{$lst->id}}" name="id">
          <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Title</label>
            <input type="text" class="form-control" id="inputEmail4" name="title" value="{{$lst->title}}">
          </div>
          <div class="col-md-12 mb-3">
            <label for="inputEmail4" class="form-label">Description</label>
            <input type="text" class="form-control" id="inputEmail4" name="description" value="{{$lst->description}}">
          </div>
          <!-- <div class="col-md-12">
            <label for="inputEmail4 mb-3" class="form-label">Status</label>
            <input type="text" class="form-control" id="inputEmail4" name="status" value='{{$lst->status}}' >
          </div> -->
          <div class="mb-3">
          <label for="inputEmail4" class="form-label">Status</label>
          <select class="form-select form-select" aria-label=".form-select-sm example" name="status">
            <option selected >---open to select the status---</option>
            <option value="completed">completed</option>
            <option value="ongoing">ongoing</option>
            
          </select>
        </div>

          <div class="modal-footer mt-5">
            
            <input type="submit" class="btn btn-primary" value="submit" name="submit">
            
          </div>

          </form>
        @endforeach
        </div>
    </div>

    
    <script src="{{asset('assets/dist/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>