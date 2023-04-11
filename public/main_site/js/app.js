  var firebaseConfig = {
    apiKey: "AIzaSyDf7xO6xNordxm9T_ne_qrNBTDbheQPSnw",
    authDomain: "kibproject-db262.firebaseapp.com",
    databaseURL: "https://kibproject-db262.firebaseio.com",
    projectId: "kibproject-db262",
    storageBucket: "",
    messagingSenderId: "307045925197",
    appId: "1:307045925197:web:bf49b6cb843bc4a5"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  const messaging=firebase.messaging();

  Notification.requestPermission().then((permission) => {
  if (permission === 'granted') {
    console.log('Notification permission granted.');
    var token= messaging.getToken();
    console.log(token);

    // TODO(developer): Retrieve an Instance ID token for use with FCM.
    // ...
  } else {
    console.log('Unable to get permission to notify.');
  }
});