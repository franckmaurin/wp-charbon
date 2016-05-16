export default class {
  constructor() {
    this.$ = {
      facebookLink : document.querySelector(".share__link--facebook"),
      twitterLink  : document.querySelector(".share__link--twitter")
    };
    // init
    if(this.$.facebookLink) {
      this.initFacebook();
    }
    if(this.$.twitterLink) {
      this.initTwitter();
    }
  }

  update() {
    this.constructor();
  }

  /* Facebook */
  initFacebook() {
    window.fbAsyncInit = function() {
      FB.init({
        appId   : 'XXX',
        xfbml   : true,
        version : 'v2.5'
      });
    };
    this.appendScript('facebook-jssdk', '//connect.facebook.net/fr_FR/sdk.js');
    this.$.facebookLink.addEventListener('click', (e) => {
      e.preventDefault();
      FB.ui({
        method: 'share',
        href: document.location.href,
      }, function(response){});
    });
  }

  /* Twitter */
  initTwitter() {
    this.appendScript('twitter-widget', '//platform.twitter.com/widgets.js');
  }

  /* Load scripts asynchonously */
  appendScript(id, url) {
    if(document.getElementById(id)) {
      return;
    }
    let script     = document.createElement('script');
        script.id  = id;
        script.src = url;
    document.head.appendChild(script);
  }
}