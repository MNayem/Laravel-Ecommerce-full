<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Category Delete</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form wire:submit.prevent="destroyCategory">
              <div class="modal-body">
                <h6>Are you sure you want to delete this category?</h6>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Yes, Delete</button>
              </div>
          </form>
        </div>
      </div>
    </div>

    <div>
        <div class="row">
        @if(session('message'))
            <h4 class="alert alert-success">{{ session('message') }}</h4>
        @endif
         @if(session('message-update'))
            <h4 class="alert alert-success">{{ session('message-update') }}</h4>
        @endif
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Category
                        <a href="{{ url('create_category') }}" class="btn btn-primary float-end">Add Category</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <img src="{{ asset("$category->image") }}" width="150px" height="150px" alt="category Image" >
                                </td>
                                <td>{{ $category->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                <td>
                                    <a href="{{ url('editCategory',$category->id) }}" class="btn btn-success">Edit</a>
                                    <a href="#" wire:click="deleteCategory({{ $category->id }})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div>
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener('close-modal', event => {
            $('#deleteModal').modal('hide');
        });
    </script>
@endpush
