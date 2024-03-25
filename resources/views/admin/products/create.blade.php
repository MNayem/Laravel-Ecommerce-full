@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    Add Product
                    <a href="{{ url('/products') }}" class="btn btn-warning btn-sf text-white float-end">
                        BACK
                    </a>
                </h3>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-warning">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form action="{{ url('/addProducts') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                                Home
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">
                                SEO Tags
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                                Details
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="productimg-tab" data-bs-toggle="tab" data-bs-target="#productimg-tab-pane" type="button" role="tab" aria-controls="productimg-tab-pane" aria-selected="false">
                                Product Image
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="productcolor-tab" data-bs-toggle="tab" data-bs-target="#productcolor-tab-pane" type="button" role="tab" aria-controls="productcolor-tab-pane" aria-selected="false">
                                Product Color
                            </button>
                        </li>
                    </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                <div class="mb-3">
                                    <label>Select Category</label>
                                    <select name="category_id" class="form-control">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Product Name</label>
                                    <input type="text" name="name" placeholder="Product Name" class="form-control">
                                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Product Slug</label>
                                    <input type="text" name="slug" placeholder="Product Slug" class="form-control">
                                    @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Select Brand</label>
                                    <select name="brand" class="form-control">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('brand') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Short Description (no more than 500 words)</label>
                                    <textarea name="small_description" class="form-control" rows="4"></textarea>
                                    @error('small_description') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" rows="4"></textarea>
                                    @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="tab-pane fade border p-3 " id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                                <div class="mb-3">
                                    <label>Meta Title</label>
                                    <input type="text" name="meta_title" placeholder="Meta Title" class="form-control">
                                    @error('meta_title') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Meta Keyword</label>
                                    <textarea name="meta_keyword" class="form-control" rows="4"></textarea>
                                    @error('meta_keyword') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Meta Description</label>
                                    <textarea name="meta_description" class="form-control" rows="4"></textarea>
                                    @error('meta_description') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="tab-pane fade border p-3 " id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                                <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label>Original Price</label>
                                                <input type="number" step="any" name="original_price" class="form-control">
                                                @error('original_price') <small class="text-danger">{{ $message }}</small> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label>Selling Price</label>
                                                <input type="number" step="any" name="selling_price" class="form-control">
                                                @error('selling_price') <small class="text-danger">{{ $message }}</small> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label>Quantity</label>
                                                <input type="number" name="quantity" class="form-control">
                                                @error('quantity') <small class="text-danger">{{ $message }}</small> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label>Trending</label>
                                                <input type="checkbox" name="trending" style="width: 50px, height: 50px;" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label>Featured</label>
                                                <input type="checkbox" name="featured" style="width: 50px, height: 50px;" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label>Status</label>
                                                <input type="checkbox" name="status" style="width: 50px, height: 50px;" >
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="tab-pane fade border p-3 " id="productimg-tab-pane" role="tabpanel" aria-labelledby="productimg-tab" tabindex="0">
                                <div class="mb-3">
                                    <label>Upload Product Iamage/Images</label>
                                    <input type="file" name="image[]" multiple class="form-control">
                                    @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="tab-pane fade border p-3 " id="productcolor-tab-pane" role="tabpanel" aria-labelledby="productcolor-tab" tabindex="0">
                                <div class="mb-3">
                                    <label>Select Product Color</label>
                                    <hr/>
                                   <div class="row">
                                    @forelse ($colors as $colorItem)
                                        <div class="col-md-3">
                                            <div class="p-2 border mb-3">
                                                Color: <input type="checkbox" name="colors[{{ $colorItem->id  }}]" value="{{ $colorItem->id }}">
                                                    {{ $colorItem->name }}

                                                <br />

                                                Quantity: <input type="number" name="colorquantity[{{ $colorItem->id  }}]" style="width: 50px; border: 1px solid;">
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-md-12">
                                            <h5>No Color Found!</h5>
                                        </div>
                                    @endforelse

                                   </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary float-end text-white mt-3">Submit</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
