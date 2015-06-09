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

    self.gpas =[];

    self.total = function(){
        var total = 0;
        var creditTotal = 0;
        var gradeAdd = 0;
        for (var i = 0; i < self.gpas.length; i++){
            creditTotal += self.gpas[i].studentCredits;
            gradeMultiple = self.gpas[i].studentGrades.numberGrade * self.gpas[i].studentCredits;
            gradeAdd += gradeMultiple;
            currentCredit = self.gpas[i].studentCredits;
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
                numberGrade: ""
            },
            studentCredits: ""
        });
    }
});
