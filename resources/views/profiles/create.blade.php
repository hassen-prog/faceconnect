@extends('layouts.app')

@section('content')
<div class="container pt-10">
    <div class="main-content bg-lightblue theme-dark-bg right-chat-active">
        <div class="middle-sidebar-bottom">
            <div class="middle-sidebar-left">
                <div class="middle-wrap">
                    <div class="card w-100 border-0 bg-white shadow-xs p-0 mb-4">
                        <div class="card-body p-4 w-100 bg-current border-0 d-flex rounded-3">
                            <a href="" class="d-inline-block mt-2">
                                <i class="ti-arrow-left font-sm text-white"></i>
                            </a>
                            <h4 class="font-xs text-Blue fw-600 ms-4 mb-0 mt-2">Account Details</h4>
                        </div>
                        
                        <div class="card-body p-lg-5 p-4 w-100 border-0 ">
                            <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                <div class="row">
                                    
                                        <div class="form-group">
                                            <label class="mont-font fw-600 font-xsss mb-2">Phone</label>
                                            <input type="text" name="phone" id="phone" class="form-control" />
                                            @error('phone')
                                              <span class="text-danger">{{ $message }}</span>
                                             @enderror
                                        </div>
                                  
                                </div>
                            
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <div class="form-group">
                                            <label class="mont-font fw-600 font-xsss mb-2">Country</label>
                                            <input type="text" name="country" id="country" class="form-control" />
                                            @error('country')
                                            <span class="text-danger">{{ $message }}</span>
                                           @enderror
                                        </div>
                                    </div>
                            
                                    <div class="col-lg-12 mb-3">
                                        <div class="form-group">
                                            <label class="mont-font fw-600 font-xsss mb-2">Address</label>
                                            <input type="text" name="address" id="address" class="form-control" />
                                            @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                           @enderror
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <div class="form-group">
                                            <label class="mont-font fw-600 font-xsss mb-2">Town / City</label>
                                            <input type="text" name="town" id="town" class="form-control" />
                                            @error('town')
                                            <span class="text-danger">{{ $message }}</span>
                                           @enderror
                                        </div>
                                    </div>
                            
                                    <div class="col-lg-6 mb-3">
                                        <div class="form-group">
                                            <label class="mont-font fw-600 font-xsss mb-2">Postcode</label>
                                            <input type="text" name="postcode" id="postcode" class="form-control" />
                                            @error('postcode')
                                            <span class="text-danger">{{ $message }}</span>
                                           @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 mb-3">
                                    <div class="card mt-3 border-0">
                                        <div class="card-body d-flex justify-content-between align-items-end p-0">
                                            <div class="form-group mb-0 w-100">
                                               
                                             <input type="file" name="profile_picture" id="profile_picture" class="input-file" />
                                             @error('profile_picture')
                                             <span class="text-danger">{{ $message }}</span>
                                            @enderror  
                                             <label for="profile_picture" class="rounded-3 text-center bg-white btn-tertiary js-labelFile p-4 w-100 border-dashed">
                                                    <i class="ti-cloud-down large-icon me-3 d-block"></i>
                                                    <span class="js-fileName">your Profile Picture </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            
                                <div class="col-lg-12 mb-3">
                                    <label class="mont-font fw-600 font-xsss mb-2 text-dark">Description</label>
                                    <textarea name="description" id="description" class="form-control mb-0 p-3 h100 bg-greylight lh-16" rows="5" placeholder="Write your message..."></textarea>
                                </div>
                            
                                <div class="col-lg-12">
                                    <button type="submit" class="bg-current text-center text-blue font-xsss fw-600 p-3 w175 rounded-3 d-inline-block">Save</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
