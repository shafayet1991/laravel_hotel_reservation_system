require('./bootstrap');
window.Vue = require('vue');
import App from './App.vue'

import AirbnbStyleDatepicker from 'vue-airbnb-style-datepicker'
import 'vue-airbnb-style-datepicker/dist/vue-airbnb-style-datepicker.min.css'

Vue.use(AirbnbStyleDatepicker,{
    closeAfterSelect:true,
    sundayFirst: false,
    days: ['Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi', 'Pazar'],
    daysShort: ['Pzt', 'Sal', 'Çrş', 'Prş', 'Cum', 'Cmts', 'Pzr'],
    texts: {
        apply: 'Uygula',
        cancel: 'İptal',
        keyboardShortcuts: 'Klavye Kısayolları',
    },
    colors: {
        selected: '#00a699',
        inRange: '#66e2da',
        selectedText: '#fff',
        text: '#565a5c',
        inRangeBorder: '#33dacd',
        disabled: '#fff',
        hoveredInRange: '#67f6ee'
    },
    monthNames: [
        'Ocak',
        'Şubat',
        'Mart',
        'Nisan',
        'Mayıs',
        'Haziran',
        'Temmuz',
        'Ağustos',
        'Eylül',
        'Ekim',
        'Kasım',
        'Aralık',
    ],
    keyboardShortcuts: [
        {symbol: '↵', label: 'Select the date in focus', symbolDescription: 'Enter key'},
        {symbol: '←/→', label: 'Move backward (left) and forward (right) by one day.', symbolDescription: 'Left or right arrow keys'},
        {symbol: '↑/↓', label: 'Move backward (up) and forward (down) by one week.', symbolDescription: 'Up or down arrow keys'},
        {symbol: 'PgUp/PgDn', label: 'Switch months.', symbolDescription: 'PageUp and PageDown keys'},
        {symbol: 'Home/End', label: 'Go to the first or last day of a week.', symbolDescription: 'Home or End keys'},
        {symbol: 'Esc', label: 'Close this panel', symbolDescription: 'Escape key'},
        {symbol: '?', label: 'Open this panel', symbolDescription: 'Question mark'}
    ],
})

import config from './config.js';

axios.create({
    baseURL: config.BASE_URL
});

new Vue({
    el: '#calendar',
    render: h => h(App),
});
