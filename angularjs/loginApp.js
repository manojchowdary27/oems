var loginApp = angular.module("loginApp",[]);
			loginApp.controller('loginCtrl', function($scope, $http,$window,$sce ) {
				$scope.loginbut="Sign In";
				//$scope.error="";
				//$scope.loginbut="Login";
				//$scope.close = function(){document.getElementById('message-box-sound-2').style.display="none";}
				$scope.login = function(){
					$scope.loginbut="Verifying...";
					$http.post(apiBase+"login.php",{user:$scope.username,pwd:$scope.password,type:$scope.logintype})
					.then(function(response){ 
						console.log(response.data.access);
						if(response.data.access=="allow") $window.location.href="index.php";
						else{
							$scope.loginbut="Sign In";
							alert("Invalid Credentials");
							//document.getElementById('message-box-sound-2').style.display="block";
							console.log(response);
						}
						});
					}
				});
