<!-- Brand Add Modal -->
<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
                <button type="button" wire:click="closeModal" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="storeBrand">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Select Category</label>
                        <select wire:model.defer="category_id" required class="form-control">
                            <option value="">--Select Category--</option>
                            @foreach ($categories as $categoryItem)

                                <option value="{{ $categoryItem->id }}">{{ $categoryItem->name }}</option>

                            @endforeach

                        </select>
                        @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                   <div class="mb-3">
                        <label for="">Brand Name</label>
                        <input type="text" wire:model.defer="name" class="form-control" >
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                   </div>
                   <div class="mb-3">
                        <label for="">Brand Slug</label>
                        <input type="text" wire:model.defer="slug" class="form-control" >
                        @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                   </div>
                   <div class="mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" wire:model.defer="status" > Checked=Hidden, Un-checked=Visible
                        @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                   </div>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Brand Update Modal -->
<div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Brand</h5>
                <button type="button" class="close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div wire:loading class="p-2">
                <div class="spinner-border text-success" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>Loading...
            </div>
            <div wire:loading.remove>
                <form wire:submit.prevent="updateBrand">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Select Category</label>
                            <select wire:model.defer="category_id" required class="form-control">
                                <option value="">--Select Category--</option>
                                @foreach ($categories as $categoryItem)

                                    <option value="{{ $categoryItem->id }}">{{ $categoryItem->name }}</option>

                                @endforeach

                            </select>
                            @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                                <label for="">Brand Name</label>
                                <input type="text" wire:model.defer="name" class="form-control" >
                                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                                <label for="">Brand Slug</label>
                                <input type="text" wire:model.defer="slug" class="form-control" >
                                @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                                <label for="">Status</label>
                                <input type="checkbox" wire:model.defer="status" > Checked=Hidden, Un-checked=Visible
                                @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Brand Delete Modal -->
<div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Brand</h5>
                <button type="button" class="close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div wire:loading class="p-2">
                <div class="spinner-border text-success" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>Loading...
            </div>
            <div wire:loading.remove>
                <form wire:submit.prevent="destroyBrand">
                    <div class="modal-body">
                        <h4>Are you sure you want to delete this brand ?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Yes, Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
