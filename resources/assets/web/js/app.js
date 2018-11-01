function TodoController($scope, $http)
{
	$http.get("/todoList").success(function(todo_list){
		$scope.todo_list = todo_list;
	});

	$scope.remaining = function()
	{
		var count = 0;
		angular.forEach($scope.todo_list, function(list))
		{
			count +=list.heading?0:1;
		}
	}
}