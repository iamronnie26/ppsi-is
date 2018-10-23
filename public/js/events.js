Echo.private('user.{{ Auth::id() }}')
          .listen('NewApplicantNotification', (e) => {
              alert(e.message.message);
});