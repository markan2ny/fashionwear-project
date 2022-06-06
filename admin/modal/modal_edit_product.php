<div class="modal fade" id="edit_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_product">
                    <div class="text-center">
                        <img src="#" width="250" id="item_image" alt="" class="img-thumbnail">
                    </div>
                    <!-- <div class="form-group">
                        <small>Upload Image</small>
                        <input type="file" name="image" id="image" class="form-control">
                    </div> -->
                    <div class="form-group">
                        <small>Item Code</small>
                        <input readonly type="text" name="item_code" id="item_code" class="form-control" placeholder="Enter Item name">
                    </div>
                    <div class="form-group">
                        <small>Item Name</small>
                        <input readonly type="text" name="item_name" id="item_name" class="form-control" placeholder="Enter Item name">
                    </div>
                    <div class="form-group">
                        <small>Item Size</small>
                        <input readonly type="text" name="item_size" id="item_size" class="form-control" placeholder="Enter Item size">
                    </div>
                    <div class="form-group">
                        <small>Item Price</small>
                        <input readonly type="text" name="item_price" id="item_price" class="form-control" placeholder="Enter Item price">
                    </div>
                    <div class="form-group">
                        <small>Item Stock(s)</small>
                        <input readonly type="text" name="item_qty" id="item_qty" class="form-control" placeholder="Enter Item stock">
                    </div>
                         <div class="form-group">
                        <small>Item Category</small>
                        <select readonly name="item_cat" id="item_cat" class="form-control">
                        </select>
                    </div>
                    <div class="form-group">
                        <small>Item Variation</small>
                        <input readonly type="text" name="item_variant" id="item_variant" class="form-control" placeholder="Enter Item variation">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!-- <button type="button" id="submit" class="btn btn-primary">Save Product</button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
