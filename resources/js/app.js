import './bootstrap'

import VueProfileEditable from "./components/EditableProfile/VueProfileEditable";
import VueProfileCommon from "./components/VueProfileCommon";

new Vue({
    el: '#profile',
    components: {
        VueProfileEditable,
        VueProfileCommon,
    },
    data: {}
});