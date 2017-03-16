/**
 * Created by dwendling on 3/16/17.
 */
var studentDataModule = {
    init: function(settings){
        studentDataModule.config = {
            table: '.studentTableBody',
            students: {
                NACSStudents_589: "",
                NPStudents_594: "",
                RPStudents_500: "",
                RHSStudents_599: "",
                SPStudents_501: "",
                LCAStudents_517: ""
            }
        };

        $.extend(studentDataModule.config, settings);
        studentDataModule.setup();
    },

    setup: function(){

    },

    //TODO: Cache the data so that another ajax call doesn't have to happen if the user clicks on the same tab again
    getStudentInfo: function(schoolId)
    {
        var returnData = studentDataModule.checkCachedData(schoolId);
        console.log(returnData);
        if (!returnData){
            studentDataModule.getData(schoolId);
        } else {
            $('.studentTableBody').html("");
            studentDataModule.displayCachedStudentInfo(returnData, schoolId);
        }

    },
    checkCachedData: function(schoolId){
        for (var student in studentDataModule.config.students){
            var school_id = student.split("_")[1];
            if (school_id == schoolId.toString()) {
                var studentString = studentDataModule.config.students[student];
                    if (studentString.length > 0) {
                        return studentString;
                    } else {
                        return false;
                    }
            }
        }
        return false;
    },
    getData: function(schoolId){
        var studentData = "";
        commonModule.post(
            {'schoolId' : schoolId },
            {
                success: function (response) {
                    $('.studentTableBody').html("");
                    var studentArr = JSON.parse(response);
                    studentArr.forEach(function(student){
                        emailClass = studentDataModule.getEmailClass(student);
                        newStudent = studentDataModule.createStudentInfoRow(student, emailClass);
                        studentData += newStudent;
                    });
                    studentDataModule.displayCachedStudentInfo(studentData, schoolId);
                    studentDataModule.cacheData(studentData);
                }
            }, '/updateStudentInfo');


    },
    cacheData: function (studentData){
        for (var student in studentDataModule.config.students){
            var school_id = student.split("_")[1];
            if (school_id == schoolId.toString()) {
                studentDataModule.config.students[student] = studentData;
                return studentDataModule.config.students
            }
        }
    },
    displayCachedStudentInfo: function(studentData, schoolId){
        $(studentDataModule.config.table).html(studentData);
        $('.school-tab').removeClass('active');
        $('li[data-school-id ="'+ schoolId + '"').addClass('active');
        schoolsModule.filterEmails();
        schoolsModule.clearSearch();
    },
    getEmailClass: function(student){
        //Apply algorithm to determine if the email follows the formula
        var emailBeginning = student.email.split("@")[0];
        var lastName = emailBeginning.substring(1, emailBeginning.length);
        return student.lastName.toLowerCase() === lastName.toLowerCase() ? 'follows' : 'does-not-follow';
    },
    createStudentInfoRow: function(student, emailClass){
        return "<tr><td>" + student.firstName + "</td><td> " + student.lastName + "</td><td class="+emailClass+">" + student.email + "</td><td>" + student.password +"</td><td>" + student.id + "</td><td>" + student.homeroomId.name + "</td><td>" + student.grade + "</td></tr>";
    }
}

$(document).ready(function(){
    studentDataModule.init();
});