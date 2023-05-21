import 'bootstrap';
import axios from 'axios';

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

 import Pusher from 'pusher-js';
 window.Pusher = Pusher;

 window.Echo = new Echo({
     broadcaster: 'pusher',
        key: 'cq5eDTbwzpvZV0TCAgF',
        wsHost: window.location.hostname,
        wsPort: 6001,
        wssPort: 6001,
        disableStats: true,
        /* forceTLS: true, */
        /* encrypted: true, */
        enabledTransports: ['ws', 'wss'],
        cluster: "mt1"

 });

 $(function() {


    window.Echo.channel(`actualizacionPj`).listen('personajeActualizado', (e) => {
        console.log(`evento: ` + e);
    });


    window.Echo.connector.pusher.connection.bind('connecting', (payload) => {
        /**
         * All dependencies have been loaded and Channels is trying to connect.
         * The connection will also enter this state when it is trying to reconnect after a connection failure.
         */
        console.log('Conectando al WS...');
    });
    window.Echo.connector.pusher.connection.bind('connected', (payload) => {

        /**
         * The connection to Channels is open and authenticated with your app.
         */

        //console.log('connected!', payload);
        console.log("Conectado al WS");
    });
    window.Echo.connector.pusher.connection.bind('unavailable', (payload) => {

        /**
         *  The connection is temporarily unavailable. In most cases this means that there is no internet connection.
         *  It could also mean that Channels is down, or some intermediary is blocking the connection. In this state,
         *  pusher-js will automatically retry the connection every 15 seconds.
         */

        //console.log('unavailable', payload);
        console.log("El WS no está disponible", payload);
    });
    window.Echo.connector.pusher.connection.bind('failed', (payload) => {

        /**
         * Channels is not supported by the browser.
         * This implies that WebSockets are not natively available and an HTTP-based transport could not be found.
         */

        //console.log('failed', payload);
        console.log("Fallo al conectar al WS");
        //location.reload();
    });
    window.Echo.connector.pusher.connection.bind('disconnected', (payload) => {

        /**
         * The Channels connection was previously connected and has now intentionally been closed
         */

        //console.log('disconnected', payload);
        console.log("Desconectado del WS");
    });
    window.Echo.connector.pusher.connection.bind('message',async (payload) => {

        /**
         * Ping received from server
         */

        if(payload.event !== "pusher.pong") {
            console.log('message', payload);
        }
/*
        if(payload.event === "App\\Events\\InstanceUpdated") {
            $("#datatable_mantenimiento").DataTable().ajax.reload(null, false);
            toastr.success("La instancia " + payload.data[0].id + " ha sido actualizada");
        } */

    });
})
