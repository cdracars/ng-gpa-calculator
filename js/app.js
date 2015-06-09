/**
 * Created by cdracars on 6/9/15.
 */

angular.module('gpaCalc', []);

angular.module('gpaCalc').controller('CalculatorController', function(){
    var self = this;

    self.grades = [
        {letterGrade:'A', numberGrade:4.00},
        {letterGrade:'B', numberGrade:3.00},
        {letterGrade:'C', numberGrade:2.00},
        {letterGrade:'D', numberGrade:1.00},
        {letterGrade:'WF/F', numberGrade:0}
    ];

    self.hours = [
        {numberHours:1},
        {numberHours:2},
        {numberHours:3},
        {numberHours:4},
        {numberHours:5},
        {numberHours:6},
        {numberHours:7},
        {numberHours:8}
    ];

    self.gpas = [{
        studentGrades:[{letterGrade:'', numberGrade:''}]
    }];

    self.total = function(){
        var total = 0;
        var creditTotal = 0;
        var gradeAdd = 0;
        for (var i = 0; i < self.gpas.length; i++){
            creditTotal += self.gpas[i].studentCredits.numberHours;
            gradeMultiple = self.gpas[i].studentGrades.numberGrade * self.gpas[i].studentCredits.numberHours;
            gradeAdd += gradeMultiple;
            currentCredit = self.gpas[i].studentCredits.numberHours;
            currentGrade = self.gpas[i].studentGrades.numberGrade;
            if(!currentGrade || !currentCredit) {
                return total;
            } else {
                total = gradeAdd/creditTotal;
            }
        }
        return total;
    }

    self.add = function(){
        self.gpas.push({
            studentGrades: {
                numberGrade:""
            },
            studentCredits: {
                numberHours:""
            }
        });
    }
});