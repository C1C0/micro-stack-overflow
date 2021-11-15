import lodash from 'lodash';
import axios from 'axios';
import Vue from 'vue';

window._ = lodash;
window.Vue = Vue

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

