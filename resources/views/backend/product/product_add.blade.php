@extends('admin.admin_master')



@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



<div class="container-full">

    <!-- Main content -->
    <section class="content">

    <!-- Basic Forms -->
    <div class="box">
        <div class="box-header with-border">
        <h4 class="box-title">Add Product</h4>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <div class="row">
            <div class="col">
                <form novalidate>
                <div class="row">
                    <div class="col-12">

                        <div class="row"> {{-- Start first Row --}}
                            <div class="col-md-4"> {{-- Start col --}}
                                <div class="form-group">
                                    <h5>Brand Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="brand_id" class="form-control">
                                            <option value="" selected="" disabled="">Select Brand</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->brand_name_en }}</option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> {{-- end col --}}

                            <div class="col-md-4"> {{-- Start col --}}
                                <div class="form-group">
                                    <h5>Category Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="category_id" class="form-control">
                                            <option value="" selected="" disabled="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> {{-- end col --}}

                            <div class="col-md-4"> {{-- Start col --}}
                                <div class="form-group">
                                    <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="subcategory_id" class="form-control">
                                            <option value="" selected="" disabled="">Select SubCategory</option>
                                        </select>
                                        @error('subcategory_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> {{-- end col --}}

                        </div> {{-- end first Row --}}







                        <div class="row"> {{-- Start second Row --}}
                            <div class="col-md-4"> {{-- Start col --}}
                                <div class="form-group">
                                    <h5>SubSubcategory Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="subsubcategory_id" class="form-control">
                                            <option value="" selected="" disabled="">Select SubSubcategory</option>

                                        </select>
                                        @error('subsubcategory_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> {{-- end col --}}

                            <div class="col-md-4"> {{-- Start col --}}
                                <div class="form-group">
                                    <h5>Product Name En <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_name_en" class="form-control">
                                    </div>
                                    @error('product_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> {{-- end col --}}

                            <div class="col-md-4"> {{-- Start col --}}
                                <div class="form-group">
                                    <h5>Product Name AR <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_name_ar" class="form-control">
                                    </div>
                                    @error('product_name_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> {{-- end col --}}
                        </div> {{-- end second Row --}}





                        <div class="row"> {{-- Start thered Row --}}
                            <div class="col-md-4"> {{-- Start col --}}
                                <div class="form-group">
                                    <h5>Product Code <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_code" class="form-control">
                                    </div>
                                    @error('product_code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> {{-- end col --}}

                            <div class="col-md-4"> {{-- Start col --}}
                                <div class="form-group">
                                    <h5>Product Quantity <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_qty" class="form-control">
                                    </div>
                                    @error('product_qty')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> {{-- end col --}}

                            <div class="col-md-4"> {{-- Start col --}}
                                <div class="form-group">
                                    <h5>Product Tag En <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_tags_en" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput" placeholder="add tags">
                                    </div>
                                    @error('product_tags_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> {{-- end col --}}
                        </div> {{-- end thered Row --}}








                        <div class="row"> {{-- Start Fourth Row --}}
                            <div class="col-md-4"> {{-- Start col --}}
                                <div class="form-group">
                                    <h5>Product Tag Ar <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_tags_ar" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput" placeholder="add tags">
                                    </div>
                                    @error('product_tags_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> {{-- end col --}}

                            <div class="col-md-4"> {{-- Start col --}}
                                <div class="form-group">
                                    <h5>Product Size En <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_size_en" class="form-control" value="Small,Midium,Large" data-role="tagsinput" placeholder="add tags">
                                    </div>
                                    @error('product_size_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> {{-- end col --}}

                            <div class="col-md-4"> {{-- Start col --}}
                                <div class="form-group">
                                    <h5>Product Size Ar <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_size_ar" class="form-control" value="Small,Midium,Large" data-role="tagsinput" placeholder="add tags">
                                    </div>
                                    @error('product_size_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> {{-- end col --}}
                        </div> {{-- end Fourth Row --}}






                        <div class="row"> {{-- Start Five Row --}}
                            <div class="col-md-4"> {{-- Start col --}}
                                <div class="form-group">
                                    <h5>Product Color En <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_color_en" class="form-control" value="red,black,green" data-role="tagsinput" placeholder="add tags">
                                    </div>
                                    @error('product_color_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> {{-- end col --}}

                            <div class="col-md-4"> {{-- Start col --}}
                                <div class="form-group">
                                    <h5>Product Color Ar <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_color_ar" class="form-control" value="red,black,green" data-role="tagsinput" placeholder="add tags">
                                    </div>
                                    @error('product_color_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> {{-- end col --}}

                            <div class="col-md-4"> {{-- Start col --}}
                                <div class="form-group">
                                    <h5>Product Selling Price <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="selling_price" class="form-control">
                                    </div>
                                    @error('selling_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> {{-- end col --}}
                        </div> {{-- end Five Row --}}







                        <div class="row"> {{-- Start Sex Row --}}
                            <div class="col-md-4"> {{-- Start col --}}
                                <div class="form-group">
                                    <h5>Product Discount Price <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="discount_price" class="form-control">
                                    </div>
                                    @error('discount_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> {{-- end col --}}

                            <div class="col-md-4"> {{-- Start col --}}
                                <div class="form-group">
                                    <h5>Main Thambnail <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="product_thambnail" class="form-control">
                                    </div>
                                    @error('product_thambnail')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> {{-- end col --}}

                            <div class="col-md-4"> {{-- Start col --}}
                                <div class="form-group">
                                    <h5>Multiple Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="multi_img[]" class="form-control">
                                    </div>
                                    @error('multi_img')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> {{-- end col --}}
                        </div> {{-- end Sex Row --}}






                        <div class="row"> {{-- Start Seven Row --}}
                            <div class="col-md-6"> {{-- Start col --}}
                                <div class="form-group">
                                    <h5>Short Description En <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="short_descp_en" id="textarea" class="form-control" required placeholder="Short Description English"></textarea>
                                    </div>
                                </div>
                            </div> {{-- end col --}}

                            <div class="col-md-6"> {{-- Start col --}}
                                <div class="form-group">
                                    <h5>Short Description Ar <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="short_descp_ar" id="textarea" class="form-control" required placeholder="Short Description Arabic"></textarea>
                                    </div>
                                </div>
                            </div> {{-- end col --}}
                        </div> {{-- end Sex Row --}}







                        <div class="row"> {{-- Start Seven Row --}}
                            <div class="col-md-6"> {{-- Start col --}}
                                <div class="form-group">
                                    <h5>Long Description En <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea id="editor1" name="long_descp_en" rows="10" cols="80">Long Description English.</textarea>
                                    </div>
                                </div>
                            </div> {{-- end col --}}

                            <div class="col-md-6"> {{-- Start col --}}
                                <div class="form-group">
                                    <h5>Long Description Ar <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea id="editor2" name="long_descp_ar" rows="10" cols="80">Long Description Arabic.</textarea>
                                    </div>
                                </div>
                            </div> {{-- end col --}}
                        </div> {{-- end Sex Row --}}







                    </div>
                </div>

                <hr>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="controls">
                                    <fieldset>
                                        <input type="checkbox" name="hot_deals" id="checkbox_2" value="1">
                                        <label for="checkbox_2">Hot Deals</label>
                                    </fieldset>
                                    <fieldset>
                                        <input type="checkbox" name="featured" id="checkbox_3" value="1">
                                        <label for="checkbox_3">Featured</label>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">

                                <div class="controls">
                                    <fieldset>
                                        <input type="checkbox" name="special_offer" id="checkbox_4" value="1">
                                        <label for="checkbox_4">Special Offer</label>
                                    </fieldset>
                                    <fieldset>
                                        <input type="checkbox" name="special_deals" id="checkbox_5" value="1">
                                        <label for="checkbox_5">Special Deals</label>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-xs-right">
                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Product">
                    </div>
                </form>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

    </section>
    <!-- /.content -->
</div>




<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="category_id"]').on('change', function() {
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{ url('/category/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        var d =$('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">'+ value.subcategory_name_en +'</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });









        $('select[name="subcategory_id"]').on('change', function() {
            var subcategory_id = $(this).val();
            if(subcategory_id) {
                $.ajax({
                    url: "{{ url('/category/sub-subcategory/ajax') }}/"+subcategory_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        var d =$('select[name="subsubcategory_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">'+ value.subsubcategory_name_en +'</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
</script>

@endsection
