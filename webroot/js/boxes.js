/**
 * @fileoverview Boxes Javascript
 * @author nakajimashouhei@gmail.com (Shohei Nakajima)
 */


/**
 * BoxesController Javascript
 *
 * @param {string} Controller name
 * @param {function($scope, $http)} Controller
 */
NetCommonsApp.controller('BoxesController',
    ['$scope', function($scope) {

      /**
       * 選択
       */
      $scope.select = function(containerType, boxId) {
        if ($scope.$parent.sending) {
          return true;
        }

        var elements = angular.element('input[containerType="' + containerType + '"]');
        for (var i = 0; i < elements.length; i++) {
          if (elements[i].id === 'BoxesPageContainerIsPublished' + boxId + '1') {
            elements[i].checked = true;
          } else {
            elements[i].checked = false;
          }
        }

        try {
          $scope.$parent.sending = true;
          angular.element('#BoxForm' + boxId)[0].submit();
        } catch (el) {
          $scope.$parent.sending = false;
        }
        return true;
      };

    }]);
