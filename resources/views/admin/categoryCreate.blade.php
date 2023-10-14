@extends('layout.main')
@section('container')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Tambahkan Category</h4>
                <p class="text-muted mb-4">Use the <code>.form-inline </code>class to display a series of labels, form controls, and buttons on a single horizontal row. 
                    Form controls within inline forms vary slightly from their default states..</p>
                <div class="general-label">
                    <form class="form-inline" role="form">
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputEmail2">Nama Category</label>
                            <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Category baru">
                        </div>                                                    
                       
                      
                        <button type="submit" class="btn btn-primary ml-2">Sign in</button>
                    </form>           
                </div>
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
</div><!--end row--> 
@endsection

@push('js')
    <script src="/assets/plugins/repeater/jquery.repeater.min.js"></script>
    <script src="/assets/pages/jquery.form-repeater.js"></script>  

    
@endpush