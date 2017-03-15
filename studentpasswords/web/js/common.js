/**
 * Created by dwendling on 3/15/17.
 */

var commonModule = {
    init: function(settings){
        //This will be a dictionary. These are the defaults. You can leave the
        commonModule.config = {
        };
        //extends the function inside the javascript, applies the values in the second argument to the first argument. It merges objects.
        $.extend(commonModule.config, settings);
        commonModule.setup();
    },
    //add your event listeners
    setup: function(){

    },
    post: function (data, callbacks, endpoint) {
        "use strict";

        function callIfExists(fn, arg) {
            if (fn) {
                fn(arg);
            }
        }

        if (typeof endpoint === 'undefined') {
            //TODO: determine endpoint
        }

        callIfExists(callbacks.start);

        return $.ajax({
            type: 'POST',
            url: endpoint,
            data: data,
            success: function (response) {
                callIfExists(callbacks.done);
                try {
                    if (response.error === true) {
                        callIfExists(callbacks.error, response);
                    } else {
                        callIfExists(callbacks.success, response);
                    }
                } catch (e) {
                    callIfExists(callbacks.error);
                }
            },
            error: function (request, status, error) {
                callIfExists(callbacks.done);
                callIfExists(callbacks.error);
            }
        });
    }
}

$(document).ready(function(){
    commonModule.init();
});
