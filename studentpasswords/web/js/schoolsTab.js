var schoolsModule = {
    init: function(settings){
        schoolsModule.config = {
            tab: '.school-tab',
            table: '.studentInfoTable',
            search: '#search',
            filterEmails: '#filterEmails',
        };

        $.extend(schoolsModule.config, settings);
        schoolsModule.setup();
    },

    setup: function(){
        //Load LCA student information first
        studentDataModule.getStudentInfo(517);
        //Load different information when a new tab in is clicked
        $(schoolsModule.config.tab).on("click", schoolsModule.tabClicked);
        //Filter for abnormal emails when the abnormal email box is checked
        $(schoolsModule.config.filterEmails).on('change', schoolsModule.filterEmails);

        //Plugin usage to filter for a student using the search box
        $(schoolsModule.config.table).filterForTable({
            searchSelector: schoolsModule.config.search,
            emptyMsg: 'No Results'
        });

        //Plugin usage to sort each column alphabetically
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
        schoolId =  $(e.target).parent().data().schoolId;
        studentDataModule.getStudentInfo(schoolId);
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
    }
};

$(document).ready(function(){
    schoolsModule.init();
});