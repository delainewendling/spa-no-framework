var schoolsModule = {
    init: function(settings){
        schoolsModule.config = {
            tab: '.school-tab',
            table: '.studentInfoTable',
            search: '#search',
            filterEmails: '#filterEmails'
        };

        $.extend(schoolsModule.config, settings);
        schoolsModule.setup();
    },

    setup: function(){
        schoolsModule.getStudentInfo(517);
        $(schoolsModule.config.tab).on("click", schoolsModule.tabClicked);
        $(schoolsModule.config.filterEmails).on('change', schoolsModule.filterEmails);
        $(schoolsModule.config.table).filterForTable({
            searchSelector: schoolsModule.config.search,
            emptyMsg: 'No Results'
        });
        $(schoolsModule.config.table).tableFilter({
            'input' : 'input[type=search]',
            // trigger events and elements
            'caseSensitive' :  false,
            // enable table sort
            'sort'  : true
        });

    },

    tabClicked: function(e){
        e.preventDefault();
        $schoolId =  $(e.target).parent().data().schoolId;
        schoolsModule.getStudentInfo($schoolId);

    },

    clearSearch: function(){
        $(schoolsModule.config.search).val("");
    },

    filterEmails: function(){
        if ($(schoolsModule.config.filterEmails)[0].checked) {
            $('.follows').closest('tr').hide();
        } else {
            schoolsModule.clearSearch();
            $('.follows').closest('tr').show();
        }
    },
    //TODO: Cache the data so that another ajax call doesn't have to happen if the user clicks on the same tba again
    getStudentInfo: function($schoolId)
    {
        commonModule.post(
            {'schoolId' : $schoolId },
            {
                success: function (response) {

                    $('.studentTableBody').html("");
                    var studentArr = JSON.parse(response);
                    studentArr.forEach(function(student){
                        emailClass = schoolsModule.emailClass(student);
                        newStudent = schoolsModule.updateStudentInfo(student, emailClass);
                        $('.studentTableBody').append(newStudent);
                    });
                    $('.school-tab').removeClass('active');
                    $('li[data-school-id ="'+ $schoolId + '"').addClass('active');
                    schoolsModule.filterEmails();
                    schoolsModule.clearSearch();
                }
            }, '/updateStudentInfo');
    },
    emailClass: function(student){
        //Apply algorithm to determine if the email follows the formula
        var emailBeginning = student.email.split("@")[0];
        var lastName = emailBeginning.substring(1, emailBeginning.length);
        return student.lastName.toLowerCase() === lastName.toLowerCase() ? 'follows' : 'does-not-follow';
    },
    updateStudentInfo: function(student, emailClass){
        return "<tr><td>" + student.firstName + "</td><td> " + student.lastName + "</td><td class="+emailClass+">" + student.email + "</td><td>" + student.password +"</td><td>" + student.id + "</td><td>" + student.homeroomId.name + "</td><td>" + student.grade + "</td></tr>";
    }
}

$(document).ready(function(){
    schoolsModule.init();
});