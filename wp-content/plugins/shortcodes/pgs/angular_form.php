<script>
// declare a module
    var myAppModule = angular.module('myApp', []);

// configure the module.
// in this example we will create a greeting filter
    myAppModule.filter('greet', function () {
        return function (name) {
            return 'Hello, ' + name + '!';
        };
    });
</script>

<form method="post" action="#" onsubmit="" ng-app="" ng-init="firstName='First Name';lastName='Last Name'">
    <h1>Here is where the Form goes</h1>
    
    <div id="form_row"><input type="text" ng-model="firstName" /></div>
    <div id="form_row"><input type="text" ng-model="lastName" /></div>
    <div id="contact_info">
        {{firstName}}<br>
        {{lastName}}<br>
    </div>
</form>