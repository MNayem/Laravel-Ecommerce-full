@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if(session('message-deleteImage'))
            <h6 class="alert alert-danger">{{ session('message-deleteImage') }}</h6>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>
                    Edit Product
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

                <form action="{{ url('products/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                                            <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }} >
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Product Name</label>
                                    <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Product Slug</label>
                                    <input type="text" name="slug" value="{{ $product->slug }}" class="form-control">
                                    @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Select Brand</label>
                                    <select name="brand" class="form-control">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->name }}" {{ $brand->id == $product->brand ? 'selected' : '' }} >
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('brand') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Short Description (no more than 500 words)</label>
                                    <textarea name="small_description" class="form-control" rows="4">{{ $product->small_description }}</textarea>
                                    @error('small_description') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" rows="4">{{ $product->small_description }}</textarea>
                                    @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="tab-pane fade border p-3 " id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                                <div class="mb-3">
                                    <label>Meta Title</label>
                                    <input type="text" name="meta_title" value="{{ $product->meta_title }}" class="form-control">
                                    @error('meta_title') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Meta Keyword</label>
                                    <textarea name="meta_keyword" class="form-control" rows="4">{{ $product->meta_keyword }}</textarea>
                                    @error('meta_keyword') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Meta Description</label>
                                    <textarea name="meta_description" class="form-control" cols="30" rows="10">{{ $product->meta_description }}</textarea>
                                    @error('meta_description') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="tab-pane fade border p-3 " id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                                <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label>Original Price</label>
                                                <input type="number" step="any" name="original_price" value="{{ $product->original_price }}" class="form-control">
                                                @error('original_price') <small class="text-danger">{{ $message }}</small> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label>Selling Price</label>
                                                <input type="number" step="any" name="selling_price" value="{{ $product->selling_price }}" class="form-control">
                                                @error('selling_price') <small class="text-danger">{{ $message }}</small> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label>Quantity</label>
                                                <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}">
                                                @error('quantity') <small class="text-danger">{{ $message }}</small> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label>Trending</label>
                                                <input type="checkbox" name="trending" {{ $product->trending == '1' ? 'checked' : '' }} style="width: 50px, height: 50px;" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label>Featured</label>
                                                <input type="checkbox" name="featured" {{ $product->featured == '1' ? 'checked' : '' }} style="width: 50px, height: 50px;" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label>Status</label>
                                                <input type="checkbox" name="status" {{ $product->status == '1' ? 'checked' : '' }} style="width: 50px, height: 50px;" >
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="tab-pane fade border p-3 " id="productimg-tab-pane" role="tabpanel" aria-labelledby="productimg-tab" tabindex="0">
                                <div class="mb-3">
                                    <label>Product Iamage</label>
                                    <input type="file" name="image[]" multiple class="form-control">
                                    @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div>
                                    @if($product->productImages)
                                    <div class="row">
                                        @foreach ($product->productImages as $image)
                                        <div class="col-md-2">
                                            <img src="{{ asset($image->image) }}" alt="Img" class="me-4 border"
                                                style="width: 80px; height: 80px;" />
                                            <a href="{{ url('/product-image/'.$image->id.'/delete') }}" class="d-block text-danger">Remove</a>
                                        </div>
                                        @endforeach
                                    </div>
                                    @else
                                        <h6>No Image Uploaded</h6>
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade border p-3 " id="productcolor-tab-pane" role="tabpanel" aria-labelledby="productcolor-tab" tabindex="0">
                                <div class="mb-3">
                                    <h4>Add Product Color</h4>
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
                                <div class="table-responsive">
                                    <table class="table table-sm table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Color Name</th>
                                                <th>Color Quantity</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($product->productColors as $productColor)

                                            <tr class="product-color-tr">
                                                <td>
                                                    @if ($productColor->color)
                                                        {{ $productColor->color->name }}
                                                    @else
                                                    <h5>No Color Found!</h5>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="input-group mb-3" style="width: 150px;">
                                                        <input type="number" value="{{ $productColor->quantity }}" class="productColorQuantity form-control form-control-sm">
                                                        <button type="button" value="{{ $productColor->id }}" class="updateProductColorBtn btn btn-primary btn-sm text-white">Update</button>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button type="button" value="{{ $productColor->id }}" class="deleteProductColorBtn btn btn-danger btn-sm text-white">Delete</button>
                                                </td>
                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary float-end text-white mt-3">Update</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $(document).on('click','.updateProductColorBtn', function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var product_id = "{{ $product->id }}";
            var product_color_id = $(this).val();
            var qty = $(this).closest('.product-color-tr').find('.productColorQuantity').val();

            //alert(product_color_id);

            if(qty <= 0){
                    alert('Quantity is required!');
                    return false;
                }

                var data = {
                    'product_id' : product_id,
                    'product_color_id' : product_color_id,
                    'qty' : qty
                };

                $.ajax({
                    type: "POST",
                    url: "/product-color/"+product_color_id,
                    data: data,
                    success: function (response) {
                        alert(response.message);
                    }
                });
            });

        $(document).on('click','.deleteProductColorBtn', function () {

            var product_color_id = $(this).val();
            var thisClick = $(this);

            $.ajax({
                type: "GET",
                url: "/product-color/"+product_color_id+"/delete",
                success: function (response) {
                    thisClick.closest('.product-color-tr').remove();
                    alert(response.message);
                }
            });
        });
    });
</script>
@endsection
