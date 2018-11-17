<div class="container">
	<div class="col-md-12">
		<table class="table table-dark">
			<thead>
				<tr>
					<th>Id<br/><input ng-model="search.id" class="form-control input-sm" ></th>
					<th>First Name<br/><input ng-model="search.firstName" class="form-control input-sm"></th>
					<th>Last Name<br/><input ng-model="search.lastName" class="form-control input-sm"></th>
					<th >Gender<br/><input ng-model="search.gender" class="form-control input-sm"></th>
					<th >DoB<br/><input ng-model="search.dob" class="form-control input-sm"> </th>
					<th>Email<br/><input ng-model="search.email" class="form-control input-sm"></th>
					<th>Phone<br/><input ng-model="search.phone" class="form-control input-sm"></th>
					<th>Status</th>			
					<th>Update</th>			
				</tr>

				
			</thead>
			<tbody>
				<tr ng-repeat="(key, value) in allUsers| filter:{id: search.id, firstName: search.firstName, lastName: search.lastName, gender: search.gender, dob: search.dob, email: search.email, phone: search.phone}">
					<td>{{value.id}}</td>
					<td>{{value.firstName}}</td>
					<td>{{value.lastName}}</td>
					<td>{{value.gender}}</td>
					<td>{{value.dob}}</td>
					<td>{{value.email}}</td>
					<td>{{value.phone}}</td>
					<td>{{value.status}}</td>
					<td><a class="btn btn-info" type="button" ng-href="#!/updateUserInfo/{{value.id}}/">Update Info</a></td>
				</tr>
			</tbody>
		</table>
	</div>

</div>