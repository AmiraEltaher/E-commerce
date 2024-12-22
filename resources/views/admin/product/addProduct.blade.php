@extends('admin.layouts.master')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Manage e-commerce</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Add Products</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a class="dropdown-item" href="#">Settings 1</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                action="{{ route('products.store') }}" method="POST" enctype= "multipart/form-data">
                                @csrf
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="productName"> Name
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="productName" name="productName" required="required" value="{{ old('productName') }}" class="form-control ">
                                            @if ($errors->has('productName'))
                                            <span class="text-danger">{{ $errors->first('productName') }}</span>
                                            @endif
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="productDescription">
                                        Description <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <textarea id="productDescription" name="productDescription" required="required" class="form-control">Contents</textarea>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="productCost" class="col-form-label col-md-3 col-sm-3 label-align"> Cost
                                        <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="productCost" class="form-control" type="number" name="productCost"
                                            required="required">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="productDiscount" class="col-form-label col-md-3 col-sm-3 label-align">
                                        Discount <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="productDiscount" class="form-control" type="number"
                                            name="productDiscount" required="required">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" class="flat" name="active" value="1">  {{--value="1" will make it boolean value istead of default value "on", validation rule boolean --}}
                                        </label>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="productImage">Image
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="file" id="productImage" name="productImage" required="required"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Category
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select class="form-control" name="productCategory" id="">
                                            <option value=" ">Select Category</option>
                                            <option value="cat1">fruits</option>
                                            <option value="cat2">bread </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button class="btn btn-primary" type="button">Cancel</button>
                                        <button type="submit" class="btn btn-success">Add</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /page content -->
@endsection
