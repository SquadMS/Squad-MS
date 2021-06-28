/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

/* Build up Echo configuration */
const echoConfig = {
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    wsHost: window.location.hostname,
    wsPort: parseInt(process.env.MIX_LARAVEL_WEBSOCKETS_PORT),
    disableStats: true,
    forceTLS: false,
};

/* Add WAT (if available) */
const metaWat = document.querySelector("meta[property='wat']");
if (metaWat) {
    echoConfig.auth = {
        headers: {
            Authorization: 'Bearer ' + metaWat.getAttribute('content'),
        },
    };
}

/* Initialize Echo */
window.Echo = new Echo(echoConfig);