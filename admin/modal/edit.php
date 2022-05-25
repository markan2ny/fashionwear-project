<!-- The Modal -->
<div class="modal" id="editModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Manage User</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table">
            <tbody class="thead-light">
              <tr>
                <td><input type="text" name="" id="fetchID"></td>
              </tr>
              <tr>
                <th>Account ID</th>
                <td id="id1"></td>
              </tr>
              <tr>
                <th>Name</th>
                <td id="name1"></td>
              </tr>
              <tr>
                <th>Email address</th>
                <td id="email1"></td>
              </tr>
            </tbody>
          </table>
          <br>
        </div>
        <form>
          <div class="form-group">
            <label>Reason</label>
            <select class="form-control">
              <option value="scammer">Scammer</option>
              <option value="fake account">Fake Account</option>
            </select>
            <br>
            <label>Comment (</label><label class="text-muted">Optional </label><label>)</label>
            <textarea class="form-control" name="comment" placeholder="Say something about this account."></textarea>
          </div>
          <button class="btn btn-danger float-right" id="blockStatus">Block this user</button>
        </form>

      </div>
    </div>
  </div>
</div>