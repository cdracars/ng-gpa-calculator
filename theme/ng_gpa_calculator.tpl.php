<?php
/**
 * Created by IntelliJ IDEA.
 * User: cdracars
 * Date: 6/9/15
 * Time: 11:19 AM
 */
?>

<div ng-app="gpaCalc">
  <div ng-controller="CalculatorController as calc">
    <div ng-repeat="gpa in calc.gpas track by $index">
      <label>Course</label>
      <input type="text" ng-model="gpa.studentCourses"></input>
      <label>Credits</label>
      <input type="number" min="1" ng-model="gpa.studentCredits"></input>
      <label>Grade (null not allowed):</label>
      <select ng-model="gpa.studentGrades"
              ng-options="grade.letterGrade for grade in calc.grades"></select><br>
    </div>
    <hr/>
    total: {{ calc.total(gpa.studentGrades) }}<br>

    <div>
      <button ng-click="calc.add()">add</button>
    </div>
  </div>
</div>