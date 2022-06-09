<div class="modal fade" id="add_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_product">
                    <span id="error_msg" class="text-danger"></span>
                    <div class="custom-file">
                        <input type="file" name="files[]" class="custom-file-input" required multiple>
                        <small class="custom-file-label" for="validatedCustomFile">Choose file...</small>
                        <div class="invalid-feedback">Please choose file to upload</div>
                    </div>
                    <div class="form-group">
                        <small>Item Name</small>
                        <input type="text" name="item_name" class="form-control" placeholder="Enter Item name">
                    </div>
                    <div class="form-group">
                        <small>Item Size</small>
                        <input type="text" name="item_size" class="form-control" placeholder="Enter Item size">
                    </div>
                    <div class="form-group">
                        <small>Item Price</small>
                        <input type="text" name="item_price" class="form-control" placeholder="Enter Item price">
                    </div>
                    <div class="form-group">
                        <small>Item Stock(s)</small>
                        <input type="text" name="item_stock" class="form-control" placeholder="Enter Item stock">
                    </div>
                    <div class="form-group">
                        <small>Item Variation</small>
                        <input type="text" name="item_variant" class="form-control" placeholder="Enter Item variation">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="submit" class="btn btn-primary">Save Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {

        $('#save').click(function() {



        });

    })
</script>