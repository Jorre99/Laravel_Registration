let Zwembad = (function () {


    function hello() {
        console.log('The pool JavaScript works! 🙂');
    }


    /**
     * Show a Noty toast.
     * @param {object} obj
     * @param {string} [obj.type='success'] - background color ('success' | 'error '| 'info' | 'warning')
     * @param {string} [obj.text='...'] - text message
     */
    // function toast(obj) {
    //     //     let toastObj = obj || {};   // if no object specified, create a new empty object
    //     //     new Noty({
    //     //         layout: 'topRight',
    //     //         timeout: false,
    //     //         modal: false,
    //     //         type: toastObj.type || 'success',   // if no type specified, use 'success'
    //     //         text: toastObj.text || '...',       // if no text specified, use '...'
    //     //     }).show();
    //     // }

    // Return all functions that are public available.

    return {
        //toast: toast,
        hello: hello,

    };
})();

export default Zwembad;
