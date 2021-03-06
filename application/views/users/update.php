<div class="container">
  <form name="userInfo" method="post">
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">First Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" ng-model="userModel.firstName" >
      </div>
    </div>

    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Last Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" ng-model="userModel.lastName">
      </div>
    </div>

    <div class="form-group row" >
      <label for="inputEmail3" class="col-sm-2 col-form-label">Gender</label>
      <div class="col-sm-10">

        <select name="gender" ng-model="userModel.gender" class="form-control">
          <option value="">Select an option</option>
          <option>Male</option>
          <option>Female</option>

        </select>
      </div>
    </div>

    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" ng-model="userModel.email" placeholder="Email">
      </div>
    </div>

    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Date of Birth</label>
      <div class="col-sm-10">
        <input type="text" class="form-control datepicker" id="datetimepicker" ng-model="userModel.dob" placeholder="Date of Birth">
      </div>
    </div>

    

    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Phone</label>
      <div class="col-sm-10">
        <input type="text" class="form-control"  ng-model="userModel.phone" placeholder="Enter Phone Number">
      </div>
    </div>

    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Address</label>
      <div class="col-sm-10">
        <input type="text" class="form-control"  ng-model="userModel.address"placeholder="Enter Address here">
      </div>
    </div>

    
    <div class="form-group row" >
      <label for="inputEmail3" class="col-sm-2 col-form-label">Status</label>
      <div class="col-sm-10">

        <select name="status" ng-model="userModel.status"class="form-control">
          <option value="">Select an option</option>
          <option>Active</option>
          <option>Inactive</option>

        </select>
      </div>
    </div>
    
    <div class="form-group row">
      <div class="offset-sm-2 col-sm-10">
        <button ng-click="submitUpdateData()" class="btn btn-primary">Update</button>
      </div>
    </div>
    <pre>
      {{userModel | json}}  
    </pre>
  </form>
</div>

<script>
  $('.datepicker').datepicker({
    dateFormat: 'yy-mm-dd'
  });
</script>
