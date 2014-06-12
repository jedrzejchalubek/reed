Reed.controller('Favourites', function ($scope, $filter, Api, State, Collection) {

	$scope.showArticle = function (el) {

		angular.extend($scope.view, {
			section: 'single',
			single: el,
			scrollPosition: $('#thumbs').scrollTop()
		});

	};

	$scope.nextArticle = function (el) {

		angular.extend($scope.view, {
			section: 'single',
			single: el
		});

	};

	Collection.ready([Collection.articles.$promise], function() {

		$scope.view = {
			is: 'Favourites',
			title: 'Favourites',
			section: 'list',
			content: Collection.filter('articles', {
				favourite: '1'
			})
		};

	});

});
