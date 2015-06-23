<?php
/**
 * Created by IntelliJ IDEA.
 * User: cdracars
 * Date: 6/9/15
 * Time: 11:19 AM
 */
?>

<div class="l-box" ng-app="gpaCalc">
  <h2>Welcome to USAO’s GPA Calculator page!</h2>
  <p>Please use our first calculator for an <em>estimated</em> GPA using credit hours, per class, and the grade you received in that class. Please remember that classes worth 0 credit hours do not count toward your GPA, nor do classes with a pass/fail grading system.</p>
  <div class="calc-app" ng-controller="CalculatorController as calc">
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
    <p class="calc-total">Calculated GPA: {{ calc.total(gpa.studentGrades) | number:2 }}</p>
  </div> <!-- End Calculator -->
  <p><strong>Note</strong>: This is not an official GPA. For an official USAO GPA and transcript, please see the Registrar’s office, 204 Troutt Hall, or visit <a href="/current-students/requesting-usao-transcripts">our transcript page</a>.</p>
  <hr>
  <p><strong>How to manually calculate your GPA:</strong></p>
  <ul class="calc-list">
    <li>Step 1 – List the number of hours for each course.</li>
    <li>Step 2 – List the grades on a 4.0 scale. (A=4, B=3, C=2, D=1)</li>
    <li>Step 3 – Multiply the number of hours by the grade.</li>
    <li>Step 4 – Add the grade points.</li>
    <li>Step 5 – Divide the total grade points by the total number of credit hours.</li>
  </ul>

  <hr>

  <p>Wanting to raise your GPA? Use our second GPA calculator to determine how many graded hours you need to get it back
    to where you want it. (<strong>Note</strong>: See Registrar for official calculations.) You’ll need your current GPA,
    the number of graded hours completed (divisor) you’ve received so far and the desired GPA. Graded credit hours should
    include “F” but NOT incompletes (I) or withdrawals (W).</p>
  <div class="calc-app2" ng-controller="DesiredGPAController as dgpa">
    <div class="form-item">
      <label>Graded Hours Completed</label><input type="number" min="0" step="any" ng-model="dgpa.completedHours"></input>
    </div>
    <div class="form-item">
      <label>Current GPA</label><input type="number" min="0" step="any" ng-model="dgpa.currentGPA"></input>
    </div>
    <div class="form-item">
      <label>Desired GPA</label><input type="number" min="0" max="4" step="any" ng-model="dgpa.desiredGPA"></input>
    </div>
    <div class="form-item">
      <button ng-click="dgpa.desiredTotal()">Calculate</button>
    </div>
    <p ng-hide="!dgpa.total">Since you have <strong>{{ dgpa.completedHours }}</strong> graded hours completed, to raise your GPA from a <strong>{{
        dgpa.currentGPA }}</strong> to <strong>{{ dgpa.desiredGPA | number:2 }}</strong>:</p>

    <p class="calc-total" ng-hide="!dgpa.total" ng-repeat="letter in dgpa.result">You'll need <strong>{{ letter.hours }}</strong> graded hours at <strong>{{ letter.value | number:2 }}</strong> for a GPA of <strong>{{ dgpa.desiredGPA | number:2 }}</strong>.</p>
  </div>
</div>