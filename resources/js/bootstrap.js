// import _ from 'lodash';
// window._ = _;

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

// import axios from 'axios';
// window.axios = axios;
//
// window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Store header height in css variable
// let root = document.documentElement;
// let headerHeight = document.querySelector('header').offsetHeight;
// root.style.setProperty('--headerHeight',headerHeight + 'px');


// Background audio player
let audioToggle = document.getElementById('audio-toggle');
let audioPlayer = document.getElementById('audio-player');

audioToggle.addEventListener('click',function () {
    if (!audioPlayer.paused) {
       audioPlayer.pause()
    } else {
        audioPlayer.play()
    }
})
