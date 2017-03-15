var schoolsModule = {
    init: function(settings){
        //This will be a dictionary. These are the defaults. You can leave the
        schoolsModule.config = {
            tab: '.school-tab'
        };
        //extends the function inside the javascript, applies the values in the second argument to the first argument. It merges objects.
        $.extend(schoolsModule.config, settings);
        schoolsModule.setup();
    },
    //add your event listeners
    setup: function(){
        $(schoolsModule.config.tab).on("click", schoolsModule.tabClicked);
    },
    tabClicked: function(e){
        e.preventDefault();
        //AJAX call to endpoint that sends the school id to the
        $schoolId =  $(e.target).parent().data().schoolId;
        commonModule.post(
            {'schoolId' : $schoolId },
            {
                success: function (response) {

                    $('.studentTableBody').html("");
                    var studentArr = JSON.parse(response);
                    studentArr.forEach(function(student){
                        newStudent = schoolsModule.updateStudentInfo(student);
                        $('.studentTableBody').append(newStudent);
                    });
                    $('li[data-school-id ='+ $schoolId).addClass('active');
                }
            }, '/updateStudentInfo');
    },
    updateStudentInfo: function(student){
        return "<tr><td>" + student.firstName + " " + student.lastName + "</td><td>" + student.email + "</td><td>" + student.password +"</td><td>" + student.id + "</td><td>" + student.homeroomId.name + "</td><td>" + student.grade + "</td></tr>>";
    }
}

$(document).ready(function(){
    schoolsModule.init();
});