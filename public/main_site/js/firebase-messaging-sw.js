 var firebaseConfig = {
    apiKey: "AIzaSyBLkAhel_mGMk2gE7LlrE0Qhx4i-JFuwHk",
    authDomain: "kibproject.firebaseapp.com",
    databaseURL: "https://kibproject.firebaseio.com",
    projectId: "kibproject",
    storageBucket: "kibproject.appspot.com",
    messagingSenderId: "775911170777",
    appId: "1:775911170777:web:d5a608a76e9a9e2a"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);

var messaging = firebase.messaging();

/**
 * Here is is the code snippet to initialize Firebase Messaging in the Service
 * Worker when your app is not hosted on Firebase Hosting.
 // [START initialize_firebase_in_sw]
 // Give the service worker access to Firebase Messaging.
 // Note that you can only use Firebase Messaging here, other Firebase libraries
 // are not available in the service worker.
 importScripts('https://www.gstatic.com/firebasejs/4.8.1/firebase-app.js');
 importScripts('https://www.gstatic.com/firebasejs/4.8.1/firebase-messaging.js');
 // Initialize the Firebase app in the service worker by passing in the
 // messagingSenderId.
 firebase.initializeApp({
   'messagingSenderId': 'YOUR-SENDER-ID'
 });
 // Retrieve an instance of Firebase Messaging so that it can handle background
 // messages.
 const messaging = firebase.messaging();
 // [END initialize_firebase_in_sw]
 **/


// If you would like to customize notifications that are received in the
// background (Web app is closed or not in browser focus) then you should
// implement this optional method.
// [START background_handler]
// messaging.setBackgroundMessageHandler(function(payload) {
//   console.log('[firebase-messaging-sw.js] Received background message ', payload);
//   // Customize notification here
//   var notificationTitle = 'Noour';
//   var notificationOptions = {
//     body: 'hello123',
//     icon: '/firebase-logo.png'
//   };


//   return self.registration.showNotification(notificationTitle,
//     notificationOptions);
// });



self.addEventListener('push', function(event) {
  const analyticsPromise = pushReceivedTracking();
  const pushInfoPromise = fetch('/api/get-more-data')
    .then(function(response) {
      return response.json();
    })
    .then(function(response) {
      const title = response.data.userName + ' says...';
      const message = response.data.message;

      self.registration.showNotification(title, {
        body: message
      });
    });

  const promiseChain = Promise.all([
    analyticsPromise,
    pushInfoPromise
  ]);

  event.waitUntil(promiseChain);
});