<?php
/**
 * Created by IntelliJ IDEA.
 * User: cdracars
 * Date: 6/9/15
 * Time: 11:19 AM
 */
?>

<div class="l-box" ng-app="gpaCalc">
  <h2>Welcome to USAO’s GPA Calculator!</h2>
  <p>Please use the calculator for an <em>estimated</em> GPA using credit hours, per class, and the grade you received in that class. Please remember that classes worth 0 credit hours do not count toward your GPA, nor do classes with a pass/fail grading system.</p>
  <p><strong>Note</strong>: This is not an official GPA. For an official USAO GPA and transcript, please see the Registrar’s office, 204 Troutt Hall, or visit <a href="/current-students/requesting-usao-transcripts">our transcript page</a>.</p>
  <div ng-controller="CalculatorController as calc">
    <div class="form-item calc-row" ng-repeat="gpa in calc.gpas track by $index">
      <strong>Class {{ $index + 1 }}</strong>
      <label class="calc-label" for="hours">Hours:</label>
      <select class="calc-select" id="hours" ng-model="gpa.studentCredits"
              ng-options="hour.numberHours for hour in calc.hours"></select><br>
      <label class="calc-label" for="grade">Grade:</label>
      <select class="calc-select" id="grade" ng-model="gpa.studentGrades"
              ng-options="grade.letterGrade for grade in calc.grades"></select><br>
    </div>
    <div class="form-item">
      <button ng-click="calc.add()">Add Another Class</button>
    </div>
    <p>Calculated GPA: {{ calc.total(gpa.studentGrades) | number:2 }}</p>
  </div> <!-- End Calculator -->
  <p><strong>How to calculate your GPA:</strong></p>
  <ul>
    <li>Step 1 – List the number of hours for each course.</li>
    <li>Step 2 – List the grades on a 4.0 scale. (A=4, B=3, C=2, D=1)</li>
    <li>Step 3 – Multiply the number of hours by the grade.</li>
    <li>Step 4 – Add the grade points.</li>
    <li>Step 5 – Divide the total grade points by the total number of credit hours.</li>
  </ul>
</div>