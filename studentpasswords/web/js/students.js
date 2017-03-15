/**
 * Created by dwendling on 3/14/17.
 */
var studentsModule = {
    init: function(settings){
        //This will be a dictionary. These are the defaults. You can leave the
        studentsModule.config = {

        }
        //extends the function inside the javascript, applies the values in the second argument to the first argument. It merges objects.
        $.extend(studentsModule.config, settings);
        studentsModule.setup();
    },
    //add your event listeners
    setup: function(){

    }
}

$(document).ready(function(){
    studentsModule.init();
});